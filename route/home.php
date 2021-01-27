<?php
function route_callback($route)
{
  $path_len = $route['path_length'];
  // 查看最下层路径
  $path = $route['path_arr'][$path_len - 1];
  
  dd(123123);
  if ($path_len == 2) {
    // 对应首页
    if ($path == 'home') {
      $result = route_include(DIR_ROUTE . '/home/index.php', 'route_callback_index', $route);
      if ($result['error']) {
        die($result['error']);
      }
    }
    // 对应列表页
    elseif ($path == 'arclist') {
      $result = route_include(DIR_ROUTE . '/home/arclist.php', 'route_callback_arclist', $route);
      if ($result['error']) {
        die($result['error']);
      }
    } else {
      error_redirect(404);
    }
  } elseif ($path_len == 3) {
    // 对应详情
  

  }
}
