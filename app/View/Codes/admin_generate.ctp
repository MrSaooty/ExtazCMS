<?php $this->assign('title', 'Générer un code cadeau'); ?>
<script type="text/javascript">
$(function() {
    $("select").selectBoxIt({
        showFirstOption: false
    });
});
</script>
<div class="main-content">
    <div class="container">  
        <div class="row">
            <div class="col-md-4">
                <div class="page-content">
                    <div class="single-head">
                        <h3 class="pull-left"><i class="fa fa-plus-square"></i>Générer un/des code(s) cadeau(x)</h3>
                        <div class="clearfix"></div>
                    </div>
                    <?php echo $this->Form->create('Codes', ['inputDefaults' => ['error' => false]]); ?>
                        <div class="form-group">
                            <?php echo $this->Form->input('value', array('type' => 'number', 'placeholder' => 'Valeur du code (en '.$site_money.')', 'class' => 'form-control', 'label' => false, 'required' => 'required')); ?>
                        </div>
                        <div class="form-group">
                            <select name="data[Codes][number]" class="form-control input-sm">
                                <option value="1">Nombre de codes à générer</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="25">25</option>
                            </select>
                        </div>
                        <hr>
                        <button class="btn btn-black pull-right" type="submit"><i class="fa fa-check"></i> Confirmer</button>
                        <a href="<?php echo $this->Html->url(['controller' => 'pages', 'action' => 'stats']); ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Annuler</a>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>
            <div class="col-md-8"></div>
        </div>
    </div>
</div>