<?php $this->assign('title', 'Liste des pages'); ?>
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
                <h3 class="pull-left"><i class="fa fa-table"></i>Liste des articles publiés</h3>
                <div class="clearfix"></div>
            </div>
            <div class="page-tables">
                <div class="table-responsive">
                    <table class="table table-bordered" cellpadding="0" cellspacing="0" border="0" id="data-table" width="100%">
                        <thead>
                            <tr>
                                <th><b>Auteur</b></th>
                                <th><b>Type</b></th>
                                <th><b>Nom</b></th>
                                <th><b>URL</b></th>
                                <th><b>Date de création</b></th>
                                <th><b>Actions</b></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data as $d){ ?>
                            <tr>
                                <td><?php echo $d['User']['username']; ?></td>
                                <td>
                                    <?php
                                    if($d['Cpage']['redirect'] == 1){
                                        echo '<i class="fa fa-refresh"></i> Redirection';
                                    }
                                    else{
                                        echo '<i class="fa fa-file"></i> Page';
                                    }
                                    ?>
                                </td>
                                <td><?php echo $d['Cpage']['name']; ?></td>
                                <td>
                                    <?php if($d['Cpage']['redirect'] == 1){ ?>
                                    <span class="label label-black">
                                        <i class="fa fa-globe"></i>
                                        <?php echo $d['Cpage']['url']; ?>
                                    </span>
                                    <?php } else { ?>
                                    <span class="label label-black">
                                        <i class="fa fa-globe"></i>
                                        <?php echo 'http://'.$_SERVER['SERVER_NAME'].$this->Html->url(['controller' => 'cpages', 'action' => 'read', 'slug' => $d['Cpage']['slug'], 'admin' => false]); ?>
                                    </span>
                                    <?php } ?>
                                </td>
                                <td><?php echo $this->Time->format('d-m-Y à H:i', $d['Cpage']['created']); ?></td>
                                <td>
                                    <a href="<?php echo $this->Html->url(['controller' => 'cpages', 'action' => 'read', 'slug' => $d['Cpage']['slug'], 'admin' => false]); ?>" class="label label-black" target="_blank"><i class="fa fa-eye"></i> Voir</a>
                                    <?php
                                    if($d['Cpage']['redirect'] == 1){
                                        ?>
                                        <a href="<?php echo $this->Html->url(['controller' => 'cpages', 'action' => 'edit_redirection', $d['Cpage']['id'], 'admin' => true]); ?>" class="label label-black"><i class="fa fa-pencil-square-o"></i> Editer</a>
                                        <?php
                                    }
                                    else{
                                        ?>
                                        <a href="<?php echo $this->Html->url(['controller' => 'cpages', 'action' => 'edit', $d['Cpage']['id'], 'admin' => true]); ?>" class="label label-black"><i class="fa fa-pencil-square-o"></i> Editer</a>
                                        <?php
                                    }
                                    ?>
                                    <a href="<?php echo $this->Html->url(['controller' => 'cpages', 'action' => 'delete', $d['Cpage']['id'], 'admin' => true]); ?>" class="label label-danger confirm"><i class="fa fa-trash-o"></i> Supprimer</a>
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