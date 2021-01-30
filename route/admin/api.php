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
  if(empty($_FILES)) die(json_encode(['msg' => "未上传文件"]));
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
