<?php
$this->assign('title', 'Mes informations');
$player = $api->call('players.name', [$username]);
?>
<!--=== Content Part ===-->
<div class="container content">     
    <div class="row">
        <div class="col-md-9">
            <div class="tab-v1">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#infos" data-toggle="tab">Mes infos</a></li>
                    <li><a href="#send_tokens" data-toggle="tab">Envoyer des <?php echo $site_money; ?></a></li>
                </ul>                
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="infos">
                        <?php echo $this->Form->create('User', ['action' => 'update_account', 'class' => 'sky-form']); ?>
                            <div class="reg-header">  
                                <header>Mes informations personnelles</header>
                            </div>
                            <fieldset>
                                <section>
                                    <i class="fa fa-trophy"></i> Inscrit depuis le <?php echo $this->Time->format('d/m/Y', $data['User']['created']); ?>
                                </section>
                            </fieldset>
                            <fieldset>
                                <section>
                                    <?php echo $this->Form->input('username', array('type' => 'text', 'value' => $data['User']['username'], 'class' => 'form-control', 'label' => 'Pseudo', 'disabled')); ?>
                                </section>
                            </fieldset>
                            <!-- <fieldset>
                                <section>
                                    <?php echo $this->Form->input('group', array('type' => 'text', 'value' => $api->call('worlds.world.players.player.chat.groups.primary', ['world', $username])[0]['success'], 'class' => 'form-control', 'label' => 'Groupe', 'disabled')); ?>
                                </section>
                            </fieldset> -->
                            <fieldset>
                                <section>
                                    <?php echo $this->Form->input('email', array('type' => 'text', 'value' => $data['User']['email'], 'class' => 'form-control', 'label' => 'Email', 'disabled')); ?>
                                </section>
                            </fieldset>
                            <fieldset>
                                <section>
                                    <?php echo $this->Form->input('password', array('type' => 'password', 'placeholder' => 'Nouveau mot de passe', 'class' => 'form-control', 'label' => 'Mot de passe', 'required' => false)); ?>
                                </section>
                            </fieldset>
                            <fieldset>
                                <section>
                                    <?php echo $this->Form->input('password_confirmation', array('type' => 'password', 'placeholder' => 'Confirmation', 'class' => 'form-control', 'label' => 'Mot de passe')); ?>
                                </section>
                            </fieldset>
                            <fieldset>
                                <section>
                                    Acceptez-vous de recevoir des email ?
                                    <label class="toggle pull-right">
                                        <input type="checkbox" name="allow_email" <?php if($allow_email == 1) echo 'checked="checked"'; ?>><i></i>
                                    </label>
                                </section>
                            </fieldset>
                            <footer>
                                <button class="btn-u pull-right" type="submit">Enregistrer les modifications</button>
                            </footer>
                        <?php echo $this->Form->end(); ?>
                    </div>
                    <div class="tab-pane fade in" id="send_tokens">
                        <?php echo $this->Form->create('Pages', ['action' => 'send_tokens', 'class' => 'sky-form']); ?>
                            <div class="reg-header">  
                                <header>Envoyer des tokens à un autre joueur</header>
                            </div>
                            <fieldset>
                                <section>
                                    <i class="fa fa-info-circle"></i> Vous avez <?php echo $tokens.' '.$site_money; ?>
                                </section>
                            </fieldset>
                            <fieldset>
                                <section>
                                    <?php echo $this->Form->input('username', array('type' => 'text', 'class' => 'form-control', 'label' => 'Pseudo du destinataire')); ?>
                                </section>
                            </fieldset>
                            <fieldset>
                                <section>
                                    <?php echo $this->Form->input('nb_tokens', array('type' => 'number', 'class' => 'form-control', 'label' => 'Nombre de '.$site_money.' à envoyer')); ?>
                                </section>
                            </fieldset>
                            <footer>
                                <button class="btn-u pull-right" type="submit">Envoyer</button>
                            </footer>
                        <?php echo $this->Form->end(); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php echo $this->element('sidebar'); ?>
    </div><!--/row-->
</div><!--/container-->     
<!--=== End Content Part ===-->