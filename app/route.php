<?php



function include_route($path, $routes, &$error)
{

  if (array_key_exists($path, $routes)) {
    $route_file = $routes[$path]; // path对应的控制器目录
    if (file_exists($route_file)) {
      include_once $route_file;
      return true;
    } else {
      $error = "控制器文件不存在";
      return false;
    } 
  }else{
      $error = "没有对应的路由";
      return false;
    }
}



$path = REQ_['path']; // path参数
$routes = ROUTES_[REQ_ENTRY]; // 入口对应的路由列表
$result = include_route($path, $routes, $error);
if(!$result){
  // dd($error);
  req_error(404);
}






// 之前尝试用/xxx形式的路由,但是没搞成功,注释起来以后再说
// 处理并返回路由相关信息
// 
/* function get_route()
{
  // 获取查询字符串,并转数组,保存到$query_arr
  parse_str($_SERVER['QUERY_STRING'], $query_arr);
  // 分割请求路径
  $path = rtrim($_SERVER['PATH_INFO'], '/');
  $path_arr = explode("/", $path);
  return array(
    'path_arr' =>  $path_arr,
    'query_arr' => $query_arr,
    // 路由层级
    'path_length' => count($path_arr),
    // 请求方式
    'method' => $_SERVER['REQUEST_METHOD'],
    // 请求uri
    'uri' => $_SERVER['REQUEST_URI']

  );
}
// 包含对应路由模块
function route_include($moduleFile, $callback = '', $route = [])
{
  // echo $moduleFile;
  if (file_exists($moduleFile)) {
    include_once $moduleFile;
    $callback($route);
    return [];
  } else {
    // 
    return ['error' => "路由模块不存在"];
  }
}
// 分发路由
// @param arr [访问路径=>入口文件目录]
// @param callback 回调函数的名称
function route_handle($routeModule = [], $callback = '')
{
  $route = get_route();
  $len = $route['path_length'];
  $path =  $route['path_arr'];
  $query =  $route['query_arr'];
  // for($i=1;$i<$len;$i++){
  //   echo '/'.$path[$i];
  // }

  dd($route);
  if ($len == 1) {
    // 首页没加index.php的,自动跳转加上
    if ($route['uri'] == '/') {
      header('Location: /index.php');
      // exit();
    }
    // 根目录默认为第一个路径模块
    reset($routeModule);
    $module_key = key($routeModule);
    $route['path_arr'][1] = $module_key;
    $route['path_length'] = 2;
    // dd($route);
    $moduleFile = $routeModule[$module_key];
    $result = route_include($moduleFile, $callback, $route);
    if ($result['error']) {
      die($result['error']);
    }
  } elseif ($len > 1 && array_key_exists($path[1], $routeModule)) {
    $moduleFile = $routeModule[$path[1]];
    $result = route_include($moduleFile, $callback, $route);
    if ($result['error']) {
      die($result['error']);
    }
  }



  // dd($routeModule);
  // dd($route);
  // dd($_SERVER);
} */
