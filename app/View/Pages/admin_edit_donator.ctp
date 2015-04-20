<?php $this->assign('title', 'Modifier un utilisateur'); ?>
<script>
$(document).ready(function(){
    $(".confirm").confirm({
        text: "Voulez vous vraiment retirer cet utilisateur du classement ?",
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
                        <h3 class="pull-left"><i class="fa fa-pencil-square-o"></i>Modifier un utilisateur dans le classement</h3>
                        <div class="clearfix"></div>
                    </div>
                    <?php echo $this->Form->create('Pages', ['inputDefaults' => ['error' => false]]); ?>
                        <div class="form-group">
                            <font color="#A94442"><small><?php echo $this->Form->error('username'); ?></small></font>
                            <?php echo $this->Form->input('username', array('type' => 'text', 'value' => $data['User']['username'], 'class' => 'form-control', 'label' => 'Pseudo', 'disabled' => 'disabled')); ?>
                            </section>
                        </div>
                        <div class="form-group">
                            <font color="#A94442"><small><?php echo $this->Form->error('email'); ?></small></font>
                            <?php echo $this->Form->input('email', array('type' => 'email', 'value' => $data['User']['email'], 'class' => 'form-control', 'label' => 'Email', 'disabled' => 'disabled')); ?>
                            </section>
                        </div>
                        <div class="form-group">
                            <font color="#A94442"><small><?php echo $this->Form->error('tokens'); ?></small></font>
                            <?php echo $this->Form->input('tokens', array('type' => 'number', 'value' => $data['User']['tokens'], 'class' => 'form-control', 'label' => 'Tokens (actuel)', 'disabled' => 'disabled')); ?>
                            </section>
                        </div>
                        <div class="form-group">
                            <font color="#A94442"><small><?php echo $this->Form->error('tokens_ladder'); ?></small></font>
                            <?php echo $this->Form->input('tokens_ladder', array('type' => 'number', 'value' => $data['donationLadder']['tokens'], 'class' => 'form-control', 'label' => 'Tokens (total)')); ?>
                            </section>
                        </div>
                        <?php echo $this->Form->input('updated', array('type' => 'hidden', 'value' => $data['donationLadder']['updated'])); ?>
                        <hr>
                        <button class="btn btn-black pull-right" type="submit"><i class="fa fa-check"></i> Confirmer la modification</button>
                        <a href="<?php echo $this->Html->url(['controller' => 'pages', 'action' => 'delete_donator', $data['donationLadder']['id']]); ?>" class="btn btn-danger confirm"><i class="fa fa-trash-o"></i> Retirer cet utilisateur du classement</a>
                    <?php echo $this->Form->end(); ?>
                </div>
            <div class="col-md-8"></div>
        </div>
    </div>
</div>