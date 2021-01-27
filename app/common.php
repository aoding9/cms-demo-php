<?php
// 公共函数

// print_r简写, 输出并换行
// * @param mix $some 要输出的内容
function dd($some = '需要传值')
{
  echo "\n";
  print_r($some);
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
// header('Content-type:text/html;charset=utf-8');

    header('location:'.$url);
    exit();
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




