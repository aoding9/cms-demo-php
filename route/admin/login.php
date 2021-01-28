<?php


// 设置24小时后过期的cookie
$time = time() + 60 * 60 * 24;
setcookie('pub_key', KEY_PUBLIC, $time);

function login(&$msg, $uname, $pword)
{
  if (!$uname || !$pword) {
    return  [
      'msg' => '用户名和密码不能为空',
      'res' => 0
    ];
  } else {
    // 查询是否登录成功
    $res = validate_password($msg, $uname, $pword);
    // dd($res);

    if (!$res) {
      return  [
        'msg' => "$msg",
        'res' => 0
      ];
    } else {
      // 登录成功
      return  [
        'msg' => "$msg",
        'res' => 1
      ];
    }
  }
}
// 登录接口
if (REQ_['api'] == 'login') {
  header('Content-type:application/json');
  // echo json_encode($_POST);
  $data = json_decode(file_get_contents("php://input"));
  $uname = $data->username;
  $pword = $data->password;

  $res = login($msg, $uname, $pword);

  dd(json_encode($res));


  // dd($data);
  // var_dump($msg);
  // var_dump($res);

  // if (!$res) {
  //   // 登录失败,刷新到当前页面(不然post会留着)
  //   // echo "失败";
  // } else {
  //   // 登录成功 
  //   // location('/admin.php?path=admin');
  //   // 保存session
  //   // session_start();
  // }

  exit();
}






// 自己指定的page变量
$page = array(
  'title' => '登录页',
  'js' => 'login.js',
);
// 获取到的data
$data = array();


include_once DIR_['view'] . '/admin/login.htm';
