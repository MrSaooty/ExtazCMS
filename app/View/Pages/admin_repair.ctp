<?php $this->assign('title', 'Réparer'); ?>
<div class="main-content">
    <div class="container">
        <div class="row">
        	<div class="col-md-4">
        		<div class="page-content">
		            <div class="single-head">
		                <h3 class="pull-left">Vous rencontrez un bug ?</h3>
		                <div class="clearfix"></div>
		            </div>
		            	Tentez de réparer le CMS avant de poster une demande d'aide sur le forum.<br>
		            	Si la réparation n'a aucun effet, alors poster un message sur ce <u><a href="http://www.bukkit.fr/index.php/topic/15381-gratuit16-extazcms-un-v%C3%A9ritable-site-pour-votre-serveur-minecraft/?view=getnewpost" target="_blank">topic</a></u>.<br><br>

		            	<small>
		            		Comment ça marche ? Le CMS récupére les correctifs via GitHub puis il les installe lui même.
		            	</small>
						<hr>
						<?php echo $this->Form->create('Pages', ['action' => 'repair']); ?>
							<button class="btn btn-black pull-right"><i class="fa fa-wrench"></i> Réparer</button>
						<?php echo $this->Form->end(); ?>
						<br>
		            </div>
		        </div>
        	</div>
        	<div class="col-md-8">
        	</div>
        </div>
    </div>
</div>