<?php

// api 接口函数定义
function logout()
{
  $_SESSION['admin'] = "false";
  location('/admin.php');
}
function upload(){
  // header('Content-type:application/json');
  // echo json_encode($_POST);
  // $data = json_decode(file_get_contents("php://input"));
  // $uname = $data->username;
  // $pword = $data->password;
  // $res = login($msg, $uname, $pword);
  // $file = $_POST;

  // 如果返回1则正确,设置session
  // if($res['res']==1){
  //   session_start();
  //   $_SESSION['admin']=true;
  //   $_SESSION['uname']=$uname;
  // }
  // 响应 返回json字符串
  // dd(json_encode( $data ));
  dd(11);
  exit();
}


// 是否调用某个api
switch (REQ_['api']) {
  case 'logout':
    logout();
    break;
  case 'upload':
    upload();
    break;
}
// 根据cpn得到菜单
$menus = [
  'setting' => [
    'name' => '基本设置', 'icon' => 'set',
    'submenu' => []
  ],
  'types' => [
    'name' => '栏目管理', 'icon' => 'app',
    'submenu' => [
      'type_add' => ['name' => '新增栏目'],
      'type_edit' => ['name' => '修改栏目']
    ]
  ],
  'articles' => [
    'name' => '文章管理', 'icon' => 'list',
    'submenu' => [
      'article_add' => ['name' => '新增文章'],
      'article_edit' => ['name' => '修改文章']
    ]
  ],
  'users' => [
    'name' => '用户管理', 'icon' => 'user',
    'submenu' => [
      'user_add' => ['name' => '新增用户'],
      'user_edit' => ['name' => '修改用户']
    ]
  ],
];

// 递归查找,递归点:submenu是否存在,出口:cpn和key相等
// 返回值:数组[是否找到,顶级菜单名,匹配到的菜单名]
// {
//   if(is_array($menus)){
//     foreach ($menus as $key => $value) {
//     if(is_ini($key)) $top = $key;
//       if ($key == $cpn) {
//         return [1,$top,$key]; // 找到了
//       }
//       // if()

//     }
//   }
//   return false;
function is_cpn($cpn, $menus)
{
  static $res = 0; // 静态变量保存结果,是否找到
  static $top; // 保存顶级菜单
  foreach ($menus as $key => $value) {
    $is_top = array_key_exists('submenu', $value);
    if ($is_top) $top = $key; // 更新顶级菜单的key
    if ($key == $cpn) {
      return [1, $top, $key];
    }

    foreach ($value as $key => $value) {
      if ($key == 'submenu') {
        $res = is_cpn($cpn, $value, $top);
        break;
      }
    }
  }
  return $res;
}




$cpn = (REQ_['cpn']);

// 看cpn是否存在,以及属于哪个顶级菜单
$res = is_cpn($cpn, $menus);
// 如果没找到,就转到setting
if (!$res[0]) {
  $cpn = "setting";
  $menu_top = "setting";
} else {
  $menu_top = $res[1];
}

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


$data['user'] = get_user($uname)[0];
$data['config'] = get_config()[0];




include_once DIR_VIEW . '/admin.htm';
