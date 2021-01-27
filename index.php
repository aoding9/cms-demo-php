<?php
// 入口文件

// 定义根目录常量
define('DIR_ROOT', __DIR__);

// 首先
include_once(__DIR__.'/app/first.php');

// 定义常量
include_once(DIR_ROOT.'/app/constant.php');
// echo DIR_['app'];

// 公用函数
include_once(DIR_['app'].'/common.php');

// 路由
include_once(DIR_['app'].'/route.php');





