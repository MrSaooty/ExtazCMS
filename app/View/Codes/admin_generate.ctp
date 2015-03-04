<?php $this->assign('title', 'Générer un code cadeau'); ?>
<div class="main-content">
    <div class="container">  
        <div class="row">
            <div class="col-md-4">
                <div class="page-content">
                    <div class="single-head">
                        <h3 class="pull-left"><i class="fa fa-list lblue"></i> Générer un code cadeau</h3>
                        <div class="clearfix"></div>
                    </div>
                    <?php echo $this->Form->create('Codes', ['inputDefaults' => ['error' => false]]); ?>
                        <div class="input-group">
                            <?php echo $this->Form->input('value', array('type' => 'number', 'placeholder' => 'Valeur du code (en '.$site_money.')', 'class' => 'form-control', 'label' => false, 'required' => 'required')); ?>
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit"><i class="fa fa-chevron-right"></i></button>
                            </span>
                        </div>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>
            <div class="col-md-8"></div>
        </div>
    </div>
</div>