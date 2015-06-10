<?php $this->assign('title', 'Boutique'); ?>
<script>
$(function(){
    <?php 
    foreach($categories as $category){
        ?>
        $('.filters button[data-category="<?php echo $category['shopCategories']['name']; ?>"]').click(function(){
            var nom = '<?php echo $category['shopCategories']['name']; ?>';
            var myclass = $(this).attr('class');
            if(myclass == 'category btn-u btn-u-xs') { 
                $('.filters button[data-category="<?php echo $category['shopCategories']['name']; ?>"]').removeClass().addClass('category btn-u btn-u-dark btn-u-xs').blur();
                $('.items div[data-category="'+ nom +'"]').hide();
            }
            else{
                $('.filters button[data-category="<?php echo $category['shopCategories']['name']; ?>"]').removeClass().addClass('category btn-u btn-u-xs').blur();
                $('.items div[data-category="'+ nom +'"]').show();
            }
        });
        <?php
    }
    ?>
    $('.search').on('click', function(){
        $('.search').hide();
        $('.search-input').show();
        $('.category').hide();
        $('.categories').show();
        $('#ShopSearch').focus();
    });
    $('.categories').on('click', function(){
        $('.search').show();
        $('.search-input').hide();
        $('.category').show();
        $('.categories').hide();
    });

    var items = [
        <?php
        foreach($items as $item){
            echo '{ value: "'.$item['Shop']['name'].'", role: "'.$item['Shop']['price_money_site'].'" },';
        }
        ?>
    ];

    $('#autocomplete').autocomplete({
        lookup: items,
        onSelect: function(suggestion){

        }
    });
});
</script>
<?php
if($connected){
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
                        if($use_economy == 1){
                            ?>
                            <a type="button" class="modal-button-1 btn-u btn-u-dark" href="<?php echo $this->Html->url(['controller' => 'shops', 'action' => 'buy', $i['Shop']['id'], 'server']); ?>">
                                <i class="fa fa-shopping-cart"></i> <?php echo number_format($i['Shop']['price_money_server'], 0, ',', ' ').' '; echo ucfirst($money_server); ?>
                            </a>
                            <?php
                        }
                        ?>
                        <a type="button" class="modal-button-2 btn-u btn-u" href="<?php echo $this->Html->url(['controller' => 'shops', 'action' => 'buy', $i['Shop']['id'], 'site']); ?>">
                            <i class="fa fa-shopping-cart"></i> <?php echo number_format($i['Shop']['price_money_site'], 0, ',', ' ').' '; echo ucfirst($site_money); ?>
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
            <?php if($nb_items == 0){ ?>
            <div class="servive-block servive-block-default">
                <i class="icon-custom icon-color-dark rounded-x fa fa-info-circle"></i>
                <h2 class="heading-md">Aucun résultat</h2>
                <p>Aucun article n'a été ajouté dans la boutique</p>                        
            </div>
            <?php } else { ?>
            <div class="row filters">
                <div class="col-md-8">
                    <button class="search btn-u btn-u-xs" style="margin-left: -10px;"><i class="fa fa-search"></i></button>
                    <?php 
                    foreach($categories as $category){
                        echo '<button id="filter" class="category btn-u btn-u-xs" data-category="'.$category['shopCategories']['name'].'"><i class="fa fa-tag"></i> '.$category['shopCategories']['name'].'</button> ';
                    }
                    ?>
                    <div class="row search-input" style="display:none;">
                        <div class="col-md-4">
                            <?php echo $this->Form->create('Shop', ['action' => 'search', 'inputDefaults' => ['error' => false]]); ?>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <a class="categories btn-u btn-u-xs" style="display:none;margin-left: -10px;"><i class="fa fa-tags"></i></a>
                                    </span>
                                    <div class="input text">
                                        <?php echo $this->Form->input('search', ['type' => 'text', 'id' => 'autocomplete', 'placeholder' => 'Rechercher un article', 'class' => 'form-control input-sm', 'label' => false, 'div' => false]); ?>
                                    </div>
                                    <span class="input-group-btn">
                                        <button class="btn btn-default btn-xs" type="submit"><i class="fa fa-search"></i></button>
                                    </span>
                                </div>
                            <?php echo $this->Form->end(); ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <?php
                    if($connected){
                        ?>
                        <button class="btn-u btn-u-dark btn-u-xs pull-right hidden-xs hidden-sm" style="margin-right: -10px;"><i class="fa fa-info-circle"></i> <?php echo $tokens.' '.$site_money; ?></button>
                        <a href="<?php echo $this->Html->url(['controller' => 'shops', 'action' => 'reload']); ?>" class="btn-u btn-u-orange btn-u-xs pull-right margin-right-5 hidden-xs hidden-sm"><i class="fa fa-refresh"></i> Recharger</a>
                        <?php
                    }
                    else{
                        ?>
                        <a href="<?php echo $this->Html->url(['controller' => 'users', 'action' => 'login']); ?>" class="btn-u btn-u-dark btn-u-xs pull-right hidden-xs hidden-sm" style="margin-right: -10px;"><i class="fa fa-sign-in"></i> Connexion</a>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div id="carousel-example" class="carousel slide" data-ride="carousel">
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
                                                <div class="photo hidden-xs hidden-sm">
                                                    <?php echo $this->Html->image($i['Shop']['img'], ['width' => 250, 'height' => 170, 'alt' => 'a']); ?>
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
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <!--Pagination-->
                <div class="text-center">
                    <ul class="pagination">
                        <?php
                        if($nb_items > 18){
                            echo '<li>'.$this->Paginator->prev(__('«'), array('tag' => 'li'), null, array('tag' => 'li', 'class' => 'disabled', 'disabledTag' => 'a')).'</li>';
                            echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'currentClass' => 'active', 'tag' => 'li', 'first' => 'Première', 'last' => 'Dernière', 'ellipsis' => ''));
                            echo '<li>'.$this->Paginator->next(__('»'), array('tag' => 'li'), null, array('tag' => 'li', 'class' => 'disabled', 'disabledTag' => 'a')).'</li>';
                            echo '<br><br>';
                        }
                        ?>
                    </ul>                                                            
                </div>
                <!--End Pagination-->
            </div>
            <?php } ?>
        </div>
        <!-- End Content -->
    </div>
</div><!--/container-->     
<!-- End Content Part -->