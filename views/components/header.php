<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> <?$title ?? "Страница"?> </title>
    <base href="<?= PATH?>">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="assets/main.css" rel="stylesheet">	
</head>
<body>
	<div class="wrapper">
        <header>
            <?$current_page = basename($_SERVER["QUERY_STRING"]);?>

            <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
                <div class="container">
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link 
                                <?php echo($current_page == 'home') ? 'active' : ''; ?>" 
                                aria-current="page" href="home">Домой</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link
                                <?php echo($current_page == 'page=3') ? 'active' : ''; ?>" 
                                aria-current="page" href="#" >Галерея</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link 
                                <?php echo($current_page == 'create') ? 'active' : ''; ?>"
                                aria-current="page" href="posts/create" >Создать пост</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link
                                <?php echo($current_page == 'about') ? 'active' : ''; ?>" 
                                aria-current="page" href="about" >О нас</a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link
                                <?php echo($current_page == 'registration') ? 'active' : ''; ?>" 
                                aria-current="page" href="registration" >Регистрация</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link
                                <?php echo($current_page == 'login') ? 'active' : ''; ?>" 
                                aria-current="page" href="login" >Войти</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link
                                <?php echo($current_page == 'users') ? 'active' : ''; ?>" 
                                aria-current="page" href="users" >Список пользователей</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

<? get_alerts()?>
