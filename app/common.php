<?php
// 公共函数
// 此时常量还未定义,不可以用

// print_r简写, 输出并换行
// * @param mix $some 要输出的内容
function dd($some = '需要传值')
{
  echo "\n";
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
function get_query($str='')
{
  $str??$_SERVER['QUERY_STRING'];
  // 获取查询字符串,转成数组,返回
  parse_str($str, $query_arr);
  return $query_arr;
}

// 重定向 跳转
function location ($url='/index.php',$query='') {
    $url = empty($query)?$url:$url."?".$query;
    header('location:'.$url);
}

// 刷新跳转,默认延迟3秒,期间会继续执行php
function refresh ($url='/index.php',$query='',$delay='3') {
  $url = empty($query)?$url:$url."?".$query;
  header('refresh:'.$delay.';url='.$url);
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
      location('http://'.$_SERVER['HTTP_HOST'].'/public/static/404.htm');
      break;
    default:
      break;
  }
}

// 生成随机字符串
function str_rand($length=32)
{
  $str = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 
 'i', 'j', 'k', 'l','m', 'n', 'o', 'p', 'q', 'r', 's', 
 't', 'u', 'v', 'w', 'x', 'y','z', 'A', 'B', 'C', 'D', 
 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L','M', 'N', 'O', 
 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y','Z', 
 '0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
 // 在 $str 中随机取 $length 个数组元素键名
 $count= count($str);
//  $keys = array_rand($str, $length); 
 $str_rand = '';
 for($i = 0; $i < $length; $i++)
 {
  // 将 $length 个数组元素连接成字符串
  $str_rand .= $str[rand(0,$count-1)];
 }
 return $str_rand;
}






