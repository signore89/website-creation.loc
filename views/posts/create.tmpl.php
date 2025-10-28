<? require_once(VIEWS."/components/header.php");?>
        <main class="container py-3">
            <div class="row">
                <div class="col-10"> 
                    <!-- основная часть -->
                     <h3><? $header ?? ''?></h3>
                    <form action="posts" method="POST">
                        <div class="mb-3">
                            <label for="title" class="form-label">Название поста</label>
                            <input type="text" class="form-control" id="title" name="title" value="<?=old('title')?>">
                            <?= isset($validation) ? $validation->listErrors("title") : '' ?>
                        </div>
                        <div class="mb-3">
                            <label for="descr" class="form-label">Описание поста</label>
                            <input type="text" class="form-control" id="descr" name="descr" value="<?=old('descr')?>">
                            <?= isset($validation) ? $validation->listErrors("descr") : '' ?>
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Содержание поста</label>
                            <textarea type="text" class="form-control" id="content" name="content" rows="10"><?=old('content')?></textarea>
                            <?= isset($validation) ? $validation->listErrors("content") : '' ?>
                        </div>
                        <button type="submit" class="btn btn-primary">Отправить</button>
                    </form>
                     
                </div>
                <div class="col-2">
            
                </div>
             </div>          
        </main>
        
        <? require_once COMPONENTS."/footer.php";?>
    </div>
</html>