<?php ob_start() ?>
<!-- <?php echo print_r($list) ?> -->
    <?php foreach($list as $article):?>
        <div class="card text-center " >
          <div class="card-header">
              <?=$article['produit_name']?>
          </div>
          <div class="card-body">
              <h5 class="card-title"><?=$article['produit_price'].'€'?></h5>
              <p class="card-text"><?=$article['produit_description']?></p>
               <?php
                foreach($image_list as $k=>$list){
                    if($article['produit_name']==$list['nom']){
                        $path = ROOT_PATH;
                        $image = $list['image'];
                    }
                }
              ?>
              <!-- image -->
              <div>
                <img src="<?php echo $path.'images/'.$image?>" alt="myPic" width='200' />
              </div>
              <a href="<?=ROOT_PATH.'article/'.$article['produit_name']?>" class="btn btn-primary">Voir le détail</a>
          </div>
        </div>
    <?php endforeach?>
    </div>
<?php
$title="Les articles";
$content = ob_get_clean();
include 'includes/template.php';
?>


