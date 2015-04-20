<?php $this->assign('title', 'Tous les articles'); ?>
<script>
$(document).ready(function(){
    $(window).load(function(){
        $(".confirm").confirm({
            text: "Voulez vous vraiment supprimer cet article ?",
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
                <h3 class="pull-left"><i class="fa fa-table"></i>Liste des articles disponibles dans la boutique</h3>
                <div class="clearfix"></div>
            </div>
            <div class="page-tables">
                <div class="table-responsive">
                    <table class="table table-bordered" cellpadding="0" cellspacing="0" border="0" id="data-table" width="100%">
                        <thead>
                            <tr>
                                <th><b>Nom</b></th>
                                <?php
                                if($use_store == 1){
                                    echo '<th><b>Prix en '.$site_money.'</b></th>';
                                }
                                if($use_server_money == 1){
                                    echo '<th><b>Prix en '.$money_server.'</b></th>';
                                }
                                ?>
                                <th><b>Date de création</b></th>
                                <th><b>Actions</b></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data as $d){ ?>
                            <tr>
                                <td><?php echo $d['Shop']['name']; ?></td>
                                <?php
                                if($use_store == 1){
                                    echo '<td>'.$d['Shop']['price_money_site'].'</td>';
                                }
                                if($use_server_money == 1){
                                    echo '<td>'.$d['Shop']['price_money_server'].'</td>';
                                }
                                ?>
                                <td><?php echo $this->Time->format('d-m-Y à H:i', $d['Shop']['created']); ?></td>
                                <td>
                                    <a href="<?php echo $this->Html->url(['controller' => 'shops', 'action' => 'edit', $d['Shop']['id'], 'admin' => true]); ?>" class="label label-black"><i class="fa fa-pencil-square-o"></i> Editer</a>
                                    <a href="<?php echo $this->Html->url(['controller' => 'shops', 'action' => 'delete', $d['Shop']['id'], 'admin' => false]); ?>" class="label label-danger confirm"><i class="fa fa-trash-o"></i> Supprimer</a>
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