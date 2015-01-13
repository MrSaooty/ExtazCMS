<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $this->fetch('title'); ?></title>
        <meta name="description" content="ExtazCMS Admin">
        <meta name="keywords" content="ExtazCMS">
        <meta name="author" content="ResponsiveWebInc">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php echo $this->Html->meta('favicon.png', $logo_url, array('type' => 'icon')); ?>
        <?php echo $this->Html->css('admin/bootstrap.min.css'); ?>
        <?php echo $this->Html->css('admin/jquery.onoff.css'); ?>
        <?php echo $this->Html->css('admin/jquery.gritter.css'); ?>
        <?php echo $this->Html->css('admin/font-awesome.min.css'); ?>
        <?php echo $this->Html->css('admin/less-style.css'); ?>
        <?php echo $this->Html->css('admin/style'); ?>
        <link href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script src="http://code.highcharts.com/highcharts.js"></script>
    </head>
    <body>
        <div class="outer">
            <!-- Sidebar starts -->
            <div class="sidebar">
                <div class="sidey">
                    <!-- Logo -->
                    <div class="logo">
                        <h1><a href="<?php echo $this->Html->url(['controller' => 'pages', 'action' => 'stats', 'admin' => true]); ?>"><i class="fa fa-desktop br-red"></i> Panel<span><?php echo $name_server; ?></span></a></h1>
                    </div>
                    <div class="sidebar-dropdown"><a href="#" class="br-red"><i class="fa fa-bars"></i></a></div>
                    <div class="side-nav">
                        <div class="side-nav-block">
                            <h4>Menu</h4>
                            <ul class="list-unstyled">
                                <li>
                                    <a href="<?php echo $this->Html->url(['controller' => 'informations', 'action' => 'index', 'admin' => true]); ?>"><i class="fa fa-list"></i> Informations</a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->Html->url(['controller' => 'users', 'action' => 'all', 'admin' => true]); ?>"><i class="fa fa-users"></i> Utilisateurs</a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->Html->url(['controller' => 'pages', 'action' => 'stats', 'admin' => true]); ?>"><i class="fa fa-area-chart"></i> Statistiques</a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->Html->url(['controller' => 'pages', 'action' => 'manage_tickets', 'admin' => true]); ?>"><i class="fa fa-support"></i> Support <span class="badge badge-danger pull-right"><?php echo $nbTicketsAdmin; ?></span></a>
                                </li>
                            </ul>
                        </div>
                        <?php if($use_store == 1){ ?>
                        <div class="side-nav-block">
                            <h4>Boutique</h4>
                            <ul class="list-unstyled">
                                <li>
                                    <a href="<?php echo $this->Html->url(['controller' => 'shops', 'action' => 'add', 'admin' => true]); ?>"><i class="fa fa-plus"></i> Ajouter</a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->Html->url(['controller' => 'shops', 'action' => 'list', 'admin' => true]); ?>"><i class="fa fa-list"></i> Liste</a>
                                </li>
                            </ul>
                        </div>
                        <?php } ?>
                        <div class="side-nav-block">
                            <h4>Actualités</h4>
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
                        </div>
                        <?php if($use_store == 1){ ?>
                        <div class="side-nav-block">
                            <h4>Historiques</h4>
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
                        </div>
                        <?php } ?>
                        <div class="side-nav-block">
                            <h4>Equipe</h4>
                            <ul class="list-unstyled">
                                <li>
                                    <a href="<?php echo $this->Html->url(['controller' => 'pages', 'action' => 'add_member', 'admin' => true]); ?>"><i class="fa fa-plus"></i> Ajouter</a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->Html->url(['controller' => 'pages', 'action' => 'list_member', 'admin' => true]); ?>"><i class="fa fa-list"></i> Liste</a>
                                </li>
                            </ul>
                        </div>
                        <div class="side-nav-block">
                            <h4>Autre</h4>
                            <ul class="list-unstyled">
                                <li>
                                    <a href="<?php echo $this->Html->url(['controller' => 'posts', 'action' => 'index', 'admin' => false]); ?>"><i class="fa fa-desktop"></i> Retour au site</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mainbar">
                <div class="main-head">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3 col-sm-4 col-xs-6">
                                <h2><i class="fa fa-user lblue"></i> Vous êtes connecté en tant que <u><?php echo $username; ?></u></h2>
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
        echo $this->Html->script('admin/bootstrap.min.js');
        echo $this->Html->script('admin/jquery-ui.min.js');
        echo $this->Html->script('admin/wysihtml5-0.3.0.js');
        echo $this->Html->script('admin/prettify.js');
        echo $this->Html->script('admin/bootstrap-wysihtml5.min.js');
        echo $this->Html->script('admin/jquery.steps.min.js');
        echo $this->Html->script('admin/jquery.knob.js');
        echo $this->Html->script('admin/jquery.slimscroll.min.js');
        echo $this->Html->script('admin/jquery.prettyPhoto.js');
        echo $this->Html->script('admin/jquery.gritter.min.js');
        echo $this->Html->script('admin/jquery.onoff.min.js');
        echo $this->Html->script('admin/respond.min.js');
        echo $this->Html->script('admin/html5shiv.js');
        echo $this->Html->script('admin/custom.js');
        ?>
        <script src="//cdn.ckeditor.com/4.4.6/standard/ckeditor.js"></script>
        <script src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
    </body>
</html>