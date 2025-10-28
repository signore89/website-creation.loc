<?
session_start();

require_once dirname(__DIR__)."/config/config.php";
require_once MODELS."/helpers.php";
require_once MODELS."/DB.php";
require_once MODELS."/Router.php";



$db_config = require_once CONFIG."/db.php";
$db = (DB::getInstance())->getConnection($db_config);

$router = new Router();

require_once CONFIG."/routes.php";
$router->match();
?>



