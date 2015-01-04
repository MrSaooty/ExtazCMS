<!-- Begin Sidebar -->
<div class="col-md-3">
    <!-- Member -->
    <div class="row">
        <div class="col-md-12">
            <?php if(!$connected){ ?>
                <div class="tag-box tag-box-v4">
                    <?php echo $this->Form->create('User', ['action' => 'login']); ?>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <?php echo $this->Form->input('username', array('type' => 'text', 'placeholder' => 'Pseudo', 'class' => 'form-control input-sm', 'label' => false, 'required' => 'required')); ?>
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <?php echo $this->Form->input('password', array('type' => 'password', 'placeholder' => 'Mot de passe', 'class' => 'form-control input-sm', 'label' => false, 'required')); ?>
                        </div>
                        <br>
                        <div class="pull-right">
                            <a href="<?php echo $this->Html->url(['controller' => 'users', 'action' => 'forgot_password']); ?>" class="btn-u btn-brd-hover rounded btn-u-dark btn-u-xs tooltips" data-original-title="Mot de passe oublié" data-toggle="tooltip" data-placement="bottom" type="submit"><i class="fa fa-question-circle"></i></a>
                            <a href="<?php echo $this->Html->url(['controller' => 'users', 'action' => 'signup']); ?>" class="btn-u btn-brd-hover rounded btn-u-dark btn-u-xs" type="submit">Inscription</a>
                            <button class="btn-u btn-brd-hover rounded btn-u btn-u-xs" type="submit">Connexion</button>
                        </div>
                        <br>                       
                    <?php echo $this->Form->end(); ?>
                </div>
            <?php } else { ?>
                <div class="tag-box tag-box-v4">
                   <p class="lead">
                        <?php echo $this->Html->image('http://cravatar.eu/helmavatar/'.$username.'', ['alt' => 'Player head', 'style' => 'margin-top:-4px;']); ?> 
                        <?php echo $username; ?>
                   </p>
                   <hr>
                   <?php if($use_store == 1 && $happy_hour == 1){ ?>
                   	    <h4><font color="#555"><i class="fa fa-gift"></i></font> Happy hour en cours !</h4>
                   	    <hr>
                   <?php } ?>
                   <p>
                        <?php if($use_store == 1){ ?>
                            <font color="#555"><i class="fa fa-chevron-circle-right"></i></font> 
                            <a href="<?php echo $this->Html->url(['controller' => 'shops', 'action' => 'reload']); ?>">
                                Vous avez <?php echo number_format($tokens, 0, ' ', ' ').' '.$site_money; ?>
                            </a>
                            <br>
                        <?php } ?>
                        <?php if($tickets > 1){ ?>
                            <font color="#555"><i class="fa fa-chevron-circle-right"></i></font> 
                            <a href="<?php echo $this->Html->url(['controller' => 'pages', 'action' => 'list_tickets']); ?>">
                                Vous avez <?php echo $tickets; ?> tickets en attente
                            </a>
                            <?php } else { ?>
                            <font color="#555"><i class="fa fa-chevron-circle-right"></i></font> 
                            <a href="<?php echo $this->Html->url(['controller' => 'pages', 'action' => 'list_tickets']); ?>">
                                Vous avez <?php echo $tickets; ?> ticket en attente
                            </a>
                        <?php } ?>
                        <?php if($role == 1){ ?>
                            <br>
                            <font color="#555"><i class="fa fa-chevron-circle-right"></i></font> 
                            <a href="<?php echo $this->Html->url(['controller' => 'pages', 'action' => 'manage_tickets']); ?>">
                                Gérer les tickets du support (<?php echo $nbTicketsAdmin; ?>)
                            </a>
                        <?php } ?>
                   </p>
                   <hr>
                   <a href="<?php echo $this->Html->url(['controller' => 'users', 'action' => 'account']); ?>" class="btn-u btn-brd-hover rounded btn-u btn-u-xs" type="submit"><i class="fa fa-user"></i> Mon profil</a>
                   <a href="<?php echo $this->Html->url(['controller' => 'users', 'action' => 'logout']); ?>" class="btn-u btn-brd-hover rounded btn-u-dark btn-u-xs" type="submit"><i class="fa fa-sign-out"></i> Déconnexion</a>
                </div>
            <?php } ?>
        </div>
    </div>
    <!-- End Member -->

    <!-- Information -->
    <div class="row">
        <div class="col-md-12">
            <div class="tag-box tag-box-v4">
                <?php if($api->call('server.bukkit.version') == true){ ?>
                <i class="fa fa-signal"></i> État du serveur : <small><span class="text-highlights text-highlights-green">En ligne</span></small><br>
                <i class="fa fa-user"></i> Joueurs connectés : <?php echo $api->call('players.online.count')[0]['success']; ?>/<?php echo $api->call('players.online.limit')[0]['success']; ?><br>
                <?php $version = file_get_contents('http://api.serveurs-minecraft.com/api.php?Version_Query&ip='.$server_ip.'&port='.$server_port.''); ?>
                <?php $test_version = substr($version, 0, 5); if($test_version == 'Could') $version = '???'; ?>
                <i class="fa fa-cube"></i> Version : <small><?php echo $version; ?></small>
                <?php } else { ?>
                <i class="fa fa-signal"></i> État du serveur : <small><span class="text-highlights text-highlights-red">Hors ligne</span></small>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- End Information -->
    
    <?php if($use_store == 1 && $use_donation_ladder == 1 && $nbDonator > 0){ ?>
    <!-- Donation Ladder -->
    <div class="row">
        <div class="col-md-12">
            <div class="tag-box tag-box-v4">
                <ul class="list-unstyled">
                    <li>
                        <i class="fa fa-trophy"></i> Meilleur donateur
                        <br>
                        <?php echo $this->Html->image('http://cravatar.eu/helmavatar/'.$bestDonator['User']['username'].'/16'); ?> 
                        <span class="tooltips" data-original-title="<?php echo $bestDonator['donationLadder']['tokens'].' '.$site_money; ?>" data-toggle="tooltip" data-placement="right"><span class="text-highlights"><?php echo $bestDonator['User']['username']; ?></span></span>
                    </li>
                    <br>
                    <li>
                        <i class="fa fa-trophy"></i> Dernier donateur
                        <br>
                        <?php echo $this->Html->image('http://cravatar.eu/helmavatar/'.$lastDonator['User']['username'].'/16'); ?> 
                        <span class="tooltips" data-original-title="<?php echo $lastDonator['donationLadder']['tokens'].' '.$site_money; ?>" data-toggle="tooltip" data-placement="right"><span class="text-highlights"><?php echo $lastDonator['User']['username']; ?></span></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Donation Ladder -->
    <?php } ?>

    <?php if(!empty($facebook_url) OR !empty($twitter_url)){  ?>
        <!-- Social Network -->
        <div class="row">
            <div class="col-md-12">
                <div class="tag-box tag-box-v4">
                    <center>
                        <p class="lead">
                            Réseaux sociaux
                        </p>
                        <br>
                        <?php if(!empty($facebook_url)){ ?>
                            <a href="<?php echo $facebook_url ?>" target="_blank" class="btn-u btn-u-blue btn-u-xs" type="button" style="margin-bottom:6px;"><i class="fa fa-facebook-square"></i> Facebook</a>
                        <?php } ?>
                        <?php if(!empty($twitter_url)){ ?>
                                <a href="<?php echo $twitter_url ?>" target="_blank" class="btn-u btn-u-aqua btn-u-xs" type="button"><i class="fa fa-twitter"></i> Twitter</a>
                        <?php } ?>
                    </center>
                </div>
            </div>
        </div>
        <!-- End Social Network -->
    <?php } ?>
    </center>
</div>
<!-- End Sidebar -->