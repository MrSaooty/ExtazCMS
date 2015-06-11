<?php $this->assign('title', 'Recherche pour '.$request.''); ?>
<script>
$(document).ready(function(){
    $(".confirm").confirm({
        text: "Voulez vous vraiment supprimer cet article ?",
        title: "Confirmation",
        confirmButton: "Oui",
        cancelButton: "Non"
    });
});
</script>
<?php
if($connected && $nb_items > 0){
    foreach($items as $i){
        ?>            
        <!-- Begin Modal -->
        <div class="modal fade bs-example-modal-sm" id="shopping<?php echo $i['Shop']['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="shopping<?php echo $i['Shop']['id']; ?>" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="shopping<?php echo $i['Shop']['id']; ?>"><?php echo $i['Shop']['name']; ?></h4>
                    </div>
                    <div class="modal-body">
                        <?php echo $this->Html->image($i['Shop']['img'], ['class' => 'shop']); ?>
                        <hr>
                        <p class="text-justify">
                            <?php echo $i['Shop']['description']; ?>
                        </p>
                        <?php
                        // S'il y a une promo
                        if($i['Shop']['promo'] != -1){
                            $promo_site = round($i['Shop']['price_money_site'] / 100 * $i['Shop']['promo']);
                            $price_site = $i['Shop']['price_money_site'] - $promo_site;
                            $promo_server = round($i['Shop']['price_money_server'] / 100 * $i['Shop']['promo']);
                            $price_server = $i['Shop']['price_money_server'] - $promo_server;
                            if($use_economy == 1 && $i['Shop']['price_money_server'] != -1){
                                ?>
                                <a type="button" class="modal-button-1 btn-u btn-u-dark" href="<?php echo $this->Html->url(['controller' => 'shops', 'action' => 'buy', $i['Shop']['id'], 'server']); ?>">
                                    <i class="fa fa-shopping-cart"></i> <?php echo $price_server.' <s>'.number_format($i['Shop']['price_money_server'], 0, ',', ' ').'</s> '; echo ucfirst($money_server); ?>
                                </a>
                                <?php
                            }
                            ?>
                            <a type="button" class="modal-button-2 btn-u btn-u" href="<?php echo $this->Html->url(['controller' => 'shops', 'action' => 'buy', $i['Shop']['id'], 'site']); ?>">
                                <i class="fa fa-shopping-cart"></i> <?php echo $price_site.' <s>'.number_format($i['Shop']['price_money_site'], 0, ',', ' ').'</s> '; echo ucfirst($site_money);
                        }
                        // S'il n'y a pas de promo
                        else{
                            if($use_economy == 1 && $i['Shop']['price_money_server'] != -1){
                                ?>
                                <a type="button" class="modal-button-1 btn-u btn-u-dark" href="<?php echo $this->Html->url(['controller' => 'shops', 'action' => 'buy', $i['Shop']['id'], 'server']); ?>">
                                    <i class="fa fa-shopping-cart"></i> <?php echo number_format($i['Shop']['price_money_server'], 0, ',', ' ').' '; echo ucfirst($money_server); ?>
                                </a>
                                <?php
                            }
                            ?>
                            <a type="button" class="modal-button-2 btn-u btn-u" href="<?php echo $this->Html->url(['controller' => 'shops', 'action' => 'buy', $i['Shop']['id'], 'site']); ?>">
                                <i class="fa fa-shopping-cart"></i> <?php echo number_format($i['Shop']['price_money_site'], 0, ',', ' ').' '; echo ucfirst($site_money);
                        }
                        ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal -->
        <?php
    }
}
else{
    ?>
    <!-- Begin Modal -->
    <div class="modal fade bs-example-modal-sm" id="please_connect" tabindex="-1" role="dialog" aria-labelledby="please_connect" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body">
                    <h4>Vous devez être connecté pour acheter un objet dans notre boutique</h4>
                </div>
                <div class="modal-footer">
                    <button class="btn-u btn-u-dark" data-dismiss="modal">Ok</button>
                    <a href="<?php echo $this->Html->url(['controller' => 'users', 'action' => 'login']); ?>" class="btn-u btn-u">
                        <i class="fa fa-sign-in"></i> Connexion
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->
    <?php
    }
?>
<!--=== Content Part ===-->
<div class="container content">
    <div class="row">    
        <!-- Begin Content -->
        <div class="col-md-12">
            <?php if($nb_items > 0){ ?>
                <div class="alert-search-shop">
                    <h2 class="heading-md">
                        <?php
                        if($nb_items < 2){
                            echo $nb_items.' résultat';
                        }
                        else{
                            echo $nb_items.' résultats';
                        }
                        ?>
                        pour "<?php echo $request; ?>"
                    </h2>
                </div>
            <div class="row">
                <div class="col-md-12">
                    <div id="carousel-example" class="carousel slide" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="row items">
                                    <?php foreach($items as $i){ ?>
                                        <div class="col-sm-2 hidden-xs hidden-sm hidden-md" data-category="<?php echo $i['shopCategories']['name']; ?>">
                                            <div class="col-item">
                                                <div class="col-md-12">
                                                    <h5>
                                                        <?php 
                                                        if(mb_strlen($i['Shop']['name']) > 15){
                                                            echo mb_substr($i['Shop']['name'], 0, 15).'...';
                                                        }
                                                        else{
                                                            echo $i['Shop']['name'];
                                                        }
                                                        ?>
                                                    </h5>
                                                </div>
                                                <div class="photo hidden-xs hidden-sm">
                                                    <?php echo $this->Html->image($i['Shop']['img'], ['width' => 250, 'height' => 170, 'alt' => 'a']); ?>
                                                    <?php
                                                    if($i['Shop']['promo'] != -1){
                                                        echo '<span class="shop-badge">-'.$i['Shop']['promo'].'%</span>';
                                                    }
                                                    ?>
                                                </div>
                                                <div class="info">
                                                    <?php
                                                    if($connected){
                                                        echo '<button class="buy btn btn-default" data-toggle="modal" data-target="#shopping'.$i['Shop']['id'].'"><i class="fa fa-shopping-cart"></i> Acheter</button>';
                                                    }
                                                    else{
                                                        echo '<button class="buy btn btn-default" data-toggle="modal" data-target="#please_connect"><i class="fa fa-shopping-cart"></i> Acheter</button>';
                                                    }
                                                    ?>
                                                    <div class="clearfix">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 hidden-lg" data-category="<?php echo $i['shopCategories']['name']; ?>">
                                            <div class="col-item">
                                                <div class="col-md-12">
                                                    <h5>
                                                        <?php 
                                                        if(mb_strlen($i['Shop']['name']) > 15){
                                                            echo mb_substr($i['Shop']['name'], 0, 15).'...';
                                                        }
                                                        else{
                                                            echo $i['Shop']['name'];
                                                        }
                                                        ?>
                                                    </h5>
                                                </div>
                                                <div class="info">
                                                    <?php
                                                    if($i['Shop']['promo'] != -1){
                                                        if($connected){
                                                        echo '<button class="buy btn btn-default" data-toggle="modal" data-target="#shopping'.$i['Shop']['id'].'"><small>(-'.$i['Shop']['promo'].'%)</small> <i class="fa fa-shopping-cart"></i> Acheter</button>';
                                                        }
                                                        else{
                                                            echo '<button class="buy btn btn-default" data-toggle="modal" data-target="#please_connect"><small>(-'.$i['Shop']['promo'].'%)</small> <i class="fa fa-shopping-cart"></i> Acheter</button>';
                                                        }
                                                    }
                                                    else{
                                                        if($connected){
                                                        echo '<button class="buy btn btn-default" data-toggle="modal" data-target="#shopping'.$i['Shop']['id'].'"><i class="fa fa-shopping-cart"></i> Acheter</button>';
                                                        }
                                                        else{
                                                            echo '<button class="buy btn btn-default" data-toggle="modal" data-target="#please_connect"><i class="fa fa-shopping-cart"></i> Acheter</button>';
                                                        }
                                                    }
                                                    ?>
                                                    <div class="clearfix">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <div class="servive-block servive-block-default">
                    <i class="icon-custom icon-color-dark rounded-x fa fa-meh-o"></i>
                    <h2 class="heading-md">Aucun résultat</h2>
                    <p>Désolé nous n'avons trouvé aucun article correspondant à votre recherche</p>                        
                </div>
            <?php } ?>
            </div>
        </div>
        <!-- End Content -->
    </div><!--/row-->        
</div><!--/container-->     
<!--=== End Content Part ===-->