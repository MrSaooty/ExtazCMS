<?php $this->assign('title', 'Statistiques'); ?>
<!--=== Content Part ===-->
<div class="container content">
    <div class="row">
        <!-- Begin Content -->
        <div class="col-md-9">
	        <div class="tag-box tag-box-v3">
	        	<?php if($use_store == 1){ ?>
		       	 	<h4>Statistiques d'achats</h4>
		        	<table class="table table-bordered table-striped">
		                <thead>
		                    <tr>
		                        <th>###</th>
		                        <th><center>Achats boutique</center></th>
		                        <th><center>Achats Starpass</center></th>
		                        <th><center>Achats PayPal</center></th>
		                    </tr>
		                </thead>
		                <tbody>
		                    <tr>
		                        <td>Depuis toujours</td>
		                        <td><center><?php echo $achatsDepuisToujours; ?></center></td>
		                        <td><center><?php echo $starpassDepuisToujours; ?></center></td>
		                        <td><center><?php echo $paypalDepuisToujours; ?></center></td>
		                    </tr>
		                    <tr>
			                    <td>Les 7 derniers jours</td>
			                    <td><center><?php echo $achatsCetteSemaine; ?></center></td>
			                    <td><center><?php echo $starpassCetteSemaine; ?></center></td>
			                    <td><center><?php echo $paypalCetteSemaine; ?></center></td>
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
			                        		echo '<font color="red"><i class="fa fa-arrow-down"></i> '.$achatsAujourdhui.' ('.$achatsDifference.')</font>';
			                        	}
			                        	elseif($achatsAujourdhui > $achatsHier){
			                        		echo '<font color="green"><i class="fa fa-arrow-up"></i> '.$achatsAujourdhui.' (+'.$achatsDifference.')</font>';
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
			                        		echo '<font color="red"><i class="fa fa-arrow-down"></i> '.$starpassAujourdhui.' ('.$starpassDifference.')</font>';
			                        	}
			                        	elseif($starpassAujourdhui > $starpassHier){
			                        		echo '<font color="green"><i class="fa fa-arrow-up"></i> '.$starpassAujourdhui.' (+'.$starpassDifference.')</font>';
			                        	}
			                        	?>
			                        </center>
		                        </td>
		                        <td>
		                        	<center>
			                        	<?php
			                        	$paypalDifference = $paypalAujourdhui - $paypalHier;
			                        	if($paypalAujourdhui == $paypalHier){
			                        		echo '<i class="fa fa-exchange"></i> '.$paypalAujourdhui.' (+0)';
			                        	}
			                        	elseif($paypalAujourdhui < $paypalHier){
			                        		echo '<font color="red"><i class="fa fa-arrow-down"></i> '.$paypalAujourdhui.' ('.$paypalDifference.')</font>';
			                        	}
			                        	elseif($paypalAujourdhui > $paypalHier){
			                        		echo '<font color="green"><i class="fa fa-arrow-up"></i> '.$paypalAujourdhui.' (+'.$paypalDifference.')</font>';
			                        	}
			                        	?>
			                        </center>
		                        </td>
		                    </tr>
		                    <tr>
		                        <td>Hier</td>
		                        <td><center><?php echo $achatsHier; ?></center></td>
		                        <td><center><?php echo $starpassHier; ?></center></td>
		                        <td><center><?php echo $paypalHier; ?></center></td>
		                    </tr>
		                </tbody>
		            </table>
		        <?php } ?>
	            <hr>
	       	 	<h4>Statistiques globales</h4>
	        	<table class="table table-bordered table-striped">
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
		                        		echo '<font color="red"><i class="fa fa-arrow-down"></i> '.$utilisateursAujourdhui.' ('.$utilisateursDifference.')</font>';
		                        	}
		                        	elseif($utilisateursAujourdhui > $utilisateursHier){
		                        		echo '<font color="green"><i class="fa fa-arrow-up"></i> '.$utilisateursAujourdhui.' (+'.$utilisateursDifference.')</font>';
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
		                        		echo '<font color="red"><i class="fa fa-arrow-down"></i> '.$ticketsAujourdhui.' ('.$ticketsDifference.')</font>';
		                        	}
		                        	elseif($ticketsAujourdhui > $ticketsHier){
		                        		echo '<font color="green"><i class="fa fa-arrow-up"></i> '.$ticketsAujourdhui.' (+'.$ticketsDifference.')</font>';
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
		                        		echo '<font color="red"><i class="fa fa-arrow-down"></i> '.$reponsesAujourdhui.' ('.$reponsesDifference.')</font>';
		                        	}
		                        	elseif($reponsesAujourdhui > $reponsesHier){
		                        		echo '<font color="green"><i class="fa fa-arrow-up"></i> '.$reponsesAujourdhui.' (+'.$reponsesDifference.')</font>';
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
        <!-- End Content -->
        <?php echo $this->element('sidebar'); ?>
    </div>
</div><!--/container-->     
<!-- End Content Part -->