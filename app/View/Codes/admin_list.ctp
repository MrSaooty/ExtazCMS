<?php $this->assign('title', 'Codes cadeaux'); ?>
<script type="text/javascript">
$(document).ready(function(){
    $(window).load(function(){
        $(".confirm").confirm({
            text: "Voulez vous vraiment supprimer ce code ?",
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
                <h3 class="pull-left"><i class="fa fa-table"></i>Liste des codes cadeaux générés</h3>
                <div class="clearfix"></div>
            </div>
            <div class="page-tables">
                <div class="table-responsive">
                    <table class="table table-bordered" cellpadding="0" cellspacing="0" border="0" id="data-table" width="100%">
                        <thead>
                            <tr>
                                <th><b>Créateur</b></th>
                                <th><b>Adresse IP</b></th>
                                <th><b>Code</b></th>
                                <th><b>Valeur</b></th>
                                <th><b>Utilisé ?</b></th>
                                <th><b>Date de création</b></th>
                                <th><b>Action</b></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data as $d){ ?>
                            <?php
                            if($d['Code']['used'] == 1){
                                echo '<tr class="danger">';
                            }
                            else{
                                echo '<tr>';
                            }
                            ?>
                                <td><?php echo $d['User']['username']; ?></td>
                                <td><?php echo $d['Code']['ip']; ?></td>
                                <td>
                                    <input onclick="select()" value="<?php echo $d['Code']['code']; ?>" readonly="readonly"></input>
                                </td>
                                <td><?php echo $d['Code']['value'].' '.$site_money; ?></td>
                                <td>
                                    <?php
                                    if($d['Code']['used'] == 0){
                                        echo 'Non';
                                    }
                                    else{
                                        echo 'Oui par '.$d['Code']['by'];
                                    }
                                    ?>
                                </td>
                                <td><?php echo $this->Time->format('d/m/Y à H:i', $d['Code']['created']); ?></td>
                                <?php
                                if($d['Code']['used'] == 0){
                                    echo '<td><a href="'.$this->Html->url(['controller' => 'codes', 'action' => 'delete', $d['Code']['id']]).'" class="label label-danger confirm"><i class="fa fa-trash-o"></i> Supprimer</a></td>';
                                }
                                else{
                                    echo '<td><span class="label label-default" disabled="disabled"><i class="fa fa-trash-o"></i> Supprimer</span></td>';
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