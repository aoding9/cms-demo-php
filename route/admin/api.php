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
  dd(json_encode($req, JSON_UNESCAPED_UNICODE));
  exit();
}

// 文件上传处理接口
function upload()
{

  header('Content-type:application/json');
  if (empty($_FILES)) die(json_encode(['code' => 1, 'msg' => "未上传文件"]));
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
  dd(json_encode($req, JSON_UNESCAPED_UNICODE));
  exit();
}
// tinymce图片上传接口
function upload_tinymce()
{

  header('Content-type:application/json');
  if (empty($_FILES)) die(json_encode(['code' => 1, 'msg' => "未上传文件"]));
  $req = [];
  // echo json_encode($_POST);
  $file = $_FILES['edit'];
  // 文件合法性检验
  if ($error = checkfile($file)) {
    $req['msg'] = $error;
  } else {
    // 文件上传
    $res = uploadfile($file);
    $res['data']=$res['data']['src'];
    $req = $res;
  }

  // 响应 返回json字符串
  // dd(json_encode($file));
  dd(json_encode($req, JSON_UNESCAPED_UNICODE));
  exit();
}

// 删除栏目接口
function type_delete($typeid)
{
  $typeid = (int)$_GET['id'];

  if ($typeid < 0) {
    echo '不是数字';
    echo $typeid;
    return;
  }

  $link = @mysqli_connect(DB_['host'], DB_['username'], DB_['password'], DB_['database']) or die('错误：' . mysqli_connect_error());
  mysqli_set_charset($link, 'utf8');

  if (empty($typeid)) {
    dd('请选择要删除的栏目');
  } else {
    // 验证有没有这个栏目
    mysqli_query($link, "select * from cd_arctype where typeid={$typeid}");
    $a = mysqli_affected_rows($link);
    // if 
    if ($a == 0) {
      dd('栏目不存在');
    }
    // else
    else {
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
  $pagesize = $_GET['limit']; // 每页条数
  $pageindex = $_GET['page']; // 当前页码
  // $typeid = ''; // 栏目id
  $typeid = $_GET['typeid'] ?? ""; // 栏目id

  $filter = "";
  $filter  .= " a.`is_del` = 0 ";
  if (!empty($typeid) && $typeid != '-1') {
    $typeid = (int)$typeid;
    $filter  .= " and a.`typeid` = {$typeid} ";
  }


  // 获取总记录数
  $res = sqli_easy($error, [
    ['sqli_read', "select count(*) as 'count' from cd_archives as a where {$filter};"]
  ]);
  $pagecount = $res[0]['count']; // 总记录数
  // $pages = ceil($pagecount / $pagesize); // 总页数  这里不用,前端layui自动计算了
  $pageoffset = ($pageindex - 1) * $pagesize; // 偏移量
  $limit = "$pageoffset , $pagesize";
  $res = sqli_easy($error, [
    ['sqli_read', "select a.*,c.typename from cd_archives as a left join cd_arctype as c on a.typeid = c.typeid where {$filter} order by a.sort_order asc limit $limit;", true]
  ]);
  // dd($res); // 拿到文章数据了,
  foreach ($res[0] as $key => $value) {
    $res[0][$key]['update_time'] = date('Y-m-d', $value['update_time']);
  }

  $req = [
    'code' => 0,
    'msg' => $error ?? '数据获取成功',
    'count' => (int)$pagecount,
    'data' => $res[0],
  ];
  // 转为json字符串
  // JSON_UNESCAPED_UNICODE是json_encode的第二个参数,可以让他不要对中文转码
  $req = json_encode($req, JSON_UNESCAPED_UNICODE);
  dd($req);
  exit();
}

// 切换是否隐藏文章
function article_toggle_hidden()
{
  header("Content-type:application/json");
  // 获取查询参数
  $aid = (int)$_GET['aid'] ?? 0;
  $is_hidden = (int)$_GET['is_hidden'] ?? 0;
  // 取反
  $is_hidden = $is_hidden === 0 ? 1 : 0;
  $res = sqli_easy($error, [
    ['sqli_write', "update `cd_archives` set `is_hidden`= {$is_hidden} where `aid` = {$aid}"]
  ]);
  if (empty($res)) {
    $error = 'aid错误';
    $code = 1;
  }
  if ($error) {
    $error = '修改失败';
    $code = 1;
  }
  $req = [
    'code' => $code ?? 0,
    'msg' => $error ?? '修改成功',
    'is_hidden' => $is_hidden
  ];
  // 转为json字符串
  // JSON_UNESCAPED_UNICODE是json_encode的第二个参数,可以让他不要对中文转码
  $req = json_encode($req, JSON_UNESCAPED_UNICODE);
  dd($req);
  exit();
}
// 是否删除文章
function article_delete()
{
  header("Content-type:application/json");
  // 获取查询参数
  $aid = (int)$_GET['aid'] ?? 0;
  $res = sqli_easy($error, [
    ['sqli_write', "update `cd_archives` set `is_del`= 1 where `aid` = {$aid}"]
  ]);
  if ($error) {
    $error = '删除失败';
    $code = 1;
  }
  $req = [
    'code' => $code ?? 0,
    'msg' => $error ?? '删除成功',
  ];
  // 转为json字符串
  // JSON_UNESCAPED_UNICODE是json_encode的第二个参数,可以让他不要对中文转码
  $req = json_encode($req, JSON_UNESCAPED_UNICODE);
  dd($req);
  exit();
}

// 修改文章排序
function article_sort()
{
  header("Content-type:application/json");
  // 获取查询参数
  $aid = (int)$_GET['aid'] ?? 0;
  $sort_order = (int)$_GET['sort_order'];
  sqli_easy($error, [
    ['sqli_write', "update `cd_archives` set `sort_order`= {$sort_order} where `aid` = {$aid}"]
  ]);
  if ($error) {
    $error = '修改失败';
    $code = 1;
  }
  $req = [
    'code' => $code ?? 0,
    'msg' => $error ?? '修改成功',
  ];
  // 转为json字符串
  // JSON_UNESCAPED_UNICODE是json_encode的第二个参数,可以让他不要对中文转码
  $req = json_encode($req, JSON_UNESCAPED_UNICODE);
  dd($req);
  exit();
}


// 插入文章到数据库
function archives_add($archives_k, $archives_v)
{
  $res = sqli_easy($error, [[
    'sqli_write', "insert into cd_archives({$archives_k}) values({$archives_v})", true
  ]])[0];
  if ($error) {
    $msg = $error;
    $code = 1;
  } else {
    $msg = 'archives新增成功';
    $code = 0;
  }
  return ['msg' => $msg, 'code' => $code, 'aid' => $res];
}
// 返回了aid,现在插入内容到数据库
function article_content_add($aid, $content)
{
  $res = sqli_easy($error, [[
    'sqli_write', "insert into cd_article_content(`aid`,`content`) values({$aid},{$content})", true
  ]])[0];
  if (!empty($error) || empty($res)) {
    $msg = $error ?? '新增失败1';
    $code = 1;
  } else {
    $msg = 'article_content新增成功';
    $code = 0;
  }
  return ['msg' => $msg, 'code' => $code];
}

// 新增文章
function article_add()
{
  header("Content-type:application/json");
  // 获取查询参数
  $params = json_decode(file_get_contents("php://input"));
  $time = time();
  $archives_v = [
    'typeid' => $params->typeid,
    'title' => "'" . htmlspecialchars($params->title, ENT_QUOTES) . "'",
    'description' => "'" . htmlspecialchars($params->description, ENT_QUOTES) . "'",
    'keywords' => "'" . htmlspecialchars($params->keywords, ENT_QUOTES) . "'",
    'author' => $params->author,
    'litpic' => "'" . htmlspecialchars($params->litpic, ENT_QUOTES) . "'",
    'is_recom' => $params->is_recom ?? 0 == 'on' ? 1 : 0,
    'add_time' => "'" . htmlspecialchars($time, ENT_QUOTES) . "'",
    'update_time' => "'" . htmlspecialchars($time, ENT_QUOTES) . "'"
  ];
  // 验证参数是否合法,此处省略

  $archives_k = array_keys($archives_v);


  $content = "'" . htmlspecialchars($params->content, ENT_QUOTES) . "'";

  $archives_v = implode(',', $archives_v);
  $archives_k = implode(',', $archives_k);
  // dd(json_encode($params));
  // dd($params);

  $res = archives_add($archives_k, $archives_v);



  if ($res['code'] != 0) {
    // $msg = '文章新增失败';
    $msg = $res['msg'];
    $code = 1;
  } else {
    $res = article_content_add($res['aid'], $content);
    if ($res['code'] != 0) {
      $msg = $res['msg'];
      // $msg = '文章新增失败';
      $code = 1;
    } else {
      $msg = '文章新增成功';
      $code = 0;
    }
  }

  $req = [
    'msg' =>  $msg,
    'code' => $code
  ];

  dd(json_encode($req, JSON_UNESCAPED_UNICODE));

  exit();
}

// 根据aid获取一条文章
function get_article_one(&$error)
{
  $aid = (int)$_GET['aid'] ?? -1;
  $res = sqli_easy($error, [['sqli_read', "select a.*,c.content from cd_archives a left join cd_article_content c on a.aid = c.aid where a.aid = {$aid}"]])[0];
  if ($error) {
    return false;
  }
  $res['content'] = htmlspecialchars_decode($res['content'], ENT_QUOTES);

  return $res;
}

// 编辑文章
// 插入文章到数据库
function archives_edit($archives_v, $aid)
{
  $k_v = [];
  foreach ($archives_v as $k => $v) {
    $k_v[] = "{$k} = {$v}";
  }

  $k_v = implode(',', $k_v);
  $res = sqli_easy($error, [[
    'sqli_write', "update cd_archives set {$k_v} where `aid` = {$aid}"
  ]])[0];
  if ($error) {
    $msg = $error;
    $code = 1;
  } else {
    $msg = 'archives修改成功';
    $code = 0;
  }
  return ['msg' => $msg, 'code' => $code, 'aid' => $res];
}
// 返回了aid,现在插入内容到数据库
function article_content_edit($aid, $content)
{
  $res = sqli_easy($error, [[
    'sqli_write', "update cd_article_content set `content` = {$content} where `aid` = {$aid}"
  ]])[0];
  if (!empty($error) || $res == 0) {
    $msg = $error ?? 'aid不存在,或文章内容没有发生修改';
    $code = 1;
  } else {
    $msg = 'article_content修改成功';
    $code = 0;
  }
  return ['msg' => $msg, 'code' => $code];
}
function article_edit()
{
  header("Content-type:application/json");
  // 获取查询参数
  $params = json_decode(file_get_contents("php://input"));
  // 看下有没正确拿到数据
  // dd($params);
  // exit();
  $aid = $params->aid;
  $time = time();
  $archives_v = [
    'typeid' => $params->typeid,
    'title' => "'" . htmlspecialchars($params->title, ENT_QUOTES) . "'",
    'description' => "'" . htmlspecialchars($params->description, ENT_QUOTES) . "'",
    'keywords' => "'" . htmlspecialchars($params->keywords, ENT_QUOTES) . "'",
    'author' => $params->author,
    'litpic' => "'" . htmlspecialchars($params->litpic, ENT_QUOTES) . "'",
    'is_recom' => ($params->is_recom ?? '') == 'on' ? 1 : 0,
    'update_time' => "'" . htmlspecialchars($time, ENT_QUOTES) . "'"
  ];
  // 验证参数是否合法,此处省略

  $content = "'" . htmlspecialchars($params->content, ENT_QUOTES) . "'";

  $res = archives_edit($archives_v, $aid);



  if ($res['code'] != 0) {
    // $msg = '文章修改失败1';
    $msg = $res['msg'];
    $code = 1;
  } else {
    $res = article_content_edit($aid, $content);
    if ($res['code'] != 0) {
      $msg = $res['msg'];
      // $msg = '文章修改失败2';
      $code = 1;
    } else {
      $msg = '文章修改成功';
      $code = 0;
    }
  }

  $req = [
    'msg' =>  $msg,
    'code' => $code
  ];

  dd(json_encode($req, JSON_UNESCAPED_UNICODE));

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

// 获取用户列表
// 获取文章列表
function user_list()
{
  header("Content-type:application/json");
  // 获取查询参数
  // $params = json_decode(file_get_contents("php://input"));
  $pagesize = $_GET['limit']; // 每页条数
  $pageindex = $_GET['page']; // 当前页码

  $filter  = " a.`is_del` = 0 ";

  // 获取总记录数
  $res = sqli_easy($error, [
    ['sqli_read', "select count(*) as 'count' from cd_user as a where {$filter};"]
  ]);
  $pagecount = $res[0]['count']; // 总记录数
  // $pages = ceil($pagecount / $pagesize); // 总页数  这里不用,前端layui自动计算了
  $pageoffset = ($pageindex - 1) * $pagesize; // 偏移量
  $limit = "$pageoffset , $pagesize";
  $res = sqli_easy($error, [
    ['sqli_read', "select a.* from cd_user as a where {$filter} limit $limit;", true]
  ]);
  // dd($res); // 拿到文章数据了,

  $req = [
    'code' => 0,
    'msg' => $error ?? '数据获取成功',
    'count' => (int)$pagecount,
    'data' => $res[0],
  ];
  // 转为json字符串
  // JSON_UNESCAPED_UNICODE是json_encode的第二个参数,可以让他不要对中文转码
  $req = json_encode($req, JSON_UNESCAPED_UNICODE);
  dd($req);
  exit();
}

// 切换是否隐藏用户
function user_toggle_hidden()
{
  header("Content-type:application/json");
  // 获取查询参数
  $uid = (int)$_GET['uid'] ?? 0;
  $is_hidden = (int)$_GET['is_hidden'] ?? 0;
  // 取反
  $is_hidden = $is_hidden === 0 ? 1 : 0;
  $res = sqli_easy($error, [
    ['sqli_write', "update `cd_user` set `is_hidden`= {$is_hidden} where `uid` = {$uid}"]
  ]);
  if (empty($res)) {
    $error = 'uid错误';
    $code = 1;
  }
  if ($error) {
    $error = '修改失败';
    $code = 1;
  }
  $req = [
    'code' => $code ?? 0,
    'msg' => $error ?? '修改成功',
    'is_hidden' => $is_hidden
  ];
  // 转为json字符串
  // JSON_UNESCAPED_UNICODE是json_encode的第二个参数,可以让他不要对中文转码
  $req = json_encode($req, JSON_UNESCAPED_UNICODE);
  dd($req);
  exit();
}
// 是否删除用户
function user_delete()
{
  header("Content-type:application/json");
  // 获取查询参数
  $uid = (int)$_GET['uid'] ?? 0;
  $res = sqli_easy($error, [
    ['sqli_write', "update `cd_user` set `is_del`= 1 where `uid` = {$uid}"]
  ]);
  if ($error) {
    $error = '删除失败';
    $code = 1;
  }
  $req = [
    'code' => $code ?? 0,
    'msg' => $error ?? '删除成功',
  ];
  // 转为json字符串
  // JSON_UNESCAPED_UNICODE是json_encode的第二个参数,可以让他不要对中文转码
  $req = json_encode($req, JSON_UNESCAPED_UNICODE);
  dd($req);
  exit();
}


// 新增用户
function user_add()
{
  header("Content-type:application/json");
  // 获取查询参数
  $params = json_decode(file_get_contents("php://input"));
  $username = $params->name;
  $penname = $params->pen_name;
  $password = $params->password;

  if (preg_match("/[\x7f-\xff]/", $username)) {
    $req = [
      'msg' =>  '用户名或密码不能带有中文',
      'code' => 0
    ];
    die(json_encode($req, JSON_UNESCAPED_UNICODE));
  }

  // 验证参数是否合法,此处省略

  $res = create_user($username, $password, $penname);

  $req = [
    'msg' =>  $res['msg'],
    'code' => $res['code']
  ];

  dd(json_encode($req, JSON_UNESCAPED_UNICODE));

  exit();
}

// 修改用户
function user_edit()
{
  header("Content-type:application/json");
  // 获取查询参数
  $params = json_decode(file_get_contents("php://input"));
  $uid = $params->uid;
  $username = $params->name;
  $penname = $params->pen_name;
  $password = $params->password;

  if (preg_match("/[\x7f-\xff]/", $username)) {
    $req = [
      'msg' =>  '用户名或密码不能带有中文',
      'code' => 0
    ];
    die(json_encode($req, JSON_UNESCAPED_UNICODE));
  }

  // 验证参数是否合法,此处省略

  $res = edit_user($uid,$username, $password, $penname);

  $req = [
    'msg' =>  $res['msg'],
    'code' => $res['code']
  ];

  dd(json_encode($req, JSON_UNESCAPED_UNICODE));

  exit();
}