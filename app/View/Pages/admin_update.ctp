<?php $this->assign('title', 'Mise à jour'); ?>
<div class="main-content">
    <div class="container">
        <div class="row">
        	<div class="col-md-4">
        		<div class="page-content">
		            <div class="single-head">
		                <h3 class="pull-left"><i class="fa fa-database lblue"></i>Mise à jour du CMS</h3>
		                <div class="clearfix"></div>
		            </div>
		            	<?php if($version >= $last_version){ ?>
		                    Félicitation ! Vous utilisez la dernière version disponible d'ExtazCMS <?php echo '('.$last_version.')'; ?>
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
							<i class="fa fa-github"></i> <b>Aide</b> : <a href="https://github.com/MrSaooty/ExtazCMS/wiki/Mise-%C3%A0-jour" target="_blank">https://github.com/MrSaooty/ExtazCMS/wiki/Mise-à-jour</a>
		                <?php } ?>
		            </div>
		        </div>
        	</div>
        	<div class="col-md-8">
        	</div>
        </div>
    </div>
</div>