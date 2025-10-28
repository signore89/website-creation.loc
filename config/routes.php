<?

// $routes = [
//     // '' => 'posts/index.php',
//     'home.php' => 'posts/index.php',
//     "about.php" => "about.php",
//     "create.php" => "posts/create.php",
//     "registration.php" => "registration.php"
// ];
$router->get('post','posts/show.php');
$router->get('home','posts/index.php');

$router->get('posts/create','posts/create.php');

$router->post('posts','posts/store.php');


$router->get('registration','registration.php');
$router->get('about','about.php');
