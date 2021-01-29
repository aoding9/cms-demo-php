<?php

function logout(){
  $_SESSION['admin']="false";
  location('/admin.php');
}

// 获取所需信息
switch(REQ_['api']){
  case 'logout':
    logout();
    break;
}
$uname = $_SESSION['uname'];
$res = sqli_easy($error,[
  ['sqli_read',"select * from cd_user where name = '$uname'"],
  ['sqli_read',"select * from cd_config",true],
  ]);
  
  ddd($res);
  $data['user']=$res[0];
  $data['config']=$res[1];



 

  include_once DIR_VIEW.'/admin.htm';
