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
                        <li class="" id="tab2"><a href="#tab-2" data-toggle="tab">JSONAPI</a></li>
                        <li class="" id="tab3"><a href="#tab-3" data-toggle="tab">Starpass/PayPal</a></li>
                        <li class="li-options" id="tab4"><a href="#tab-4" data-toggle="tab">Options</a></li>
                        <li class="" id="tab5"><a href="#tab-5" data-toggle="tab">Réglement</a></li>
                    </ul>       
                    <div class="tab-content">
                        <div class="general tab-pane fade active in" id="tab-1">
                            <?php echo $this->Form->create('Informations', ['action' => 'update_informations']); ?>
                                <?php $informations = [
                                'name_server' => 'Nom du serveur', 
                                'ip_server' => 'IP du serveur', 
                                'port_server' => 'Port du serveur', 
                                'money_server' => 'Monnaie du serveur (Si vous autorisez le paiement via celle-ci)',
                                'site_money' => 'Nom de la monnaie du site (Si vous utilisez la boutique)',
                                'contact_email' => 'Votre email pour la page contact',
                                'logo_url' => 'URL de votre logo',
                                'chat_prefix' => 'Prefix pour le chat',
                                'chat_nb_messages' => 'Nombres de messages à afficher dans le chat',
                                'analytics' => 'ID Google Analytics (Facultatif)',
                                'send_tokens_loss_rate' => 'Taux de '.$site_money.' perdu lors d\'un transfert (en %)'
                                ]; ?>
                                <?php foreach($informations as $k => $v){ ?>
                                <div class="form-group">
                                    <?php echo $this->Form->input($k, array('type' => 'text', 'value' => $data['Informations'][$k], 'class' => 'form-control', 'label' => $v)); ?>
                                </div>
                                <?php } ?>
                                <button class="btn btn-black pull-right" type="submit"><i class="fa fa-check"></i> Confirmer les modifications</button><br>
                            <?php echo $this->Form->end(); ?>
                        </div>
                        <div class="tab-pane fade" id="tab-2">
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
                        <div class="tab-pane fade" id="tab-3">
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
                        <div class="options tab-pane fade" id="tab-4">
                            <?php echo $this->Form->create('Informations', ['action' => 'update_options']); ?>
                                <div class="form-group">
                                    <b>Activer le slider ?</b>
                                    <div class="sw-red margin-right-15 pull-left">
                                        <div class="onoffswitch"><input name="use_slider" type="checkbox" class="checkboxes onoffswitch-checkbox" <?php if($use_slider == 1) echo 'checked="checked"'; ?> id="onoffswitch1"><label for="onoffswitch1" class="onoffswitch-label"><div class="onoffswitch-inner"></div><div class="onoffswitch-switch"></div></label></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <b>Activer les captchas ?</b>
                                    <div class="sw-red margin-right-15 pull-left">
                                        <div class="onoffswitch"><input name="use_captcha" type="checkbox" class="checkboxes onoffswitch-checkbox" <?php if($use_captcha == 1) echo 'checked="checked"'; ?> id="onoffswitch2"><label for="onoffswitch2" class="onoffswitch-label"><div class="onoffswitch-inner"></div><div class="onoffswitch-switch"></div></label></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <b>Afficher la page équipe ?</b>
                                    <div class="sw-red margin-right-15 pull-left">
                                        <div class="onoffswitch"><input name="use_team" type="checkbox" class="checkboxes onoffswitch-checkbox" <?php if($use_team == 1) echo 'checked="checked"'; ?> id="onoffswitch3"><label for="onoffswitch3" class="onoffswitch-label"><div class="onoffswitch-inner"></div><div class="onoffswitch-switch"></div></label></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <b>Afficher la page de contact ?</b>
                                    <div class="sw-red margin-right-15 pull-left">
                                        <div class="onoffswitch"><input name="use_contact" type="checkbox" class="checkboxes onoffswitch-checkbox" <?php if($use_contact == 1) echo 'checked="checked"'; ?> id="onoffswitch4"><label for="onoffswitch4" class="onoffswitch-label"><div class="onoffswitch-inner"></div><div class="onoffswitch-switch"></div></label></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <b>Afficher la page du règlement ?</b>
                                    <div class="sw-red margin-right-15 pull-left">
                                        <div class="onoffswitch"><input name="use_rules" type="checkbox" class="checkboxes onoffswitch-checkbox" <?php if($use_rules == 1) echo 'checked="checked"'; ?> id="onoffswitch5"><label for="onoffswitch5" class="onoffswitch-label"><div class="onoffswitch-inner"></div><div class="onoffswitch-switch"></div></label></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <b>Activer la boutique ?</b>
                                    <div class="sw-red margin-right-15 pull-left">
                                        <div class="onoffswitch"><input name="use_store" type="checkbox" class="checkboxes onoffswitch-checkbox" <?php if($use_store == 1) echo 'checked="checked"'; ?> id="onoffswitch6"><label for="onoffswitch6" class="onoffswitch-label"><div class="onoffswitch-inner"></div><div class="onoffswitch-switch"></div></label></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <b>Activer le module "meilleur donateur" ?</b>
                                    <div class="sw-red margin-right-15 pull-left">
                                        <div class="onoffswitch"><input name="use_donation_ladder" type="checkbox" class="checkboxes onoffswitch-checkbox" <?php if($use_donation_ladder == 1) echo 'checked="checked"'; ?> id="onoffswitch7"><label for="onoffswitch7" class="onoffswitch-label"><div class="onoffswitch-inner"></div><div class="onoffswitch-switch"></div></label></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <b>Activer le paiement via PayPal ?</b>
                                    <div class="sw-red margin-right-15 pull-left">
                                        <div class="onoffswitch"><input name="use_paypal" type="checkbox" class="checkboxes onoffswitch-checkbox" <?php if($use_paypal == 1) echo 'checked="checked"'; ?> id="onoffswitch8"><label for="onoffswitch8" class="onoffswitch-label"><div class="onoffswitch-inner"></div><div class="onoffswitch-switch"></div></label></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <b>Votre serveur utilise-t-il un système d'économie ?</b>
                                    <div class="sw-red margin-right-15 pull-left">
                                        <div class="onoffswitch"><input name="use_economy" type="checkbox" class="checkboxes onoffswitch-checkbox" <?php if($use_economy == 1) echo 'checked="checked"'; ?> id="onoffswitch9"><label for="onoffswitch9" class="onoffswitch-label"><div class="onoffswitch-inner"></div><div class="onoffswitch-switch"></div></label></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <b>Voulez vous autoriser le paiement via la monnaie du serveur dans la boutique ?</b>
                                    <div class="sw-red margin-right-15 pull-left">
                                        <div class="onoffswitch"><input name="use_server_money" type="checkbox" class="checkboxes onoffswitch-checkbox" <?php if($use_server_money == 1) echo 'checked="checked"'; ?> id="onoffswitch10"><label for="onoffswitch10" class="onoffswitch-label"><div class="onoffswitch-inner"></div><div class="onoffswitch-switch"></div></label></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <b>Happy hour activée ?</b>
                                    <div class="sw-red margin-right-15 pull-left">
                                        <div class="onoffswitch"><input name="happy_hour" type="checkbox" class="checkboxes onoffswitch-checkbox" <?php if($happy_hour == 1) echo 'checked="checked"'; ?> id="onoffswitch11"><label for="onoffswitch11" class="onoffswitch-label"><div class="onoffswitch-inner"></div><div class="onoffswitch-switch"></div></label></div>
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <b>Maintenance activé ?</b>
                                    <div class="sw-red margin-right-15 pull-left">
                                        <div class="onoffswitch"><input name="maintenance" type="checkbox" class="checkboxes onoffswitch-checkbox" <?php if($maintenance == 1) echo 'checked="checked"'; ?> id="onoffswitch12"><label for="onoffswitch12" class="onoffswitch-label"><div class="onoffswitch-inner"></div><div class="onoffswitch-switch"></div></label></div>
                                    </div>
                                </div>
                                <hr>
                                <button class="btn btn-black pull-right" type="submit"><i class="fa fa-check"></i> Confirmer les modifications</button><br>
                            <?php echo $this->Form->end(); ?>
                        </div>
                        <div class="tab-pane fade" id="tab-5">
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