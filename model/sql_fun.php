<?php
// 数据库相关函数封装

/**
 * 1 连接认证数据库，初始化
 * $error使用引用传值，方便外部处理错误
 * 最简单一句话用法: $conn = sqli_connect($error) or die($error);
 */
function sqli_connect(&$error, $username = DB_['username'], $password = DB_['password'], $dbname = DB_['database'], $host = DB_['host'], $port = DB_['port'], $charset = DB_['charset'])
{
  # 连接认证
  $conn = @mysqli_connect($host, $username, $password, $dbname, $port);

  # 如果连接失败，记录错误信息，并返回false
  if (!$conn) {
    $error = iconv('gbk', 'utf-8', mysqli_connect_error());
    return false;
  }

  # 设置字符集
  if (!mysqli_set_charset($conn, $charset)) {
    $error = mysqli_error($conn);
    return false;
  }

  # 返回连接对象
  return $conn;
}


/**
 * 2 执行sql和错误检测及处理
 */

function sqli_execute(&$error, $conn, $sql)
{
  $res = mysqli_query($conn, $sql);

  # 如果执行失败，错误处理，返回false
  if (!$res) {
    $error = mysqli_error($conn);
    return false;
  }

  # 返回结果集对象
  return $res;
}

/**
 * 3 数据查询操作
 * 依赖于sqli_execute()
 * 分查询一条和查询多条
 */

function sqli_read(&$error, $conn, $sql,  $all = false)
{
  #调用执行函数
  $res = sqli_execute($error, $conn, $sql);

  # 判断结果，error已经在执行函数中处理，此处只需返回false
  if (!$res) {
    return false;
  }

  # 解析结果
  $list = [];
  if ($all) {
    # 获取全部结果  多条数据：二维数组
    while ($row = mysqli_fetch_assoc($res)) {
      $list[] = $row;
    }
  } else {
    # 获取一条结果  一条数据：一维数组
    $list =  mysqli_fetch_assoc($res);
  }
  // 释放资源
  mysqli_free_result($res);
  return $list;
}

/**
 * 4 写操作
 * 包括插入、修改、删除
 * 是否需要获取自增长id（insert操作）
 */
function sqli_write(&$error, $conn, $sql, $insert = false)
{
  # 默认是删除或修改，即不需要获取自增长id
  $res = sqli_execute($error, $conn, $sql);

  # 判断结果
  if (!$res) {
    return false;
  }

  # 判断是返回影响的行数，还是返回自增长id
  if ($insert) {
    return mysqli_insert_id($conn);
  } else {
    return mysqli_affected_rows($conn);
  }
}

// 任务式,顺序为sqli_execute >> sqli_read >> sqli_write 后面考虑改为指针遍历执行
// tasks=[[要执行的sql函数名,sql语句,第三个布尔参数],[...]]
// 任务是一个多维数组,一维表示任务,二维为任务的名称,sql语句,附加布尔值参数
function sqli_easy(&$error, $tasks = [])
{
  if(!is_array($tasks)){
    $error = "第二个参数应该是数组";
  }

  // 连接数据库
  $conn = sqli_connect($error,  DB_['username'], DB_['password'], DB_['database'], DB_['host'], DB_['port'], DB_['charset']);
  if (!$conn) {
    die($error);
  }

  // 有效的任务名
  $allow = ['sqli_execute', 'sqli_read', 'sqli_write'];
  // 遍历并执行,把结果保存到数组中
  $res = [];
  if (!empty($tasks)) {
    foreach ($tasks as $key => $value) {
      $task = $value[0];
      $sql = $value[1];
      $bool = $value[2] ?? false; // 默认false
      if (!empty($value) && in_array($task, $allow)) {
        if ($bool) {
          $res[] = $task($error, $conn, $sql, $bool);
        } else {
          $res[] = $task($error, $conn, $sql);
        }
      }
    }
  }

  // 关闭连接
  mysqli_close($conn);

  return $res;
}

