<?php





  // 连接数据库
  $connect = @mysqli_connect(DB_HOSTNAME, DB_DATABASE, DB_USERNAME, DB_PASSWORD, DB_HOSTPORT);

  // 错误处理
  $error = null;
  if (!$connect) {
    $error = iconv('GBK', 'UTF-8', mysqli_connect_error());
  } else {
    // 设置字符集
    if (!mysqli_set_charset($connect, $db_config['charset'])) {
      $error = mysqli_error($conn);
    }
  }

  // 返回连接对象和错误信息,根据是否有错误信息判断是否成功
  return array(
    'connect' => $connect,
    'error' => $error
  );

