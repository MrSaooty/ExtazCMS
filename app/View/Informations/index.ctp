<?php $this->assign('title', 'Modifier les informations'); ?>
<script>
$(document).ready(function(){

    <?php
    if($this->params->pass[0] == 'payments'){
        ?>
        $('#tab1').removeClass('active');
        $('#tab-1').removeClass('active in');
        $('#tab3').addClass('active');
        $('#tab-3').addClass('active in');
        <?php
    }
    ?>

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
        var url = '<?php echo $this->Html->url(array('controller' => 'informations', 'action' => 'testJsonapi')); ?>';

        $('.test-jsonapi').hide();
        $('.loading').show();

        $.post(url, {ip: ip, port: port, username: username, password: password, salt: salt}, 
            function(data){
                $('.loading').hide();
                $('.test-jsonapi').show();
                if(data.result == 'success'){
                    $.bootstrapGrowl("<i class='fa fa-check'></i> Connexion effectué avec succès !", {
                        ele: 'body', // which element to append to
                        type: 'success', // (null, 'info', 'danger', 'success')
                        offset: {from: 'top', amount: 20}, // 'top', or 'bottom'
                        align: 'center', // ('left', 'right', or 'center')
                        width: 'integer', // (integer, or 'auto')
                        delay: 2000, // Time while the message will be displayed. It's not equivalent to the *demo* timeOut!
                        allow_dismiss: false, // If true then will display a cross to close the popup.
                        stackup_spacing: 10 // spacing between consecutively stacked growls.
                    });
                }
                else{
                    $.bootstrapGrowl("<i class='fa fa-times'></i> Impossible d'établir la connexion", {
                        ele: 'body', // which element to append to
                        type: 'danger', // (null, 'info', 'danger', 'success')
                        offset: {from: 'top', amount: 20}, // 'top', or 'bottom'
                        align: 'center', // ('left', 'right', or 'center')
                        width: 'integer', // (integer, or 'auto')
                        delay: 2000, // Time while the message will be displayed. It's not equivalent to the *demo* timeOut!
                        allow_dismiss: false, // If true then will display a cross to close the popup.
                        stackup_spacing: 10 // spacing between consecutively stacked growls.
                    });
                }
            }, 
        'json');
    });
});
</script>
<!--=== Content Part ===-->
<div class="container content">     
    <div class="row">
        <div class="col-md-9">
            <div class="tab-v1">
                <ul class="nav nav-tabs">
                    <li class="active" id="tab1"><a href="#tab-1" data-toggle="tab">Général</a></li>
                    <li class="" id="tab2"><a href="#tab-2" data-toggle="tab">JSONAPI</a></li>
                    <li class="" id="tab3"><a href="#tab-3" data-toggle="tab">Starpass/PayPal</a></li>
                    <li class="" id="tab4"><a href="#tab-4" data-toggle="tab">Options</a></li>
                    <li class="" id="tab5"><a href="#tab-5" data-toggle="tab">Réglement</a></li>
                </ul>                
                <div class="tab-content">
                    <div class="tab-pane fade active in" id="tab-1">
                        <?php echo $this->Form->create('Informations', ['action' => 'updateInformations', 'class' => 'sky-form']); ?>
                            <?php $informations = [
                            'name_server' => 'Nom du serveur', 
                            'ip_server' => 'IP du serveur', 
                            'port_server' => 'Port du serveur', 
                            'money_server' => 'Monnaie du serveur (Si vous autorisez le paiement via celle-ci)',
                            'site_money' => 'Nom de la monnaie du site (Si vous utilisez la boutique)',
                            'contact_email' => 'Votre email pour la page contact',
                            'logo_url' => 'URL de votre logo',
                            'facebook_url' => 'URL de votre page Facebook (Facultatif)',
                            'twitter_url' => 'URL de votre compte Twitter (Facultatif)'
                            ]; ?>
                            <?php foreach($informations as $k => $v){ ?>
                            <fieldset>
                                <section>
                                    <?php echo $this->Form->input($k, array('type' => 'text', 'value' => $data['Informations'][$k], 'class' => 'form-control', 'label' => $v)); ?>
                                </section>
                            </fieldset>
                            <?php } ?>
                            <footer>
                                <p>
                                    <button class="btn-u pull-right" type="submit">Confirmer les modifications</button>
                                </p> 
                            </footer>
                        <?php echo $this->Form->end(); ?>
                    </div>
                    <div class="tab-pane fade" id="tab-2">
                        <?php echo $this->Form->create('Informations', ['action' => 'updateInformations', 'class' => 'sky-form']); ?>
                            <?php $informations = [
                            'jsonapi_ip' => 'IP du serveur pour JSONAPI', 
                            'jsonapi_port' => 'Port pour JSONAPI', 
                            'jsonapi_username' => 'Nom d\'utilisateur JSONAPI',
                            'jsonapi_password' => 'Mot de passe JSONAPI',
                            'jsonapi_salt' => 'Salt JSONAPI (Facultatif)'
                            ]; ?>
                            <?php foreach($informations as $k => $v){ ?>
                            <fieldset>
                                <section>
                                    <?php echo $this->Form->input($k, array('type' => 'text', 'value' => $data['Informations'][$k], 'class' => 'form-control', 'label' => $v)); ?>
                                </section>
                            </fieldset>
                            <?php } ?>
                            <footer>
                                <p>
                                    <button class="btn-u btn-u-dark test-jsonapi"><i class="fa fa-globe"></i> Tester la connexion</button>
                                    <button class="btn-u btn-u-dark loading" style="display:none;"><i class="fa fa-refresh fa-spin"></i> Connexion en cours...</button>
                                    <button class="btn-u pull-right" type="submit">Confirmer les modifications</button>
                                </p> 
                            </footer>
                        <?php echo $this->Form->end(); ?>
                    </div>
                    <div class="tab-pane fade" id="tab-3">
                        <?php echo $this->Form->create('Informations', ['action' => 'updateInformations', 'class' => 'sky-form']); ?>
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
                            <fieldset>
                                <section>
                                    <?php echo $this->Form->input($k, array('type' => 'text', 'value' => $data['Informations'][$k], 'class' => 'form-control', 'label' => $v)); ?>
                                </section>
                            </fieldset>
                            <?php } ?>
                            <footer>
                                <p>
                                    <button class="btn-u pull-right" type="submit">Confirmer les modifications</button>
                                </p> 
                            </footer>
                        <?php echo $this->Form->end(); ?>
                    </div>
                    <div class="tab-pane fade" id="tab-4">
                        <?php echo $this->Form->create('Informations', ['action' => 'updateOptions', 'class' => 'sky-form']); ?>
                            <fieldset>
                                <section>
                                    Afficher la page équipe ?
                                    <label class="toggle pull-right">
                                        <input type="checkbox" name="use_team" <?php if($use_team == 1) echo 'checked="checked"'; ?>><i></i>
                                    </label>
                                </section>
                            </fieldset>
                            <fieldset>
                                <section>
                                    Afficher la page de contact ?
                                    <label class="toggle pull-right">
                                        <input type="checkbox" name="use_contact" <?php if($use_contact == 1) echo 'checked="checked"'; ?>><i></i>
                                    </label>
                                </section>
                            </fieldset>
                            <fieldset>
                                <section>
                                    Afficher la page du règlement ?
                                    <label class="toggle pull-right">
                                        <input type="checkbox" name="use_rules" <?php if($use_rules == 1) echo 'checked="checked"'; ?>><i></i>
                                    </label>
                                </section>
                            </fieldset>
                            <fieldset>
                                <section>
                                    Activer la boutique ?
                                    <label class="toggle pull-right">
                                        <input type="checkbox" name="use_store" <?php if($use_store == 1) echo 'checked="checked"'; ?>><i></i>
                                    </label>
                                </section>
                            </fieldset>
                            <fieldset>
                                <section>
                                    Activer le module "meilleur donateur" ?
                                    <label class="toggle pull-right">
                                        <input type="checkbox" name="use_donation_ladder" <?php if($use_donation_ladder == 1) echo 'checked="checked"'; ?>><i></i>
                                    </label>
                                </section>
                            </fieldset>
                            <fieldset>
                                <section>
                                    Activer le paiement via PayPal ?
                                    <label class="toggle pull-right">
                                        <input type="checkbox" name="use_paypal" <?php if($use_paypal == 1) echo 'checked="checked"'; ?>><i></i>
                                    </label>
                                </section>
                            </fieldset>
                            <fieldset>
                                <section>
                                    Votre serveur utilise-t-il un système d'économie ?
                                    <label class="toggle pull-right">
                                        <input type="checkbox" name="use_economy" <?php if($use_economy == 1) echo 'checked="checked"'; ?>><i></i>
                                    </label>
                                </section>
                            </fieldset>
                            <fieldset>
                                <section>
                                    Voulez vous autoriser le paiement via la monnaie du serveur dans la boutique ?
                                    <label class="toggle pull-right">
                                        <input type="checkbox" name="use_server_money" <?php if($use_server_money == 1) echo 'checked="checked"'; ?>><i></i>
                                    </label>
                                </section>
                            </fieldset>
                            <fieldset>
                                <section>
                                    Happy hour activée ?
                                    <label class="toggle pull-right">
                                        <input type="checkbox" name="happy_hour" <?php if($happy_hour == 1) echo 'checked="checked"'; ?>><i></i>
                                    </label>
                                </section>
                            </fieldset>
                            <footer>
                                <p>
                                    <button class="btn-u pull-right" type="submit">Confirmer les modifications</button>
                                </p> 
                            </footer>
                        <?php echo $this->Form->end(); ?>
                    </div>
                    <div class="tab-pane fade" id="tab-5">
                        <?php echo $this->Form->create('Informations', ['action' => 'updateInformations', 'class' => 'sky-form']); ?>
                            <?php $informations = [
                            'rules' => 'Editer le réglement'
                            ]; ?>
                            <?php foreach($informations as $k => $v){ ?>
                            <fieldset>
                                <section>
                                    <?php echo $this->Form->textarea($k, array('type' => 'text', 'value' => $data['Informations'][$k], 'class' => 'ckeditor', 'label' => $v)); ?>
                                </section>
                            </fieldset>
                            <?php } ?>
                            <footer>
                                <p>
                                    <button class="btn-u pull-right" type="submit">Confirmer les modifications</button>
                                </p> 
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