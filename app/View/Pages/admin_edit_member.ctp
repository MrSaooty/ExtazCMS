<?php $this->assign('title', 'Modifier un membre'); ?>
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
                        <h3 class="pull-left"><i class="fa fa-pencil lblue"></i> Modifier un membre</h3>
                        <div class="clearfix"></div>
                    </div>
                    <?php echo $this->Form->create('Pages', ['inputDefaults' => ['error' => false]]); ?>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <?php echo $this->Form->input('username', array('type' => 'text', 'value' => $data['Team']['username'], 'class' => 'form-control', 'label' => false, 'required' => 'required')); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <?php
                            switch($data['Team']['rank']){
                                case '1':
                                    $rank = '<span class="label label-danger">Fondateur</span>';
                                    break;
                                case '2':
                                    $rank = '<span class="label label-danger">Administrateur</span>';
                                    break;
                                case '3':
                                    $rank = '<span class="label label-success">Modérateur</span>';
                                    break;
                                case '4':
                                    $rank = '<span class="label label-info">Animateur</span>';
                                    break;
                                case '5':
                                    $rank = '<span class="label label-black">Architecte</span>';
                                    break;
                                case '6':
                                    $rank = '<span class="label label-default">Guide</span>';
                                    break;
                                default:
                                    $rank = '<span class="label label-default">Indéfini</span>';
                                    break;
                            }
                            ?>
                            <select name="data[Pages][rank]" class="form-control input-sm">
                                <option value="">Choisissez un rang (<?php echo $rank; ?>)</option>
                                <option value="1">Fondateur</option>
                                <option value="2">Administrateur</option>
                                <option value="3">Modérateur</option>
                                <option value="4">Animateur</option>
                                <option value="5">Architecte</option>
                                <option value="6">Guide</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-facebook"></i></span>
                                <?php echo $this->Form->input('facebook_url', array('type' => 'url', 'value' => $data['Team']['facebook_url'], 'class' => 'form-control', 'label' => false)); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-twitter"></i></span>
                                <?php echo $this->Form->input('twitter_url', array('type' => 'url', 'value' => $data['Team']['twitter_url'], 'class' => 'form-control', 'label' => false)); ?>
                            </div>
                        </div>
                        <hr>
                        <button class="btn btn-black pull-right" type="submit"><i class="fa fa-check"></i> Confirmer la modification</button>
                        <a href="<?php echo $this->Html->url(['controller' => 'pages', 'action' => 'delete_member', $data['Team']['id']]); ?>" class="btn btn-danger confirm"><i class="fa fa-trash-o"></i> Supprimer ce membre</a>
                    <?php echo $this->Form->end(); ?>
                </div>
            <div class="col-md-8"></div>
        </div>
    </div>
</div>