<?php $this->assign('title', 'A propos'); ?>
<!--=== Content Part ===-->
<div class="container content">
    <div class="row magazine-page">
        <!-- Begin Content -->
        <div class="col-md-9">
            <div class="headline">
                <h2>Qu'est ce qu'Ankarton ?</h2>
            </div>
            <p class="text-justify">
                Vous connaissez peut-être <a href="http://www.legorafi.fr/">Le Gorafi</a> ou <a href="http://nordpresse.be/">Nordpress</a>, ces sites d'informations qui n'ont rien à envier 
                aux plus grands tel que <a href="http://www.leparisien.fr/">Le Parisien</a> ou <a href="http://www.lefigaro.fr/">Le Figaro</a> à la seule exception qu'ils divulguent des informations complètement fausses à tendance humoristique. C'est ce que tente de reproduire <u>Ankarton</u> avec l'univers <u>Ankama</u>. 
                Ankarton divulgue régulièrement des informations décalées qui touchent de près ou de loin tout ce qui est produit par la société française Ankama, sans jamais manquer de respect envers celle-ci.
            </p>
            <br>
            <div class="row tag-box tag-box-v5">
                <div class="row">
                    <div class="col-md-6">
                        <center>
                            <?php echo $this->Html->image('cakephp.png', ['alt' => 'CakePHP']); ?><br>
                            Propulsé par le framework <a href="http://cakephp.org/" target="_blank">CakePHP</a>
                        </center>
                    </div>
                    <div class="col-md-6">
                        <center>
                            <?php echo $this->Html->image('github.png', ['height' => 125, 'width' => 145, 'alt' => 'GitHub']); ?><br>
                            Sources disponibles sur <a href="https://github.com/MrSaooty/Ankarton" target="_blank">GitHub</a>
                        </center>
                    </div>
                </div>
            </div>
            <div class="row tag-box tag-box-v5">
                <div class="col-md-7">
                    <span>Qui est derrière tout ça ?</span>
                </div>
                <div class="col-md-5">
                    <a href="<?php echo $this->Html->url(['controller' => 'pages', 'action' => 'team']); ?>"><p><button class="btn-u btn-u-lg btn-u-green"><i class="fa fa-group"></i> Découvrez notre équipe</button></p></a>
                </div>
            </div>
            <div class="row tag-box tag-box-v5">
                <div class="col-md-7">
                    <span>Restez au courant de l'actualité</span>
                </div>
                <div class="col-md-5">
                    <a href="http://twitter.com/AnkartonFR" target="_blank"><p><button class="btn-u btn-u-lg btn-u-blue"><i class="fa fa-twitter"></i> Suivez nous sur Twitter</button></p></a>
                </div>
            </div>
        </div>
        <!-- End Content -->
        <?php echo $this->element('sidebar'); ?>
    </div>
</div><!--/container-->     
<!-- End Content Part -->