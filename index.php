<pre>

<?php
// 入口文件

date_default_timezone_set("Asia/Shanghai");
header("Content-type:text/html;charset=utf-8");

// 根目录
define('DIR_ROOT', __DIR__);

// 引入app
include_once(DIR_ROOT.'/app/constant.php'); // 后面的常量要引入这个才能用
include_once(DIR_APP.'/common.php');
include_once(DIR_APP.'/constant.php');
include_once(DIR_APP.'/route.php');
// dd(DIR_ROOT);
// dd(DB_HOSTNAME);

// 引入模块化路由

// 路由分发处理
route_handle([
  'home' => DIR_ROUTE . '/home.php',
  'admin' => DIR_ROUTE . '/admin.php'
],'route_callback');
