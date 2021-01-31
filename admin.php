<?php



// 入口文件
// 此处改为login为登录入口文件,和index区分开

// 定义根目录常量
define('DIR_ROOT', __DIR__);

// debug模式/环境检查等
include_once(__DIR__.'/app/first.php');

// 公用函数(不使用下面的常量)
include_once(DIR_ROOT.'/app/common.php');

// 定义常量(使用了DIR_ROOT)
include_once(DIR_ROOT.'/app/constant.php');
// echo DIR_['app'];

// 数据库函数(使用了上面的常量)
include_once(DIR_['model'].'/sql_fun.php');

// 登录相关函数 // 只有admin入口才有
include_once(DIR_['model'].'/login.php');

// 其他的一些对数据表操作的函数 // 只有admin入口才有
include_once(DIR_['model'].'/table.php');

// 路由(使用了数据库/常量/公用函数,所以要在下面)
include_once(DIR_['app'].'/route.php');







