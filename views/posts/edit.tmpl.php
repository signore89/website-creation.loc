<? require_once(VIEWS."/components/header.php");?>
        <main class="container py-3">
            <div class="row">
                <div class="col-10"> 
                    <!-- основная часть -->
                     <h3><? $header ?? ''?></h3>
                    <form action="edit-post" method="POST">
                        <input type="hidden" name="post_id" value="<?= $post['post_id']?>">
                        <div class="mb-3">
                            <label for="title" class="form-label">Название поста</label>
                            <input type="text" class="form-control" id="title" name="title" value="<?=$post['title']?>">
                            <?= isset($validation) ? $validation->listErrors("title") : '' ?>
                        </div>
                        <div class="mb-3">
                            <label for="descr" class="form-label">Описание поста</label>
                            <input type="text" class="form-control" id="descr" name="descr" value="<?=$post['descr']?>">
                            <?= isset($validation) ? $validation->listErrors("descr") : '' ?>
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Содержание поста</label>
                            <textarea type="text" class="form-control" id="content" name="content" rows="10"><?=$post['content']?></textarea>
                            <?= isset($validation) ? $validation->listErrors("content") : '' ?>
                        </div>
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </form>
                     
                </div>
                <div class="col-2">
            
                </div>
             </div>          
        </main>
        
        <? require_once COMPONENTS."/footer.php";?>
    </div>
</html>