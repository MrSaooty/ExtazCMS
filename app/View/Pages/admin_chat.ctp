<?php $this->assign('title', 'Chat du serveur'); ?>
<link href='http://fonts.googleapis.com/css?family=Play' rel='stylesheet' type='text/css'>
<style>
	.chat-messages {
		font-size: 17px;
		font-family: 'Play', sans-serif;
	}
	.player {
		cursor: pointer;
	}
</style>
<script type="text/javascript">
$(document).ready(function(){
	$(document).on('click', '.player', function(){
    	var message = $('#message').val();
    	$('#message').val('@' + this.id + ' ' + message).focus();
    });

    setInterval(function(){
    	if($('.update').is(":checked")){
	    	var url = '<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'chat')); ?>';
	        $.get(url, function(data){
				$('.chat').html(data);
			}, 'json');
		}
    }, 5000);

    $('.send-message').on('click', function(){
    	event.preventDefault();
        var message = $('#message').val();
        var url = '<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'send_message')); ?>';
        $.post(url, {message: message}, function(data){
        	$('#message').val('');
        	var url = '<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'chat')); ?>';
	        $.get(url, function(data){
				$('.chat').html(data);
			}, 'json');
        	$.bootstrapGrowl("<i class='fa fa-check'></i> Message envoyé !", {
			  ele: 'body',
			  type: 'success',
			  offset: {from: 'top', amount: 20},
			  align: 'center',
			  width: 'integer',
			  delay: 2000,
			  allow_dismiss: false,
			  stackup_spacing: 10
			});
        });
    });
});
</script>
<div class="main-content">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="page-content">
					<div class="chat">
						<input id="update" type="checkbox" checked="checked" class="update"></input>
						<label for="update">Mise à jour automatique ?</label><br>
						<i class="fa fa-clock-o"></i> <?php echo 'Dernière mise à jour '.date('H:i:s'); ?>
						<hr>
						<div class="chat-messages">
							<?php
							$messages = $api->call('streams.chat.latest', [20])[0]['success'];
							foreach($messages as $m){
								// if(empty($m['player'])){
								// 	$explode = explode(']', $m['message']);
								// 	$explode = str_replace('[', '', $explode);
								// 	$player = $explode[0];
								// 	$message = $explode[1];
								// }
								// else{
								// 	$player = $m['player'];
								// 	$message = $m['message'];
								// }
								$player = $m['player'];
								$message = $m['message'];
								echo '<small>['.date('H:i:s', $m['time']).']</small> <b class="player" id="'.$player.'"> '.$player.'</b> '.$message.'<br>';
							}
							?>
						</div>
					</div>
					<hr>
					<div class="hidden-xs">
						<form>
			                <div class="input-group">
			                    <?php echo $this->Form->input('message', ['type' => 'text', 'class' => 'form-control', 'placeholder' => 'Envoyer un message', 'required' => 'required', 'label' => false]); ?>
			                    <span class="input-group-btn">
			                        <button class="btn btn-default send-message" type="submit"><i class="fa fa-chevron-right"></i></button>
			                    </span>
			                </div>
			            </form>
		            </div>
		            <div class="visible-xs">
						<form>
			                <div class="input-group">
			                    <?php echo $this->Form->input('message', ['type' => 'text', 'class' => 'form-control', 'placeholder' => 'Indisponible sur mobile', 'disabled' => 'disabled', 'label' => false]); ?>
			                    <span class="input-group-btn">
			                        <button class="btn btn-default send-message" disabled="disabled" type="submit"><i class="fa fa-chevron-right"></i></button>
			                    </span>
			                </div>
			            </form>
		            </div>
				</div>
			</div>
			<div class="col-md-6"></div>
		</div>
	</div>
</div>