<?php 
// 根据配置名,获取配置值
function get_config($name=1){
  if($name!=1){
    $name = "name = '$name'";
  }
  $res = sqli_easy($error, [
    ['sqli_read', "select * from cd_config where $name",true]]
  ) or die($error);
  return $res;
}

// 根据用户名获取用户信息
function get_user($name,$all=false){
  $where = $all?"name = $name":"1";
  $res = sqli_easy($error, [
    ['sqli_read', "select * from cd_user where $where"],$all]
  ) or die($error);
  return $res;
}

// 获取文章列表
function get_articles(){
  
}

?>