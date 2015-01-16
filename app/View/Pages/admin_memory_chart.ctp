<?php $this->assign('title', 'Statistiques'); ?>
<div class="main-content">
	<div class="container">
		<?php if($api->call('server.bukkit.version') == true){ ?>
			<div class="page-content" style="width:750px;">
				<div id="memory_chart"></div>
			</div>
			<?php echo $this->Highcharts->render($chartName); ?>
        <?php } else { ?>
	        <div class="alert alert-danger">
				<strong><i class="fa fa-plug"></i></strong> Impossible d'établir la connexion au serveur, vérifiez les réglages de JSONAPI.
			</div>
        <?php } ?>
	</div>
</div>