<?php $this->assign('title', 'Tous les tickets'); ?>
<script>
$(document).ready(function(){
    $(".confirm").confirm({
        text: "Voulez vous vraiment clôturer ce ticket ?",
        title: "Confirmation",
        confirmButton: "Oui",
        cancelButton: "Non"
    });
});
</script>
<!--=== Content Part ===-->
<div class="container content">
    <div class="row magazine-page">
        <!-- Begin Content -->
        <div class="col-md-12">
            <table class="table table-bordered table-striped">
            	<thead>
            		<tr>
            			<td><b>Pseudo</b></td>
            			<td><b>Message envoyé</b></td>
            			<td><b>Dernière réponse</b></td>
            			<td><b>Priorité</b></td>
                        <td><b>Envoyé le</b></td>
                        <td><b>Actions</b></td>
            		</tr>
            	</thead>
            	<tbody>
            		<?php foreach($data as $d){ ?>
            		<tr>
                        <td>
                        	<?php echo $this->Html->image('http://cravatar.eu/helmavatar/'.$d['Support']['username'].'/12', ['alt' => 'Player head', 'style' => 'margin-top:-1px;']); ?>
                        	<a href="<?php echo $this->Html->url(['controller' => 'users', 'action' => 'edit', $d['User']['id']]); ?>" target="blank">
                                <?php
                                $username = $d['Support']['username'];
                                if(strlen($username) > 12){
                                    echo '<font color="#555">'.substr($d['Support']['username'], 0, 9).'...</font>';
                                }
                                else{
                                    echo '<font color="#555">'.$d['Support']['username'].'</font>';
                                }
                                ?>
                        	</a>
                        </td>
                        <td><?php echo substr($d['Support']['message'], 0, 60).'...'; ?></td>
                        <td>
                        	<?php
                        	if(!empty($d['supportComments'][0]['username'])){ 
                        		echo substr($d['supportComments'][0]['message'], 0, 60).'...';
                        	}
                        	else{
                        		echo '<i>Aucune réponse</i>';
                        	}
                        	?>
                        </td>
                        <td>
                            <?php
                            switch($d['Support']['priority']){
                                case '1':
                                    echo '<small><span class="text-highlights text-highlights-green">Basse</span></small>';
                                    break;
                                case '2':
                                    echo '<small><span class="text-highlights text-highlights-blue">Moyenne</span></small>';
                                    break;
                                case '3':
                                    echo '<small><span class="text-highlights text-highlights-orange">Haute</span></small>';
                                    break;
                                case '4':
                                    echo '<small><span class="text-highlights text-highlights-red">Très haute</span></small>';
                                    break;
                            }
                            ?>
                        </td>
                        <td>
	                        <small>
	                        	<span class="text-highlights text-highlights-dark"><?php echo $this->Time->format('d/m à H:i', $d['Support']['created']); ?></span>
	                        </small>
                        </td>
                        <td>
                            <center>
                            	<a href="<?php echo $this->Html->url(['controller' => 'pages', 'action' => 'view_ticket', 'id' => $d['Support']['id']]); ?>" class="btn-u btn-brd-hover rounded btn-u-dark btn-u-xs" type="submit"><i class="fa fa-list"></i></a>
                            	<a href="<?php echo $this->Html->url(['controller' => 'pages', 'action' => 'close_ticket', 'id' => $d['Support']['id']]); ?>" class="btn-u btn-brd-hover rounded btn-u btn-u-xs confirm tooltips" data-original-title="Clôturer" data-toggle="tooltip" data-placement="top" type="submit"><i class="fa fa-lock"></i></a>
                            </center>
                        </td>
            		</tr>
            		<?php } ?>
            	</tbody>
            </table>
        </div>
        <!-- End Content -->
    </div>
</div><!--/container-->     
<!-- End Content Part -->