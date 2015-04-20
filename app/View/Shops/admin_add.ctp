<?php $this->assign('title', 'Ajouter un article'); ?>
<div class="main-content">
    <div class="container">  
        <div class="row">
            <div class="col-md-12">
                <div class="page-content">
                    <div class="single-head">
                        <h3 class="pull-left"><i class="fa fa-pencil-square-o"></i>Ajouter un article dans la boutique</h3>
                        <div class="clearfix"></div>
                    </div>
                    <?php echo $this->Form->create('Shop', ['class' => 'sky-form', 'inputDefaults' => ['error' => false]]); ?>
                        <div class="form-group">
                            <font color="#A94442"><small><?php echo $this->Form->error('name'); ?></small></font>
                            <div class="input-group margin-bottom-20">
                                <span class="input-group-addon"><i class="fa fa-font"></i></span>
                                <?php echo $this->Form->input('name', array('type' => 'text', 'placeholder' => 'Nom', 'class' => 'form-control', 'label' => false)); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <font color="#A94442"><small><?php echo $this->Form->error('description'); ?></small></font>
                            <div class="input-group margin-bottom-20">
                                <span class="input-group-addon"><i class="fa fa-comment"></i></span>
                                <?php echo $this->Form->input('description', array('type' => 'text', 'placeholder' => 'Description', 'class' => 'form-control', 'label' => false)); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <font color="#A94442"><small><?php echo $this->Form->error('cat'); ?></small></font>
                            <div class="input-group margin-bottom-20">
                                <span class="input-group-addon"><i class="fa fa-tags"></i></span>
                                <?php echo $this->Form->input('cat', array('type' => 'text', 'placeholder' => 'Catégorie', 'class' => 'form-control', 'label' => false)); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <font color="#A94442"><small><?php echo $this->Form->error('img'); ?></small></font>
                            <div class="input-group margin-bottom-20">
                                <span class="input-group-addon"><i class="fa fa-image"></i></span>
                                <?php echo $this->Form->input('img', array('type' => 'url', 'placeholder' => 'Url vers une image', 'class' => 'form-control', 'label' => false)); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <font color="#A94442"><small><?php echo $this->Form->error('price_money_site'); ?></small></font>
                            <div class="input-group margin-bottom-20">
                                <span class="input-group-addon"><i class="fa fa-eur"></i></span>
                                <?php echo $this->Form->input('price_money_site', array('type' => 'number', 'placeholder' => 'Prix en '.$site_money.'', 'class' => 'form-control', 'label' => false)); ?>
                            </div>
                        </div>
                        <?php if($use_server_money == 1){ ?>
                        <div class="form-group">
                            <font color="#A94442"><small><?php echo $this->Form->error('price_money_server'); ?></small></font>
                            <div class="input-group margin-bottom-20">
                                <span class="input-group-addon"><i class="fa fa-gamepad"></i></span>
                                <?php echo $this->Form->input('price_money_server', array('type' => 'number', 'placeholder' => 'Prix en '.$money_server.'', 'class' => 'form-control', 'label' => false)); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <select name="data[Shop][required]" id="ShopRequired" class="form-control">
                                <option value="-1--Aucun">Le joueur doit-il acheter un objet dans la boutique avant d'acheter celui-ci ? Si oui lequel ?</option>
                                <option value="-1--Aucun">PAS DE PRÉREQUIS</option>
                                <?php foreach($list_item as $item){ ?>
                                    <option value="<?php echo $item['Shop']['id'].'--'.$item['Shop']['name']; ?>"><?php echo $item['Shop']['name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <?php } ?>
                        <div class="form-group">
                            <font color="#A94442"><small><?php echo $this->Form->error('command'); ?></small></font>
                            <div class="input-group margin-bottom-20">
                                <span class="input-group-addon"><i class="fa fa-code"></i></span>
                                <?php echo $this->Form->input('command', array('type' => 'text', 'placeholder' => 'Commande(s) sans le slash (/) initial. Utilisez {{player}} pour désigner un joueur et {{new}} pour ajouter une nouvelle commande', 'class' => 'form-control', 'label' => false, 'div' => false)); ?>
                            </div>
                        </div>
                        <button class="btn btn-black pull-right" type="submit"><i class="fa fa-plus"></i> Ajouter cet article</button>
                        <br>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>