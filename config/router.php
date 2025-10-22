<?
require_once CONFIG."/routes.php";
$uri = trim(parse_url($_SERVER['REQUEST_URI'])['path'],"/");

// echo $uri;
if(array_key_exists($uri,$routes) && file_exists(CONTROLLER."/{$routes[$uri]}")){
    require_once(CONTROLLER."/{$routes[$uri]}");
}else{
    abort();
}
