<?php $this->assign('title', 'Liste des joueurs'); ?>
<script>
$(document).ready(function(){
    $(window).load(function(){
        $(".confirm").confirm({
            text: "Voulez vous vraiment bannir ce joueur ?",
            title: "Confirmation",
            confirmButton: "Oui",
            cancelButton: "Non"
        });
    });

    $("select").selectBoxIt({
        showFirstOption: false
    });

    $('#data-table').dataTable({
        "lengthMenu": [[15, 25, 50, -1], [15, 25, 50, "Tout"]],
        "order": [[1, 'DESC']],
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
<?php
$players = $api->call('players.online')[0]['success'];
$count = count($players);
?>
<div class="main-content">
    <div class="container">
        <div class="page-content">
            <div class="single-head">
                <h3 class="pull-left"><i class="fa fa-table"></i><?php echo $count; ?> joueurs connecté(s) sur le serveur</h3>
                <div class="clearfix"></div>
            </div>
            <div class="page-tables">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" cellpadding="0" cellspacing="0" border="0" id="data-table" width="100%">
                        <thead>
                            <tr>
                                <th><b>Pseudo</b></th>
                                <th><b>GM</b></th>
                                <th><b>Niveau</b></th>
                                <th><b>Monde</b></th>
                                <th><b>Santé</b></th>
                                <th><b>Première connexion</b></th>
                                <th><b>Dernière connexion</b></th>
                                <th><b>Adresse IP</b></th>
                                <th><b>Actions</b></th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php
							foreach($players as $p){
								?>
								<tr>
	                                <td>
										<?php
	                                	if($p['op'] == true){
	                                		echo '<span class="text-danger"><i class="fa fa-certificate"></i> '.$p['name'].'</span>';
	                                	}
	                                	else{
	                                		echo $p['name'];
	                                	}
	                                	?>
	                                </td>
	                                <td><?php echo $p['gameMode']; ?></td>
	                                <td><?php echo $p['level']; ?></td>
	                                <td>
	                                	<?php
	                                	if($p['worldInfo']['isPVP'] == true){
	                                		echo $this->Html->image('minecraft/pvp.png', ['width' => 16, 'height' => 16, 'class' => 'ui-tooltip', 'data-original-title' => 'PvP activé', ' data-toggle' => 'tooltip', 'data-placement' => 'left']).' '.$p['worldInfo']['name'];
	                                	}
	                                	else{
	                                		echo $this->Html->image('minecraft/nopvp.png', ['width' => 16, 'height' => 16, 'class' => 'ui-tooltip', 'data-original-title' => 'PvP désactivé', ' data-toggle' => 'tooltip', 'data-placement' => 'left']).' '.$p['worldInfo']['name'];
	                                	}
	                                	?>
	                                </td>
	                                <td>
	                                	<?php
	                                	echo round($p['health']).' '.$this->Html->image('minecraft/heart.png', ['width' => 16, 'height' => 16]).' ';
	                                	echo $p['foodLevel'].' '.$this->Html->image('minecraft/food.png', ['width' => 16, 'height' => 16]);
	                                	?>
	                                </td>
	                                <td><?php echo date('d-m-Y à H:i', $p['firstPlayed']); ?></td>
                                    <td><?php echo date('d-m-Y à H:i', $p['lastPlayed']); ?></td>
                                    <td>
                                        <?php
                                        $ip = str_replace('/', '', $p['ip']);
                                        $ip = explode(':', $ip);
                                        echo $ip[0];
                                        ?>
                                    </td>
                                    <td>
                                        <select name="forma" onchange="location = this.options[this.selectedIndex].value;">
                                            <option>Que faire ?</option>
                                            <option value="<?php echo $this->Html->url(['controller' => 'players', 'action' => 'kick', $p['name']]); ?>" data-text='<i class="fa fa-bolt"></i> Kick'></option>
                                            <option value="<?php echo $this->Html->url(['controller' => 'players', 'action' => 'clear', $p['name']]); ?>" data-text='<i class="fa fa-trash"></i> Clear'></option>
                                            <option value="<?php echo $this->Html->url(['controller' => 'players', 'action' => 'ban', $p['name']]); ?>" data-text='<i class="fa fa-ban"></i> Ban'></option>
                                            <option value="<?php echo $this->Html->url(['controller' => 'players', 'action' => 'banip', $p['name']]); ?>" data-text='<i class="fa fa-globe"></i> Ban IP'></option>
                                            <option value="<?php echo $this->Html->url(['controller' => 'players', 'action' => 'whois', $p['name']]); ?>" data-text='<i class="fa fa-info-circle"></i> Whois ?'></option>
                                        </select>
                                    </td>
	                            </tr>
								<?php
							}
							?>
                        </tbody>
                    </table>
                    <div class="clearfix"></div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>