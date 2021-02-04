<?php 

$types = get_types();
$authors = get_authors();
$article = get_article_one($error);
if(!$article){
  die($error);
}

// 引入视图
include_once DIR_CPN;?>