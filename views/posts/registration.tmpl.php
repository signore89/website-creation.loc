<? require_once VIEWS."/components/header.php";?>
<main class="container py-3">
    <div class="row">
        <div class="col-10">
            <h3><?= $header ?? '' ?></h3>
            <form action="registration" method="post">
                        <div class="mb-3">
                            <label for="login" class="form-label">логин</label>
                            <input type="text" class="form-control" id="login" name="login" value="<?=old('login')?>">
                            <?= isset($validation) ? $validation->listErrors('login') : '' ?>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">введите почтовый ящик</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?=old('email')?>">
                            <?= isset($validation) ? $validation->listErrors("email") : '' ?>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">введите пароль</label>
                            <input type="password" class="form-control" id="password" name="password">
                            <?= isset($validation) ? $validation->listErrors("password") : '' ?>
                        </div>
                        <div class="mb-3">
                            <label for="password_confirm" class="form-label">подтверждение пароля</label>
                            <input type="password" class="form-control" id="password_cofirm" name="password_confirm">
                            <?= isset($validation) ? $validation->listErrors("password_confirm") : '' ?>
                        </div>
                        <button type="submit" class="btn btn-primary">Отправить</button>
                </form>

        </div>
        <div class="col-2">
            <!-- <? require_once COMPONENTS."/sidebar.php";?> -->
        </div>

    </div>

</main>

<? require_once COMPONENTS ."/footer.php";