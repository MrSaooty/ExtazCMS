<?php $this->assign('title', 'Modifier un utilisateur'); ?>
<script>
$(document).ready(function(){
    $(".confirm").confirm({
        text: "Voulez vous vraiment supprimer le compte de cet utilisateur ?",
        title: "Confirmation",
        confirmButton: "Oui",
        cancelButton: "Non"
    });
});
</script>
<!--=== Content Part ===-->
<div class="container content">     
    <div class="row">
        <div class="col-md-9">
            <?php echo $this->Form->create('User', ['class' => 'sky-form', 'inputDefaults' => ['error' => false]]); ?>
                <div class="reg-header">  
                    <header>Modifier un utilisateur</header>
                </div>
                <fieldset>
                    <section>
                        <font color="#A94442"><small><?php echo $this->Form->error('username'); ?></small></font>
                        <?php echo $this->Form->input('username', array('type' => 'text', 'value' => $data['User']['username'], 'class' => 'form-control', 'label' => 'Pseudo')); ?>
                    </section>
                </fieldset>
                <fieldset>
                    <section>
                        <font color="#A94442"><small><?php echo $this->Form->error('email'); ?></small></font>
                        <?php echo $this->Form->input('email', array('type' => 'email', 'value' => $data['User']['email'], 'class' => 'form-control', 'label' => 'Email')); ?>
                    </section>
                </fieldset>
                <fieldset>
                    <section>
                        <font color="#A94442"><small><?php echo $this->Form->error('tokens'); ?></small></font>
                        <?php echo $this->Form->input('tokens', array('type' => 'number', 'value' => $data['User']['tokens'], 'class' => 'form-control', 'label' => 'Tokens')); ?>
                    </section>
                </fieldset>
                <fieldset>
                    <section>
                        <font color="#A94442"><small><?php echo $this->Form->error('role'); ?></small></font>
                        <?php if($data['User']['role'] == 0){ ?>
                        <select name="data[User][role]" class="form-control" label="Rang" id="UserRole">
                            <option value="0">Utilisateur</option>
                            <option value="1">Administrateur</option>
                        </select>
                        <?php } else { ?>
                        <select name="data[User][role]" class="form-control" label="Rang" id="UserRole">
                            <option value="1">Administrateur</option>
                            <option value="0">Utilisateur</option>
                        </select>
                        <?php } ?>
                    </section>
                </fieldset>
                <footer>
                    <p>
                        <button class="btn-u pull-right" type="submit">Confirmer la modification</button>
                        <a href="<?php echo $this->Html->url(['controller' => 'users', 'action' => 'delete', $data['User']['id']]); ?>" class="btn-u btn-u-red confirm"><i class="fa fa-trash-o"></i> Supprimer ce compte</a>
                    </p> 
                </footer>
            <?php echo $this->Form->end(); ?>
        </div>
        <?php echo $this->element('sidebar'); ?>
    </div><!--/row-->
</div><!--/container-->     
<!--=== End Content Part ===-->