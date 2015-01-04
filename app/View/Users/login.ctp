<?php $this->assign('title', 'Connexion'); ?>
<!--=== Content Part ===-->
<div class="container content">     
    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
            <?php echo $this->Session->flash('auth'); ?>
            <?php echo $this->Form->create('User', array('class' => 'sky-form')); ?>
                <div class="reg-header">  
                    <header>Connexion à l'espace membre</header>
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
                        <label class="input">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <?php echo $this->Form->input('password', array('type' => 'password', 'placeholder' => 'Mot de passe', 'class' => 'form-control', 'label' => false)); ?>
                            </div>
                        </label>
                        <div class="note pull-right">
                            <?php echo $this->Html->link('Mot de passe oublié ?', ['controller' => 'users', 'action' => 'forgot_password'], array('class' => 'modal-opener')); ?>
                        </div>
                        <br>
                    </section>
                </fieldset>
                <footer>
                <div class="row">
                    <div class="col-md-4">
                        <label class="checkbox">
                            <input type="checkbox" name="data[User][rememberMe]" id="UserRememberMe" checked=""><i></i> Rester connecté
                        </label>
                    </div>
                    <div class="col-md-8">
                        <button class="btn-u pull-right" type="submit">Se connecter</button>                        
                    </div>
                </div>
            </footer>
            <?php echo $this->Form->end(); ?>
        </div>
    </div><!--/row-->
</div><!--/container-->     
<!--=== End Content Part ===-->