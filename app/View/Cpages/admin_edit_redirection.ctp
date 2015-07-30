<?php $this->assign('title', 'Modifier une page'); ?>
<div class="wrapper wrapper-content">
    <div class="animated fadeInRightBig">
        <div class="row">
            <div class="col-md-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Modifier une page de redirection</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a href="<?php echo $this->Html->url(['controller' => 'cpages', 'action' => 'list']); ?>">
                                <i class="fa fa-bars"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
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
                            <div class="row">
                                <div class="col-md-12">
                                    <hr>
                                    <i class="fa fa-info-circle"></i> Cette page aura pour effet de rediriger les utilisateurs vers l'url indiquée
                                    <button class="btn btn-w-m btn-primary pull-right pull-right" type="submit"><i class="fa fa-check"></i> Modifier</button>
                                </div>
                            </div>
                        <?php echo $this->Form->end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>