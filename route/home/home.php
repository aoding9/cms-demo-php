<?php
// 如果是/访问的,跳到/index.php
if($_SERVER['REQUEST_URI']!='/index.php'){
  location();
}


// 业务处理,数据处理
// dd($_SERVER['REQUEST_URI']);
// 绑定数据

  include_once DIR_['view'].'/home/home.htm';
?>