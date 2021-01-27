<?php
// 入口文件
date_default_timezone_set("Asia/Shanghai");
header("Content-type:text/html;charset=utf-8");

// 根目录
define('DIR_ROOT', __DIR__);

// 常量
include_once(DIR_ROOT.'/app/constant.php');
// 公用函数
include_once(DIR_APP.'/common.php');
// 路由
include_once(DIR_APP.'/route.php');




