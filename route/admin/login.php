<?php 
// 自己指定的page变量
$page = array(
  'title' => '登录页' ,
  'css' => 'main.css',
  'js' => 'login.js',
);
// 获取到的data
$data = array(
);

  // 连接数据库
  // $conn = connect($error,  DB_['username'], DB_['password'], DB_['database'],DB_['host'],DB_['port'],DB_['charset']);
  // if(!$conn){
  //   die($error);
  // }
// sql_easy([
//   'excute'=>'show tables;'
// ]);
include_once DIR_['view'].'/admin/login.htm';

