<?php 
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


include_once DIR_VIEW.'/arclist.htm';
?>