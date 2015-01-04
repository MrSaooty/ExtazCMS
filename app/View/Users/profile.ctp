<?php $this->assign('title', 'Profil de '.$data['User']['username'].''); ?>
<!--=== Content Part ===-->
<div class="container content">     
    <div class="row">
        <div class="col-md-9">
            <?php echo $this->Form->create('User', ['action' => 'update_account', 'class' => 'sky-form']); ?>
                <div class="reg-header">  
                    <header>Ses informations personnelles</header>
                </div>
                <fieldset>
                    <section>
                        <i class="fa fa-trophy"></i> Inscrit depuis le <?php echo $this->Time->format('d/m/Y', $data['User']['created']); ?>
                    </section>
                </fieldset>
                <fieldset>
                    <section>
                        Pseudo : <b><?php echo $data['User']['username']; ?></b>
                    </section>
                </fieldset>
                <?php
                if($use_economy == 1){
                $balance = number_format($api->call('players.name.bank.balance', [$data['User']['username']])[0]['success'], 0, ',', ' ');
                ?>
                <fieldset>
                    <section>
                        Il a <b><?php echo $balance.' '.$money_server; ?></b>
                    </section>
                </fieldset>
                <?php } ?>
                <fieldset>
                    <section>
                    Il a <b><?php echo $data['User']['tokens'].' '.$site_money; ?></b>
                    </section>
                </fieldset>
            <?php echo $this->Form->end(); ?>
        </div>
        <?php echo $this->element('sidebar'); ?>
    </div><!--/row-->
</div><!--/container-->     
<!--=== End Content Part ===-->