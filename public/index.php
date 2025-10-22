<?

require_once dirname(__DIR__)."/config/config.php";
require_once MODELS."/helpers.php";
require_once MODELS."/DB.php";



$db_config = require_once CONFIG."/db.php";
$db = (DB::getInstance())->getConnection($db_config);
require_once CONFIG."/router.php";// перемистить перед db_config
?>



