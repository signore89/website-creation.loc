<? require_once(VIEWS."/components/header.php");?>
        <main class="container py-3">
            <div class="row">
                <div class="col-10"> 
                    <!-- основная часть -->
                     <h3><? $header ?? ''?></h3>
                     <p><?= $user['login']?></p>
                     <p><?= $user['email']?></p>
                    <div class="row">
                        <!-- удалить пользователя-->      
                        <form action="users" method="POST">
                            <input type="hidden" name="user_id" value="<?= $user['user_id']?>">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                        <!-- изменения пользователя -->
                         <a class="btn btn-outline-warning" href="edit-user?id=<?= $user['user_id'] ?>" class="btn btn-warning">Редактировать</a>
                    </div>
                </div>
            </div>          
        </main>
        
        <? require_once COMPONENTS."/footer.php";?>
    </div>
</html>