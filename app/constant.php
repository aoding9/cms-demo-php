<?php

// 将配置项定义为常量
// 1前缀,作为命名空间
// 2配置项数组
// 3回调函数,对配置项进行处理 
function config_define($name_space = '', $config_arr=[], $callback='')
{
  foreach ($config_arr as $key => $value) {
    if(!empty($callback)){
      $callback($key,$value);
    }
    define($name_space . $key, $value);
  }
}

// 导入config中的database配置项
$db_config = include(DIR_ROOT . '/config/database.php');
config_define('DB_', $db_config);

// 导入config中的路径配置项
$db_config = include(DIR_ROOT . '/config/dir.php');
// 回调函数会拼接根目录绝对路径,此处把配置项的相对路径拼成绝对路径
function full_dir(&$key,&$value){
  $value =  DIR_ROOT.'/'.$value;
}
config_define('DIR_', $db_config,'full_dir');
// echo DIR_VIEW;
