<?php $this->assign('title', 'Statistiques'); ?>
<div class="main-content">
	<div class="container">
		<div class="page-content page-statement">
			<div class="single-head">
				<h3 class="pull-left"><i class="fa fa-area-chart"></i>Statistiques</h3>
				<div class="clearfix"></div>
			</div>
			<div class="row">
			  <?php if($use_store == 1){ ?>
				  <div class="col-md-3 col-sm-3">
					<div class="well br-red">
					  <h2><?php echo $achatsAujourdhui; ?> <small><a href="<?php echo $this->Html->url(['controller' => 'charts', 'action' => 'shop', 'admin' => true]); ?>" target="_blank">(Graphique)</a></small></h2>
					  <p>Nombre d'achats dans la boutique aujourd'hui</p>
					</div>
				  </div>
				  <div class="col-md-3 col-sm-3">
					<div class="well br-lblue">
					  <h2><?php echo $starpassAujourdhui; ?> <small><a href="<?php echo $this->Html->url(['controller' => 'charts', 'action' => 'starpass', 'admin' => true]); ?>" target="_blank">(Graphique)</a></small></h2>
					  <p>Nombre de code Starpass validés aujourd'hui</p>                        
					</div>
				  </div>
				  <?php if($use_paypal == 1){ ?>
					  <div class="col-md-3 col-sm-3">
						<div class="well br-green">
						  <h2><?php echo $paypalAujourdhui; ?> <small><a href="<?php echo $this->Html->url(['controller' => 'charts', 'action' => 'paypal', 'admin' => true]); ?>" target="_blank">(Graphique)</a></small></h2>
						  <p>Nombre d'achats via PayPal aujourd'hui</p>
						</div>
					  </div>
				  <?php } else { ?>
					  <div class="col-md-3 col-sm-3">
						<div class="well br-green">
						  <h2>Désactivé</h2>
						  <p>Nombre d'achats via PayPal aujourd'hui</p>
						</div>
					  </div>
				  <?php } ?>
			  <?php } else { ?>
				  <div class="col-md-3 col-sm-3">
					<div class="well br-red">
					  <h2>Désactivé</h2>
					  <p>Nombre d'achats dans la boutique aujourd'hui</p>
					</div>
				  </div>
				  <div class="col-md-3 col-sm-3">
					<div class="well br-lblue">
					  <h2>Désactivé</h2>
					  <p>Nombre de code Starpass validés aujourd'hui</p>                        
					</div>
				  </div>
				  <div class="col-md-3 col-sm-3">
					<div class="well br-green">
					  <h2>Désactivé</h2>
					  <p>Nombre d'achats via PayPal aujourd'hui</p>
					</div>
				  </div>
			  <?php } ?>
			  <div class="col-md-3 col-sm-3">
				<div class="well br-purple">
				  <h2><?php echo $utilisateursAujourdhui; ?> <small><a href="<?php echo $this->Html->url(['controller' => 'charts', 'action' => 'user', 'admin' => true]); ?>" target="_blank">(Graphique)</a></small></h2>
				  <p>Nombre d'utlisateur inscrits aujourd'hui</p>
				</div>
			  </div>
			</div>
			<div class="row">
			  <div class="col-md-12">
			    <?php if($use_store == 1){ ?>
				<hr>
				<table class="table table-bordered table-responsive">
					<thead>
	                    <tr>
	                        <th>###</th>
	                        <th><center>Achats boutique</center></th>
	                        <th><center>Achats Starpass</center></th>
	                        <?php if($use_paypal == 1){ ?>
	                        <th><center>Achats PayPal</center></th>
	                        <?php } ?>
	                    </tr>
	                </thead>
	                <tbody>
	                    <tr>
	                        <td>Depuis toujours</td>
	                        <td><center><?php echo $achatsDepuisToujours; ?></center></td>
	                        <td><center><?php echo $starpassDepuisToujours; ?></center></td>
	                        <?php if($use_paypal == 1){ ?>
	                        <td><center><?php echo $paypalDepuisToujours; ?></center></td>
	                        <?php } ?>
	                    </tr>
	                    <tr>
		                    <td>Les 7 derniers jours</td>
		                    <td><center><?php echo $achatsCetteSemaine; ?></center></td>
		                    <td><center><?php echo $starpassCetteSemaine; ?></center></td>
		                    <?php if($use_paypal == 1){ ?>
		                    <td><center><?php echo $paypalCetteSemaine; ?></center></td>
		                    <?php } ?>
		                </tr>
		                <tr>
	                        <td>Aujourd'hui</td>
	                        <td>
	                        	<center>
		                        	<?php
		                        	$achatsDifference = $achatsAujourdhui - $achatsHier;
		                        	if($achatsAujourdhui == $achatsHier){
		                        		echo '<i class="fa fa-exchange"></i> '.$achatsAujourdhui.' (+0)';
		                        	}
		                        	elseif($achatsAujourdhui < $achatsHier){
		                        		echo '<font color="red"><i class="fa fa-arrow-circle-down red"></i> '.$achatsAujourdhui.' ('.$achatsDifference.')</font>';
		                        	}
		                        	elseif($achatsAujourdhui > $achatsHier){
		                        		echo '<font color="green"><i class="fa fa-arrow-circle-up green"></i> '.$achatsAujourdhui.' (+'.$achatsDifference.')</font>';
		                        	}
		                        	?>
		                        </center>
	                        </td>
	                        <td>
	                        	<center>
		                        	<?php
		                        	$starpassDifference = $starpassAujourdhui - $starpassHier;
		                        	if($starpassAujourdhui == $starpassHier){
		                        		echo '<i class="fa fa-exchange"></i> '.$starpassAujourdhui.' (+0)';
		                        	}
		                        	elseif($starpassAujourdhui < $starpassHier){
		                        		echo '<font color="red"><i class="fa fa-arrow-circle-down red"></i> '.$starpassAujourdhui.' ('.$starpassDifference.')</font>';
		                        	}
		                        	elseif($starpassAujourdhui > $starpassHier){
		                        		echo '<font color="green"><i class="fa fa-arrow-circle-up green"></i> '.$starpassAujourdhui.' (+'.$starpassDifference.')</font>';
		                        	}
		                        	?>
		                        </center>
	                        </td>
	                        <?php if($use_paypal == 1){ ?>
	                        <td>
	                        	<center>
		                        	<?php
		                        	$paypalDifference = $paypalAujourdhui - $paypalHier;
		                        	if($paypalAujourdhui == $paypalHier){
		                        		echo '<i class="fa fa-exchange"></i> '.$paypalAujourdhui.' (+0)';
		                        	}
		                        	elseif($paypalAujourdhui < $paypalHier){
		                        		echo '<font color="red"><i class="fa fa-arrow-circle-down red"></i> '.$paypalAujourdhui.' ('.$paypalDifference.')</font>';
		                        	}
		                        	elseif($paypalAujourdhui > $paypalHier){
		                        		echo '<font color="green"><i class="fa fa-arrow-circle-up green"></i> '.$paypalAujourdhui.' (+'.$paypalDifference.')</font>';
		                        	}
		                        	?>
		                        </center>
	                        </td>
	                        <?php } ?>
	                    </tr>
	                    <tr>
	                        <td>Hier</td>
	                        <td><center><?php echo $achatsHier; ?></center></td>
	                        <td><center><?php echo $starpassHier; ?></center></td>
	                        <?php if($use_paypal == 1){ ?>
	                        <td><center><?php echo $paypalHier; ?></center></td>
	                        <?php } ?>
	                    </tr>
	                </tbody>
				</table>
				<?php } ?>
				<hr>
				<table class="table table-bordered table-responsive">
					<thead>
	                    <tr>
	                        <th>###</th>
	                        <th><center>Utilisateurs inscrits</center></th>
	                        <th><center>Nombre de tickets support</center></th>
	                        <th><center>Nombre de réponses aux tickets</center></th>
	                    </tr>
	                </thead>
	                <tbody>
	                    <tr>
	                        <td>Depuis toujours</td>
	                        <td><center><?php echo $utilisateursDepuisToujours; ?></center></td>
	                        <td><center><?php echo $ticketsDepuisToujours; ?></center></td>
	                        <td><center><?php echo $reponsesDepuisToujours; ?></center></td>
	                    </tr>
	                    <tr>
		                    <td>Les 7 derniers jours</td>
	                        <td><center><?php echo $utilisateursCetteSemaine; ?></center></td>
	                        <td><center><?php echo $ticketsCetteSemaine; ?></center></td>
	                        <td><center><?php echo $reponsesCetteSemaine; ?></center></td>
		                </tr>
		                <tr>
	                        <td>Aujourd'hui</td>
	                        <td>
	                        	<center>
		                        	<?php
		                        	$utilisateursDifference = $utilisateursAujourdhui - $utilisateursHier;
		                        	if($utilisateursAujourdhui == $utilisateursHier){
		                        		echo '<i class="fa fa-exchange"></i> '.$utilisateursAujourdhui.' (+0)';
		                        	}
		                        	elseif($utilisateursAujourdhui < $utilisateursHier){
		                        		echo '<font color="red"><i class="fa fa-arrow-circle-down red"></i> '.$utilisateursAujourdhui.' ('.$utilisateursDifference.')</font>';
		                        	}
		                        	elseif($utilisateursAujourdhui > $utilisateursHier){
		                        		echo '<font color="green"><i class="fa fa-arrow-circle-up green"></i> '.$utilisateursAujourdhui.' (+'.$utilisateursDifference.')</font>';
		                        	}
		                        	?>
		                        </center>
	                        </td>
	                        <td>
	                        	<center>
		                        	<?php
		                        	$ticketsDifference = $ticketsAujourdhui - $ticketsHier;
		                        	if($ticketsAujourdhui == $ticketsHier){
		                        		echo '<i class="fa fa-exchange"></i> '.$ticketsAujourdhui.' (+0)';
		                        	}
		                        	elseif($ticketsAujourdhui < $ticketsHier){
		                        		echo '<font color="red"><i class="fa fa-arrow-circle-down red"></i> '.$ticketsAujourdhui.' ('.$ticketsDifference.')</font>';
		                        	}
		                        	elseif($ticketsAujourdhui > $ticketsHier){
		                        		echo '<font color="green"><i class="fa fa-arrow-circle-up green"></i> '.$ticketsAujourdhui.' (+'.$ticketsDifference.')</font>';
		                        	}
		                        	?>
		                        </center>
	                        </td>
	                        <td>
	                        	<center>
		                        	<?php
		                        	$reponsesDifference = $reponsesAujourdhui - $reponsesHier;
		                        	if($reponsesAujourdhui == $reponsesHier){
		                        		echo '<i class="fa fa-exchange"></i> '.$reponsesAujourdhui.' (+0)';
		                        	}
		                        	elseif($reponsesAujourdhui < $reponsesHier){
		                        		echo '<font color="red"><i class="fa fa-arrow-circle-down red"></i> '.$reponsesAujourdhui.' ('.$reponsesDifference.')</font>';
		                        	}
		                        	elseif($reponsesAujourdhui > $reponsesHier){
		                        		echo '<font color="green"><i class="fa fa-arrow-circle-up green"></i> '.$reponsesAujourdhui.' (+'.$reponsesDifference.')</font>';
		                        	}
		                        	?>
		                        </center>
	                        </td>
	                    </tr>
	                    <tr>
	                        <td>Hier</td>
	                        <td><center><?php echo $utilisateursHier; ?></center></td>
	                        <td><center><?php echo $ticketsHier; ?></center></td>
	                        <td><center><?php echo $reponsesHier; ?></center></td>
	                    </tr>
               		</tbody>
				</table>
			</div>
		</div>
	</div>
</div>