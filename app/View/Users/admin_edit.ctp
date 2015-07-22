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
                            <?php if($data['User']['role'] == 2){ ?>
                            <select name="data[User][role]" class="form-control" label="Rang" id="UserRole">
                                <option value="2">Administrateur</option>
                                <option value="1">Modérateur</option>
                                <option value="0">Utilisateur</option>
                            </select>
                            <?php } elseif($data['User']['role'] == 1) { ?>
                            <select name="data[User][role]" class="form-control" label="Rang" id="UserRole">
                                <option value="1">Modérateur</option>
                                <option value="2">Administrateur</option>
                                <option value="0">Utilisateur</option>
                            </select>
                            <?php } else { ?>
                            <select name="data[User][role]" class="form-control" label="Rang" id="UserRole">
                                <option value="0">Utilisateur</option>
                                <option value="1">Modérateur</option>
                                <option value="2">Administrateur</option>
                            </select>
                            <?php } ?>
                        </div>
                        <hr>
                        <button class="btn btn-black pull-right" type="submit"><i class="fa fa-check"></i> Confirmer la modification</button>
                        <a href="<?php echo $this->Html->url(['controller' => 'users', 'action' => 'delete', $data['User']['id']]); ?>" class="btn btn-danger confirm"><i class="fa fa-trash-o"></i> Supprimer ce compte</a>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>
            <div class="col-md-4">
                <?php if($use_store == 1){ ?>
                    <div class="page-content">
                        <div class="single-head">
                            <h3 class="pull-left"><i class="fa fa-plus-square"></i>Octroyer un prérequis à cet utilisateur</h3>
                            <div class="clearfix"></div>
                        </div>
                        <?php echo $this->Form->create('Shop', ['action' => 'add_prerequisite', 'class' => 'sky-form', 'inputDefaults' => ['error' => false]]); ?>
                            <?php echo $this->Form->input('user_id', array('type' => 'hidden', 'value' => $data['User']['id'])); ?>
                            <div class="form-group">
                                <select name="data[Shop][item]" class="form-control" id="ShopItem">
                                    <?php
                                    foreach($items as $i){
                                        echo '<option value="'.$i['Shop']['id'].'">'.$i['Shop']['name'].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <hr>
                            <button class="btn btn-black pull-right" type="submit"><i class="fa fa-check"></i> Confirmer l'ajout</button>
                            <br>
                        <?php echo $this->Form->end(); ?>
                    </div>
                    <br>
                <?php } ?>
                <div class="page-content">
                    <div class="single-head">
                        <h3 class="pull-left"><i class="fa fa-picture-o"></i>Avatar</h3>
                        <div class="clearfix"></div>
                    </div>
                    <p>
                        Vous pouvez réinitialiser l'avatar de cet utilisateur en utilisant le bouton ci-dessous
                    </p>
                    <hr>
                    <span class="bordered">
                        <?php echo $this->Html->image($data['User']['avatar'], ['height' => 22, 'width' => 22]); ?> Avatar de <?php echo $data['User']['username']; ?>
                    </span>
                    <a class="btn btn-black pull-right" href="<?php echo $this->Html->url(['controller' => 'avatars', 'action' => 'reset', $data['User']['id']]); ?>"><i class="fa fa-check"></i> Réinitialiser</a>
                </div>
            </div>
        </div>
    </div>
</div>