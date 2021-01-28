<?php
// 公共函数

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
  echo "<pre>";
  print_r($some);
  echo "</pre>";
}

// query字符串转数组
function get_query()
{
  // 获取查询字符串,转成数组,返回
  parse_str($_SERVER['QUERY_STRING'], $query_arr);
  return $query_arr;
}

// 重定向和跳转
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
      location('http://'.INFO_['host'].'/public/static/404.htm');
      break;
    default:
      break;
  }
}




