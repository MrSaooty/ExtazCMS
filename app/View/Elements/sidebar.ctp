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
                            <a href="<?php echo $this->Html->url(['controller' => 'users', 'action' => 'forgot_password']); ?>" class="btn-u btn-u-dark btn-u-xs tooltips" data-original-title="Mot de passe oublié" data-toggle="tooltip" data-placement="bottom" type="submit"><i class="fa fa-question"></i></a>
                            <a href="<?php echo $this->Html->url(['controller' => 'users', 'action' => 'signup']); ?>" class="btn-u btn-u-dark btn-u-xs" type="submit">Inscription</a>
                            <button class="btn-u btn-u btn-u-xs" type="submit">Connexion</button>
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
                   <p>
                        <?php if($role > 0){ ?>
                            <font color="#555"><i class="fa fa-angle-double-right"></i></font>
                            <a href="<?php echo $this->Html->url(['controller' => 'pages', 'action' => 'stats', 'admin' => true]); ?>">
                                Accéder à l'administration
                            </a>
                            <br>
                        <?php } ?>
                        <?php if($use_store == 1){ ?>
                            <font color="#555"><i class="fa fa-angle-double-right"></i></font>
                            <a href="<?php echo $this->Html->url(['controller' => 'shops', 'action' => 'reload']); ?>">
                                Vous avez <span class="open-sans"><?php echo number_format($tokens, 0, ' ', ' ').'</span> '.$site_money; ?>
                            </a>
                            <br>
                        <?php } ?>
                        <font color="#555"><i class="fa fa-angle-double-right"></i></font>
                        <a href="<?php echo $this->Html->url(['controller' => 'pages', 'action' => 'list_tickets']); ?>">
                            <?php
                            if($tickets > 1){
                                echo 'Vous avez <span class="open-sans">'.$tickets.'</span> tickets ouverts';
                            }
                            else{
                                echo 'Vous avez <span class="open-sans">'.$tickets.'</span> ticket ouvert';
                            }
                            ?>
                        </a>
                        <br>
                        <?php if($use_store == 1){ ?>
                        <font color="#555"><i class="fa fa-angle-double-right"></i></font> 
                        <a href="<?php echo $this->Html->url(['controller' => 'users', 'action' => 'account']); ?>">
                            Accéder à mon profil
                        </a>
                        <?php } ?>
                    </p>
                    <hr>
                    <?php if($use_store == 1){ ?>
                        <a href="<?php echo $this->Html->url(['controller' => 'shops', 'action' => 'reload']); ?>" class="tooltips btn-u btn-brd-hover btn-u-orange btn-u-xs" data-original-title="Acheter des <?php echo $site_money; ?>" data-toggle="tooltip" data-placement="bottom" type="submit"><i class="fa fa-shopping-cart"></i> Recharger</a>
                        <a href="<?php echo $this->Html->url(['controller' => 'users', 'action' => 'logout']); ?>" class="btn-u btn-brd-hover btn-u-dark btn-u-xs pull-right" type="submit"><i class="fa fa-sign-out"></i> Déconnexion</a>
                    <?php } else { ?>
                        <a href="<?php echo $this->Html->url(['controller' => 'users', 'action' => 'account']); ?>" class="btn-u btn-brd-hover btn-u btn-u-xs" type="submit"><i class="fa fa-user"></i> Mon profil</a>
                        <a href="<?php echo $this->Html->url(['controller' => 'users', 'action' => 'logout']); ?>" class="btn-u btn-brd-hover btn-u-dark btn-u-xs pull-right" type="submit"><i class="fa fa-sign-out"></i> Déconnexion</a>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
    <!-- End Member -->

    <!-- Players -->
    <div class="row">
        <div class="col-md-12">
            <div class="tag-box tag-box-v4">
                <?php if($api->call('server.bukkit.version')[0]['result'] == 'success'){ ?>
                <?php
                $players = $count_players;
                $max_players = $api->call('players.online.limit')[0]['success'];
                $pourcent = $players * 100 / $max_players;
                ?>
                <div class="progress progress-u progress-sm">
                    <div class="progress-bar progress-bar-dark" role="progressbar" aria-valuenow="<?php echo $players; ?>" aria-valuemin="0" aria-valuemax="<?php echo $max_players; ?>" style="width: <?php echo $pourcent; ?>%">
                    </div>
                </div>
                <center><i class="fa fa-users"></i> Joueurs connectés : <span class="open-sans"><?php echo $players; ?>/<?php echo $max_players; ?></span></center>
                <?php } else { ?>
                <i class="fa fa-user"></i> Joueurs connectés : <span class="open-sans"><?php echo $players; ?>/<?php echo $max_players; ?></span><br>
                <div class="progress progress-u progress-sm">
                    <div class="progress-bar progress-bar-dark" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0>%">
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- End Players -->

    <!-- Information -->
    <div class="row">
        <div class="col-md-12">
            <div class="tag-box tag-box-v4">
                <div id="testimonials-3" class="carousel slide testimonials testimonials-v1" style="margin-top: -10px;">
                    <div class="carousel-inner">
                        <div class="item active">
                            <?php if($api->call('server.bukkit.version')[0]['result'] == 'success'){ ?>
                                <div class="testimonial-info center">
                                    <span class="testimonial-author">
                                        <i class="fa fa-shield"></i> Serveur en ligne
                                        <br>
                                        <span class="text-default">
                                            <small><?php echo $api->call('server.bukkit.version')[0]['success']; ?></small>
                                        </span>
                                    </span>
                                </div>
                            <?php } else { ?>
                                <div class="testimonial-info center">
                                    <span class="testimonial-author">
                                        <font color="red"><i class="fa fa-power-off"></i> Serveur hors ligne</font>
                                        <br>
                                        <span class="text-default">
                                            <small><?php echo $api->call('server.bukkit.version')[0]['success']; ?></small>
                                        </span>
                                    </span>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Donation Information -->

    <?php if($use_store == 1 && $use_donation_ladder == 1 && $nb_donator > 0){ ?>
    <!-- Donation Ladder -->
    <div class="row">
        <div class="col-md-12">
            <div class="tag-box tag-box-v4">
                <div id="testimonials-3" class="carousel slide testimonials testimonials-v1">
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="testimonial-info">
                                <?php echo $this->Html->image('http://cravatar.eu/helmavatar/'.$best_donator['User']['username'].'/40', ['class' => 'rounded-2x']); ?>
                                <span class="testimonial-author">
                                    <?php echo $this->Html->link($best_donator['User']['username'], ['controller' => 'users', 'action' => 'profile', 'username' => $best_donator['User']['username']]); ?>
                                    <br>
                                    <span class="text-muted">
                                        <small>Meilleur donateur</small>
                                    </span>
                                </span>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-info">
                            <?php echo $this->Html->image('http://cravatar.eu/helmavatar/'.$last_donator['User']['username'].'/40', ['class' => 'rounded-2x']); ?>
                                <span class="testimonial-author">
                                    <?php echo $this->Html->link($last_donator['User']['username'], ['controller' => 'users', 'action' => 'profile', 'username' => $last_donator['User']['username']]); ?>
                                    <br>
                                    <span class="text-muted">
                                        <small>Dernier donateur</small>
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
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