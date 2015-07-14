<?php $this->assign('title', 'Ajouter une page'); ?>
<script type="text/javascript">
function verif(evt) {
    var keyCode = evt.which ? evt.which : evt.keyCode;
    var accept = 'abcdefghijklmnopqrstuvwxyz0123456789-';
    if(accept.indexOf(String.fromCharCode(keyCode)) >= 0){
        return true;
    }
    else{
        return false;
    }
}
$(document).ready(function(){
    $(window).load(function(){
        $('#chargement').empty();
        $('#content').fadeIn();
    });
    $("select").selectBoxIt({
        showFirstOption: false
    });
    $('.summernote').summernote({
        height: 300,
        lang: 'fr-FR'
    });
});
</script>
<div class="main-content">
    <div class="container">  
        <div class="row">
            <div class="col-md-12">
                <div class="page-content">
                    <div class="single-head">
                        <h3 class="pull-left"><i class="fa fa-plus-square"></i>Ajouter une page</h3>
                        <div class="clearfix"></div>
                    </div>
                    <?php echo $this->Form->create('Cpages', array('class' => 'sky-form', 'inputDefaults' => array('error' => false))); ?>
                        <div class="form-group">
                            <div class="input-group margin-bottom-20">
                                <span class="input-group-addon"><i class="fa fa-font"></i></span>
                                <?php echo $this->Form->input('name', array('type' => 'text', 'placeholder' => 'Titre de la page', 'class' => 'form-control', 'label' => false)); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group margin-bottom-20">
                                <span class="input-group-addon"><i class="fa fa-comment"></i></span>
                                <?php echo $this->Form->input('slug', array('type' => 'text', 'placeholder' => 'Slug, mots clefs dans l\'url (par ex: background-du-serveur)', 'class' => 'form-control', 'onkeypress' => 'return verif(event);', 'label' => false)); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <select name="data[Cpages][sidebar]" id="CpagesSidebar" class="form-control">
                                <option value="">Afficher la sidebar ?</option>
                                <option value="1">Oui</option>
                                <option value="0">Non</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <div id="chargement"><?php echo $this->Html->image('loader.gif', array('alt' => 'chargement')); ?> Chargement de l'éditeur de texte en cours, veuillez patienter</div>
                            <div id="content" style="display:none;">
                                <?php echo $this->Form->textarea('content', array('type' => 'textarea', 'rows' => '5', 'cols' => '5', 'class' => 'summernote', 'label' => false)); ?>
                            </div>
                        </div>
                        <i class="fa fa-info-circle"></i> Vous pouvez utiliser des variables pour étoffer le contenu de votre page. <a href="http://extaz-cms.com/wiki/index.php?title=Aide" target="_blank">(<u>en savoir plus</u> <i class="fa fa-external-link"></i>)</a> <button class="btn btn-black pull-right pull-right" type="submit"><i class="fa fa-plus"></i> Ajouter cette page</button>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>