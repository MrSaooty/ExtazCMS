<?php $this->assign('title', 'L\'équipe'); ?>
<script>
$(document).ready(function(){
    $(".confirm").confirm({
        text: "Voulez vous vraiment supprimer ce membre de l'équipe ?",
        title: "Confirmation",
        confirmButton: "Oui",
        cancelButton: "Non"
    });
});
</script>
<!--=== Content Part ===-->
<div class="container content">
    <div class="row magazine-page">
        <!-- Begin Content -->
        <div class="col-md-9">
            <?php if($count > 0){ ?>
            <?php foreach($data as $d){ ?>
                <div class="col-md-4">
                    <div class="thumbnail">
                        <a href="#">
                            <span class="overlay-zoom">  
                                <center>
                                    <?php echo $this->Html->image('http://cravatar.eu/helmhead/'.$d['Team']['username'].'/110.png', ['alt' => 'Player head', 'style' => 'margin-top:5px;']); ?> 
                                </center>
                            </span>                                              
                        </a>            
                        <div class="caption">
                            <center>
                                <?php if($role > 0){ ?>
                                    <a href="<?php echo $this->Html->url(['controller' => 'pages', 'action' => 'delete_member', 'id' => $d['Team']['id']]); ?>" class="btn rounded btn-default btn-u-xs confirm">
                                        <font color="red">
                                            <i class="fa fa-times"> Supprimer</i>
                                        </font>
                                    </a>
                                <?php } ?>
                                <h3>
                                    <a class="hover-effect" href="#">
                                        <?php echo $d['Team']['username']; ?>
                                    </a>
                                </h3>
                                <?php
                                switch($d['Team']['rank']){
                                    case '1':
                                        echo '<span class="label label-red">Fondateur</span>';
                                        break;
                                    case '2':
                                        echo '<span class="label label-red">Administrateur</span>';
                                        break;
                                    case '3':
                                        echo '<span class="label label-u">Modérateur</span>';
                                        break;
                                    case '4':
                                        echo '<span class="label label-blue">Animateur</span>';
                                        break;
                                    case '5':
                                        echo '<span class="label label-dark">Architecte</span>';
                                        break;
                                    case '6':
                                        echo '<span class="label label-light">Guide</span>';
                                        break;
                                    default:
                                        echo '<span class="label label-light">Indéfini</span>';
                                        break;
                                }
                                ?>
                            </center>                           
                        </div>
                    </div>
                </div>
                <?php } ?>
            <?php } else { ?>
            <div class="servive-block servive-block-default">
                <i class="icon-custom icon-color-dark rounded-x fa fa-info-circle"></i>
                <h2 class="heading-md">Aucun résultat</h2>
                <p>Aucun membre de l'équipe n'a été ajouté</p>                        
            </div>
            <?php } ?>
        </div>
        <!-- End Content -->
        <?php echo $this->element('sidebar'); ?>
    </div>
</div><!--/container-->     
<!-- End Content Part -->