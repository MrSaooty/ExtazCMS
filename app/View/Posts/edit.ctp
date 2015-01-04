<?php $this->assign('title', 'Editer un article'); ?>
<script type="text/javascript">
$(document).ready(function(){
    $(window).load(function(){
        $('#chargement').empty()
        $('#content').fadeIn()
    });

    $('#auto_save').on('click', function(){
        if($('#auto_save').is(':checked')){
            $.bootstrapGrowl("<i class='fa fa-info-circle'></i> Sauvegarde automatique <u>activée</u>", {
              ele: 'body', 
              type: 'info', 
              offset: {from: 'top', amount: 20}, 
              align: 'center', 
              width: 'integer', 
              delay: 2000, 
              allow_dismiss: false, 
              stackup_spacing: 1
            });
        }
        else{
            $.bootstrapGrowl("<i class='fa fa-info-circle'></i> Sauvegarde automatique <u>desactivée</u>", {
              ele: 'body', 
              type: 'info', 
              offset: {from: 'top', amount: 20}, 
              align: 'center', 
              width: 'integer', 
              delay: 2000, 
              allow_dismiss: false, 
              stackup_spacing: 1
            });
        }
    });
    
    $('#publish').on('click', function(){
        var id = '<?php echo $this->params['pass'][0]; ?>';
        var title = $('#PostTitle').val();
        var slug = $('#PostSlug').val();
        var progress = $('#PostProgress').val();
        var cat = $('#PostCat').val();
        var content = CKEDITOR.instances['PostContent'].getData();
        var url = '<?php echo $this->Html->url(array('controller' => 'posts', 'action' => 'edit', $this->params['pass'][0])); ?>';
        $.post(url, {id: id, title: title, slug: slug, progress: progress, cat: cat, content: content}, function(data){});
    });

    setInterval(function(){
        if($('#auto_save').is(":checked")){
            var id = '<?php echo $this->params['pass'][0]; ?>';
            var title = $('#PostTitle').val();
            var slug = $('#PostSlug').val();
            var progress = $('#PostProgress').val();
            var cat = $('#PostCat').val();
            var content = CKEDITOR.instances['PostContent'].getData();
            var url = '<?php echo $this->Html->url(array('controller' => 'posts', 'action' => 'edit', $this->params['pass'][0])); ?>';
            $.post(url, {id: id, title: title, slug: slug, progress: progress, cat: cat, content: content}, function(data){
                $.bootstrapGrowl("<i class='fa fa-circle-o-notch fa-spin'></i> Sauvegarde automatique en cours", {
                  ele: 'body', 
                  type: 'info', 
                  offset: {from: 'top', amount: 20}, 
                  align: 'center', 
                  width: 'integer', 
                  delay: 3000, 
                  allow_dismiss: false, 
                  stackup_spacing: 1
                });
            });
        }
    }, 15000);
});
</script>
<!--=== Content Part ===-->
<div class="container content">     
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <?php echo $this->Form->create('Post', array('class' => 'sky-form', 'type' => 'file', 'inputDefaults' => array('error' => false))); ?>
                <div class="reg-header">  
                    <header>
                        <a href="<?php echo $this->Html->url(array('controller' => 'posts', 'action' => 'read', 'slug' => $data['Post']['slug'], 'id' => $data['Post']['id'])); ?>" target="_blank">Editer un article</a>
                        <label class="toggle pull-right">
                            <input type="checkbox" id="auto_save" checked="checked"><i></i> <small>Sauvegarde automatique</small>
                        </label>
                    </header>
                </div>
                <fieldset>
                    <section>
                        <font color="#A94442"><small><?php echo $this->Form->error('title'); ?></small></font>
                        <div class="input-group margin-bottom-20">
                            <span class="input-group-addon"><i class="fa fa-font"></i></span>
                            <?php echo $this->Form->input('title', array('type' => 'text', 'value' => $data['Post']['title'], 'class' => 'form-control', 'label' => false)); ?>
                        </div>
                    </section>
                </fieldset>
                <fieldset>
                    <section>
                        <font color="#A94442"><small><?php echo $this->Form->error('cat'); ?></small></font>
                        <div class="input-group margin-bottom-20">
                            <span class="input-group-addon"><i class="fa fa-tags"></i></span>
                            <?php echo $this->Form->input('cat', array('type' => 'text', 'value' => $data['Post']['cat'], 'class' => 'form-control', 'label' => false)); ?>
                        </div>
                    </section>
                </fieldset>
                <fieldset>
                    <section>
                        <div class="row">
                            <div class="col-md-11">
                                <font color="#A94442"><small><?php echo $this->Form->error('slug'); ?></small></font>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-comment"></i></span>
                                    <?php echo $this->Form->input('slug', array('type' => 'text', 'value' => $data['Post']['slug'], 'class' => 'form-control', 'label' => false)); ?>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <?php
                                if($data['Post']['author'] == $this->Session->read('Auth.User.username') OR $this->Session->read('Auth.User.role') > 1){
                                    echo $this->Form->input('progress', array('type' => 'number', 'value' => $data['Post']['progress'], 'class' => 'form-control', 'label' => false, 'min' => 0, 'max' => 100, 'step' => 5));
                                }
                                else{
                                    echo $this->Form->input('progress', array('type' => 'number', 'value' => $data['Post']['progress'], 'class' => 'form-control', 'label' => false, 'min' => 0, 'max' => 100, 'step' => 5, 'disabled'));
                                }
                                ?>
                            </div>
                        </div>  
                    </section>
                </fieldset>
                <fieldset>
                    <section>
                        <font color="#A94442"><small><?php echo $this->Form->error('img_file'); ?></small></font>
                        <label for="file" class="input input-file">
                            <div class="button"><input type="file" name="data[Post][img_file]" id="PostImgFile" onchange="this.parentNode.nextSibling.value = this.value">Choisir</div><input type="text" readonly="" placeholder="Upload une image (850x400)">
                        </label>
                    </section>
                </fieldset>
                <fieldset>
                    <section>
                        <font color="#A94442"><small><?php echo $this->Form->error('img'); ?></small></font>
                        <div class="input-group margin-bottom-20">
                            <span class="input-group-addon"><i class="fa fa-link"></i></span>
                            <?php 
                            if(filter_var($data['Post']['img'], FILTER_VALIDATE_URL)){
                                echo $this->Form->input('img', array('type' => 'text', 'placeholder' => $data['Post']['img'], 'class' => 'form-control', 'label' => false)).'<a href="'.$data['Post']['img'].'" target="_blank" class="input-group-addon"><i class="fa fa-arrow-circle-right"></i></a>';
                            }
                            else{
                                echo $this->Form->input('img', array('type' => 'text', 'placeholder' => FULL_BASE_URL.'/img/posts/'.$data['Post']['img'], 'class' => 'form-control', 'label' => false)).'<a href="'.FULL_BASE_URL.'/img/posts/'.$data['Post']['img'].'" target="_blank" class="input-group-addon"><i class="fa fa-arrow-circle-right"></i></a>';
                            }
                            ?>
                        </div>
                    </section>
                </fieldset>
                <fieldset>
                    <section>
                        <div id="chargement"><?php echo $this->Html->image('loader.gif', array('alt' => 'chargement')); ?> Chargement de l'éditeur de texte en cours, veuillez patienter</div>
                        <div id="content" style="display:none;">
                            <font color="#A94442"><small><?php echo $this->Form->error('content'); ?></small></font>
                            <?php echo $this->Form->textarea('content', array('type' => 'textarea', 'rows' => '5', 'cols' => '5', 'value' => $data['Post']['content'], 'class' => 'ckeditor', 'label' => false)); ?>
                        </div>
                    </section>
                </fieldset>
                <footer>
                    <div class="btn-group pull-right">
                        <button class="btn-u pull-right" type="submit">Éditer cet article</button>
                        <?php if($this->Session->read('Auth.User.role') == 1){ ?>
                            <?php if($data['Post']['draft'] == 0){ ?>
                                <a href="<?php echo $this->Html->url(array('controller' => 'posts', 'action' => 'publish', 'id' => $data['Post']['id'], 'draft' => 0)); ?>" id="publish" class="btn-u btn-u-dark pull-right">Déplacer vers les brouillons</a>
                            <?php } else { ?>
                                <a href="<?php echo $this->Html->url(array('controller' => 'posts', 'action' => 'publish', 'id' => $data['Post']['id'], 'draft' => 1)); ?>" id="publish" class="btn-u btn-u-dark pull-right">Publier l'article</a>
                            <?php }; ?>
                        <?php } else { ?>
                            <?php if($data['Post']['draft'] == 0){ ?>
                                <a href="#" id="publish" class="btn-u btn-u-dark pull-right">Déplacer vers les brouillons</a>
                            <?php } else { ?>
                                <a href="#" id="publish" class="btn-u btn-u-dark pull-right">Publier l'article</a>
                            <?php }; ?>
                        <?php } ?>
                    </div>
                </footer>
            <?php echo $this->Form->end(); ?>
        </div>
    </div><!--/row-->
</div><!--/container-->     
<!--=== End Content Part ===-->