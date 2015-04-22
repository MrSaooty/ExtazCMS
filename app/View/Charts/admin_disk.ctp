<?php $this->assign('title', 'Statistiques'); ?>
<div class="main-content">
	<div class="container">
		<div class="page-content" style="width:750px;">
			<div id="disk_chart"></div>
		</div>
		<?php echo $this->Highcharts->render($chartName); ?>
	</div>
</div>