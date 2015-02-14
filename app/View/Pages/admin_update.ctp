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
		            	<?php if($version == $lastVersion){ ?>
		                    Vous utilisez la dernière version disponible du CMS <?php echo '('.$version.')'; ?>
		                    <hr>
		                    <button class="btn btn-default" disabled="disabled"><i class="fa fa-cogs"></i> Installer la mise à jour</button>
		                <?php } else { ?>
		                	Vous utilisez actuellement la version <?php echo $version; ?><br>
		                    Une nouvelle version du CMS est disponible : <?php echo $lastVersion; ?>
		                    <hr>
							<i class="fa fa-github"></i> <a href="https://github.com/MrSaooty/ExtazCMS/releases" target="_blank">https://github.com/MrSaooty/ExtazCMS/releases</a>
							<hr>
		                    <a href="<?php echo $this->Html->url(['controller' => 'pages', 'action' => 'installUpdate', 'admin' => true]) ?>" class="btn btn-default"><i class="fa fa-cogs"></i> Installer la mise à jour</a>
		                <?php } ?>
		            </div>
		        </div>
        	</div>
        	<div class="col-md-8">
        	</div>
        </div>
    </div>
</div>