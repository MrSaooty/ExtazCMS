<?php $this->assign('title', 'Réparer'); ?>
<div class="wrapper wrapper-content">
    <div class="animated fadeInRightBig">
        <div class="row">
            <div class="col-md-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Vous rencontrez un bug ?</h5>
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
                    	Tentez de réparer le CMS avant de poster une demande d'aide sur le forum.<br>
		            	Si la réparation n'a aucun effet, alors poster un message sur ce <u><a href="http://www.bukkit.fr/index.php/topic/15381-gratuit16-extazcms-un-v%C3%A9ritable-site-pour-votre-serveur-minecraft/?view=getnewpost" target="_blank">topic</a></u>.
						<hr>
						<?php echo $this->Form->create('Pages', ['action' => 'repair']); ?>
							<div class="row">
								<div class="col-md-12">
									<button class="btn btn-w-m btn-primary pull-right"><i class="fa fa-wrench"></i> Réparer</button>
								</div>
							</div>
						<?php echo $this->Form->end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>