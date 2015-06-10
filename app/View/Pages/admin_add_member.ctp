<?php $this->assign('title', 'Ajouter un membre à l\'équipe'); ?>
<script type="text/javascript">
$(function() {
    $("select").selectBoxIt({
        showFirstOption: false
    });
    $('#PagesUsername').keyup(function(){
        var username = $('#PagesUsername').val();
        if(username != ''){
            $('#avatar').attr('src', 'http://cravatar.eu/helmhead/' + username + '/110.png');
            $('#username').html(username);
        }
    });
    $('#PagesRank').keyup(function(){
        var rank = $('#PagesRank').val();
        if(rank == ''){
            rank = 'Rang';
        }
        $('#rank').html(rank);
    });
    $('#PagesFacebookUrl').change(function(){
        var facebook = $('#PagesFacebookUrl').val();
        if(facebook == ''){
            $('#facebook').attr('color', '#969696').hide().fadeIn(500);
            $('#facebook_link').attr('disabled', 'disabled').hide().fadeIn(500);
        }
        else{
            $('#facebook').attr('color', '#3498DB').hide().fadeIn(500);
            $('#facebook_link').removeAttr('disabled').hide().fadeIn(500);
        }
    });
    $('#PagesTwitterUrl').change(function(){
        var twitter = $('#PagesTwitterUrl').val();
        if(twitter == ''){
            $('#twitter').attr('color', '#969696').hide().fadeIn(500);
            $('#twitter_link').attr('disabled', 'disabled').hide().fadeIn(500);
        }
        else{
            $('#twitter').attr('color', '#27D7E7').hide().fadeIn(500);
            $('#twitter_link').removeAttr('disabled').hide().fadeIn(500);
        }
    });
    $('#PagesColor').change(function(){
        var color = $('#PagesColor').val();
        $('#rank').removeClass().addClass('label label-u-' + color).hide().fadeIn(500);
    });

    var roles = [
        {value: 'Fondateur'},
        {value: 'Administrateur'},
        {value: 'Modérateur'},
        {value: 'Animateur'},
        {value: 'Architecte'},
        {value: 'Webmaster'},
        {value: 'Guide'}
    ];

    $('#autocomplete').autocomplete({
        lookup: roles
    });
});
</script>
<div class="main-content">
    <div class="container">  
        <div class="row">
            <div class="col-md-4">
                <div class="page-content">
                    <div class="single-head">
                        <h3 class="pull-left"><i class="fa fa-plus-square"></i>Ajouter un membre à l'équipe</h3>
                        <div class="clearfix"></div>
                    </div>
                    <?php echo $this->Form->create('Pages', ['inputDefaults' => ['error' => false]]); ?>
                        <div class="form-group">
                            <?php echo $this->Form->input('username', array('type' => 'text', 'placeholder' => 'Pseudo', 'class' => 'form-control', 'label' => false, 'required' => 'required')); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('rank', array('type' => 'text', 'id' => 'autocomplete', 'placeholder' => 'Fonction (ex: Administrateur, Modérateur...)', 'class' => 'form-control', 'label' => false, 'required' => 'required')); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('order', array('type' => 'number', 'placeholder' => 'Ordre d\'affichage (ex: 1, 2, 3)', 'class' => 'form-control', 'label' => false, 'required' => 'required')); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('facebook_url', array('type' => 'url', 'placeholder' => 'URL de sa page Facebook (Facultatif)', 'class' => 'form-control', 'label' => false)); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('twitter_url', array('type' => 'url', 'placeholder' => 'URL de son compte Twitter (Facultatif)', 'class' => 'form-control', 'label' => false)); ?>
                        </div>
                        <div class="form-group">
                            <select name="data[Pages][color]" class="form-control input-sm" id="PagesColor">
                                <option value="">Couleur du badge</option>
                                <option value="danger" data-text='<div style="border: 1px solid rgb(0, 0, 0); width: 20px; height: 10px; top: 1px; left: 1px; display: inline-block; background-color: #D9534F;"></div> Rouge'></option>
                                <option value="orange" data-text='<div style="border: 1px solid rgb(0, 0, 0); width: 20px; height: 10px; top: 1px; left: 1px; display: inline-block; background-color: #E67E22;"></div> Orange'></option>
                                <option value="warning" data-text='<div style="border: 1px solid rgb(0, 0, 0); width: 20px; height: 10px; top: 1px; left: 1px; display: inline-block; background-color: #F0AD4E;"></div> Jaune'></option>
                                <option value="primary" data-text='<div style="border: 1px solid rgb(0, 0, 0); width: 20px; height: 10px; top: 1px; left: 1px; display: inline-block; background-color: #337AB7;"></div> Bleu foncé'></option>
                                <option value="info" data-text='<div style="border: 1px solid rgb(0, 0, 0); width: 20px; height: 10px; top: 1px; left: 1px; display: inline-block; background-color: #5BC0DE;"></div> Bleu clair'></option>
                                <option value="success" data-text='<div style="border: 1px solid rgb(0, 0, 0); width: 20px; height: 10px; top: 1px; left: 1px; display: inline-block; background-color: #5CB85C;"></div> Vert'></option>
                                <option value="purple" data-text='<div style="border: 1px solid rgb(0, 0, 0); width: 20px; height: 10px; top: 1px; left: 1px; display: inline-block; background-color: #9B6BCC;"></div> Violet'></option>
                                <option value="grey" data-text='<div style="border: 1px solid rgb(0, 0, 0); width: 20px; height: 10px; top: 1px; left: 1px; display: inline-block; background-color: #777777;"></div> Gris foncé'></option>
                                <option value="light" data-text='<div style="border: 1px solid rgb(0, 0, 0); width: 20px; height: 10px; top: 1px; left: 1px; display: inline-block; background-color: #ECF0F1;"></div> Gris clair'></option>
                                <option value="brown" data-text='<div style="border: 1px solid rgb(0, 0, 0); width: 20px; height: 10px; top: 1px; left: 1px; display: inline-block; background-color: #9C8061;"></div> Marron'></option>
                                <option value="dark" data-text='<div style="border: 1px solid rgb(0, 0, 0); width: 20px; height: 10px; top: 1px; left: 1px; display: inline-block; background-color: #555555;"></div> Noir'></option>
                            </select>
                        </div>
                        <hr>
                        <button class="btn btn-black pull-right" type="submit"><i class="fa fa-plus"></i> Ajouter ce membre</button>
                        <a href="<?php echo $this->Html->url(['controller' => 'pages', 'action' => 'list_member']); ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Annuler</a>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>
            <div class="col-md-3">
                <div class="thumbnail">
                    <br>
                    <a href="#">
                        <span>  
                            <center>
                                <img src="http://cravatar.eu/helmhead/Steve/110.png" alt="Player head" style="margin-top:5px;" id="avatar">
                            </center>
                        </span>                                              
                    </a>            
                    <div class="caption">
                        <center>
                            <a href="#" target="_blank" class="btn btn-default btn-u-xs" id="facebook_link" disabled="disabled">
                                <font color="#969696" id="facebook">
                                    <i class="fa fa-facebook-square"></i>
                                </font>
                            </a>
                            <a href="#" target="_blank" class="btn btn-default btn-u-xs" id="twitter_link" disabled="disabled">
                                <font color="#969696" id="twitter">
                                    <i class="fa fa-twitter"></i>
                                </font>
                            </a>
                            <h3>
                                <a href="#" id="username">
                                    Pseudo
                                </a>
                            </h3>
                            <span class="label label-black" id="rank">Rang</span>
                        </center>
                        <br></br>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>