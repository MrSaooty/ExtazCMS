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
<!--=== Content Part ===-->
<div class="container content">     
    <div class="row blog-page">    
        <!-- Left Sidebar -->
        <div class="col-md-9 md-margin-bottom-40">
            <?php if($nbItems > 0){ ?>
                <div class="servive-block servive-block-default">
                    <h2 class="heading-md">
                        <?php
                        if($nbItems < 2){
                            echo $nbItems.' résultat';
                        }
                        else{
                            echo $nbItems.' résultats';
                        }
                        ?>
                        pour "<?php echo $request; ?>"
                    </h2>
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
                                            <a href="<?php echo $this->Html->url(['controller' => 'shops', 'action' => 'edit', $i['Shop']['id']]); ?>" class="tooltips btn rounded btn-default btn-u-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="Modifier"><i class="fa fa-wrench"></i></a>
                                        </td>
                                        <td>
                                            <a href="<?php echo $this->Html->url(['controller' => 'shops', 'action' => 'delete', $i['Shop']['id']]); ?>" class="tooltips btn rounded btn-default btn-u-xs confirm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Supprimer"><font color="red"><i class="fa fa-times"></i></font></a>
                                        </td>
                                        <td>
                                            <a href="#" class="btn rounded btn-default btn-u-xs btn-block">
                                                <i class="fa fa-tags"></i> <?php echo $i['Shop']['cat']; ?>
                                            </a>
                                        </td>
                                        <?php } ?>
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
                                                    <a href="<?php echo $this->Html->url(['controller' => 'shops', 'action' => 'buy', $i['Shop']['id'], 'server']); ?>" class="btn-u rounded btn-u btn-u-xs btn-block" type="submit"><font color="white"><i class="fa fa-shopping-cart"></i> <?php echo number_format($i['Shop']['price_money_server'], 0, ' ', ' ').' '.$money_server; ?></a></font></a>
                                                </center>
                                            </td>
                                            <?php } ?>
                                        <?php } ?>
                                        <td>
                                            <center>
                                                <a href="<?php echo $this->Html->url(['controller' => 'shops', 'action' => 'buy', $i['Shop']['id'], 'site']); ?>" class="btn-u rounded btn-u-dark btn-u-xs btn-block" type="submit"><font color="white"><i class="fa fa-shopping-cart"></i> <?php echo number_format($i['Shop']['price_money_site'], 0, ' ', ' ').' '.$site_money; ?></a></font></a>
                                            </center>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
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
        <!-- End Left Sidebar -->
        <?php echo $this->element('sidebar'); ?>
    </div><!--/row-->        
</div><!--/container-->     
<!--=== End Content Part ===-->