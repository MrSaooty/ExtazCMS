<?php $this->assign('title', 'Modifier une page'); ?>
<div class="main-content">
    <div class="container">  
        <div class="row">
            <div class="col-md-6">
                <div class="page-content">
                    <div class="single-head">
                        <h3 class="pull-left"><i class="fa fa-plus-square"></i>Modifier une page de redirection</h3>
                        <div class="clearfix"></div>
                    </div>
                    <?php echo $this->Form->create('Cpages', array('class' => 'sky-form', 'inputDefaults' => array('error' => false))); ?>
                        <div class="form-group">
                            <div class="input-group margin-bottom-20">
                                <span class="input-group-addon"><i class="fa fa-font"></i></span>
                                <?php echo $this->Form->input('name', array('type' => 'text', 'value' => $data['Cpage']['name'], 'class' => 'form-control', 'label' => false)); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group margin-bottom-20">
                                <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                                <?php echo $this->Form->input('url', array('type' => 'url', 'value' => $data['Cpage']['url'], 'class' => 'form-control', 'label' => false)); ?>
                            </div>
                        </div>
                        <i class="fa fa-info-circle"></i> Cette page aura pour effet de rediriger les utilisateurs vers l'url indiquée <button class="btn btn-black pull-right pull-right" type="submit"><i class="fa fa-check"></i> Modifier</button>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>