<?php $this->assign('title', 'Recherche pour '.$request.''); ?>
<script>
$(function(){
    numeral.language('fr', {
        delimiters: {
            thousands: ' ',
            decimal: ','
        },
        abbreviations: {
            thousand: 'k',
            million: 'm',
            billion: 'b',
            trillion: 't'
        },
        ordinal : function (number) {
            return number === 1 ? 'er' : 'ème';
        },
        currency: {
            symbol: '€'
        }
    });
    numeral.language('fr');
    <?php
    foreach($items as $item){
        $item_id = $item['Shop']['id'];
        ?>
        $("#plus<?= $item_id; ?>").on('click', function(){
            var quantity<?= $item_id; ?> = $("#quantity<?= $item_id; ?>").text();
            var server_price<?= $item_id; ?> = $("#server-price<?= $item_id; ?>").attr('data-price');
            var site_price<?= $item_id; ?> = $("#site-price<?= $item_id; ?>").attr('data-price');
            if(quantity<?= $item_id; ?> < 250){
                quantity<?= $item_id; ?>++;
                var server_price<?= $item_id; ?> = server_price<?= $item_id; ?> * quantity<?= $item_id; ?>;
                var site_price<?= $item_id; ?> = site_price<?= $item_id; ?> * quantity<?= $item_id; ?>;
                var server_price<?= $item_id; ?> = numeral(server_price<?= $item_id; ?>).format('0,0');
                var site_price<?= $item_id; ?> = numeral(site_price<?= $item_id; ?>).format('0,0');
                $("#server-price<?= $item_id; ?>").text(server_price<?= $item_id; ?>);
                $("#site-price<?= $item_id; ?>").text(site_price<?= $item_id; ?>);
                $("#server<?= $item_id; ?>").val(quantity<?= $item_id; ?>);
                $("#site<?= $item_id; ?>").val(quantity<?= $item_id; ?>);
                $("#plus<?= $item_id; ?>").blur();
                $("#quantity<?= $item_id; ?>").text(quantity<?= $item_id; ?>);
            }
        });
        $("#moins<?= $item_id; ?>").on('click', function(){
            var quantity<?= $item_id; ?> = $("#quantity<?= $item_id; ?>").text();
            var server_price<?= $item_id; ?> = $("#server-price<?= $item_id; ?>").attr('data-price');
            var site_price<?= $item_id; ?> = $("#site-price<?= $item_id; ?>").attr('data-price');
            if(quantity<?= $item_id; ?> > 1){
                quantity<?= $item_id; ?>--;
                var server_price<?= $item_id; ?> = quantity<?= $item_id; ?> * server_price<?= $item_id; ?>;
                var site_price<?= $item_id; ?> = quantity<?= $item_id; ?> * site_price<?= $item_id; ?>;
                var server_price<?= $item_id; ?> = numeral(server_price<?= $item_id; ?>).format('0,0');
                var site_price<?= $item_id; ?> = numeral(site_price<?= $item_id; ?>).format('0,0');
                $("#server-price<?= $item_id; ?>").text(server_price<?= $item_id; ?>);
                $("#site-price<?= $item_id; ?>").text(site_price<?= $item_id; ?>);
                $("#server<?= $item_id; ?>").val(quantity<?= $item_id; ?>);
                $("#site<?= $item_id; ?>").val(quantity<?= $item_id; ?>);
                $("#moins<?= $item_id; ?>").blur();
                $("#quantity<?= $item_id; ?>").text(quantity<?= $item_id; ?>);
            }
        });
        <?php
    }
    ?>
});
</script>
<?php
if($connected && $nb_items > 0){
    foreach($items as $i){
        $promo_site = round($i['Shop']['price_money_site'] / 100 * $i['Shop']['promo']);
        $price_site = $i['Shop']['price_money_site'] - $promo_site;
        $promo_server = round($i['Shop']['price_money_server'] / 100 * $i['Shop']['promo']);
        $price_server = $i['Shop']['price_money_server'] - $promo_server;
        if($i['Shop']['price_money_server'] > -1 OR $i['Shop']['price_money_site'] > -1){
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
                            <div class="quantity">
                                Quantité désiré : <span class="open-sans" id="quantity<?php echo $i['Shop']['id']; ?>">1</span>
                                <button class="btn-u btn-u-dark btn-u-xs" id="plus<?php echo $i['Shop']['id']; ?>">+</button>
                                <button class="btn-u btn-u-dark btn-u-xs" id="moins<?php echo $i['Shop']['id']; ?>">-</button>
                            </div>
                            <?php if($use_economy == 1 && $use_server_money = 1 && $i['Shop']['price_money_server'] > -1){ ?>
                                <?php echo $this->Form->create('Shop', ['action' => 'buy']); ?>
                                    <?php echo $this->Form->input('id', ['type' => 'hidden', 'value' => $i['Shop']['id']]); ?>
                                    <?php echo $this->Form->input('money', ['type' => 'hidden', 'value' => 'server']); ?>
                                    <?php echo $this->Form->input('quantity', ['type' => 'hidden', 'value' => '1', 'id' => 'server'.$i['Shop']['id']]); ?>
                                    <button type="submit" class="modal-button-1 btn-u btn-u-dark" id="server<?php echo $i['Shop']['id']; ?>"><i class="fa fa-shopping-cart"></i> 
                                        <?php if($i['Shop']['promo'] != -1){
                                            echo '<span class="open-sans" data-price="'.$price_server.'" id="server-price'.$i['Shop']['id'].'">'.$price_server.'</span> '; echo ucfirst($money_server);
                                        }
                                        else{
                                            echo '<span class="open-sans" data-price="'.$i['Shop']['price_money_server'].'" id="server-price'.$i['Shop']['id'].'">'.number_format($i['Shop']['price_money_server'], 0, ',', ' ').'</span> '; echo ucfirst($money_server);
                                        } ?>
                                    </button>
                                <?php echo $this->Form->end(); ?>
                            <?php } ?>
                            <?php if($i['Shop']['price_money_site'] > -1){ ?>
                                <?php echo $this->Form->create('Shop', ['action' => 'buy']); ?>
                                    <?php echo $this->Form->input('id', ['type' => 'hidden', 'value' => $i['Shop']['id']]); ?>
                                    <?php echo $this->Form->input('money', ['type' => 'hidden', 'value' => 'site']); ?>
                                    <?php echo $this->Form->input('quantity', ['type' => 'hidden', 'value' => '1', 'id' => 'site'.$i['Shop']['id']]); ?>
                                    <button type="submit" class="modal-button-2 btn-u btn-u" id="site<?php echo $i['Shop']['id']; ?>"><i class="fa fa-shopping-cart"></i> 
                                        <?php
                                        if($i['Shop']['promo'] != -1){
                                            echo '<span class="open-sans" data-price="'.$price_site.'" id="site-price'.$i['Shop']['id'].'">'.$price_site.'</span> '; echo ucfirst($site_money);
                                        }
                                        else{
                                            echo '<span class="open-sans" data-price="'.$i['Shop']['price_money_site'].'" id="site-price'.$i['Shop']['id'].'">'.number_format($i['Shop']['price_money_site'], 0, ',', ' ').'</span> '; echo ucfirst($site_money);
                                        }
                                        ?>
                                    </button>
                                <?php echo $this->Form->end(); ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modal -->
        <?php
        }
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
                            <div class="carousel-inner">
                                <div class="item active">
                                    <div class="row items">
                                        <?php foreach($items as $i){ ?>
                                            <?php if($i['Shop']['price_money_server'] > -1 OR $i['Shop']['price_money_site'] > -1){ ?>
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
                                                        <div class="shop-item photo hidden-xs hidden-sm">
                                                            <?php
                                                            if($connected){
                                                                echo $this->Html->image($i['Shop']['img'], ['width' => 250, 'height' => 170, 'class' => 'shop-img', 'alt' => 'a', 'data-toggle' => 'modal', 'data-target' => '#shopping'.$i['Shop']['id'].'']);
                                                            }
                                                            else{
                                                                echo $this->Html->image($i['Shop']['img'], ['width' => 250, 'height' => 170, 'class' => 'shop-img', 'alt' => 'a', 'data-toggle' => 'modal', 'data-target' => '#please_connect']);
                                                            }
                                                            ?>
                                                            <?php
                                                            if($i['Shop']['promo'] != -1){
                                                                echo '<span class="shop-promo" href="shop-ui-inner.html">'.$i['Shop']['promo'].'% de réduction !</span>';
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