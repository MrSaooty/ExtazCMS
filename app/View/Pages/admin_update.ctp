<?php $this->assign('title', 'Mise à jour'); ?>
<div class="wrapper wrapper-content">
    <div class="animated fadeInRightBig">
        <div class="row">
            <div class="col-md-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Mise à jour du CMS</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                    	<?php if($version >= $last_version){ ?>
		                    Félicitation ! Vous utilisez la dernière version disponible d'ExtazCMS <?php echo '('.$version.')'; ?>
		                    <hr>
							<i class="fa fa-github"></i> <b>Releases</b> : <a href="https://github.com/MrSaooty/ExtazCMS/releases" target="_blank">https://github.com/MrSaooty/ExtazCMS/releases</a>
							<br>
							<i class="fa fa-github"></i> <b>Changelog</b> : <a href="https://github.com/MrSaooty/ExtazCMS/blob/master/CHANGELOG.md" target="_blank">https://github.com/MrSaooty/ExtazCMS/Changelog</a>
							<br>
							<i class="fa fa-github"></i> <b>Aide</b> : <a href="https://github.com/MrSaooty/ExtazCMS/wiki" target="_blank">https://github.com/MrSaooty/ExtazCMS/wiki</a>
		                <?php } else { ?>
		                	Vous utilisez actuellement la version <?php echo $version; ?> d'ExtazCMS, une nouvelle version est disponible, n'hésitez pas à faire la mise a jour pour pouvoir profiter des dernières nouveautés de la version <?php echo $last_version; ?>. Consultez le changelog pour prendre connaissances de celles-ci
		                	<hr>
		                	<div class="alert alert-info">
								<strong><i class="fa fa-info-circle"></i></strong> Attention le module de mise à jour automatique n'est pas encore disponible.<br>
								Pour effectuer une mise à jour veuillez procéder manuellement
							</div>
		                    <hr>
							<i class="fa fa-github"></i> <b>Releases</b> : <a href="https://github.com/MrSaooty/ExtazCMS/releases" target="_blank">https://github.com/MrSaooty/ExtazCMS/releases</a>
							<br>
							<i class="fa fa-github"></i> <b>Changelog</b> : <a href="https://github.com/MrSaooty/ExtazCMS/blob/master/CHANGELOG.md" target="_blank">https://github.com/MrSaooty/ExtazCMS/Changelog</a>
							<br>
							<i class="fa fa-github"></i> <b>Aide</b> : <a href="http://extaz-cms.com/wiki/index.php?title=Mise_%C3%A0_jour" target="_blank">http://extaz-cms.com/wiki/Mise_à_jour</a>
		                <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>