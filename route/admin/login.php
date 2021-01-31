<?php



// 设置24小时后过期的cookie
$time = time() + 60 * 60 * 24;
setcookie('pub_key', KEY_PUBLIC, $time);

// 如果已经登录,直接跳转admin


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

  // 如果返回1则正确,设置session
  if($res['res']==1){
    session_start();
    $_SESSION['admin']=true;
    $_SESSION['uname']=$uname;
  }
  // 响应 返回json字符串
  dd(json_encode($res));
  exit();
}


include_once DIR_['view'] . '/admin/login.htm';
