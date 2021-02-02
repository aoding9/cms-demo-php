<?php
// 退出
function logout()
{
  $_SESSION['admin'] = "false";
  location('/admin.php');
}

// 修改config
function config_edit()
{
  header('Content-type:application/json');
  // echo json_encode($_POST);
  $data = json_decode(file_get_contents("php://input"));
  unset($data->file);
  $case = "";
  foreach ($data as $key => $value) {
    // $keys.="$key,";
    // $values.="$value,";
    $case .= " WHEN '$key' THEN '$value'";
  }
  // $keys=rtrim($keys,",");
  // $values=rtrim($values,",");

  $sql = "update cd_config set `value` = CASE `name` $case END;";
  $res = sqli_easy($error, [
    ["sqli_write", $sql]
  ]);
  if ($error) {
    $req['res'] = 0;
    $req['msg'] = $error;
  } else {
    $req['msg'] = "修改成功";
    $req['res'] = 1;
  }
  // 响应 返回json字符串
  dd(json_encode($req));
  exit();
}

// 文件上传处理接口
function upload()
{

  header('Content-type:application/json');
  if (empty($_FILES)) die(json_encode(['msg' => "未上传文件"]));
  $req = [];
  // echo json_encode($_POST);
  $file = $_FILES['file'];
  // 文件合法性检验
  if ($error = checkfile($file)) {
    $req['msg'] = $error;
  } else {
    // 文件上传
    $res = uploadfile($file);
    $req = $res;
  }

  // 响应 返回json字符串
  // dd(json_encode($file));
  dd(json_encode($req));
  exit();
}

// 删除栏目接口
function type_delete($typeid){
  $typeid=(int)$_GET['id'];
  
  if($typeid<0){
    echo '不是数字';
    echo $typeid;
    return;
  }

  $link = @mysqli_connect(DB_['host'], DB_['username'], DB_['password'], DB_['database']) or die('错误：' . mysqli_connect_error());
  mysqli_set_charset($link, 'utf8');
  
  if(empty($typeid)){
    dd('请选择要删除的栏目');
  }else{
    // 验证有没有这个栏目
    mysqli_query($link, "select * from cd_arctype where typeid={$typeid}");
   $a=mysqli_affected_rows($link);
    // if 
    if($a==0){
    dd('栏目不存在');
    }
    // else
    else{
      mysqli_query($link, "delete from cd_arctype where typeid={$typeid}");
      header('location:./admin.php?path=admin&cpn=types');
    }
  }
  exit();
}
// 获取文章列表
function article_list()
{
  header("Content-type:application/json");
  // 获取查询参数
  $params = json_decode(file_get_contents("php://input"));
  $pagesize = $_GET['limit'];// 每页条数
  $pageindex = $_GET['page'];// 当前页码
  // $pagesize = 10;// 每页条数
  // $pageindex = 1;// 当前页码
  // 获取总记录数
  $res = sqli_easy($error, [
    ['sqli_read', "select count(*) as 'count' from cd_archives;"]
  ]);
  $pagecount = $res[0]['count']; // 总记录数
  // $pages = ceil($pagecount / $pagesize); // 总页数  这里不用,前端layui自动计算了
  $pageoffset = ($pageindex - 1) * $pagesize; // 偏移量
  $limit = "$pageoffset , $pagesize";
  $res = sqli_easy($error, [
    ['sqli_read', "select a.*,c.typename from cd_archives as a left join cd_arctype as c on a.typeid = c.typeid order by a.aid limit $limit;", true]
  ]);
  // dd($res); // 拿到文章数据了,
  foreach ($res[0] as $key => $value) {
    $res[0][$key]['update_time']=date('Y-m-d',$value['update_time']);
  }
  $req = [
    'code' => 0,
    'msg' => $error ?? '数据获取成功',
    'count' => (int)$pagecount,
    'data' => $res[0]
  ];
  // 转为json字符串
  // JSON_UNESCAPED_UNICODE是json_encode的第二个参数,可以让他不要对中文转码
  $req = json_encode($req,JSON_UNESCAPED_UNICODE);
  dd($req);
  exit();
}

//修改接口
// function type_edit($typeid){
//   $typeid=(int)$_GET['id'];
//   if($typeid<0){
//     echo '不是数字';
//     echo $typeid;
//     return;
//   }else{
//     return $typeid;
//     header('location:./admin.php?path=admin&cpn=types&api=type_edit');
//   }
// }