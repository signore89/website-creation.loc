<?

class Router {
    private $routes = []; //карта маршрутов

    private $uri; // адрес ресурса

    private $method; // метод запроса(get/post)

    public function __construct()
    {
        $this->uri = trim(parse_url($_SERVER['REQUEST_URI'])['path'],"/");
        $this->method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
    }

    private function add($uri,$method,$controller){
        $this->routes[] = [
            'uri' => $uri,
            'method' => $method,
            'controller' => $controller 
        ];
    }

    public function get($uri,$controller){
        $this->add($uri,"GET",$controller);
    }

    public function post($uri,$controller){
        $this->add($uri,"POST",$controller);
    }

    public function delete($uri,$controller){
        $this->add($uri,"DELETE",$controller);
    }
    public function put($uri,$controller){
        $this->add($uri,"PUT",$controller);
    }
    public function patch($uri,$controller){
        $this->add($uri,"PATCH",$controller);
    }

    public function match(){
        $isMatch = false;
        foreach($this->routes as $route){
            if($route['uri'] == $this->uri 
                && $route['method'] == strtoupper($this->method) 
                && file_exists(CONTROLLER."/{$route['controller']}")){;
                    require_once(CONTROLLER."/{$route['controller']}");
                    $isMatch = true;
                    break;
                }
        }

        if(!$isMatch) {abort();};
    }

}