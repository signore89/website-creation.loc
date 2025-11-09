<? require_once VIEWS."/components/header.php";?>
<main class="container py-3">
    <div class="row">
        <div class="col-10">
            <h3><?= $header ?? '' ?></h3>
            <form action="users" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="user_id" value="<?= $edit_user['user_id']?>">
                        <div class="mb-3">
                            <label for="login" class="form-label">логин</label>
                            <input type="text" class="form-control" id="login" name="login" value="<?=$edit_user['login']?>">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">почтовый ящик</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?=$edit_user['email']?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                </form>

        </div>
        <div class="col-2">
            <!-- <? require_once COMPONENTS."/sidebar.php";?> -->
        </div>

    </div>

</main>

<? require_once COMPONENTS ."/footer.php";