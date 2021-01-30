<?php 
$aid = REQ_['query']['aid'];
if(!$aid)die('文章不存在');

$res = sqli_easy($error, [
  ['sqli_read' , "select * from cd_arctype;",true],
  ['sqli_read' , "select * from cd_archives where aid = '{$aid}';",false],
  ['sqli_read' , "select content from cd_article_content where aid = '{$aid}';",false],
  ['sqli_read' , "select author from cd_archives natural join cd_article_content where aid = '{$aid}'",false],
  ['sqli_read' , "select update_time from cd_archives natural join cd_article_content where aid = '{$aid}'",false],
]);
if(!$res){
  ddd($error);
}

$data=[];
$data['types']=$res[0];
$data['article']=$res[1];
$data['content']=$res[2]['content'];
$data['author']=$res[3]['author'];
$data['time']=date('Y-m-d H:m:i',$res[4]['update_time']);
 ddd($data['time']);

include_once DIR_VIEW.'/content.htm';
?>