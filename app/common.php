<?php
// 公共函数

// 缩写版, 输出并换行
// * @param mix $some 要输出的变量
function dd($some = '需要传值')
{
  echo "\n";
  print_r($some);
}

// 错误跳转
// 错误代码
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


