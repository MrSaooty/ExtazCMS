<?php
echo $this->assign('title', 'Erreur');
if((isset($this->params['prefix']) && ($this->params['prefix'] == 'admin'))){
    ?>
    <div class="main-content">
        <div class="container">  
            <div class="row">
                <div class="col-md-4">
                    <div class="page-content">
                        <h1>Erreur 404</h1>
                    </div>
                </div>
                <div class="col-md-8"></div>
            </div>
        </div>
    </div>
    <?php
}
else{
    ?>
    <!--=== Content Part ===-->
    <div class="container content">     
        <!--Error Block-->
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="error-v1">
                    <span class="error-v1-title">404</span>
                    <span>Une erreur est survenue !</span>
                    <p>La page à laquelle vous tentez d'accéder n'existe pas.</p>
                    <?php echo $this->Html->link('Retour à l\'accueil', '/', array('class' => 'btn-u btn-bordered')); ?>
                </div>
            </div>
        </div>
        <!--End Error Block-->
    </div>  
    <!--=== End Content Part ===-->
    <?php
}
?>