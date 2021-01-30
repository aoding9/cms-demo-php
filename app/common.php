<?php
// 公共函数
// 此时常量还未定义,不可以用

// print_r简写, 输出并换行
// * @param mix $some 要输出的内容
function dd($some = '需要传值')
{
  print_r($some);
}
// 输出内容用<pre>标签包裹
function ddd($some = '需要传值')
{
  echo "<pre style='display:none'>";
  print_r($some);
  echo "</pre>";
}

// query字符串转数组
function get_query($str = '')
{
  $str ?? $_SERVER['QUERY_STRING'];
  // 获取查询字符串,转成数组,返回
  parse_str($str, $query_arr);
  return $query_arr;
}

// 重定向 跳转
function location($url = '/index.php', $query = '')
{
  $url = empty($query) ? $url : $url . "?" . $query;
  header('location:' . $url);
}

// 刷新跳转,默认延迟3秒,期间会继续执行php
function refresh($url = '/index.php', $query = '', $delay = '3')
{
  $url = empty($query) ? $url : $url . "?" . $query;
  header('refresh:' . $delay . ';url=' . $url);
}


// 错误跳转
// 响应状态码
function req_error($req_no = 404)
{
  switch ($req_no) {
    case 404:
      // @header("http/1.1 404 not found");
      // @header("status: 404 not found");
      $error = '404 not found';
      location('http://' . $_SERVER['HTTP_HOST'] . '/public/static/404.htm');
      break;
    default:
      break;
  }
}

// 生成随机字符串
function str_rand($length = 32)
{
  $str = array(
    'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h',
    'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's',
    't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D',
    'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O',
    'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
    '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'
  );
  // 在 $str 中随机取 $length 个数组元素键名
  $count = count($str);
  //  $keys = array_rand($str, $length); 
  $str_rand = '';
  for ($i = 0; $i < $length; $i++) {
    // 将 $length 个数组元素连接成字符串
    $str_rand .= $str[rand(0, $count - 1)];
  }
  return $str_rand;
}

// 文件上传,验证函数
function checkfile($file)
{
  //1：验证是否有误
  if ($file['error'] != 0) {
    switch ($file['error']) {
      case 1:
        return '文件大小超过了php.ini中允许的最大值,最大值是：' . ini_get('upload_max_filesize');
      case 2:
        return '文件大小超过了表单允许的最大值';
      case 3:
        return '只有部分文件上传,请重试';
      case 4:
        return '没有文件上传';
      case 6:
        return '找不到临时文件';
      case 7:
        return '文件写入失败';
      default:
        return '未知错误';
    }
  }
  //2、验证格式
  $info = finfo_open(FILEINFO_MIME_TYPE);
  $mime = finfo_file($info, $file['tmp_name']);
  $allow = array('image/jpeg', 'image/png', 'image/gif');  //允许的类别
  if (!in_array($mime, $allow)) {
    return '只能上传' . implode(',', $allow) . '格式';
  }
  //3、验证大小
  $size = 1024 * 1024; // 1mb
  if ($file['size'] > $size) {
    return '文件大小不能超过' . number_format($size / 1024, 1) . 'K';
  }
  //4、验证是否是http上传
  if (!is_uploaded_file($file['tmp_name']))
    return '文件不是HTTP POST上传的';

  return null;  //没有错误
}
// 文件上传,执行函数
function uploadfile($file)
{
  //文件上传，上传的文件保存到当天的文件夹中
  $foldername = date('Y-m-d');    //文件夹名称
  $folderpath = DIR_['uploads'] . "/{$foldername}";  //文件夹路径
  if (!is_dir($folderpath))
    mkdir($folderpath);
  $filename = uniqid('', true) . strrchr($file['name'], '.');  //文件名
  $filepath = "$folderpath/$filename";  //文件路径
  if (move_uploaded_file($file['tmp_name'], $filepath))
    return ["result" => true,
     "msg" => "文件上传成功",
     "file"=>"/uploads/{$foldername}/{$filename}"];
  else
    return ["result" => false, "msg" => "文件上传失败"];
}
