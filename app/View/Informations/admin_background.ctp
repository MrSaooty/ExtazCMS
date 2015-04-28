<?php $this->assign('title', 'Changer de background'); ?>
<div class="main-content">
    <div class="container">  
        <div class="row">
            <div class="col-md-9">
                <div class="tab-v1">    
                    <div class="tab-content">
                        <div class="alert alert-info">
                            <strong><i class="fa fa-info-circle"></i></strong> Cliquez sur le <strong>background</strong> que vous souhaitez utiliser
                        </div>
                        <div class="page-gallery">
                            <div id="gallery">    
                                <!-- Element -->
                                <div class="element">
                                    <a href="<?php echo $this->Html->url(['controller' => 'informations', 'action' => 'update_background', 1]); ?>" class="prettyphoto">
                                        <?php echo $this->Html->image('bg/1.jpg', ['width' => 200, 'height' => 110]); ?>
                                    </a>
                                    <div class="gall-caption">
                                        <ul class="list-unstyled">
                                            <li><strong>Nom du fichier :</strong> 1.jpg</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Element -->
                                <div class="element">
                                    <a href="<?php echo $this->Html->url(['controller' => 'informations', 'action' => 'update_background', 2]); ?>" class="prettyphoto">
                                        <?php echo $this->Html->image('bg/2.jpg', ['width' => 200, 'height' => 110]); ?>
                                    </a>
                                    <div class="gall-caption">
                                        <ul class="list-unstyled">
                                            <li><strong>Nom du fichier :</strong> 2.jpg</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Element -->
                                <div class="element">
                                    <a href="<?php echo $this->Html->url(['controller' => 'informations', 'action' => 'update_background', 3]); ?>" class="prettyphoto">
                                        <?php echo $this->Html->image('bg/3.jpg', ['width' => 200, 'height' => 110]); ?>
                                    </a>
                                    <div class="gall-caption">
                                        <ul class="list-unstyled">
                                            <li><strong>Nom du fichier :</strong> 3.jpg</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>