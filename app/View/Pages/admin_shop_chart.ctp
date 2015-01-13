<?php $this->assign('title', 'Statistiques'); ?>
<div class="main-content">
	<div class="container">
		<div class="page-content" style="width:1090px;">
			<div id="shop_chart"></div>
	        <?php echo $this->Highcharts->render($chartName); ?>
		</div>
	</div>
</div>