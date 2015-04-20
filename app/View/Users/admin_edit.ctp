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
<div class="main-content">
    <div class="container">  
        <div class="row">
            <div class="col-md-4">
                <div class="page-content">
                    <div class="single-head">
                        <h3 class="pull-left"><i class="fa fa-pencil-square-o"></i>Modifier un utilisateur</h3>
                        <div class="clearfix"></div>
                    </div>
                    <?php echo $this->Form->create('User', ['class' => 'sky-form', 'inputDefaults' => ['error' => false]]); ?>
                        <div class="form-group">
                            <font color="#A94442"><small><?php echo $this->Form->error('username'); ?></small></font>
                            <?php echo $this->Form->input('username', array('type' => 'text', 'value' => $data['User']['username'], 'class' => 'form-control', 'label' => 'Pseudo')); ?>
                            </section>
                        </div>
                        <div class="form-group">
                            <font color="#A94442"><small><?php echo $this->Form->error('email'); ?></small></font>
                            <?php echo $this->Form->input('email', array('type' => 'email', 'value' => $data['User']['email'], 'class' => 'form-control', 'label' => 'Email')); ?>
                            </section>
                        </div>
                        <div class="form-group">
                            <font color="#A94442"><small><?php echo $this->Form->error('tokens'); ?></small></font>
                            <?php echo $this->Form->input('tokens', array('type' => 'number', 'value' => $data['User']['tokens'], 'class' => 'form-control', 'label' => 'Tokens')); ?>
                            </section>
                        </div>
                        <div class="form-group">
                            <label>Rang</label>
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
                        </div>
                        <hr>
                        <button class="btn btn-black pull-right" type="submit"><i class="fa fa-check"></i> Confirmer la modification</button>
                        <a href="<?php echo $this->Html->url(['controller' => 'users', 'action' => 'delete', $data['User']['id']]); ?>" class="btn btn-danger confirm"><i class="fa fa-trash-o"></i> Supprimer ce compte</a>
                    <?php echo $this->Form->end(); ?>
                </div>
            <div class="col-md-8"></div>
        </div>
    </div>
</div>