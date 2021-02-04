<?php


// api 接口函数引入
include_once DIR_ROUTE . "/api.php";



// 是否调用某个api
$api_allow=[
  'logout','upload','config_edit','type_delete','type_add','article_list','article_toggle_hidden','article_delete','article_sort','article_add','upload_tinymce','article_edit','user_list','user_toggle_hidden','user_delete','user_add','user_edit'
];

$api = REQ_['api'];
if (!empty($api)&&in_array($api,$api_allow)) {
  $api();
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
function is_cpn($cpn, $menus)
{
  static $res = 0; // 静态变量保存结果,是否找到
  static $top; // 保存顶级菜单
  foreach ($menus as $key => $value) {
    $is_top = array_key_exists('submenu', $value);
    if ($is_top) $top = $key; // 更新顶级菜单的key
    if ($key == $cpn) {
      return [1, $top, $key,$value['name']];
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
$menu_=[];
if (!$res[0]) {
  $cpn = "setting";
  $menu_=[

    'menu_top' => "setting",
    'menu_sub' => "setting",
    'menu_name' => $menus['setting']['name'],
  ];
} else {
  $menu_=[

    'menu_top' => $res[1],
    'menu_sub' => $res[2],
    'menu_name' => $res[3],
  ];
}
define('MENU_', $menu_);


$cpn_view = DIR_VIEW . "/component/{$cpn}.htm";
if (!file_exists($cpn_view)) {
  die("组件视图文件不存在");
}
define('DIR_CPN', $cpn_view);

$cpn_file = DIR_ROUTE . "/component/{$cpn}.php";
if (!file_exists($cpn_file)) {
  die('组件文件不存在');
}
// 在admin里面content区域调用
function include_cpn($cpn_file)
{
  include_once($cpn_file);
}

$uname = $_SESSION['uname'];
$data['user'] = get_user_byname($uname)[0];
$data['config'] = get_config()[0];
foreach ($data['config'] as $key => $value) {
  $data['config'][$value['name']]=$value['value'];
}




include_once DIR_VIEW . '/admin.htm';
