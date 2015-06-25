<?php $this->assign('title', 'Vote et gagne'); ?>
<!--=== Content Part ===-->
<div class="container content">
    <div class="row magazine-page">
        <!-- Begin Content -->
        <div class="col-md-9">
        	<div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><i class="fa fa-thumbs-up"></i> Vote et gagne !</h4>
                </div>
                <div class="panel-body">
					<div class="alert alert-info">
						<i class="fa fa-info-circle"></i>
		        		<?php
				        if($nb_votes == 0){
				        	echo "Vous n'avez jamais voté pour le serveur";
				        }
				        else{
				        	echo "Vous avez voté $nb_votes fois pour le serveur, merci";
				        }
				        ?>
		        	</div>
		        	<center>
				        <h3>
					        <?php echo $votes_description; ?><br><br>
						</h3>
						<hr>
			            <a href="<?php echo $votes_url; ?>" class="btn-u btn-u-dark btn-u-lg" target="_blank" onclick="window.location.href='<?php echo $this->Html->url(['controller' => 'votes', 'action' => 'vote']); ?>';">
			            	Voter pour <?php echo $name_server; ?>
			            </a>
			        </center>
                </div>
            </div>
        </div>
        <!-- End Content -->
        <?php echo $this->element('sidebar'); ?>
    </div>
</div><!--/container-->     
<!-- End Content Part -->