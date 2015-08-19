<?php if(!isset($server_ip)) exit('Erreur: impossible de communiquer avec la base de donn&eacute;es'); ?>
<!DOCTYPE html>
<!--[if IE 8]><html lang="fr" class="ie8"><![endif]-->  
<!--[if IE 9]><html lang="fr" class="ie9"><![endif]-->  
<!--[if !IE]><!--><html lang="fr"><!--<![endif]-->  
<head>
    <title><?php echo $this->fetch('title'); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ExtazCMS">
    <meta name="author" content="MrSaooty">
    <?php
    // Favicon
    echo $this->Html->meta('favicon.png', $logo_url, array('type' => 'icon'));

    // CSS Global Compulsory
    echo $this->Html->css('/files/bootstrap/css/bootstrap.min');
    echo $this->Html->css('style');
    echo $this->Html->css('404');
    echo $this->Html->css('blog');
    echo $this->Html->css('profile');
    echo $this->Html->css('timeline');
    echo $this->Html->css('summernote');

    // CSS Implementing Plugins
    echo $this->Html->css('/files/line-icons/line-icons');
    echo $this->Html->css('/files/flexslider/flexslider');
    echo $this->Html->css('/files/parallax-slider/css/parallax-slider');
    echo $this->Html->css('/files/sky-forms/css/custom-sky-forms');
    echo $this->Html->css('dropzone');

    // CSS Theme
    echo $this->Html->css('themes/default');
    echo $this->Html->css('flatty');

    // CSS Customization
    echo $this->Html->css('custom');
    ?>
    <link href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.isotope/2.2.0/isotope.pkgd.js"></script>
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
</head>	
<body cz-shortcut-listen="true" class="boxed-layout container" background="<?php echo $this->webroot.'img/bg/'.$background; ?>">
    <div class="wrapper">
        <!--Header-->    
        <div class="header header-v4">
            <!-- Topbar -->
            <div class="topbar-v1 sm-margin-bottom-20">
                <div class="container">
                    <div class="row">
                        <!-- Topbar -->
                        <div class="topbar">
                            <div class="container">
                                <!-- Topbar Navigation -->
                                <div class="topbar-server-ip">
                                    <?php
                                    // Si le port est 25565 alors il est inutile de l'afficher
                                    if($server_port != 25565){
                                        echo '<i class="fa fa-wifi"></i> IP du serveur : <span class="server-ip">'.$server_ip.':'.$server_port.'</span>';
                                    }
                                    else{
                                        echo '<i class="fa fa-wifi"></i> IP du serveur : <span class="server-ip">'.$server_ip.'</span>';
                                    }
                                    ?>
                                </div>
                                <!-- End Topbar Navigation -->
                            </div>
                        </div>
                        <!-- End Topbar -->
                    </div>        
                </div>
            </div>
            <!-- End Topbar -->
        
            <!-- Navbar -->
            <div class="navbar navbar-default" role="navigation">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="fa fa-bars"></span>
                        </button>
                        <a class="navbar-brand" href="<?php echo $this->Html->url(['controller' => 'posts', 'action' => 'index', 'admin' => false]); ?>" style="margin-top:15px;">
                           <img src="<?php echo $logo_url; ?>" height="25" width="25" style="margin-top: -4px;" alt=""> <?php echo $name_server; ?>
                        </a>
                    </div>
                </div>          
                <!-- End Search Block -->

                <div class="clearfix"></div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-responsive-collapse">
                    <div class="container">
                        <ul class="nav navbar-nav">
                            <li class="none">
                                <?php echo $this->Html->link('Accueil', '/'); ?>
                            </li>
                            <?php if($use_store == 1){ ?>
                            <li class="none">
                                <?php echo $this->Html->link('Boutique', ['controller' => 'shops', 'action' => 'index']); ?>
                            </li>
                            <?php } ?>
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                                    Support <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <?php echo $this->Html->link('Rediger un ticket', ['controller' => 'pages', 'action' => 'add_ticket']); ?>                             
                                    </li>
                                    <li>
                                        <?php echo $this->Html->link('Consulter mes tickets', ['controller' => 'pages', 'action' => 'list_tickets']); ?>                             
                                    </li>
                                </ul>
                            </li>
                            <?php if($use_votes == 1 && $use_votes_ladder == 1){ ?>
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                                    Votes <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <?php echo $this->Html->link('Vote et gagne', ['controller' => 'votes', 'action' => 'index']); ?>                             
                                    </li>
                                    <li>
                                        <?php echo $this->Html->link('Classement', ['controller' => 'votes', 'action' => 'ladder']); ?>                             
                                    </li>
                                </ul>
                            </li>
                            <?php } elseif($use_votes == 1 && $use_votes_ladder == 0) { ?>
                            <li>
                                <?php echo $this->Html->link('Vote et gagne', ['controller' => 'votes', 'action' => 'index']); ?>                             
                            </li>
                            <?php } ?>
                            <?php if($use_rules == 1){ ?>
                            <li class="none">
                                <?php echo $this->Html->link('Règlement', ['controller' => 'pages', 'action' => 'rules']); ?>
                            </li>
                            <?php } ?>
                            <?php if($use_team == 1){ ?>
                            <li class="none">
                                <?php echo $this->Html->link('Équipe', ['controller' => 'pages', 'action' => 'team']); ?>
                            </li>
                            <?php } ?>
                            <?php if($use_contact == 1){ ?>
                            <li class="none">
                                <?php echo $this->Html->link('Contact', ['controller' => 'pages', 'action' => 'contact']); ?>
                            </li>
                            <?php } ?>
                            <?php if($nb_cpages == 1){ ?>
                            <li class="none">
                                <?php echo $this->Html->link($cpages[0]['Cpage']['name'], ['controller' => 'cpages', 'action' => 'read', 'slug' => $cpages[0]['Cpage']['slug']]); ?>
                            </li>
                            <?php } elseif($nb_cpages != 0 && $nb_cpages > 1) { ?>
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                                    Autres <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <?php
                                    foreach($cpages as $cp){
                                        ?>
                                        <li>
                                            <?php echo $this->Html->link($cp['Cpage']['name'], ['controller' => 'cpages', 'action' => 'read', 'slug' => $cp['Cpage']['slug']]); ?>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>    
                </div><!--/navbar-collapse-->
            </div>            
            <!-- End Navbar -->
        </div>
        <!--End Header-->
        <?php if($happy_hour == 1){ ?>
            <div class="happy-hour">
                <?php
                if($use_paypal == 1){
                    ?>
                    <i class="fa fa-gift"></i> Happy hour en cours, <?php echo $happy_hour_bonus.'% de '.$site_money.' gratuits'; ?>. Achetez <?php echo $starpass_tokens.' '.$site_money.' + '.$starpass_happy_hour_bonus.' gratuits '; ?> via Starpass ou <?php echo $paypal_tokens.' '.$site_money.' + '.$paypal_happy_hour_bonus.' gratuits'; ?> via PayPal !
                    <a href="<?php echo $this->Html->url(['controller' => 'shops', 'action' => 'reload']); ?>" class="btn btn-default btn-xs happy-hour-btn"><i class="fa fa-shopping-cart"></i> Recharger</a>
                    <button class="btn btn-default btn-xs happy-hour-close"><i class="fa fa-times"></i></button>
                    <?php
                }
                else{
                    ?>
                    <i class="fa fa-gift"></i> Happy hour en cours, <?php echo $happy_hour_bonus.'% de '.$site_money.' gratuits'; ?>. Achetez <?php echo $starpass_tokens.' '.$site_money.' + '.$starpass_happy_hour_bonus.' gratuits '; ?> via Starpass !
                    <a href="<?php echo $this->Html->url(['controller' => 'shops', 'action' => 'reload']); ?>" class="btn btn-default btn-xs happy-hour-btn"><i class="fa fa-shopping-cart"></i> Recharger</a>
                    <button class="btn btn-default btn-xs happy-hour-close"><i class="fa fa-times"></i></button>
                    <?php
                }
                ?>
            </div>
        <?php } ?>
        
        <?php echo $this->Session->flash(); ?>
        <?php echo $this->fetch('content'); ?>
    
            <div class="copyright">
                <div class="container">
                    <p class="text-center">
                        <?php
                        /*
                        * Merci de ne pas retirer cette mention,
                        * Je partage ce CMS gratuitement sans attentes en retour.
                        * Merci de respecter mon travail.
                        */
                        ?>
                        Ce site propulsé par<a href="http://extaz-cms.com/" target="_blank">ExtazCMS</a>
                    </p>
                </div> 
            </div><!--/copyright--> 
        </div>   
        <!--=== End Footer ===-->
    </div><!--/wrapper-->
    <?php
    // JS Global Compulsory
    echo $this->Html->script('/files/bootstrap/js/bootstrap.min');

    // JS Implementing Plugins
    // echo $this->Html->script('/files/back-to-top');
    echo $this->Html->script('/files/flexslider/jquery.flexslider-min');
    echo $this->Html->script('/files/parallax-slider/js/modernizr');
    echo $this->Html->script('/files/parallax-slider/js/jquery.cslider');
    echo $this->Html->script('dropzone');

    // JS Page Level
    echo $this->Html->script('app');
    echo $this->Html->script('jquery.confirm');
    echo $this->Html->script('jquery.bootstrap-growl');
    echo $this->Html->script('index');
    echo $this->Html->script('jquery.autocomplete');
    echo $this->Html->script('summernote');
    echo $this->Html->script('summernote-fr-FR');
    echo $this->Html->script('humane');
    echo $this->Html->script('custom');
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function(){
          	App.init();
            App.initSliders();
        });
    </script>
    <script src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/1.4.5/numeral.min.js"></script>
    <?php 
    if(!empty($analytics) && $analytics != 0){
        ?>
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', '<?= $analytics; ?>', 'auto');
          ga('send', 'pageview');
        </script>
        <?php
    }
    ?>
    <!--[if lt IE 9]>
        <script src="files/respond.js"></script>
        <script src="files/html5shiv.js"></script>    
    <![endif]-->
</body>
</html>	