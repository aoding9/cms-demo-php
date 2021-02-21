<?php 
$res = sqli_easy($error, [
  ['sqli_read' , 'select * from cd_arctype;',true],
  ['sqli_read' , 'select * from cd_archives;',true],
  ['sqli_read' , "select typeid from cd_archives",false],
]);
if(!$res){
  ddd($error);
}

$data=[];
$data['types']=$res[0];
$data['articles']=$res[1];
$typeid=$res[2]['typeid'];

// function shijian($t){
//   echo date('Y-m-d H:m:i',['sqli_read',"select update_time from cd_archives where typeid='{$t}'",false]);
// };
function auto_read($conn,$table,&$error,$where=[],$all=false){
  //组装查询条件，默认为真
  $where_clause='where 1 ';
    if($where){
      //解析条件
      foreach($where as $k => $v){
        $where_clause.='and'.$k."='$v'";
      }
      //组织完整sql
      $sql="select * from {$table} {$where_clause}";
      $res1= sqli_execute($error,$conn,$sql);
      //判定执行结果
      if($res1===false)return $res1;
      //判定获取一条还是多条
      $lists=[];
      if($all){
        while($row=mysqli_fetch_assoc($res1)){
          $lists[]=$row;
        }
      }else{
        //获取一条，一维数组存储
        $lists=mysqli_fetch_assoc($res1);
      }
      //释放资源，返回结果
      mysqli_free_result($res1);
      return $lists;
    }
} 
$conn = @mysqli_connect(DB_['host'], DB_['username'], DB_['password'], DB_['database'], DB_['port']);
if(!$conn){
  $error=iconv('gbk','utf-8',mysqli_connect_error());
  die($error);
}
$res2=auto_read($conn,'cd_archives',$error,['typeid'=>1]);

include_once DIR_VIEW.'/arclist.htm';

?>