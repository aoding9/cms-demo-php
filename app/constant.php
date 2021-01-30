<?php
// 如果常量名有_ 表示是数组,不带就不是数组
// 配置项常量
include(DIR_ROOT . '/config/dir.php');
// DIR_是dir.php定义的
include(DIR_['config'] . '/database.php');
include(DIR_['config'] . '/info.php');
include(DIR_['config'] . '/route.php');


// 请求相关常量
// 获取入口文件,去掉/和.php
$entry = rtrim(ltrim($_SERVER['PHP_SELF'], '/'), '.php');
define('REQ_ENTRY', $entry);
// 获取查询参数
$query_arr = get_query($_SERVER['QUERY_STRING']);
// 指定不同入口的默认控制器
$default_path = REQ_ENTRY == ENTRY_INDEX ? ROUTES_DEFAULT_INDEX : ROUTES_DEFAULT_ADMIN;
$path = $query_arr['path'] ?? $default_path;
// 请求的接口名称
$api = $query_arr['api']??'';
// 请求组件的名称
$cpn = $query_arr['cpn']??'';
// 常用的请求信息
$request = [
  'entry' => REQ_ENTRY,
  'path' => $path,
  'query' => $query_arr,
  'api' => $api,
  'cpn' => $cpn
];
define('REQ_', $request);



// 根据入口定义常用的常量
define('DIR_VIEW', DIR_['view'] . "/{$entry}");
define('DIR_ROUTE', DIR_['route'] . "/{$entry}");
define('DIR_PUBLIC', DIR_['public'] . "/{$entry}");
// 静态资源目录,带http://这种
define('HOST_PUBLIC', INFO_['host']."/".DIR_RE_['public'] . "/{$entry}");
// define('HOST_STATIC', INFO_['host']."/".DIR_RE_['public'] . "/static");
