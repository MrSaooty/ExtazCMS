<?php $this->assign('title', 'Liste des widgets'); ?>
<script>
$(document).ready(function(){
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
    $(".confirm").confirm({
        text: "Voulez vous vraiment supprimer ce widget ?",
        title: "Confirmation",
        confirmButton: "Oui",
        cancelButton: "Non"
    });
});
</script>
<div class="wrapper wrapper-content">
    <div class="animated fadeInRightBig">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Liste des widgets</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a href="<?php echo $this->Html->url(['controller' => 'widgets', 'action' => 'add']); ?>">
                        <i class="fa fa-plus"></i>
                    </a>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <table class="table table-bordered table-hover dataTables-example dataTable dtr-inline" id="data-table">
                    <thead>
                        <tr>
                            <th><b>ID</b></th>
                            <th><b>Créateur</b></th>
                            <th><b>Nom</b></th>
                            <th><b>Ordre</b></th>
                            <th><b>Créé le</b></th>
                            <th><b>Actions</b></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data as $d){ ?>
                        <tr>
                            <td><?php echo $d['Widget']['id']; ?></td>
                            <td><?php echo $d['User']['username']; ?></td>
                            <td><?php echo $d['Widget']['name']; ?></td>
                            <td><?php echo $d['Widget']['order']; ?></td>
                            <td><?php echo $this->Time->format('d/m/Y à H:i', $d['Widget']['created']); ?></td>
                            <td>
                                <a href="<?php echo $this->Html->url(['controller' => 'widgets', 'action' => 'edit', $d['Widget']['id']]); ?>" class="btn btn-white btn-xs"><i class="fa fa-pencil-square-o"></i> Editer</a>
                                <?php
                                if($d['Widget']['visible'] == 1){
                                    ?>
                                    <a href="<?php echo $this->Html->url(['controller' => 'widgets', 'action' => 'hide', $d['Widget']['id']]); ?>" class="btn btn-white btn-xs"><i class="fa fa-eye-slash"></i> Cacher</a>
                                    <?php
                                }
                                else{
                                    ?>
                                    <a href="<?php echo $this->Html->url(['controller' => 'widgets', 'action' => 'show', $d['Widget']['id']]); ?>" class="btn btn-white btn-xs"><i class="fa fa-eye"></i> Afficher</a>
                                    <?php
                                }
                                ?>
                                <a href="<?php echo $this->Html->url(['controller' => 'widgets', 'action' => 'delete', $d['Widget']['id']]); ?>" class="btn btn-white btn-xs confirm"><i class="fa fa-trash-o"></i> Supprimer</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>