<?php $this->assign('title', 'Réglement du serveur '.$name_server.''); ?>
<!--=== Content Part ===-->
<div class="container content">
    <div class="row magazine-page">
        <!-- Begin Content -->
        <div class="col-md-9">
            <?php
            if(!empty($rules)){
            	echo $rules;
            }
            else{
            	?>
            	<div class="servive-block servive-block-default">
	                <i class="icon-custom icon-color-dark rounded-x fa fa-info-circle"></i>
	                <h2 class="heading-md">Aucun résultat</h2>
	                <p>Le réglement n'a pas encore été rédigé</p>                        
	            </div>
            	<?php
            }
            ?>
        </div>
        <!-- End Content -->
        <?php echo $this->element('sidebar'); ?>
    </div>
</div><!--/container-->     
<!-- End Content Part -->