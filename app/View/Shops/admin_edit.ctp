<?php $this->assign('title', 'Modifier un article'); ?>
<div class="main-content">
    <div class="container">  
        <div class="row">
            <div class="col-md-12">
                <div class="page-content">
                    <div class="single-head">
                        <h3 class="pull-left"><i class="fa fa-pencil-square-o"></i>Modifier un article</h3>
                        <div class="clearfix"></div>
                    </div>
                    <?php echo $this->Form->create('Shop', ['inputDefaults' => ['error' => false]]); ?>
                        <div class="form-group">
                            <font color="#A94442"><small><?php echo $this->Form->error('name'); ?></small></font>
                            <?php echo $this->Form->input('name', array('type' => 'text', 'value' => $data['Shop']['name'], 'class' => 'form-control', 'label' => 'Nom de l\'article')); ?>
                        </div>
                        <div class="form-group">
                            <font color="#A94442"><small><?php echo $this->Form->error('description'); ?></small></font>
                            <?php echo $this->Form->input('description', array('type' => 'text', 'value' => $data['Shop']['description'], 'class' => 'form-control', 'label' => 'Description')); ?>
                        </div>
                        <div class="form-group">
                            <font color="#A94442"><small><?php echo $this->Form->error('cat'); ?></small></font>
                            <?php echo $this->Form->input('cat', array('type' => 'text', 'value' => $data['Shop']['cat'], 'class' => 'form-control', 'label' => 'Catégorie')); ?>
                        </div>
                        <div class="form-group">
                            <font color="#A94442"><small><?php echo $this->Form->error('img'); ?></small></font>
                            <?php echo $this->Form->input('img', array('type' => 'url', 'value' => $data['Shop']['img'], 'class' => 'form-control', 'label' => 'Url vers l\'image')); ?>
                        </div>
                        <div class="form-group">
                            <font color="#A94442"><small><?php echo $this->Form->error('price_money_site'); ?></small></font>
                            <?php echo $this->Form->input('price_money_site', array('type' => 'number', 'value' => $data['Shop']['price_money_site'], 'class' => 'form-control', 'label' => 'Prix avec la monnaie du site')); ?>
                        </div>
                        <?php if($use_server_money == 1){ ?>
                        <div class="form-group">
                            <font color="#A94442"><small><?php echo $this->Form->error('price_money_server'); ?></small></font>
                            <?php echo $this->Form->input('price_money_server', array('type' => 'number', 'value' => $data['Shop']['price_money_server'], 'class' => 'form-control', 'label' => 'Prix avec la monnaie du serveur')); ?>
                        </div>
                        <label>Prérequis</label>
                        <div class="form-group">
                            <select name="data[Shop][required]" id="ShopRequired" class="form-control">
                                <option value="<?php echo $data['Shop']['required'].'--'.$data['Shop']['required_name']; ?>">Prérequis actuel: <?php echo $data['Shop']['required_name']; ?></option>
                                <option value="-1--Aucun">Pas de prérequis</option>
                                <?php foreach($list_item as $item){ ?>
                                    <option value="<?php echo $item['Shop']['id'].'--'.$item['Shop']['name']; ?>"><?php echo $item['Shop']['name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <?php } ?>
                        <label>Commande(s)</label>
                        <div class="form-group">
                            <font color="#A94442"><small><?php echo $this->Form->error('command'); ?></small></font>
                            <div class="input-group margin-bottom-20">
                                <span class="input-group-addon"><i class="fa fa-code"></i></span>
                                <?php echo $this->Form->input('command', array('type' => 'text', 'value' => $data['Shop']['command'], 'class' => 'form-control', 'label' => false, 'div' => false)); ?>
                            </div>
                            <small>Commande(s) sans le slash (/) initial. Utilisez {{player}} pour désigner un joueur et {{new}} pour ajouter une nouvelle commande</small>
                        </div>
                        <button class="btn btn-black pull-right" type="submit"><i class="fa fa-pencil-square-o"></i> Modifier cet article</button>
                        <br>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>