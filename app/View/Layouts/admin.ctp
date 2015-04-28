<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $this->fetch('title'); ?></title>
        <meta name="description" content="ExtazCMS Admin">
        <meta name="keywords" content="ExtazCMS">
        <meta name="author" content="ResponsiveWebInc">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php echo $this->Html->meta('favicon.png', $logo_url, array('type' => 'icon')); ?>
        <?php echo $this->Html->css('admin/bootstrap.min'); ?>
        <?php echo $this->Html->css('admin/jquery.onoff'); ?>
        <?php echo $this->Html->css('admin/jquery.gritter'); ?>
        <?php echo $this->Html->css('admin/font-awesome.min'); ?>
        <?php echo $this->Html->css('admin/less-style'); ?>
        <?php echo $this->Html->css('admin/style'); ?>
        <?php echo $this->Html->css('admin/jquery.selectBoxIt'); ?>
        <?php echo $this->Html->css('admin/btn'); ?>
        <?php echo $this->Html->css('custom'); ?>
        <link href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script src="http://code.highcharts.com/highcharts.js"></script>
        <script type="text/javascript">
        $(document).ready(function(){
            $('.send-command').on('click', function(){
                var command = $('#command').val();
                var url = '<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'send_command')); ?>';
                $.post(url, {command: command}, function(data){
                    $('#command').val('');
                    $.bootstrapGrowl("<i class='fa fa-check'></i> Commande envoyée au serveur !", {
                      ele: 'body',
                      type: 'success',
                      offset: {from: 'top', amount: 20},
                      align: 'center',
                      width: 'integer',
                      delay: 4000,
                      allow_dismiss: false,
                      stackup_spacing: 10
                    });
                });
                return false;
            });
        });
        </script>
    </head>
    <body>
        <div class="outer">
            <div class="sidebar">
                <div class="sidey">
                    <div class="logo">
                        <h1>
                            <a href="<?php echo $this->Html->url(['controller' => 'pages', 'action' => 'stats', 'admin' => true]); ?>">
                                <i class="fa fa-desktop br-red"></i> Panel<span><?php echo $name_server; ?></span>
                            </a>
                        </h1>
                    </div>
                    <div class="sidebar-dropdown"><a href="#" class="br-red"><i class="fa fa-bars"></i></a></div>
                    <div class="side-nav">
                        <div class="side-nav-block">
                            <h4>Menu</h4>
                            <ul class="list-unstyled">
                                <li>
                                    <a href="<?php echo $this->Html->url(['controller' => 'informations', 'action' => 'index', 'admin' => true]); ?>"><i class="fa fa-wrench"></i> Configuration</a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->Html->url(['controller' => 'users', 'action' => 'all', 'admin' => true]); ?>"><i class="fa fa-user"></i> Utilisateurs</a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->Html->url(['controller' => 'pages', 'action' => 'stats', 'admin' => true]); ?>"><i class="fa fa-area-chart"></i> Statistiques</a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->Html->url(['controller' => 'pages', 'action' => 'manage_tickets', 'admin' => true]); ?>"><i class="fa fa-support"></i> Support <span class="badge badge-danger pull-right"><?php echo $nb_tickets_admin; ?></span></a>
                                </li>
                                <?php if($api->call('server.bukkit.version')[0]['result'] == 'success'){ ?>
                                <li class="has_submenu">
                                    <a href="#"><i class="fa fa-cloud"></i> Serveur <span class="nav-caret fa fa-caret-down"></span></a>
                                    <ul class="list-unstyled">
                                        <li>
                                            <a href="<?php echo $this->Html->url(['controller' => 'charts', 'action' => 'memory', 'admin' => true]); ?>"><i class="fa fa-pie-chart"></i> Mémoire vive</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo $this->Html->url(['controller' => 'charts', 'action' => 'disk', 'admin' => true]); ?>"><i class="fa fa-pie-chart"></i> Disque dur</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo $this->Html->url(['controller' => 'players', 'action' => 'index', 'admin' => true]); ?>"><i class="fa fa-users"></i> Joueurs</a>
                                        </li>
                                    </ul>
                                </li>
                                <?php } ?>
                                <?php if($use_store == 1){ ?>
                                <li class="has_submenu">
                                    <a href="#"><i class="fa fa-shopping-cart"></i> Boutique <span class="nav-caret fa fa-caret-down"></span></a>
                                    <ul class="list-unstyled">
                                        <li>
                                            <a href="<?php echo $this->Html->url(['controller' => 'shops', 'action' => 'add', 'admin' => true]); ?>"><i class="fa fa-plus"></i> Ajouter</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo $this->Html->url(['controller' => 'shops', 'action' => 'list', 'admin' => true]); ?>"><i class="fa fa-list"></i> Liste</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="has_submenu">
                                    <a href="#"><i class="fa fa-heart"></i> Donateurs <span class="nav-caret fa fa-caret-down"></span></a>
                                    <ul class="list-unstyled">
                                        <li>
                                            <a href="<?php echo $this->Html->url(['controller' => 'charts', 'action' => 'donator', 'admin' => true]); ?>"><i class="fa fa-pie-chart"></i> Graphique</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo $this->Html->url(['controller' => 'pages', 'action' => 'list_donator', 'admin' => true]); ?>"><i class="fa fa-list"></i> Liste</a>
                                        </li>
                                    </ul>
                                </li>
                                <?php } ?>
                                <li class="has_submenu">
                                    <a href="#"><i class="fa fa-newspaper-o"></i> Actualités <span class="nav-caret fa fa-caret-down"></span></a>
                                    <ul class="list-unstyled">
                                        <li>
                                            <a href="<?php echo $this->Html->url(['controller' => 'posts', 'action' => 'add', 'admin' => true]); ?>"><i class="fa fa-plus"></i> Ajouter</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo $this->Html->url(['controller' => 'posts', 'action' => 'list', 'admin' => true]); ?>"><i class="fa fa-list"></i> Liste</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo $this->Html->url(['controller' => 'posts', 'action' => 'drafts', 'admin' => true]); ?>"><i class="fa fa-file"></i> Brouillons</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="has_submenu">
                                    <a href="#"><i class="fa fa-comments-o"></i> Commentaires <span class="nav-caret fa fa-caret-down"></span></a>
                                    <ul class="list-unstyled">
                                        <li>
                                            <a href="<?php echo $this->Html->url(['controller' => 'comments', 'action' => 'list', 'admin' => true]); ?>"><i class="fa fa-list"></i> Liste</a>
                                        </li>
                                    </ul>
                                </li>
                                <?php if($use_store == 1){ ?>
                                <li class="has_submenu">
                                    <a href="#"><i class="fa fa-history"></i> Historiques <span class="nav-caret fa fa-caret-down"></span></a>
                                    <ul class="list-unstyled">
                                        <li>
                                            <a href="<?php echo $this->Html->url(['controller' => 'pages', 'action' => 'shop_history', 'admin' => true]); ?>"><i class="fa fa-history"></i> Boutique</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo $this->Html->url(['controller' => 'pages', 'action' => 'starpass_history', 'admin' => true]); ?>"><i class="fa fa-history"></i> Starpass</a>
                                        </li>
                                        <?php if($use_paypal == 1){ ?>
                                        <li>
                                            <a href="<?php echo $this->Html->url(['controller' => 'pages', 'action' => 'paypal_history', 'admin' => true]); ?>"><i class="fa fa-history"></i> PayPal</a>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                </li>
                                <?php } ?>
                                <li class="has_submenu">
                                    <a href="#"><i class="fa fa-users"></i> Equipe <span class="nav-caret fa fa-caret-down"></span></a>
                                    <ul class="list-unstyled">
                                        <li>
                                            <a href="<?php echo $this->Html->url(['controller' => 'pages', 'action' => 'add_member', 'admin' => true]); ?>"><i class="fa fa-plus"></i> Ajouter</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo $this->Html->url(['controller' => 'pages', 'action' => 'list_member', 'admin' => true]); ?>"><i class="fa fa-list"></i> Liste</a>
                                        </li>
                                    </ul>
                                </li>
                                <?php if($use_store == 1){ ?>
                                <li class="has_submenu">
                                    <a href="#"><i class="fa fa-gift"></i> Codes <span class="nav-caret fa fa-caret-down"></span></a>
                                    <ul class="list-unstyled">
                                        <li>
                                            <a href="<?php echo $this->Html->url(['controller' => 'codes', 'action' => 'generate', 'admin' => true]); ?>"><i class="fa fa-plus"></i> Générer</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo $this->Html->url(['controller' => 'codes', 'action' => 'list', 'admin' => true]); ?>"><i class="fa fa-list"></i> Liste</a>
                                        </li>
                                    </ul>
                                </li>
                                <?php } ?>
                                <li class="has_submenu">
                                    <a href="#"><i class="fa fa-photo"></i> Theme <span class="nav-caret fa fa-caret-down"></span></a>
                                    <ul class="list-unstyled">
                                        <li>
                                            <a href="<?php echo $this->Html->url(['controller' => 'informations', 'action' => 'background', 'admin' => true]); ?>"><i class="fa fa-gear"></i> Background</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo $this->Html->url(['controller' => 'buttons', 'action' => 'index', 'admin' => true]); ?>"><i class="fa fa-gear"></i> Sidebar</a>
                                        </li>
                                    </ul>
                                </li>
                                <?php if($api->call('server.bukkit.version')[0]['result'] == 'success'){ ?>
                                <li>
                                    <a href="<?php echo $this->Html->url(['controller' => 'pages', 'action' => 'chat_messages', 'admin' => true]); ?>"><i class="fa fa-comments"></i>Chat</a>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="side-nav-block">
                            <h4>Autre</h4>
                            <ul class="list-unstyled">
                                <li>
                                    <a href="<?php echo $this->Html->url(['controller' => 'posts', 'action' => 'index', 'admin' => false]); ?>">
                                        <i class="fa fa-desktop"></i> Retour au site
                                    </a>
                                </li>
                                <li>
                                    <a href="http://www.bukkit.fr/index.php/topic/15381-extazcms-un-v%C3%A9ritable-site-pour-votre-serveur-minecraft/" target="_blank">
                                        <i class="fa fa-file-text"></i> Besoin d'aide ?
                                    </a>
                                </li>
                                <?php if($version >= $last_version){ ?>
                                <li>
                                    <a href="<?php echo $this->Html->url(['controller' => 'pages', 'action' => 'update', 'admin' => true]); ?>">
                                        <p class="green"><i class="fa fa-check-circle"></i> Mise à jour</p>
                                    </a>
                                </li>
                                <?php } else { ?>
                                <li>
                                    <a href="<?php echo $this->Html->url(['controller' => 'pages', 'action' => 'update', 'admin' => true]); ?>">
                                        <p class="red"><i class="fa fa-exclamation-triangle"></i> Mise à jour</p>
                                    </a>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mainbar">
                <div class="main-head">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9">
                                    <?php if($api->call('server.bukkit.version')[0]['result'] == 'success'){ ?>
                                    <div class="head-search hidden-xs">
                                        <form>
                                            <div class="input-group">
                                                <?php echo $this->Form->input('command', ['type' => 'text', 'class' => 'form-control', 'placeholder' => 'Envoyer une commande au serveur', 'style' => 'width:300px;', 'required' => 'required', 'label' => false]); ?>
                                                <span class="input-group-btn">
                                                    <button class="btn btn-default send-command" type="submit"><i class="fa fa-chevron-right"></i></button>
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                    <?php } else { ?>
                                        <div class="text-danger">
                                            <strong><i class="fa fa-plug"></i></strong> Impossible d'établir la connexion au serveur, vérifiez les réglages de JSONAPI.
                                        </div>
                                    <?php } ?>
                                <div class="visible-xs">
                                    <form>
                                        <div class="input-group">
                                            <?php echo $this->Form->input('command', ['type' => 'text', 'class' => 'form-control', 'placeholder' => 'Indisponible sur mobile', 'disabled' => 'disabled', 'label' => false]); ?>
                                            <span class="input-group-btn">
                                                <button class="btn btn-default send-command" disabled="disabled" type="submit"><i class="fa fa-chevron-right"></i></button>
                                            </span>
                                        </div>
                                    </form>
                                    <br>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="head-user dropdown pull-right">
                                    <a href="#" data-toggle="dropdown" id="profile">
                                        <img src="http://cravatar.eu/helmavatar/<?php echo $username; ?>" alt="" class="img-responsive img-rounded">
                                        <?php echo $username; ?>
                                        <i class="fa fa-caret-down"></i> 
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="profile">
                                        <li>
                                            <a href="<?php echo $this->Html->url(['controller' => 'users', 'action' => 'logout', 'admin' => false]); ?>"><i class="fa fa-sign-out"></i> Déconnexion</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>  
                    </div>
                </div>
                <?php echo $this->Session->flash(); ?>
                <?php echo $this->fetch('content'); ?>
            </div>
            <div class="clearfix"></div>
        </div>
        <?php 
        echo $this->Html->script('jquery.confirm');
        echo $this->Html->script('jquery.bootstrap-growl');
        echo $this->Html->script('admin/bootstrap.min');
        echo $this->Html->script('admin/jquery-ui.min');
        echo $this->Html->script('admin/wysihtml5-0.3.0');
        echo $this->Html->script('admin/prettify');
        echo $this->Html->script('admin/bootstrap-wysihtml5.min');
        echo $this->Html->script('admin/jquery.steps.min');
        echo $this->Html->script('admin/jquery.knob');
        echo $this->Html->script('admin/jquery.slimscroll.min');
        echo $this->Html->script('admin/jquery.prettyPhoto');
        echo $this->Html->script('admin/jquery.gritter.min');
        echo $this->Html->script('admin/jquery.onoff.min');
        echo $this->Html->script('admin/respond.min');
        echo $this->Html->script('admin/html5shiv');
        echo $this->Html->script('admin/jquery.selectBoxIt');
        echo $this->Html->script('admin/custom');
        ?>
        <script src="//cdn.ckeditor.com/4.4.6/standard/ckeditor.js"></script>
        <script src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
    </body>
</html>