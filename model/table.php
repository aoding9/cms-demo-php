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

// 获取栏目列表
function get_types(){
  $res = sqli_easy($error,[
    ['sqli_read','select * from cd_arctype where is_del=0 and is_hidden=0 order by sort_order desc',true]
  ]);
  if($error){
    return false;
  }else{
    return $res[0];
  }
}
// 获取作者列表
function get_authors(){
  $res = sqli_easy($error,[
    ['sqli_read','select uid,pen_name from cd_user where is_del= 0 and is_hidden = 0',true]
  ]);
  if($error){
    return false;
  }else{
    return $res[0];
  }
}
?>