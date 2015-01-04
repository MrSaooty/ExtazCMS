<?php $this->assign('title', 'Envoyer un message au support'); ?>
<!--=== Content Part ===-->
<div class="container content">
    <div class="row magazine-page">
        <!-- Begin Content -->
        <div class="col-md-9">
            <?php echo $this->Form->create('Pages', ['class' => 'sky-form', 'inputDefaults' => ['error' => false]]); ?>
                <div class="reg-header">  
                    <header>Envoyer un message au support</header>
                </div>
                <fieldset>
                    <section>
                        <?php echo 'Vous allez envoyer cette requête au support en tant que <u>'.$username.'</u>.'; ?>
                    </section>
                </fieldset>
                <fieldset>
                    <section>
                        <select name="data[Pages][priority]" class="form-control input-sm">
                            <option value="1">Votre requête est elle urgente ?</option>
                            <option value="1">Non</option>
                            <option value="2">Assez</option>
                            <option value="3">Beaucoup</option>
                            <option value="4">C'est très urgent !</option>
                        </select>
                    </section>
                </fieldset>
                <fieldset>
                    <section>
                        <?php echo $this->Form->textarea('message', ['placeholder' => 'Votre question/message', 'class' => 'form-control', 'rows' => 5, 'cols' => 5]); ?>
                    </section>
                </fieldset>
                <footer>
                    <button class="btn btn-u pull-right" type="submit">Envoyer</button>
                </footer>
            <?php echo $this->Form->end(); ?>
        </div>
        <!-- End Content -->
        <?php echo $this->element('sidebar'); ?>
    </div>
</div><!--/container-->     
<!-- End Content Part -->