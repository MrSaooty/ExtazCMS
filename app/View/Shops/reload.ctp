<?php $this->assign('title', 'Recharger mon compte'); ?>
<!--=== Content Part ===-->
<div class="container content">     
    <div class="row">    
        <!-- Left Sidebar -->
        <div class="col-md-9">
        	<center>
	        	<?php $notify_url = "http://" . $_SERVER['SERVER_NAME'].$this->webroot.'paypal_ipn/process'; ?>
	        	<?php if($happy_hour == 1){ ?>
	        		<?php $paypal_happy_hour = $happy_hour_bonus/100 * $paypal_tokens; ?>
	            	<?php $item_name = $paypal_tokens.' '.$site_money.' + '.$paypal_happy_hour.' gratuits'; ?>
	            <?php } else { ?>
	            	<?php $item_name = $paypal_tokens.' '.$site_money; ?>
	            <?php } ?>
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
	                	<?php
		                $starpass_happy_hour = $happy_hour_bonus/100 * $starpass_tokens;
		                $paypal_happy_hour = $happy_hour_bonus/100 * $paypal_tokens;
		                ?>
		                <header>
		                	<h4>
		                		<i class="fa fa-gift"></i> Happy hour en cours, <?php echo $happy_hour_bonus.'% de '.$site_money.' gratuits'; ?><br>
			                	Acheter <?php echo $starpass_tokens.' '.$site_money.' + '.$starpass_happy_hour.' gratuits '; ?> via Starpass ou 
			                	<button type="submit" class="btn btn-default btn-sm">
		                			<i class="fa fa-paypal"></i> Acheter <?php echo $paypal_tokens.' '.$site_money.' + '.$paypal_happy_hour.' gratuits'; ?> via PayPal
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
	                		<div id="starpass_<?php echo $starpass_idd; ?>"></div>
	                		<iframe src="http://script.starpass.fr/iframe/kit_default.php?idd=<?php echo $starpass_idd; ?>&amp;background=fff&amp;verif_en_php=1" width="660" height="520" frameborder="0"></iframe>
	                	</section>
	                </fieldset>
	            <?php echo $this->Form->end(); ?>
	            <br>
	            <div class="row">
	            	<div class="col-md-8 col-md-offset-2">
	            		<?php echo $this->Form->create('Codes', ['action' => 'consume', 'inputDefaults' => ['error' => false]]); ?>
		                    <div class="input-group">
		                    	<?php echo $this->Form->input('code', array('type' => 'text', 'placeholder' => 'J\'ai un code cadeau !', 'class' => 'form-control', 'label' => false, 'required' => 'required')); ?>
			                    <span class="input-group-btn">
	                                <button class="btn btn-default send-command" type="submit"><i class="fa fa-chevron-right"></i></button>
	                            </span>
                            </div>
		            	<?php echo $this->Form->end(); ?>
	            	</div>
	            </div>
        	</center>
        </div>
        <?php echo $this->element('sidebar'); ?>
        <!-- End Left Sidebar -->
    </div><!--/row-->        
</div><!--/container-->     
<!--=== End Content Part ===-->