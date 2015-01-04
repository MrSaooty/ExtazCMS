<?php $this->assign('title', 'Tous les utilisateurs'); ?>
<script type="text/javascript">
$(document).ready(function(){
    $('#table').dataTable({
        "lengthMenu": [[15, 25, 50, -1], [15, 25, 50, "Tout"]],
        "order": [[ 2, "desc" ]],
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
	            			<td><b>eMail</b></td>
	            			<td><b>Tokens</b></td>
	            			<td><b>Role</b></td>
                            <td><b>Inscrit le</b></td>
                            <td><b>Action</b></td>
	            		</tr>
	            	</thead>
	            	<tbody>
	            		<?php foreach($data as $d){ ?>
	            		<tr>
	            			<td><?php echo $d['User']['username']; ?></td>
	            			<td><?php echo $d['User']['email']; ?></td>
	            			<td><?php echo $d['User']['tokens']; ?></td>
                            <?php if($d['User']['role'] == 0){ ?>
	            			    <td><span class="text-highlights text-highlights-green">Utilisateur</span></td>
                            <?php } else { ?>
                                <td><span class="text-highlights text-highlights-red">Administrateur</span></td>
                            <?php } ?>
                            <td><?php echo $this->Time->format('d/m/Y à H:i', $d['User']['created']); ?></td>
                            <td>
                                <center>
                                    <a href="<?php echo $this->Html->url(['controller' => 'users', 'action' => 'edit', $d['User']['id']]); ?>" class="btn btn-default btn-brd-hover rounded btn-u-dark btn-u-xs btn-block">Modifier</a>
                                </center>
                            </td>
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