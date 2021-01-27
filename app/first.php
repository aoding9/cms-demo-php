<?php
date_default_timezone_set("Asia/Shanghai");
header("Content-type:text/html;charset=utf-8");

function debug($debug = true)
{
  ini_set('error_reporting', E_ALL); # 抛出所有错误
  if ($debug) {
    ini_set('display_errors', 'on'); # 显示错误
    ini_set('log_errors', 'off'); # 不记录到日志
  } else {
    ini_set('display_errors', 'off'); # 关闭错误显示
    ini_set('log_errors', 'on'); # 开启错误日志
    ini_set('error_log', DIR_['data'].'/err.log'); # 设置错误日志保存位置
  }
}

debug(true);
