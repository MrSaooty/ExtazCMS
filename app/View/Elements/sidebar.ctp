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
                        <br>
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
                                Vous avez <?php echo $tickets; ?> tickets ouverts
                            </a>
                            <?php } else { ?>
                            <font color="#555"><i class="fa fa-chevron-circle-right"></i></font>
                            <a href="<?php echo $this->Html->url(['controller' => 'pages', 'action' => 'list_tickets']); ?>">
                                Vous avez <?php echo $tickets; ?> ticket ouvert
                            </a>
                        <?php } ?>
                        <br>
                        <?php if($use_store == 1){ ?>
                        <font color="#555"><i class="fa fa-chevron-circle-right"></i></font> 
                        <a href="<?php echo $this->Html->url(['controller' => 'users', 'action' => 'account']); ?>">
                            Accéder à mon profil
                        </a>
                        <?php } ?>
                    </p>
                    <hr>
                    <?php if($use_store == 1){ ?>
                        <a href="<?php echo $this->Html->url(['controller' => 'shops', 'action' => 'reload']); ?>" class="tooltips btn-u btn-brd-hover rounded btn-u-orange btn-u-xs" data-original-title="Acheter des <?php echo $site_money; ?>" data-toggle="tooltip" data-placement="bottom" type="submit"><i class="fa fa-shopping-cart"></i> Recharger</a>
                        <a href="<?php echo $this->Html->url(['controller' => 'users', 'action' => 'logout']); ?>" class="btn-u btn-brd-hover rounded btn-u-dark btn-u-xs pull-right" type="submit"><i class="fa fa-sign-out"></i> Déconnexion</a>
                    <?php } else { ?>
                        <a href="<?php echo $this->Html->url(['controller' => 'users', 'action' => 'account']); ?>" class="btn-u btn-brd-hover rounded btn-u btn-u-xs" type="submit"><i class="fa fa-user"></i> Mon profil</a>
                        <a href="<?php echo $this->Html->url(['controller' => 'users', 'action' => 'logout']); ?>" class="btn-u btn-brd-hover rounded btn-u-dark btn-u-xs pull-right" type="submit"><i class="fa fa-sign-out"></i> Déconnexion</a>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
    <!-- End Member -->

    <!-- Information -->
    <div class="row">
        <div class="col-md-12">
            <div class="tag-box tag-box-v4">
                <?php if($api->call('server.bukkit.version')[0]['result'] == 'success'){ ?>
                <i class="fa fa-signal"></i> État du serveur : <small><span class="text-highlights text-highlights-green">En ligne</span></small><br>
                <i class="fa fa-user"></i> Joueurs connectés : <?php echo $api->call('players.online.count')[0]['success']; ?>/<?php echo $api->call('players.online.limit')[0]['success']; ?><br>
                <i class="fa fa-cube"></i> Version : <small><?php echo $api->call('server.bukkit.version')[0]['success']; ?></small>
                <?php } else { ?>
                <i class="fa fa-signal"></i> État du serveur : <small><span class="text-highlights text-highlights-red">Hors ligne</span></small>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- End Information -->
    
    <?php if($use_store == 1 && $use_donation_ladder == 1 && $nb_donator > 0){ ?>
    <!-- Donation Ladder -->
    <div class="row">
        <div class="col-md-12">
            <div class="tag-box tag-box-v4">
                <ul class="list-unstyled">
                    <li>
                        <i class="fa fa-trophy"></i> Meilleur donateur
                        <br>
                        <?php echo $this->Html->image('http://cravatar.eu/helmavatar/'.$best_donator['User']['username'].'/16'); ?> 
                        <span class="tooltips" data-original-title="<?php echo $best_donator['donationLadder']['tokens'].' '.$site_money; ?>" data-toggle="tooltip" data-placement="right"><span class="text-highlights"><?php echo $best_donator['User']['username']; ?></span></span>
                    </li>
                    <br>
                    <li>
                        <i class="fa fa-trophy"></i> Dernier donateur
                        <br>
                        <?php echo $this->Html->image('http://cravatar.eu/helmavatar/'.$last_donator['User']['username'].'/16'); ?> 
                        <span class="tooltips" data-original-title="<?php echo $last_donator['donationLadder']['tokens'].' '.$site_money; ?>" data-toggle="tooltip" data-placement="right"><span class="text-highlights"><?php echo $last_donator['User']['username']; ?></span></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Donation Ladder -->
    <?php } ?>

    <?php if(!empty($buttons)){  ?>
        <!-- Custom Buttons -->
        <div class="row">
            <div class="col-md-12">
                <div class="tag-box tag-box-v4">
                    <center>
                        <?php
                        foreach($buttons as $b){
                            echo '<a href="'.$b['Button']['url'].'" target="_blank" class="btn-u btn-u-'.$b['Button']['color'].' btn-u-xs" style="margin-bottom: 3px;margin-top: 3px" type="button"><i class="fa fa-'.$b['Button']['icon'].'"></i> '.$b['Button']['content'].'</a> ';
                        }
                        ?>
                    </center>
                </div>
            </div>
        </div>
        <!-- End Custom Buttons -->
    <?php } ?>
    </center>
</div>
<!-- End Sidebar -->