<?php $this->assign('title', 'Ajouter un membre à l\'équipe'); ?>
<!--=== Content Part ===-->
<div class="container content">
    <div class="row magazine-page">
        <!-- Begin Content -->
        <div class="col-md-9">
            <?php echo $this->Form->create('Pages', ['class' => 'sky-form', 'inputDefaults' => ['error' => false]]); ?>
                <div class="reg-header">  
                    <header>Ajouter un membre à l'équipe</header>
                </div>
                <fieldset>
                    <section>
                        <div class="input-group margin-bottom-20">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <?php echo $this->Form->input('username', array('type' => 'text', 'placeholder' => 'Pseudo', 'class' => 'form-control', 'label' => false)); ?>
                        </div>
                    </section>
                </fieldset>
                <fieldset>
                    <section>
                        <select name="data[Pages][rank]" class="form-control input-sm">
                            <option value="">Choisissez un rang</option>
                            <option value="1">Fondateur</option>
                            <option value="2">Administrateur</option>
                            <option value="3">Modérateur</option>
                            <option value="4">Animateur</option>
                            <option value="5">Architecte</option>
                            <option value="6">Guide</option>
                        </select>
                    </section>
                </fieldset>
                <fieldset>
                    <section>
                        <div class="input-group margin-bottom-20">
                            <span class="input-group-addon"><i class="fa fa-facebook"></i></span>
                            <?php echo $this->Form->input('facebook_url', array('type' => 'url', 'placeholder' => 'URL de sa page Facebook (Facultatif)', 'class' => 'form-control', 'label' => false)); ?>
                        </div>
                    </section>
                </fieldset>
                <fieldset>
                    <section>
                        <div class="input-group margin-bottom-20">
                            <span class="input-group-addon"><i class="fa fa-twitter"></i></span>
                            <?php echo $this->Form->input('twitter_url', array('type' => 'url', 'placeholder' => 'URL de son compte Twitter (Facultatif)', 'class' => 'form-control', 'label' => false)); ?>
                        </div>
                    </section>
                </fieldset>
                <footer>
                    <button class="btn btn-u pull-right" type="submit">Ajouter ce membre</button>
                </footer>
            <?php echo $this->Form->end(); ?>
        </div>
        <!-- End Content -->
        <?php echo $this->element('sidebar'); ?>
    </div>
</div><!--/container-->     
<!-- End Content Part -->