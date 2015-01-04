<?php $this->assign('title', 'Contact'); ?>
<!--=== Content Part ===-->
<div class="container content">
    <div class="row magazine-page">
        <!-- Begin Content -->
        <div class="col-md-9">
            <?php echo $this->Form->create('Pages', ['action' => 'contact', 'class' => 'sky-form', 'inputDefaults' => ['error' => false]]); ?>
                <div class="reg-header">  
                    <header>Contactez nous</header>
                </div>
                <fieldset>
                    <section>
                        <div class="input-group margin-bottom-20">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <?php echo $this->Form->input('username', array('type' => 'text', 'value' => $username, 'class' => 'form-control', 'label' => false, 'disabled')); ?>
                        </div>
                    </section>
                </fieldset>
                <fieldset>
                    <section>
                        <div class="input-group margin-bottom-20">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <?php echo $this->Form->input('email', array('type' => 'text', 'value' => $email, 'class' => 'form-control', 'label' => false, 'disabled')); ?>
                        </div>
                    </section>
                </fieldset>
                <fieldset>
                    <section>
                        <div class="input-group margin-bottom-20">
                            <span class="input-group-addon"><i class="fa fa-comment"></i></span>
                            <?php echo $this->Form->input('subject', array('type' => 'text', 'placeholder' => 'Sujet du message', 'class' => 'form-control', 'label' => false)); ?>
                        </div>
                    </section>
                </fieldset>
                <fieldset>
                    <section>
                        <?php echo $this->Form->textarea('message', array('type' => 'text', 'placeholder' => 'Votre message', 'class' => 'form-control', 'rows' => '5', 'cols' => '5', 'label' => false)); ?>
                    </section>
                </fieldset>
                <footer>
                    <?php echo $ayah->getPublisherHTML(); ?>
                    <input name="captcha" class="btn-u pull-right" type="Submit" value="Envoyer le message">      
                </footer>
            <?php echo $this->Form->end(); ?>
        </div>
        <!-- End Content -->
        <?php echo $this->element('sidebar'); ?>
    </div>
</div><!--/container-->     
<!-- End Content Part -->