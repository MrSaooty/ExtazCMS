<?php $this->assign('title', 'Configuration du CMS'); ?>
<script>
$(document).ready(function(){
    $('.loading').on('click', function(event){
        event.preventDefault();
    });
    $('.test-jsonapi').on('click', function(event){
        event.preventDefault();
        var ip = $('#InformationsJsonapiIp').val();
        var port = $('#InformationsJsonapiPort').val();
        var username = $('#InformationsJsonapiUsername').val();
        var password = $('#InformationsJsonapiPassword').val();
        var salt = $('#InformationsJsonapiSalt').val();
        var url = '<?php echo $this->Html->url(array('controller' => 'informations', 'action' => 'test_jsonapi')); ?>';
        $('.test-jsonapi').hide();
        $('.loading').show();
        $.post(url, {ip: ip, port: port, username: username, password: password, salt: salt}, 
            function(data){
                $('.loading').hide();
                $('.test-jsonapi').show();
                if(data.result == 'success'){
                    humane.log("<i class='fa fa-check'></i> Connexion effectuée avec succès !", { timeout: 2000, clickToClose: true, addnCls: 'humane-flatty-success' });
                }
                else{
                    humane.log("<i class='fa fa-times'></i> Impossible d'établir la connexion", { timeout: 2000, clickToClose: true, addnCls: 'humane-flatty-error' });
                }
            }, 
        'json');
    });
    <?php
    if(array_key_exists('tab', $this->request->query)){
        if($this->request->query['tab'] == 'options'){
            ?>
            $('.general').removeClass().addClass('general tab-pane fade in');
            $('.options').removeClass().addClass('options tab-pane fade in active');
            $('.li-general').removeClass().addClass('li-general');
            $('.li-options').addClass('active');
            <?php
        }
    }
    ?>
});
</script>
<div class="main-content">
    <div class="container">  
        <div class="row">
            <div class="col-md-9">
                <div class="tab-v1">
                    <ul class="nav nav-tabs nav-justified">
                        <li class="li-general active" id="tab1"><a href="#tab-1" data-toggle="tab">Général</a></li>
                        <li class="" id="tab2"><a href="#tab-2" data-toggle="tab">Votes</a></li>
                        <li class="" id="tab3"><a href="#tab-3" data-toggle="tab">JSONAPI</a></li>
                        <li class="" id="tab4"><a href="#tab-4" data-toggle="tab">Starpass/PayPal</a></li>
                        <li class="li-options" id="tab5"><a href="#tab-5" data-toggle="tab">Options</a></li>
                        <li class="" id="tab6"><a href="#tab-6" data-toggle="tab">Réglement</a></li>
                    </ul>       
                    <div class="tab-content">
                        <div class="general tab-pane fade active in" id="tab-1">
                            <?php echo $this->Form->create('Informations', ['action' => 'update_informations']); ?>
                                <?php $informations = [
                                'name_server' => ['label' => 'Nom du serveur', 'type' => 'text'], 
                                'ip_server' => ['label' => 'IP du serveur', 'type' => 'text'], 
                                'port_server' => ['label' => 'Port du serveur', 'type' => 'number'], 
                                'money_server' => ['label' => 'Monnaie du serveur (Si vous autorisez le paiement via celle-ci)', 'type' => 'text'], 
                                'site_money' => ['label' => 'Nom de la monnaie du site (Si vous utilisez la boutique)', 'type' => 'text'], 
                                'contact_email' => ['label' => 'Votre email pour la page contact', 'type' => 'text'], 
                                'logo_url' => ['label' => 'URL de votre logo', 'type' => 'url'], 
                                'chat_prefix' => ['label' => 'Prefix pour le chat', 'type' => 'text'], 
                                'chat_nb_messages' => ['label' => 'Nombres de messages à afficher dans le chat', 'type' => 'number'], 
                                'analytics' => ['label' => 'ID Google Analytics (Facultatif)', 'type' => 'number'], 
                                'send_tokens_loss_rate' => ['label' => 'Taux de '.$site_money.' perdu lors d\'un transfert (en %)', 'type' => 'text']
                                ]; ?>
                                <?php foreach($informations as $k => $v){ ?>
                                <div class="form-group">
                                    <?php echo $this->Form->input($k, array('type' => $v['type'], 'value' => $data['Informations'][$k], 'class' => 'form-control', 'label' => $v['label'])); ?>
                                </div>
                                <?php } ?>
                                <button class="btn btn-black pull-right" type="submit"><i class="fa fa-check"></i> Confirmer les modifications</button><br>
                            <?php echo $this->Form->end(); ?>
                        </div>
                        <div class="tab-pane fade" id="tab-2">
                            <?php echo $this->Form->create('Informations', ['action' => 'update_informations']); ?>
                                <?php $informations = [
                                'votes_url' => ['label' => 'URL de vote', 'type' => 'text'],
                                'votes_description' => ['label' => 'Description', 'type' => 'text'],
                                'votes_time' => ['label' => 'Temps entre deux votes (en minutes)', 'type' => 'number'],
                                'votes_reward' => ['label' => 'Nombre de '.$site_money.' gagné pour un vote', 'type' => 'number'],
                                'votes_command' => ['label' => 'Commande(s) à éxécuter après chaque vote (facultatif)', 'type' => 'text'],
                                'votes_ladder_limit' => ['label' => 'Nombre de joueurs à afficher dans la classement', 'type' => 'number']
                                ]; ?>
                                <?php foreach($informations as $k => $v){ ?>
                                <div class="form-group">
                                    <?php echo $this->Form->input($k, array('type' => $v['type'], 'value' => $data['Informations'][$k], 'class' => 'form-control', 'label' => $v['label'])); ?>
                                </div>
                                <?php } ?>
                                <button class="btn btn-black pull-right" type="submit"><i class="fa fa-check"></i> Confirmer les modifications</button><br>
                            <?php echo $this->Form->end(); ?>
                        </div>
                        <div class="tab-pane fade" id="tab-3">
                            <?php echo $this->Form->create('Informations', ['action' => 'update_informations']); ?>
                                <?php $informations = [
                                'jsonapi_ip' => 'IP du serveur pour JSONAPI', 
                                'jsonapi_port' => 'Port pour JSONAPI', 
                                'jsonapi_username' => 'Nom d\'utilisateur JSONAPI',
                                'jsonapi_password' => 'Mot de passe JSONAPI',
                                'jsonapi_salt' => 'Salt JSONAPI (Facultatif)'
                                ]; ?>
                                <?php foreach($informations as $k => $v){ ?>
                                <div class="form-group">
                                    <?php echo $this->Form->input($k, array('type' => 'text', 'value' => $data['Informations'][$k], 'class' => 'form-control', 'label' => $v)); ?>
                                </div>
                                <?php } ?>
                                <button class="btn btn-black test-jsonapi"><i class="fa fa-globe"></i> Tester la connexion</button>
                                <button class="btn btn-black loading" style="display:none;"><i class="fa fa-refresh fa-spin"></i> Connexion en cours...</button>
                                <button class="btn btn-black pull-right" type="submit"><i class="fa fa-check"></i> Confirmer les modifications</button><br>
                            <?php echo $this->Form->end(); ?>
                        </div>
                        <div class="tab-pane fade" id="tab-4">
                            <?php echo $this->Form->create('Informations', ['action' => 'update_informations']); ?>
                                <?php $informations = [
                                'starpass_idp' => 'IDP Starpass',
                                'starpass_idd' => 'IDD Starpass',
                                'starpass_tokens' => 'Nombre d\'argent gagné sur le site pour un code Starpass valide',
                                'paypal_price' => 'Prix pour PayPal (en €)',
                                'paypal_tokens' => 'Nombre d\'argent gagné sur le site pour un achat via PayPal',
                                'paypal_email' => 'Votre email PayPal pour recevoir les paiements',
                                'happy_hour_bonus' => 'Bonus d\'happy hour (en %)'
                                ]; ?>
                                <?php foreach($informations as $k => $v){ ?>
                                <div class="form-group">
                                    <?php echo $this->Form->input($k, array('type' => 'text', 'value' => $data['Informations'][$k], 'class' => 'form-control', 'label' => $v)); ?>
                                </div>
                                <?php } ?>
                                <button class="btn btn-black pull-right" type="submit"><i class="fa fa-check"></i> Confirmer les modifications</button><br>
                            <?php echo $this->Form->end(); ?>
                        </div>
                        <div class="options tab-pane fade" id="tab-5">
                            <?php echo $this->Form->create('Informations', ['action' => 'update_options']); ?>
                                <?php
                                $informations = [
                                'Activer le slider' => 'use_slider',
                                'Activer les captchas' => 'use_captcha',
                                'Utiliser le système de vote' => 'use_votes',
                                'Utiliser le classement des votes' => 'use_votes_ladder',
                                'Afficher la page équipe' => 'use_team',
                                'Afficher la page de contact' => 'use_contact',
                                'Afficher la page du règlement' => 'use_rules',
                                'Activer la boutique' => 'use_store',
                                'Activer le module "meilleur donateur"' => 'use_donation_ladder',
                                'Activer le paiement via PayPal' => 'use_paypal',
                                'Votre serveur utilise-t-il un système d\'économie' => 'use_economy',
                                'Voulez vous autoriser le paiement via la monnaie du serveur dans la boutique' => 'use_server_money',
                                'Happy hour activée' => 'happy_hour',
                                'Maintenance activé' => 'maintenance'
                                ];
                                $nb = 0;
                                foreach($informations as $k => $v){
                                    $nb++;
                                    ?>
                                    <div class="form-group">
                                        <b><?php echo $k; ?> ?</b>
                                        <div class="sw-red margin-right-15 pull-left">
                                            <div class="onoffswitch"><input name="<?php echo $v; ?>" type="checkbox" class="checkboxes onoffswitch-checkbox" <?php if($infos[$v] == 1) echo 'checked="checked"'; ?> id="onoffswitch<?php echo $nb; ?>">
                                                <label for="onoffswitch<?php echo $nb; ?>" class="onoffswitch-label">
                                                    <div class="onoffswitch-inner"></div>
                                                    <div class="onoffswitch-switch"></div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                                <hr>
                                <button class="btn btn-black pull-right" type="submit"><i class="fa fa-check"></i> Confirmer les modifications</button><br>
                            <?php echo $this->Form->end(); ?>
                        </div>
                        <div class="tab-pane fade" id="tab-6">
                            <?php echo $this->Form->create('Informations', ['action' => 'update_informations']); ?>
                                <?php $informations = [
                                'rules' => 'Editer le réglement'
                                ]; ?>
                                <?php foreach($informations as $k => $v){ ?>
                                <div class="form-group">
                                    <?php echo $this->Form->textarea($k, array('type' => 'text', 'value' => $data['Informations'][$k], 'class' => 'ckeditor', 'label' => $v)); ?>
                                </div>
                                <?php } ?>
                                <button class="btn btn-black pull-right" type="submit"><i class="fa fa-check"></i> Confirmer les modifications</button><br>
                            <?php echo $this->Form->end(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>