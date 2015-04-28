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
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>    
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

    // CSS Implementing Plugins
    echo $this->Html->css('/files/line-icons/line-icons');
    echo $this->Html->css('/files/flexslider/flexslider');
    echo $this->Html->css('/files/parallax-slider/css/parallax-slider');
    echo $this->Html->css('/files/sky-forms/css/custom-sky-forms');

    // CSS Theme
    echo $this->Html->css('themes/default');

    // CSS Customization
    echo $this->Html->css('custom');
    ?>
    <link href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
</head>	
<body cz-shortcut-listen="true" class="boxed-layout container" background="<?php echo $this->webroot.'img/bg/'.$background.'.jpg'; ?>">
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
                                <ul class="loginbar pull-right">
                                    <li><i class="fa fa-globe"></i> <a href="">IP du serveur : </a><a href="#"><?php echo $server_ip.':'.$server_port; ?></a> </li>
                                </ul>
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
                                    Support
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
                            <?php if($role > 0){ ?>
                            <li class="none">
                                <?php echo $this->Html->link('Administration', ['controller' => 'pages', 'action' => 'stats', 'admin' => true]); ?>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>    
                </div><!--/navbar-collapse-->
            </div>            
            <!-- End Navbar -->
        </div>
        <!--End Header-->

        <?php echo $this->Session->flash(); ?>
        <?php echo $this->fetch('content'); ?>

            <div class="copyright">
                <div class="container">
                    <p class="text-center">
                        <!-- Merci de ne pas retirer cette mention, je partage ce CMS gratuitement sans attentes en retour, merci de respecter mon travail -->
                        Propulsé par<a href="http://cms.extaz-mc.fr/" target="_blank">ExtazCMS <?php echo $version; ?></a>code par<a href="http://twitter.com/MrSaooty" target="_blank">@MrSaooty</a>
                        <!-- Merci de ne pas retirer cette mention, je partage ce CMS gratuitement sans attentes en retour, merci de respecter mon travail -->
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

    // JS Page Level
    echo $this->Html->script('app');
    echo $this->Html->script('jquery.confirm');
    echo $this->Html->script('jquery.bootstrap-growl');
    echo $this->Html->script('index');
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function() {
          	App.init();
            App.initSliders();
            Index.initParallaxSlider();        
        });
    </script>
    <script src="//cdn.ckeditor.com/4.4.6/standard/ckeditor.js"></script>
    <script src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
    <?php 
    if(!empty($analytics) OR $analytics != 0){
        ?>
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', '<?php echo $analytics; ?>', 'auto');
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