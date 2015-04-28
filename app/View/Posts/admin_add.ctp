<?php $this->assign('title', 'Rédiger un article'); ?>
<script type="text/javascript">
$(document).ready(function(){
    $(window).load(function(){
        $('#chargement').empty()
        $('#content').fadeIn()
    });
});
</script>
<div class="main-content">
    <div class="container">  
        <div class="row">
            <div class="col-md-12">
                <div class="page-content">
                    <div class="single-head">
                        <h3 class="pull-left"><i class="fa fa-plus-square"></i>Rédiger un article</h3>
                        <div class="clearfix"></div>
                    </div>
                    <?php echo $this->Form->create('Post', array('class' => 'sky-form', 'type' => 'file', 'inputDefaults' => array('error' => false))); ?>
                        <div class="form-group">
                            <font color="#A94442"><small><?php echo $this->Form->error('title'); ?></small></font>
                            <div class="input-group margin-bottom-20">
                                <span class="input-group-addon"><i class="fa fa-font"></i></span>
                                <?php echo $this->Form->input('title', array('type' => 'text', 'placeholder' => 'Titre', 'class' => 'form-control', 'label' => false)); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <font color="#A94442"><small><?php echo $this->Form->error('cat'); ?></small></font>
                            <div class="input-group margin-bottom-20">
                                <span class="input-group-addon"><i class="fa fa-tags"></i></span>
                                <?php echo $this->Form->input('cat', array('type' => 'text', 'placeholder' => 'Catégorie', 'class' => 'form-control', 'label' => false)); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <font color="#A94442"><small><?php echo $this->Form->error('slug'); ?></small></font>
                            <div class="input-group margin-bottom-20">
                                <span class="input-group-addon"><i class="fa fa-comment"></i></span>
                                <?php echo $this->Form->input('slug', array('type' => 'text', 'placeholder' => 'Slug, mots clefs dans l\'url (par ex: nouveau-serveur-pvp)', 'class' => 'form-control', 'label' => false)); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <font color="#A94442"><small><?php echo $this->Form->error('img_file'); ?></small></font>
                            <input type="file" name="data[Post][img_file]" id="PostImgFile" onchange="this.parentNode.nextSibling.value = this.value">
                        </div>
                        <div class="form-group">
                            <font color="#A94442"><small><?php echo $this->Form->error('img'); ?></small></font>
                            <div class="input-group margin-bottom-20">
                                <span class="input-group-addon"><i class="fa fa-link"></i></span>
                                <?php echo $this->Form->input('img', array('type' => 'text', 'placeholder' => 'Ou insérez une url (850x400)', 'class' => 'form-control', 'label' => false, 'required' => false)); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div id="chargement"><?php echo $this->Html->image('loader.gif', array('alt' => 'chargement')); ?> Chargement de l'éditeur de texte en cours, veuillez patienter</div>
                            <div id="content" style="display:none;">
                                <font color="#A94442"><small><?php echo $this->Form->error('content'); ?></small></font>
                                <?php echo $this->Form->textarea('content', array('type' => 'textarea', 'rows' => '5', 'cols' => '5', 'placeholder' => 'Contenu', 'class' => 'ckeditor', 'label' => false)); ?>
                            </div>
                        </div>
                        <i class="fa fa-info-circle"></i> Cet article sera enregistré en tant que brouillon <button class="btn btn-default pull-right" type="submit"><i class="fa fa-plus"></i> Ajouter cet article</button>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>