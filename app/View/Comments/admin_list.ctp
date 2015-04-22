<?php $this->assign('title', 'Commentaires'); ?>
<script>
$(document).ready(function(){
    $(window).load(function(){
        $(".confirm").confirm({
            text: "Voulez vous vraiment supprimer ce commentaire ?",
            title: "Confirmation",
            confirmButton: "Oui",
            cancelButton: "Non"
        });
    });

    $('#data-table').dataTable({
        "lengthMenu": [[15, 25, 50, -1], [15, 25, 50, "Tout"]],
        "order": [],
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
<div class="main-content">
    <div class="container">
        <div class="page-content">
            <div class="single-head">
                <h3 class="pull-left"><i class="fa fa-table"></i>Liste des commentaires</h3>
                <div class="clearfix"></div>
            </div>
            <div class="page-tables">
                <div class="table-responsive">
                    <table class="table table-bordered" cellpadding="0" cellspacing="0" border="0" id="data-table" width="100%">
                        <thead>
                            <tr>
                                <th><b>Actualité</b></th>
                                <th><b>Auteur</b></th>
                                <th><b>Adresse IP</b></th>
                                <th><b>Commentaire</b></th>
                                <th><b>Posté le</b></th>
                                <th><b>Actions</b></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data as $d){ ?>
                            <tr>
                                <td><a href="<?php echo $this->Html->url(array('controller' => 'posts', 'action' => 'read', 'slug' => $d['Post']['slug'], 'id' => $d['Post']['id'], 'admin' => false)); ?>" target="_blank"><?php echo '[#'.$d['Post']['id'].'] '.$d['Post']['title']; ?></a></td>
                                <td>
                                    <?php
                                    if($d['User']['username'] == null){
                                        echo '<u>Compte supprimé</u>';
                                    }
                                    else{
                                        echo $d['User']['username'];
                                    }
                                    ?>
                                </td>
                                <td><?php echo $d['Comment']['ip']; ?></td>
                                <td><?php echo htmlentities($d['Comment']['comment']); ?></td>
                                <td><?php echo $this->Time->format('d-m-Y à H:i', $d['Comment']['created']); ?></td>
                                <td>
                                    <a href="<?php echo $this->Html->url(['controller' => 'comments', 'action' => 'edit', $d['Comment']['id'], 'admin' => true]); ?>" class="label label-black"><i class="fa fa-pencil-square-o"></i> Editer</a>
                                    <a href="<?php echo $this->Html->url(['controller' => 'comments', 'action' => 'delete', $d['Comment']['id'], 'list', 'admin' => true]); ?>" class="label label-danger confirm"><i class="fa fa-trash-o"></i> Supprimer</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <div class="clearfix"></div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>