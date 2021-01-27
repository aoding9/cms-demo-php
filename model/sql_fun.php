<?php
// 数据库相关函数封装

# 1 初始化功能：连接认证、选择数据库、设定字符集
# 成功返回连接对象，失败返回false，错误记录在错误参数中
function connect($user, $pass, $dbname, &$error, $host = 'localhost', $port = '3306', $charset = 'utf8')
{
  # 连接认证
  $conn = @mysqli_connect($host, $user, $pass, $dbname, $port);

  # 验证错误
  if (!$conn) {
    $error = iconv('gbk', 'utf-8', mysqli_connect_error());
    return false;
  }

  # 设置字符集
  if (!mysqli_set_charset($conn, $charset)) {
    $error = mysqli_error($conn);
    return false;
  }

  # 返回对象
  return $conn;
}

