<?php $this->assign('title', 'Liste des catégories'); ?>
<script type="text/javascript">
$(document).ready(function(){
    $(window).load(function(){
        $(".confirm").confirm({
            text: "Voulez vous vraiment supprimer cette catégorie ?",
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
                <h3 class="pull-left"><i class="fa fa-table"></i>Liste des catégories</h3>
                <div class="clearfix"></div>
            </div>
            <div class="page-tables">
                <div class="table-responsive">
                    <table class="table table-bordered" cellpadding="0" cellspacing="0" border="0" id="data-table" width="100%">
                        <thead>
                            <tr>
                                <th><b>ID</b></th>
                                <th><b>Nom</b></th>
                                <th><b>Action</b></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($categories as $category){ ?>
                            <tr>
                                <td><?php echo $category['shopCategories']['id']; ?></td>
                                <td><?php echo $category['shopCategories']['name']; ?></td>
                                <?php 
                                if($category['shopCategories']['id'] != 0){
                                    ?>
                                    <td>
                                        <a href="<?php echo $this->Html->url(['controller' => 'pages', 'action' => 'edit_shop_categories', 'id' => $category['shopCategories']['id']]); ?>" class="label label-black"><i class="fa fa-pencil-square-o"></i> Editer</a>
                                        <a href="<?php echo $this->Html->url(['controller' => 'pages', 'action' => 'delete_shop_categories', 'id' => $category['shopCategories']['id']]); ?>" class="label label-danger confirm"><i class="fa fa-trash-o"></i> Supprimer</a>
                                    </td>
                                    <?php
                                }
                                else{
                                    ?>
                                    <td>
                                        <a href="#" class="label label-default"><i class="fa fa-pencil-square-o"></i> Editer</a>
                                        <a href="#" class="label label-default"><i class="fa fa-trash-o"></i> Supprimer</a>
                                    </td>
                                    <?php
                                }
                                ?>
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