<?php $this->assign('title', 'Recharger mon compte'); ?>
<script>
$(document).ready(function(){
	$('.code-button').on('click', function(){
		$('.code-button').hide();
		$('.send-tokens-button').hide();
		$('.code-input').fadeIn(250);
	});
});
</script>
<!--=== Content Part ===-->
<div class="container content">     
    <div class="row">    
        <!-- Left Sidebar -->
        <div class="col-md-9">
        	<center>
				<?php 
				if($use_paypal == 1){
					$notify_url = 'http://' . $_SERVER['SERVER_NAME'].$this->webroot . 'paypal_ipn/process';
		        	if($happy_hour == 1){
		        		$item_name = $paypal_tokens.' '.$site_money.' + '.$paypal_happy_hour_bonus.' gratuits';
		        	}
		        	else{
		            	$item_name = $paypal_tokens.' '.$site_money;
		            }
					?>
		            <?php echo $this->Form->create(null, ['url' => 'https://www.paypal.com/cgi-bin/webscr', 'class' => 'sky-form']); ?>
		                <?php echo $this->Form->input('amount', ['type' => 'hidden', 'name' => 'amount', 'value' => $paypal_price]); ?>
		                <?php echo $this->Form->input('currency_code', ['type' => 'hidden', 'name' => 'currency_code', 'value' => 'EUR']); ?>
		                <?php echo $this->Form->input('shipping', ['type' => 'hidden', 'name' => 'shipping', 'value' => '0.00']); ?>
		                <?php echo $this->Form->input('tax', ['type' => 'hidden', 'name' => 'tax', 'value' => '0.00']); ?>
		                <?php echo $this->Form->input('notify_url', ['type' => 'hidden', 'name' => 'notify_url', 'value' => $notify_url]); ?>
		                <?php echo $this->Form->input('cmd', ['type' => 'hidden', 'name' => 'cmd', 'value' => '_xclick']); ?>
		                <?php echo $this->Form->input('business', ['type' => 'hidden', 'name' => 'business', 'value' => $paypal_email]); ?>
		                <?php echo $this->Form->input('item_name', ['type' => 'hidden', 'name' => 'item_name', 'value' => $item_name]); ?>
		                <?php echo $this->Form->input('no_note', ['type' => 'hidden', 'name' => 'no_note', 'value' => 1]); ?>
		                <?php echo $this->Form->input('lc', ['type' => 'hidden', 'name' => 'lc', 'value' => 'FR']); ?>
		                <?php echo $this->Form->input('bn', ['type' => 'hidden', 'name' => 'bn', 'value' => 'PP-BuyNowBF']); ?>
		                <?php echo $this->Form->input('custom', ['type' => 'hidden', 'name' => 'custom', 'value' => $this->Session->read('Auth.User.id')]); ?>
		                <?php if($happy_hour == 1){ ?>
			                <header>
			                	<h4>
			                		<i class="fa fa-gift"></i> Happy hour en cours, <?php echo $happy_hour_bonus.'% de '.$site_money.' gratuits'; ?><br>
				                	Acheter <?php echo $starpass_tokens.' '.$site_money.' + '.$starpass_happy_hour_bonus.' gratuits '; ?> via Starpass ou 
				                	<button type="submit" class="btn btn-default btn-sm">
			                			<i class="fa fa-paypal"></i> Acheter <?php echo $paypal_tokens.' '.$site_money.' + '.$paypal_happy_hour_bonus.' gratuits'; ?> via PayPal
			                		</button>
				                </h4>
			                </header>
		                <?php } else { ?>
			                <header>
			                	<h4>
				                	Acheter <?php echo $starpass_tokens.' '.$site_money; ?> via Starpass ou 
				                	<button type="submit" class="btn btn-default btn-sm">
			                			<i class="fa fa-paypal"></i> Acheter <?php echo $paypal_tokens.' '.$site_money; ?> via PayPal
			                		</button>
				                </h4>
			                </header>
		                <?php } ?>
		                <fieldset>
		                	<section>
		                		<?php
		                		if($starpass_idd != 0 && $starpass_idp != 0){
		                			?>
									<div id="starpass_<?php echo $starpass_idd; ?>"></div>
		                			<iframe src="http://script.starpass.fr/iframe/kit_default.php?idd=<?php echo $starpass_idd; ?>&amp;background=fff&amp;verif_en_php=1" width="660" height="520" frameborder="0"></iframe>
		                			<?php
		                		}
		                		else{
		                			?>
									<div class="alert alert-info">
										<i class="fa fa-info-circle"></i> Vous devez renseigner l'IDP et l'IDD dans la configuration afin d'afficher le formulaire de paiement Starpass
									</div>
		                			<?php
		                		}
		                		?>
		                	</section>
		                </fieldset>
		            <?php echo $this->Form->end(); ?>
	            <?php } else { ?>
		            <form class="sky-form">
		                <?php if($happy_hour == 1){ ?>
			                <header>
			                	<h4>
			                		<i class="fa fa-gift"></i> Happy hour en cours, <?php echo $happy_hour_bonus.'% de '.$site_money.' gratuits'; ?><br>
				                	Acheter <?php echo $starpass_tokens.' '.$site_money.' + '.$starpass_happy_hour_bonus.' gratuits '; ?> via Starpass 
				                </h4>
			                </header>
		                <?php } else { ?>
			                <header>
			                	<h4>
				                	Acheter <?php echo $starpass_tokens.' '.$site_money; ?> via Starpass
				                </h4>
			                </header>
		                <?php } ?>
		                <fieldset>
		                	<section>
		                		<?php
		                		if($starpass_idd != 0 && $starpass_idp != 0){
		                			?>
									<div id="starpass_<?php echo $starpass_idd; ?>"></div>
		                			<iframe src="http://script.starpass.fr/iframe/kit_default.php?idd=<?php echo $starpass_idd; ?>&amp;background=fff&amp;verif_en_php=1" width="660" height="520" frameborder="0"></iframe>
		                			<?php
		                		}
		                		else{
		                			?>
									<div class="alert alert-info">
										<i class="fa fa-info-circle"></i> Vous devez renseigner l'IDP et l'IDD dans la configuration afin d'afficher le formulaire de paiement Starpass
									</div>
		                			<?php
		                		}
		                		?>
		                	</section>
		                </fieldset>
		            </form>
	            <?php } ?>
	            <br>
	            <div class="row">
	            	<div class="col-md-6 col-md-offset-3">
	            		<a href="<?php echo $this->Html->url(['controller' => 'users', 'action' => 'account', '?' => ['tab' => 'send_tokens']]); ?>" class="send-tokens-button btn btn-default btn-sm"><i class="fa fa-gift"></i> Envoyer des <?php echo $site_money; ?> à un ami</a>
	            		<button class="code-button btn btn-default btn-sm"><i class="fa fa-gift"></i> Utiliser un code cadeau</button>
	            		<div class="code-input" style="display:none;">
	            			<?php echo $this->Form->create('Codes', ['action' => 'consume', 'inputDefaults' => ['error' => false]]); ?>
			                    <div class="input-group">
			                    	<?php echo $this->Form->input('code', array('type' => 'text', 'placeholder' => 'Entrez votre code', 'class' => 'form-control', 'label' => false, 'required' => 'required')); ?>
				                    <span class="input-group-btn">
		                                <button class="btn btn-default send-command" type="submit"><i class="fa fa-chevron-right"></i></button>
		                            </span>
	                            </div>
			            	<?php echo $this->Form->end(); ?>
	            		</div>
	            	</div>
	            </div>
        	</center>
        </div>
        <!-- End Left Sidebar -->
        <?php echo $this->element('sidebar'); ?>
    </div><!--/row-->        
</div><!--/container-->     
<!--=== End Content Part ===-->