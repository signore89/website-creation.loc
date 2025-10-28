<? require_once(VIEWS."/components/header.php");?>
        <main class="container py-3">
            <div class="row">
                <div class="col-10"> 
                    <!-- основная часть -->
                     <h3><? $header ?? ''?></h3>
                     <p><?= $post['descr']?></p>
                     <p><?= $post['content']?></p>
                </div>
                <div class="col-2">
            
                </div>
             </div>          
        </main>
        
        <? require_once COMPONENTS."/footer.php";?>
    </div>
</html>