<?php

function logout()
{
  $_SESSION['admin'] = "false";
  location('/admin.php');
}

// 是否调用某个api
switch (REQ_['api']) {
  case 'logout':
    logout();
    break;
}
// 根据cpn得到菜单
$menus = [
  'setting' => ['name' => '基本设置', 'icon' => 'set'],
  'types' => ['name' => '栏目管理', 'icon' => 'app'],
  'articles' => ['name' => '文章管理', 'icon' => 'list'],
  'users' => ['name' => '用户管理', 'icon' => 'user']
];

$cpn = !empty(REQ_['cpn']) ? REQ_['cpn'] : "setting";  // 默认是setting
$cpn_view = DIR_VIEW . "/component/{$cpn}.htm";

if (array_key_exists($cpn, $menus)) {
  $cpn_file = DIR_ROUTE . "/component/{$cpn}.php";
  if (!file_exists($cpn_file)) {
    dd('组件文件不存在');
  } else {
    include_once $cpn_file;
  }
}
function include_cpn($cpn_view)
{
  if (file_exists($cpn_view)) {
    include_once($cpn_view);
  } else {
    dd("组件视图文件不存在");
    return false;
  }
}

$uname = $_SESSION['uname'];
$res = sqli_easy($error, [
  ['sqli_read', "select * from cd_user where name = '$uname'"],
  ['sqli_read', "select * from cd_config", true],
]);

ddd($res);
$data['user'] = $res[0];
$data['config'] = $res[1];





include_once DIR_VIEW . '/admin.htm';
