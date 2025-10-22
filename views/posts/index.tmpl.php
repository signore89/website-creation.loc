<? require_once(VIEWS."/components/header.php");?>
        <main class="container py-3">
            <div class="row">
                <div class="col-10"> 
                    <!-- основная часть -->
                     <h3><? $header ?? ''?></h3>

                     <?foreach($posts as $post) :?>
                        <div class="card mb-3">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="#" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title"><a href="<?=$post['post_id']?>"><?=$post['title']?></a></h5>
                                        <p class="card-text"><?=$post['descr']?></p>
                                        <p class="card-text"><?=$post['content']?></p>
                                        <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <? endforeach ?>
                </div>
                <div class="col-2">
                    <? require_once COMPONENTS."/sidebar.php";?>
                </div>
             </div>          
        </main>
        
        <? require_once COMPONENTS."/footer.php";?>
    </div>
</html>