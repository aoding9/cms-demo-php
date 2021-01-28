<?php
// 定义公钥和私钥(base64转码)
// 公钥直接发给前端,对密码用公钥加密发给后端,后端再对密码进行私钥加密,保存到用户表
// echo base64_encode('siyao');
// 公钥可以做成有时限的,不过这里懒得搞了
define('KEY_PUBLIC', base64_encode('gongyao'));
define('KEY_PRIMARY', base64_encode('siyao'));
// 制作密码
// 如果只传密码,则生成md5随机加盐密码,如果传入盐,则可以用于验证密码是否一致
// 返回[密码,盐]
function make_password($password, $salt = '')
{
  // 不传就生成盐
  $salt = $salt ? $salt : str_rand();
  $password = md5(base64_decode(KEY_PRIMARY) . $password . $salt);
  return [$password, $salt];
}
// ddd(make_password(123,123));

// 验证密码
function validate_password(&$msg, $uname, $pword)
{
  // 先查盐和密码
  $res = sqli_easy($error, [
    ['sqli_read', "select password,salt from `cd_user` where name = '{$uname}'"]
  ]);

  $res = $res[0];
  // sql语句执行错误
  // if(!$res){
  //   $msg = $error;
  //   return false;
  // }
  // // // 没有对应的用户名
  if(empty($res)){
    $msg = "用户名不正确";
    return false;
  }

  // 数据库中的密码和盐
  $pword_hashed = $res['password'];
  $salt = $res['salt'];
  $pword_hashed_now = make_password($pword, $salt)[0];

  // 比对结果
  if ($pword_hashed === $pword_hashed_now) {
    $msg = '登录成功';
    return true;
  } else {
    $msg = '密码不正确';
    return false;
  }
}

// 注册用户
function create_user($username, $password, $penname)
{
  [$password, $salt] = make_password($password);
  $res = sqli_easy($error, [
    ['sqli_write', "insert into `cd_user`(`name`,`password`,`pen_name`,`salt`) values('{$username}','{$password}','{$penname}','{$salt}')", true]
  ]);
  if (!$res) {
    dd($error);
  }
  dd($res);
}
