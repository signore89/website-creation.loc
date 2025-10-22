<h3>Недавние посты</h3>
                        <div class="list-group">
                            <? foreach($posts as $post):?>
                            <a href="<?= $post['post_id']?>" class="list-group-item list-group-item-action"><?= $post['title']?></a>
                            <? endforeach ?>
                        </div>