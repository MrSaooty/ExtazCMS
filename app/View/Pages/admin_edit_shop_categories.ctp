<?php $this->assign('title', 'Modifier ue catégorie'); ?>
<div class="main-content">
    <div class="container">  
        <div class="row">
            <div class="col-md-4">
                <div class="page-content">
                    <div class="single-head">
                        <h3 class="pull-left"><i class="fa fa-plus-square"></i>Modifier une catégorie de la boutique</h3>
                        <div class="clearfix"></div>
                    </div>
                    <?php echo $this->Form->create('Pages', ['inputDefaults' => ['error' => false]]); ?>
                        <div class="form-group">
                            <?php echo $this->Form->input('name', array('type' => 'text', 'value' => $data['shopCategories']['name'], 'class' => 'form-control', 'label' => false, 'required' => 'required')); ?>
                        </div>
                        <hr>
                        <button class="btn btn-black pull-right" type="submit"><i class="fa fa-plus"></i> Modifier cette catégorie</button>
                        <a href="<?php echo $this->Html->url(['controller' => 'pages', 'action' => 'list_shop_category']); ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Annuler</a>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>