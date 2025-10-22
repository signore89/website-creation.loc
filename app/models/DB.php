<?

class DB {
    private static $instance = null;
    private $conn;
    private PDOStatement $stmt;

    private function __construct(){}
    // private function __clone(){}
    // private function __wakeup(){}

    public static function getInstance(){
        if(self::$instance == null){
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection(array $db_config){
        $dsn = "mysql:host={$db_config['host']};dbname={$db_config['dbname']};charset={$db_config['charset']}";
        
        try{
            $this->conn = new PDO($dsn,$db_config["username"], $db_config["password"],$db_config["options"]);
            // dd("связь с бд установлена");
            return $this;
        }catch(PDOException $e){
            // dd("Ошибка подключения с бд");
            abort("500");
        }
    }

    public function query($query,$params=[]){
        $this->stmt = $this->conn->prepare($query);
        $this->stmt->execute($params);
        return $this;
    }

    public function findAll(){
        return $this->stmt->fetchAll();
    }

    public function find(){
        return $this->stmt->fetch();
    }

    public function findOrAbort(){
        if($res = $this->find()){
            return $res;
        }else{
            abort();
        }
    }
}