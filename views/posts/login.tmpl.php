<? require_once VIEWS."/components/header.php";?>
<main class="container py-3">
    <div class="row">
        <div class="col-10">
            <h3><?= $header ?? '' ?></h3>
            <form action="login" method="post">
                        <div class="mb-3">
                            <label for="login" class="form-label">введите логин</label>
                            <input type="text" class="form-control" id="login" name="login" value="<?=old('login')?>">
                            <?= isset($validation) ? $validation->listErrors('login') : '' ?>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">введите пароль</label>
                            <input type="password" class="form-control" id="password" name="password">
                            <?= isset($validation) ? $validation->listErrors("authentication") : '' ?>
                        </div>
                        <button type="submit" class="btn btn-primary">Войти</button>
                </form>

        </div>
        <div class="col-2">
        </div>

    </div>

</main>

<? require_once COMPONENTS ."/footer.php";