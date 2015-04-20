<?php $this->assign('title', 'Tous les tickets'); ?>
<script>
$(document).ready(function(){
    $(".confirm").confirm({
        text: "Voulez vous vraiment clôturer ce ticket ?",
        title: "Confirmation",
        confirmButton: "Oui",
        cancelButton: "Non"
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
                <h3 class="pull-left"><i class="fa fa-table"></i>Liste des tickets ouverts</h3>
                <div class="clearfix"></div>
            </div>
            <div class="page-tables">
                <div class="table-responsive">
                    <table class="table table-bordered" cellpadding="0" cellspacing="0" border="0" id="data-table" width="100%">
                        <thead>
                            <tr>
                                <th><b>Pseudo</b></th>
                                <th><b>Message envoyé</b></th>
                                <th><b>Dernière réponse</b></th>
                                <th><b>Priorité</b></th>
                                <th><b>Envoyé le</b></th>
                                <th><b>Actions</b></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data as $d){ ?>
                            <tr>
                                <td>
                                    <?php echo $this->Html->image('http://cravatar.eu/helmavatar/'.$d['Support']['username'].'/12', ['alt' => 'Player head', 'style' => 'margin-top:-1px;']); ?>
                                    <a href="<?php echo $this->Html->url(['controller' => 'users', 'action' => 'edit', $d['User']['id']]); ?>" target="blank">
                                        <?php
                                        $username = $d['Support']['username'];
                                        if(strlen($username) > 12){
                                            echo '<font color="#555">'.substr($d['Support']['username'], 0, 9).'...</font>';
                                        }
                                        else{
                                            echo '<font color="#555">'.$d['Support']['username'].'</font>';
                                        }
                                        ?>
                                    </a>
                                </td>
                                <td><?php echo substr($d['Support']['message'], 0, 100).'...'; ?></td>
                                <td>
                                    <?php
                                    if(!empty($d['supportComments'][0]['username'])){ 
                                        echo substr($d['supportComments'][0]['message'], 0, 100).'...';
                                    }
                                    else{
                                        echo '<i>Aucune réponse</i>';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    switch($d['Support']['priority']){
                                        case '1':
                                            echo '<span class="label label-success btn-xs btn-block">Basse</span>';
                                            break;
                                        case '2':
                                            echo '<span class="label label-info btn-xs btn-block">Moyenne</span>';
                                            break;
                                        case '3':
                                            echo '<span class="label label-warning btn-xs btn-block">Haute</span>';
                                            break;
                                        case '4':
                                        echo '<span class="label label-danger btn-xs btn-block">Très haute</span>';
                                            break;
                                    }
                                    ?>
                                </td>
                                <td>
                                    <small>
                                        <span class="label label-black"><?php echo $this->Time->format('d-m à H:i', $d['Support']['created']); ?></span>
                                    </small>
                                </td>
                                <td>
                                    <a href="<?php echo $this->Html->url(['controller' => 'pages', 'action' => 'view_ticket', 'id' => $d['Support']['id'], 'admin' => false]); ?>" class="label label-black" type="submit"><i class="fa fa-list"></i></a>
                                    <a href="<?php echo $this->Html->url(['controller' => 'pages', 'action' => 'close_ticket', 'id' => $d['Support']['id'], 'admin' => false]); ?>" class="label label-danger confirm ui-tooltip" data-original-title="Clôturer" data-toggle="tooltip" data-placement="right" type="submit"><i class="fa fa-lock"></i></a>
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