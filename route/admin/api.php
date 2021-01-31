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
    ['sqli_read', "select * from cd_archives limit $limit;", true]
  ]);
  // dd($res); // 拿到文章数据了,
  $req = [
    'code' => 0,
    'msg' => $error ?? '数据获取成功',
    'count' => (int)$pagecount,
    'data' => $res[0]
  ];
  // 转为json字符串
  // JSON_UNESCAPED_UNICODE是json_encode的第二个参数,可以让他不要对中文转码
  $req = json_encode($req);
  dd($req);
  exit();
}
