<?php
function login(&$msg)
{
  // 获取用户名和密码
  $uname = $_POST['username'] ?? '';
  $pword = $_POST['password'] ?? '';
  if (!$uname || !$pword) {
    $msg = '用户名和密码不能为空';
    return false;
  }
  // ddd($uname);
  // ddd($pword);
  // 查询是否存在该用户
  $conn = sqli_connect($error);
  if (!$conn) {
    $msg = $error;
  }
  $sql = "select uid from cd_user where name = '{$uname}' and password = '{$pword}'";
  $res = sqli_read($error, $conn, $sql);
  if (!$res) {
    if ($res === false) {
      $msg = $error;
    }
    if (empty($res)) {
      $msg = "用户名或密码错误";
    }
    return false;
  }
  // ddd($res);
  $msg = '登录成功';
  return true;
}

if (!empty($_POST)) {
$res = login($msg);
ddd($msg);
if(!$res){
  // 登录失败
}
// 登录成功 
  // 保存session
  // session_start();
}  var_dump(!$uname);




// 自己指定的page变量
$page = array(
  'title' => '登录页',
  'js' => 'login.js',
);
// 获取到的data
$data = array();

// 连接数据库
// $conn = connect($error,  DB_['username'], DB_['password'], DB_['database'],DB_['host'],DB_['port'],DB_['charset']);
// if(!$conn){
//   die($error);
// }
// sql_easy([
//   'excute'=>'show tables;'
// ]);
include_once DIR_['view'] . '/admin/login.htm';
