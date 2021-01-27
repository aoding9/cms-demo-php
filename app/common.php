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
  // 获取查询字符串,并转数组,保存到$query_arr
  parse_str($_SERVER['QUERY_STRING'], $query_arr);
  return $query_arr;
}

// 错误跳转
// 响应状态码
function error_redirect($req_no = 200)
{
  switch ($req_no) {
    case 404:
      @header("http/1.1 404 not found");
      @header("status: 404 not found");
      include DIR_PUBLIC . '/static/errpage/404.htm';
      exit();
    default:
      break;
  }
}


