<?php
// 如果是/访问的,跳到/index.php
// 改:强制跳转带path参数
// if ($_SERVER['REQUEST_URI'] != '/index.php?path=home') {
//   location('/index.php?path=home');
// }

$res = sqli_easy($error, [
  ['sqli_read' , 'select * from cd_arctype;',true],
  ['sqli_read' , 'select * from cd_archives;',true],
]);
if(!$res){
  ddd($error);
}

$data=[];
$data['types']=$res[0];
$data['articles']=$res[1];
// ddd($data);
// 业务处理,数据处理
// dd($_SERVER['REQUEST_URI']);
// 绑定数据
include_once DIR_VIEW."/home.htm";

?>