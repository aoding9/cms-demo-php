<?php 

$uid = (int)$_GET['uid']??0;
$res = get_user_byuid($uid)[0];
// dd($res);
$user = [
  'uid'=>$res['uid'],
  'username'=>$res['name'],
  'penname'=>$res['pen_name'],
];

// 引入视图
include_once DIR_CPN;?>