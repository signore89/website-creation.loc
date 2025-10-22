<?

return [
    'host' => 'MySQL-8.2',
    'username' => 'root',
    "password" => '',
    'charset' => 'utf8',
    'dbname' => "posts_db",
    'options' => [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ],
];