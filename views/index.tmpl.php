<? require_once(VIEWS."/components/header.php");?>
        <main class="container py-3">
            <div class="row">
                <div class="col-10"> 
                    <!-- основная часть -->
                     <h3><? $header ?? ''?></h3>

                     <?foreach($users as $user) :?>
                        <div class="card mb-3">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="#" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title"><a href="user?id=<?= $user['user_id']?>"><?=$user['login']?></a></h5>
                                        <p class="card-text"><?=$user['email']?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <? endforeach;
                    echo $pagination; 
                    ?>
                </div>
                <div class="col-2">
                    <? require_once COMPONENTS."/sidebar.php";?>
                </div>
             </div>          
        </main>
        
        <? require_once COMPONENTS."/footer.php";?>
    </div>
</html>