<?php $this->assign('title', 'Ajouter un membre à l\'équipe'); ?>
<div class="main-content">
    <div class="container">  
        <div class="row">
            <div class="col-md-4">
                <div class="page-content">
                    <div class="single-head">
                        <h3 class="pull-left"><i class="fa fa-list lblue"></i> Ajouter un membre à l'équipe</h3>
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
                                <?php echo $this->Form->input('order', array('type' => 'number', 'placeholder' => 'Ordre', 'class' => 'form-control', 'label' => false, 'required' => 'required')); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <select name="data[Pages][color]" class="form-control input-sm">
                                <option value="">Choisissez une couleur</option>
                                <option value="danger">Rouge</option>
                                <option value="warning">Jaune</option>
                                <option value="primary">Bleu foncé</option>
                                <option value="info">Bleu clair</option>
                                <option value="success">Vert</option>
                                <option value="default">Gris foncé</option>
                                <option value="light">Gris clair</option>
                            </select>
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
                        <button class="btn btn-default" type="submit"><i class="fa fa-plus"></i> Ajouter ce membre</button>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>
            <div class="col-md-8"></div>
        </div>
    </div>
</div>