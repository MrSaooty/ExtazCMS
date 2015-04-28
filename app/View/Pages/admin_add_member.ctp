<?php $this->assign('title', 'Ajouter un membre à l\'équipe'); ?>
<script type="text/javascript">
$(function() {
    $("select").selectBoxIt({
        showFirstOption: false
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
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <?php echo $this->Form->input('username', array('type' => 'text', 'placeholder' => 'Pseudo', 'class' => 'form-control', 'label' => false, 'required' => 'required')); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-leaf"></i></span>
                                <?php echo $this->Form->input('rank', array('type' => 'text', 'placeholder' => 'Fonction (ex: Administrateur, Modérateur...)', 'class' => 'form-control', 'label' => false, 'required' => 'required')); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-unsorted"></i></span>
                                <?php echo $this->Form->input('order', array('type' => 'number', 'placeholder' => 'Ordre d\'affichage (ex: 1, 2, 3)', 'class' => 'form-control', 'label' => false, 'required' => 'required')); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-facebook"></i></span>
                                <?php echo $this->Form->input('facebook_url', array('type' => 'url', 'placeholder' => 'URL de sa page Facebook (Facultatif)', 'class' => 'form-control', 'label' => false)); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-twitter"></i></span>
                                <?php echo $this->Form->input('twitter_url', array('type' => 'url', 'placeholder' => 'URL de son compte Twitter (Facultatif)', 'class' => 'form-control', 'label' => false)); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <select name="data[Pages][color]" class="form-control input-sm">
                                <option value="">Couleur du badge</option>
                                <option value="danger" data-text='<div style="border: 1px solid rgb(0, 0, 0); width: 20px; height: 10px; top: 1px; left: 1px; display: inline-block; background-color: #D9534F;"></div> Rouge'></option>
                                <option value="orange" data-text='<div style="border: 1px solid rgb(0, 0, 0); width: 20px; height: 10px; top: 1px; left: 1px; display: inline-block; background-color: #E67E22;"></div> Orange'></option>
                                <option value="warning" data-text='<div style="border: 1px solid rgb(0, 0, 0); width: 20px; height: 10px; top: 1px; left: 1px; display: inline-block; background-color: #F0AD4E;"></div> Jaune'></option>
                                <option value="primary" data-text='<div style="border: 1px solid rgb(0, 0, 0); width: 20px; height: 10px; top: 1px; left: 1px; display: inline-block; background-color: #337AB7;"></div> Bleu foncé'></option>
                                <option value="info" data-text='<div style="border: 1px solid rgb(0, 0, 0); width: 20px; height: 10px; top: 1px; left: 1px; display: inline-block; background-color: #5BC0DE;"></div> Bleu clair'></option>
                                <option value="success" data-text='<div style="border: 1px solid rgb(0, 0, 0); width: 20px; height: 10px; top: 1px; left: 1px; display: inline-block; background-color: #5CB85C;"></div> Vert'></option>
                                <option value="purple" data-text='<div style="border: 1px solid rgb(0, 0, 0); width: 20px; height: 10px; top: 1px; left: 1px; display: inline-block; background-color: #9B6BCC;"></div> Violet'></option>
                                <option value="default" data-text='<div style="border: 1px solid rgb(0, 0, 0); width: 20px; height: 10px; top: 1px; left: 1px; display: inline-block; background-color: #777777;"></div> Gris foncé'></option>
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
            <div class="col-md-8"></div>
        </div>
    </div>
</div>