<?php $this->assign('title', 'Vote et gagne'); ?>
<!--=== Content Part ===-->
<div class="container content">
    <div class="row">
        <!-- Begin Content -->
        <div class="col-md-9">
	        <div class="panel panel-default margin-bottom-40">
	            <table class="table">
	                <thead>
	                    <tr>
	                        <th class="votes">Classement</th>
	                        <th class="votes">Skin</th>
	                        <th class="votes">Pseudo</th>
	                        <th class="votes">Votes</th>
	                    </tr>
	                </thead>
	                <tbody>
	                    <?php
	                    $nb = 0;
	        			foreach($data as $d){
	        				$nb++;
							switch ($nb) {
								case 1:
									echo '<tr class="first">';
									break;
								
								case 2:
									echo '<tr class="second">';
									break;
								
								case 3:
									echo '<tr class="third">';
									break;
								
								default:
									echo '<tr>';
									break;
							}
	        				?>
								<td class="votes">
									<?php
									if($nb == 1){
	                                    echo $nb.'er';
	                                }
	                                else{
	                                    echo $nb.'ème';
	                                }
									?>
								</td>
								<td class="votes"><?php echo $this->Html->image('http://cravatar.eu/helmavatar/'.$d['User']['username'].'/20', ['class' => 'avatar-rounded']); ?> </td>
								<td class="votes"><?php echo $d['User']['username']; ?></td>
								<td class="votes"><?php echo $d['User']['votes']; ?></td>
							</tr>
	        				<?php
	        			}
	        			?>
	                </tbody>
	            </table>
	        </div>
        </div>
        <!-- End Content -->
        <?php echo $this->element('sidebar'); ?>
    </div>
</div><!--/container-->     
<!-- End Content Part -->