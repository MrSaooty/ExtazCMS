<?php $this->assign('title', 'Historique Starpass'); ?>
<script type="text/javascript">
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
});
</script>
<div class="main-content">
    <div class="container">
        <div class="page-content">
            <div class="single-head">
                <h3 class="pull-left"><i class="fa fa-table"></i>Historique d'achats Starpass</h3>
                <div class="breads pull-right">
                    <a href="<?php echo $this->Html->url(['controller' => 'charts', 'action' => 'starpass', 'admin' => true]); ?>" class="label label-black" target="_blank"><i class="fa fa-pie-chart"></i> Graphique</a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="page-tables">
                <div class="table-responsive">
                    <table class="table table-bordered" cellpadding="0" cellspacing="0" border="0" id="data-table" width="100%">
                        <thead>
                            <tr>
                                <th><b>Pseudo</b></th>
                                <th><b><?php echo ucfirst($site_money); ?> achetés</b></th>
                                <th><b>Code</b></th>
                                <th><b>Note</b></th>
                                <th><b>Acheté le</b></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data as $d){ ?>
                            <?php if($d['starpassHistory']['note'] == 'Happy hour'){ ?>
                            <tr class="success">
                            <?php } else { ?>
                            <tr>
                            <?php } ?>
                                <td><?php echo $d['starpassHistory']['username']; ?></td>
                                <td><?php echo $d['starpassHistory']['tokens']; ?></td>
                                <td><?php echo $d['starpassHistory']['code']; ?></td>
                                <td><?php echo $d['starpassHistory']['note']; ?></td>
                                <td><small><span class="label label-black"><?php echo $this->Time->format('d-m-Y à H:i', $d['starpassHistory']['created']); ?></span></small></td>
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