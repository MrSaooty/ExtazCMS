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
	    	var url_chat_messages = '<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'chat_messages')); ?>';
	    	var url_chat_update = '<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'chat_update')); ?>';
	        $.get(url_chat_messages, function(data){
				$('.chat-messages').html(data);
			}, 'json');
			$.get(url_chat_update, function(data){
				$('.chat-update').html(data);
			}, 'json');
		}
    }, 5000);

    $('.send-message').on('click', function(){
        var message = $('#message').val();
        var url = '<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'send_message')); ?>';
        $.post(url, {message: message}, function(data){
        	$('#message').val('');
        	var url = '<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'chat_messages')); ?>';
	        $.get(url, function(data){
				$('.chat-messages').html(data);
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
        return false;
    });
});
</script>
<div class="main-content">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="page-content">
					<input id="update" type="checkbox" checked="checked" class="update"></input>
					<label for="update">Mise à jour automatique ?</label><br>
						<div class="chat-update">
							<i class="fa fa-clock-o"></i> <?php echo 'Dernière mise à jour à '.date('H:i:s').', il y a '.$api->call('players.online.count')[0]['success'].' joueur(s) connecté(s)'; ?>
						</div>
					<hr>
					<div class="chat-messages">
						<?php
						$messages = $api->call('streams.chat.latest', [$chat_nb_messages])[0]['success'];
						if(count($messages) >= $chat_nb_messages){
							foreach($messages as $m){
								if(empty($m['player'])){
									$explode = explode(']', $m['message']);
									$explode = str_replace('[', '', $explode);
									$player = $explode[0];
									$message = $explode[1];
								}
								else{
									$player = $m['player'];
									$message = $m['message'];
								}
								echo '<small>['.date('H:i:s', $m['time']).']</small> <b class="player" id="'.$player.'"> '.$player.'</b> '.$message.'<br>';
							}
						}
						else{
							echo '<div class="alert alert-warning alert-dismissable"><small>Désolé mais il n\'y a pas assez de messages pour afficher le chat (minimum 20)</small></div>';
						}
						?>
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