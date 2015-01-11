<?php $this->assign('title', 'Liste des membres de l\'équipe'); ?>
<script>
$(document).ready(function(){
    $(window).load(function(){
        $(".confirm").confirm({
            text: "Voulez vous vraiment supprimer ce membre ?",
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
                <h3 class="pull-left"><i class="fa fa-table lblue"></i>Liste des membres</h3>
                <div class="clearfix"></div>
            </div>
            <div class="page-tables">
                <div class="table-responsive">
                    <table class="table table-bordered" cellpadding="0" cellspacing="0" border="0" id="data-table" width="100%">
                        <thead>
                            <tr>
                                <th><b>Pseudo</b></th>
                                <th><b>Rang</b></th>
                                <th><b>Facebook</b></th>
                                <th><b>Twitter</b></th>
                                <th><b>Actions</b></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data as $d){ ?>
                            <tr>
                                <td><?php echo $d['Team']['username']; ?></td>
                                <td>
                                    <?php
                                    switch($d['Team']['rank']){
                                        case '1':
                                            echo '<span class="label label-danger">Fondateur</span>';
                                            break;
                                        case '2':
                                            echo '<span class="label label-danger">Administrateur</span>';
                                            break;
                                        case '3':
                                            echo '<span class="label label-success">Modérateur</span>';
                                            break;
                                        case '4':
                                            echo '<span class="label label-info">Animateur</span>';
                                            break;
                                        case '5':
                                            echo '<span class="label label-black">Architecte</span>';
                                            break;
                                        case '6':
                                            echo '<span class="label label-default">Guide</span>';
                                            break;
                                        default:
                                            echo '<span class="label label-default">Indéfini</span>';
                                            break;
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if(empty($d['Team']['facebook_url'])){
                                        echo 'Non renseignée';
                                    }
                                    else{
                                        echo $d['Team']['facebook_url'];
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if(empty($d['Team']['twitter_url'])){
                                        echo 'Non renseignée';
                                    }
                                    else{
                                        echo $d['Team']['twitter_url'];
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a href="<?php echo $this->Html->url(['controller' => 'pages', 'action' => 'edit_member', 'id' => $d['Team']['id'], 'admin' => true]); ?>" class="label label-success">Editer</a>
                                    <a href="<?php echo $this->Html->url(['controller' => 'pages', 'action' => 'delete_member', 'id' => $d['Team']['id'], 'admin' => true]); ?>" class="label label-danger confirm">Supprimer</a>
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