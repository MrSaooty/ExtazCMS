<?php $this->assign('title', 'Changer de background'); ?>
<script>
    var myDropzone = new Dropzone("div#fallback", { 
        url: "<?php echo $this->Html->url(['controller' => 'informations', 'action' => 'add_background']); ?>"
    });
</script>
<div class="main-content">
    <div class="container">  
        <div class="row">
            <?php
            if($nb_backgrounds > 0){
                ?>
                <div class="col-md-8">
                    <div class="container">
                        <div class="page-content">
                            <div class="alert alert-info">
                                <strong><i class="fa fa-info-circle"></i></strong> Cliquez sur le <strong>background</strong> que vous souhaitez utiliser
                            </div>
                            <div class="page-gallery">
                                <div id="gallery">
                                    <div class="new-bg">
                                        
                                    </div>
                                    <?php
                                    foreach($backgrounds as $background){
                                        ?>
                                        <!-- Element -->
                                        <div class="element">
                                            <a href="<?php echo $this->Html->url(['controller' => 'informations', 'action' => 'update_background', $background]); ?>" class="prettyphoto">
                                                <?php echo $this->Html->image('bg/'.$background, ['width' => 200, 'height' => 110]); ?>
                                            </a>
                                            <div class="gall-caption">
                                                <ul class="list-unstyled">
                                                    <li><a href="<?php echo $this->Html->url(['controller' => 'informations', 'action' => 'delete_background', $background]); ?>" class="background-delete"><font color="#fff"><i class="fa fa-times"></i></font></a><strong>Nom du fichier :</strong> <?php echo $background; ?></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="container">
                        <div class="page-content">
                            <h4>Ajoutez votre propre background</h4>
                            <hr>
                            <?php echo $this->Form->create('Informations', ['action' => 'add_background', 'class' => 'dropzone', 'id' => 'myAwesomeDropzone', 'type' => 'file']); ?>
                                <div class="fallback">
                                    <input type="file" name="file">
                                </div>
                            <?php echo $this->Form->end(); ?>
                        </div>
                    </div>
                </div>
                <?php
            }
            else{
                ?>
                <div class="col-md-4">
                    <div class="container">
                        <div class="page-content">
                            <div class="alert alert-info">
                                <i class="fa fa-info-circle"></i> Aucun background trouvé, ajoutez en un ci-dessous
                            </div>
                            <?php echo $this->Form->create('Informations', ['action' => 'add_background', 'class' => 'dropzone', 'id' => 'myAwesomeDropzone', 'type' => 'file']); ?>
                                <div class="fallback">
                                    <input type="file" name="file">
                                </div>
                            <?php echo $this->Form->end(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>