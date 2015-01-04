<?php $this->assign('title', 'Modifier un article'); ?>
<!--=== Content Part ===-->
<div class="container content">     
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <?php echo $this->Form->create('Shop', ['class' => 'sky-form', 'inputDefaults' => ['error' => false]]); ?>
                <div class="reg-header">  
                    <header>Modifier un article</header>
                </div>
                <fieldset>
                    <section>
                        <font color="#A94442"><small><?php echo $this->Form->error('name'); ?></small></font>
                        <?php echo $this->Form->input('name', array('type' => 'text', 'value' => $data['Shop']['name'], 'class' => 'form-control', 'label' => 'Nom de l\'article')); ?>
                    </section>
                </fieldset>
                <fieldset>
                    <section>
                        <font color="#A94442"><small><?php echo $this->Form->error('description'); ?></small></font>
                        <?php echo $this->Form->input('description', array('type' => 'text', 'value' => $data['Shop']['description'], 'class' => 'form-control', 'label' => 'Description')); ?>
                    </section>
                </fieldset>
                <fieldset>
                    <section>
                        <font color="#A94442"><small><?php echo $this->Form->error('cat'); ?></small></font>
                        <?php echo $this->Form->input('cat', array('type' => 'text', 'value' => $data['Shop']['cat'], 'class' => 'form-control', 'label' => 'Catégorie')); ?>
                    </section>
                </fieldset>
                <fieldset>
                    <section>
                        <font color="#A94442"><small><?php echo $this->Form->error('img'); ?></small></font>
                        <?php echo $this->Form->input('img', array('type' => 'url', 'value' => $data['Shop']['img'], 'class' => 'form-control', 'label' => 'Url vers l\'image')); ?>
                    </section>
                </fieldset>
                <fieldset>
                    <section>
                        <font color="#A94442"><small><?php echo $this->Form->error('price_money_site'); ?></small></font>
                        <?php echo $this->Form->input('price_money_site', array('type' => 'number', 'value' => $data['Shop']['price_money_site'], 'class' => 'form-control', 'label' => 'Prix avec la monnaie du site')); ?>
                    </section>
                </fieldset>
                <?php if($use_server_money == 1){ ?>
                <fieldset>
                    <section>
                        <font color="#A94442"><small><?php echo $this->Form->error('price_money_server'); ?></small></font>
                        <?php echo $this->Form->input('price_money_server', array('type' => 'number', 'value' => $data['Shop']['price_money_server'], 'class' => 'form-control', 'label' => 'Prix avec la monnaie du serveur')); ?>
                    </section>
                </fieldset>
                <fieldset>
                    <section>
                        <select name="data[Shop][required]" id="ShopRequired" class="form-control">
                            <option value="<?php echo $data['Shop']['required'].'--'.$data['Shop']['required_name']; ?>">Prérequis actuel: <?php echo $data['Shop']['required_name']; ?></option>
                            <option value="-1--Aucun">PAS DE PRÉREQUIS</option>
                            <?php foreach($list_item as $item){ ?>
                                <option value="<?php echo $item['Shop']['id'].'--'.$item['Shop']['name']; ?>"><?php echo $item['Shop']['name']; ?></option>
                            <?php } ?>
                        </select>
                    </section>
                </fieldset>
                <?php } ?>
                <fieldset>
                    <section>
                        <font color="#A94442"><small><?php echo $this->Form->error('command'); ?></small></font>
                        <label for="">Commande à exécuter</label>
                        <label class="input">
                            <i class="icon-append fa fa-question-circle"></i>
                            <input name="data[Shop][command]" value="<?php echo $data['Shop']['command']; ?>" class="form-control" type="text" id="ShopCommand">
                            <b class="tooltip tooltip-bottom-right">
                                La commande sans le slash (/) initial. Vous pouvez utiliser {{player}} pour désigner un joueur
                            </b>
                        </label>
                    </section>
                </fieldset>
                <footer>
                    <p>
                        <button class="btn-u pull-right" type="submit">Modifier cet article</button>
                    </p> 
                </footer>
            <?php echo $this->Form->end(); ?>
        </div>
    </div><!--/row-->
</div><!--/container-->     
<!--=== End Content Part ===-->