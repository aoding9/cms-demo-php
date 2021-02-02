<?php 
  $link = @mysqli_connect(DB_['host'], DB_['username'], DB_['password'], DB_['database']) or die('错误：' . mysqli_connect_error());
  mysqli_set_charset($link, 'utf8');
  $sql="select * from cd_arctype where typeid={$_GET['id']}";
$res=mysqli_query($link,$sql);
$rows=mysqli_fetch_assoc($res);
  if(!empty($_POST)) {
    $typeid=$_GET['id'];		
    $typename=$_POST['typename'];
    $title=$_POST['title'];	
    $description=$_POST['description'];	
    $keywords=$_POST['keywords'];
    $sort_order=$_POST['sort_order'];
    $is_hidden=$_POST['is_hidden'];
    $sql="update cd_arctype set typename='$typename',title='$title',description='$description',keywords='$keywords',sort_order='$sort_order',is_hidden='$is_hidden' where typeid=$typeid"; 
    if(mysqli_query($link,$sql))
      header('location:./admin.php?path=admin&cpn=types');  
    else
      echo '错误：'.mysqli_error($link);
    exit;
  }

   
// 引入视图
include_once DIR_CPN;
