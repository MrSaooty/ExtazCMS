<?php $this->assign('title', 'Boutique'); ?>
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
<!--=== Content Part ===-->
<div class="container content">
    <div class="row">
        <!-- Begin Content -->
            <div class="col-md-9">
                <?php if($nbItems == 0){ ?>
                <div class="servive-block servive-block-default">
                    <i class="icon-custom icon-color-dark rounded-x fa fa-info-circle"></i>
                    <h2 class="heading-md">Aucun résultat</h2>
                    <p>Aucun article n'a été ajouté dans la boutique</p>                        
                </div>
                <?php } else { ?>
                <div class="row">
                    <div class="col-md-6">
                        <?php
                        $controller = $this->params->controller;
                        $action = $this->params->action;
                        $base = $this->webroot.$controller.'/'.$action;
                        $name_asc = $base.'/sort:name/direction:asc';
                        $name_desc = $base.'/sort:name/direction:desc';
                        $cat_asc = $base.'/sort:cat/direction:asc';
                        $cat_desc = $base.'/sort:cat/direction:desc';
                        $price_money_site_asc = $base.'/sort:price_money_site/direction:asc';
                        $price_money_site_desc = $base.'/sort:price_money_site/direction:desc';
                        $price_money_server_asc = $base.'/sort:price_money_server/direction:asc';
                        $price_money_server_desc = $base.'/sort:price_money_server/direction:desc';
                        ?>
                        <p>
                            <select class="form-control input-sm" onchange="location = this.options[this.selectedIndex].value;">
                                <option value="Trier par...">Trier par...</option>
                                <option value="<?php echo $name_asc; ?>">Nom (Par ordre croissant)</option>
                                <option value="<?php echo $name_desc; ?>">Nom (Par ordre décroissant)</option>
                                <option value="<?php echo $cat_asc; ?>">Catégorie (Par ordre croissant)</option>
                                <option value="<?php echo $cat_desc; ?>">Catégorie (Par ordre décroissant)</option>
                                <option value="<?php echo $price_money_site_asc; ?>">Prix en <?php echo ucfirst($site_money); ?> (Par ordre croissant)</option>
                                <option value="<?php echo $price_money_site_desc; ?>">Prix en <?php echo ucfirst($site_money); ?> (Par ordre décroissant)</option>
                                <?php if($use_server_money == 1){ ?>
                                <option value="<?php echo $price_money_server_asc; ?>">Prix en <?php echo $money_server; ?> (Par ordre croissant)</option>
                                <option value="<?php echo $price_money_server_desc; ?>">Prix en <?php echo $money_server; ?> (Par ordre décroissant)</option>
                                <?php } ?>
                            </select>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <?php echo $this->Form->create('Shop', ['action' => 'search', 'inputDefaults' => ['error' => false]]); ?>
                            <div class="input-group">
                                <div class="input text">
                                    <?php echo $this->Form->input('search', ['type' => 'text', 'placeholder' => 'Rechercher un article', 'class' => 'form-control input-sm', 'label' => false, 'div' => false]); ?>
                                </div>        
                                <span class="input-group-btn">
                                    <button class="btn btn-default btn-sm" type="submit"><i class="fa fa-search"></i></button>
                                </span>
                            </div>
                        <?php echo $this->Form->end(); ?>
                    </div>
                </div>
                <div class="table-search-v2">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tbody>
                                <?php foreach($items as $i){ ?>
                                    <tr>
                                        <td>
                                            <?php echo $this->Html->image($i['Shop']['img']); ?>
                                        </td>
                                        <td class="td-width">
                                            <h3>
                                                <?php echo $i['Shop']['name']; ?>
                                            </h3>
                                            <p><?php echo $i['Shop']['description']; ?></p>
                                        </td>
                                        <?php if($role > 0){ ?>
                                        <td>
                                            <a href="<?php echo $this->Html->url(['controller' => 'shops', 'action' => 'edit', $i['Shop']['id'], 'admin' => true]); ?>" class="tooltips btn rounded btn-default btn-u-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="Modifier"><i class="fa fa-wrench"></i></a>
                                        </td>
                                        <td>
                                            <a href="<?php echo $this->Html->url(['controller' => 'shops', 'action' => 'delete', $i['Shop']['id']]); ?>" class="tooltips btn rounded btn-default btn-u-xs confirm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Supprimer"><font color="red"><i class="fa fa-trash-o"></i></font></a>
                                        </td>
                                        <?php } ?>
                                        <td>
                                            <a href="#" class="btn rounded btn-default btn-u-xs btn-block">
                                            	<i class="fa fa-tags"></i> <?php echo $i['Shop']['cat']; ?>
                                            </a>
                                        </td>
                                        <?php if($api->call('server.bukkit.version')[0]['result'] == 'success'){ ?>
                                            <?php if($use_economy == 1 && $use_server_money == 1){ ?>
    	                                        <?php if($i['Shop']['price_money_server'] == -1){ ?>
    	                                        <td>
    	                                            <center>
    	                                                <a href="#" class="btn-u rounded btn-u btn-u-xs btn-block"><font color="white"><i class="fa fa-info-circle"></i> Indisponible</a></font></a>
    	                                            </center>
    	                                        </td>
    	                                        <?php } else { ?>
    	                                        <td>
    	                                            <center>
                                                        <?php if($connected){ ?>
                                                            <a href="<?php echo $this->Html->url(['controller' => 'shops', 'action' => 'buy', $i['Shop']['id'], 'server']); ?>" class="tooltips btn-u rounded btn-u btn-u-xs btn-block" data-toggle="tooltip" data-placement="top" title="" data-original-title="Prérequis : <?php echo $i['Shop']['required_name']; ?>" disabled="disabled" type="submit"><font color="white"><i class="fa fa-shopping-cart"></i> <?php echo number_format($i['Shop']['price_money_server'], 0, ' ', ' ').' '.$money_server; ?></a></font></a>
                                                        <?php } else { ?>
                                                            <a href="#" class="tooltips btn-u rounded btn-u btn-u-xs btn-block" data-toggle="tooltip" data-placement="top" title="" data-original-title="Vous devez être connecté pour acheter dans la boutique" disabled="disabled" type="submit"><font color="white"><i class="fa fa-shopping-cart"></i> <?php echo number_format($i['Shop']['price_money_server'], 0, ' ', ' ').' '.$money_server; ?></a></font></a>
                                                        <?php } ?>
    	                                            </center>
    	                                        </td>
    	                                        <?php } ?>
                                            <?php } ?>
                                            <td>
                                                <center>
                                                    <?php if($connected){ ?>
                                                        <a href="<?php echo $this->Html->url(['controller' => 'shops', 'action' => 'buy', $i['Shop']['id'], 'site']); ?>" class="tooltips btn-u rounded btn-u-dark btn-u-xs btn-block" data-toggle="tooltip" data-placement="top" title="" data-original-title="Prérequis : <?php echo $i['Shop']['required_name']; ?>"  type="submit"><font color="white"><i class="fa fa-shopping-cart"></i> <?php echo number_format($i['Shop']['price_money_site'], 0, ' ', ' ').' '.$site_money; ?></a></font></a>
                                                    <?php } else { ?>
                                                        <a href="#" class="tooltips btn-u rounded btn-u-dark btn-u-xs btn-block" data-toggle="tooltip" data-placement="top" title="" data-original-title="Vous devez être connecté pour acheter dans la boutique" disabled="disabled" type="submit"><font color="white"><i class="fa fa-shopping-cart"></i> <?php echo number_format($i['Shop']['price_money_site'], 0, ' ', ' ').' '.$site_money; ?></a></font></a>
                                                    <?php } ?>
                                                </center>
                                            </td>
                                        <?php } else { ?>
                                            <td>
                                                <a href="#" class="tooltips btn rounded btn-default btn-u-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="Contactez un administrateur"><font color="red"><i class="fa fa-times"></i> Erreur !</font></a>
                                            </td>
                                        <?php } ?>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>    
                </div>
                <div class="col-md-12">
                    <!--Pagination-->
                    <div class="text-center">
                        <ul class="pagination">
                            <?php
                            if($nbItems > 9){
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
        <?php echo $this->element('sidebar'); ?>
    </div>
</div><!--/container-->     
<!-- End Content Part -->