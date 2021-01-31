<?php 
$link = @mysqli_connect(DB_['host'], DB_['username'], DB_['password'], DB_['database']) or die('错误：' . mysqli_connect_error());
mysqli_set_charset($link, 'utf8');
$res = mysqli_query($link, "select * from cd_arctype order by sort_order desc");
$list = mysqli_fetch_all($res, MYSQLI_ASSOC);
// 引入视图
include_once DIR_CPN;?>