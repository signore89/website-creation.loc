<? require_once(VIEWS."/components/header.php");?>
        <main class="container py-3">
            <div class="row">
                <div class="col-10"> 
                    <!-- основная часть -->
                     <h3><? $header ?? ''?></h3>
                     <p><?= $post['descr']?></p>
                     <p><?= $post['content']?></p>
                        <!-- изменения рейтинга -->
                        <div id="rate-container">
                            <button id="up_btn" class="btn btn-primary" data-post-id="<?= $post['post_id']?>">добавить рейтинг</button>
                                <p id="rate_p"><?= $post['rate'] ?? 0 ?></p>
                            <button id="down_btn" class="btn btn-primary" data-post-id="<?= $post['post_id']?>">убрать рейтинг</button>
                        </div>
                    <div class="row">
                        <!-- удалить пост-->      
                        <form action="posts" method="POST">
                            <input type="hidden" name="post_id" value="<?= $post['post_id']?>">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                        <!-- изменения поста -->
                        <a class="btn btn-outline-warning" href="edit-post?id=<?= $post['post_id'] ?>" class="btn btn-warning">Редактировать</a>
                    </div>
                </div>
            </div>          
        </main>
        
        <? require_once COMPONENTS."/footer.php";?>
    </div>
</html>