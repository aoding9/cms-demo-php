<?php 
// dd($_POST);
if(!empty($_POST)){
$link = @mysqli_connect(DB_['host'], DB_['username'], DB_['password'], DB_['database']) or die('错误：' . mysqli_connect_error());
mysqli_set_charset($link, 'utf8');
 $sql="insert into cd_arctype values (null,'{$_POST['typename']}',null,'关注行业新闻','{$_POST['description']}','字',12,0,0,0)";
if(mysqli_query($link,$sql))	
    header('location:./admin.php?path=admin&cpn=types');

	else{
		echo 'SQL语句插入失败<br>';
		echo '错误码：'.mysqli_errno($link),'<br>';
		echo '错误信息：'.mysqli_error($link);
	}
}
// 引入视图
include_once DIR_CPN;?>