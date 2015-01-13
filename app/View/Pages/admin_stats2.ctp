<?php $this->assign('title', 'Statistiques'); ?>
<div class="main-content">
	<div class="container">
		<div id="piewrapper" style="display: block; float: left; width:90%; margin-bottom: 20px;"></div>
        <div class="clear"></div>
        <?php echo $this->Highcharts->render($chartName); ?>
	</div>
</div>