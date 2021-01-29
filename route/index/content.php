<?php 
$res = sqli_easy($error, [
  ['sqli_read' , 'select * from cd_arctype;',true],
  ['sqli_read' , 'select * from cd_archives;',true],
  ['sqli_read' , 'select * from cd_article_content;',true],
]);
if(!$res){
  ddd($error);
}

$data=[];
$data['types']=$res[0];
$data['articles']=$res[1];
$data['content']=$res[2];

include_once DIR_VIEW.'/content.htm';
?>