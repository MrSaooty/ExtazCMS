<?php $this->assign('title', 'Historique de la boutique'); ?>
<script type="text/javascript">
$(document).ready(function(){
    $('#table').dataTable({
        "lengthMenu": [[15, 25, 50, -1], [15, 25, 50, "Tout"]],
        "order": [[ 4, "DESC" ]],
        language: {
            processing:     "Traitement en cours...",
            search:         "Rechercher&nbsp;:",
            lengthMenu:    "Afficher _MENU_ &eacute;l&eacute;ments",
            info:           "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
            infoEmpty:      "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
            infoFiltered:   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
            infoPostFix:    "",
            loadingRecords: "Chargement en cours...",
            zeroRecords:    "Aucun &eacute;l&eacute;ment &agrave; afficher",
            emptyTable:     "Aucune donnée disponible dans le tableau",
            paginate: {
                first:      "Premier",
                previous:   "Pr&eacute;c&eacute;dent",
                next:       "Suivant",
                last:       "Dernier"
            },
            aria: {
                sortAscending:  ": activer pour trier la colonne par ordre croissant",
                sortDescending: ": activer pour trier la colonne par ordre décroissant"
            }
        }
    });
});
</script>
<!--=== Content Part ===-->
<div class="container content">
    <div class="row magazine-page">
        <!-- Begin Content -->
        <div class="col-md-9">
        	<div class="tag-box tag-box-v3">
	            <table class="table table-bordered table-striped" id="table">
	            	<thead>
	            		<tr>
	            			<td><b>Pseudo</b></td>
	            			<td><b>Objet</b></td>
	            			<td><b>Prix</b></td>
	            			<td><b>Monnaie</b></td>
                            <td><b>Acheté le</b></td>
	            		</tr>
	            	</thead>
	            	<tbody>
	            		<?php foreach($data as $d){ ?>
	            		<?php if($d['shopHistory']['money'] == 'site'){ ?>
	            		<tr class="success">
	            		<?php } else { ?>
	            		<tr>
	            		<?php } ?>
                            <td><?php echo $d['shopHistory']['username']; ?></td>
                            <td><?php echo $d['shopHistory']['item']; ?></td>
                            <td><?php echo number_format($d['shopHistory']['price'], 0, ',', ' '); ?></td>
                            <?php if($d['shopHistory']['money'] == 'site'){ ?>
                                <td><?php echo ucfirst($site_money); ?></td>
                            <?php } else { ?>
                                <td><?php echo $money_server; ?></td>
                            <?php } ?>
                            <td><?php echo $this->Time->format('d/m/Y à H:i', $d['shopHistory']['created']); ?></td>
	            		</tr>
	            		<?php } ?>
	            	</tbody>
	            </table>
	        </div>
        </div>
        <!-- End Content -->
        <?php echo $this->element('sidebar'); ?>
    </div>
</div><!--/container-->     
<!-- End Content Part -->