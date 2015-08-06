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
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 3000
                };
                if(data.result == 'success'){
                    toastr.success('', 'Connexion effectuée avec succès !');
                }
                else{
                    toastr.error('', 'Impossible d\'établir la connexion');
                }
            }, 
        'json');
    });
    <?php
    if(array_key_exists('tab', $this->request->query)){
        if($this->request->query['tab'] == 'options'){
            ?>
            $('#tab1').removeClass('active');
            $('#tab5').addClass('active');
            $('#tab-1').removeClass('active');
            $('#tab-5').addClass('active');
            <?php
        }
    }
    ?>
});
</script>
<div class="wrapper wrapper-content">
    <div class="animated fadeInRightBig"> 
        <div class="row">
            <div class="col-md-12">
                <div class="tabs-container">
                    <ul class="nav nav-tabs">
                        <li class="active" id="tab1"><a href="#tab-1" data-toggle="tab" aria-expanded="true">Général</a></li>
                        <li id="tab2"><a href="#tab-2" data-toggle="tab" aria-expanded="true">Votes</a></li>
                        <li id="tab3"><a href="#tab-3" data-toggle="tab" aria-expanded="true">JSONAPI</a></li>
                        <li id="tab4"><a href="#tab-4" data-toggle="tab" aria-expanded="true">Starpass/PayPal</a></li>
                        <li id="tab5"><a href="#tab-5" data-toggle="tab" aria-expanded="true">Options</a></li>
                        <li id="tab6"><a href="#tab-6" data-toggle="tab" aria-expanded="true">Réglement</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab-1" class="general tab-pane active">
                            <div class="panel-body">
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
                                    'send_tokens_loss_rate' => ['label' => 'Taux de '.$site_money.' perdu lors d\'un transfert (en %)', 'type' => 'text'],
                                    'customs_buttons_title' => ['label' => 'Titre du module des boutons customisables', 'type' => 'text']
                                    ]; ?>
                                    <?php foreach($informations as $k => $v){ ?>
                                    <div class="form-group">
                                        <?php echo $this->Form->input($k, array('type' => $v['type'], 'value' => $data['Informations'][$k], 'class' => 'form-control', 'label' => $v['label'])); ?>
                                    </div>
                                    <?php } ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <hr>
                                            <button class="btn btn-w-m btn-primary pull-right" type="submit"><i class="fa fa-check"></i> Confirmer les modifications</button>
                                        </div>
                                    </div>
                                <?php echo $this->Form->end(); ?>
                            </div>
                        </div>
                        <div id="tab-2" class="tab-pane">
                            <div class="panel-body">
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
                                    <div class="row">
                                        <div class="col-md-12">
                                            <hr>
                                            <button class="btn btn-w-m btn-primary pull-right" type="submit"><i class="fa fa-check"></i> Confirmer les modifications</button>
                                        </div>
                                    </div>
                                <?php echo $this->Form->end(); ?>
                            </div>
                        </div>
                        <div id="tab-3" class="tab-pane">
                            <div class="panel-body">
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
                                    <div class="row">
                                        <div class="col-md-12">
                                            <hr>
                                            <button class="btn btn-w-m btn-primary test-jsonapi"><i class="fa fa-globe"></i> Tester la connexion</button>
                                            <button class="btn btn-w-m btn-primary loading" style="display:none;"><i class="fa fa-refresh fa-spin"></i> Connexion en cours...</button>
                                            <button class="btn btn-w-m btn-primary pull-right" type="submit"><i class="fa fa-check"></i> Confirmer les modifications</button>
                                        </div>
                                    </div>
                                <?php echo $this->Form->end(); ?>
                            </div>
                        </div>
                        <div id="tab-4" class="tab-pane">
                            <div class="panel-body">
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
                                    <div class="row">
                                        <div class="col-md-12">
                                            <hr>
                                            <button class="btn btn-w-m btn-primary pull-right" type="submit"><i class="fa fa-check"></i> Confirmer les modifications</button>
                                        </div>
                                    </div>
                                <?php echo $this->Form->end(); ?>
                            </div>
                        </div>
                        <div id="tab-5" class="options tab-pane">
                            <div class="panel-body">
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
                                    'Afficher les nombre de vues sur les actualités' => 'use_posts_views',
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
                                                <div class="onoffswitch"><input name="<?php echo $v; ?>" type="checkbox" class="checkboxes onoffswitch-checkbox" <?php if($config[$v] == 1) echo 'checked="checked"'; ?> id="onoffswitch<?php echo $nb; ?>">
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
                                    <div class="row">
                                        <div class="col-md-12">
                                            <hr>
                                            <button class="btn btn-w-m btn-primary pull-right" type="submit"><i class="fa fa-check"></i> Confirmer les modifications</button>
                                        </div>
                                    </div>
                                <?php echo $this->Form->end(); ?>
                            </div>
                        </div>
                        <div id="tab-6" class="tab-pane">
                            <div class="panel-body">
                                <?php echo $this->Form->create('Informations', ['action' => 'update_informations']); ?>
                                    <?php $informations = [
                                    'rules' => 'Editer le réglement'
                                    ]; ?>
                                    <?php foreach($informations as $k => $v){ ?>
                                    <div class="form-group">
                                        <?php echo $this->Form->textarea($k, array('type' => 'text', 'value' => $data['Informations'][$k], 'class' => 'ckeditor', 'label' => $v)); ?>
                                    </div>
                                    <?php } ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <hr>
                                            <button class="btn btn-w-m btn-primary pull-right" type="submit"><i class="fa fa-check"></i> Confirmer les modifications</button>
                                        </div>
                                    </div>
                                <?php echo $this->Form->end(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>