<?php $this->assign('title', 'Brouillons'); ?>
<script>
$(document).ready(function(){
    $(window).load(function(){
        $(".confirm").confirm({
            text: "Voulez vous vraiment supprimer cet article ?",
            title: "Confirmation",
            confirmButton: "Oui",
            cancelButton: "Non"
        });
    });
});
</script>
<!--=== Content Part ===-->
<div class="container content">     
    <div class="row blog-page">    
        <!-- Left Sidebar -->
        <div class="col-md-9 md-margin-bottom-40">
            <?php foreach($drafts as $d): ?>
                <!--Blog Post-->
                <div class="row">
                    <div class="hidden-xs hidden-sm hidden-md">
                        <div class="col-md-5">
                            <a href="<?php echo $this->Html->url(array('controller' => 'posts', 'action' => 'edit', $d['Post']['id'])); ?>">
                                <?php
                                if(filter_var($d['Post']['img'], FILTER_VALIDATE_URL)){
                                    echo $this->Html->image($d['Post']['img'], array('alt' => '', 'height' => '180', 'style' => 'width:100%;'));
                                }
                                else{
                                    echo $this->Html->image('posts/'.$d['Post']['img'], array('alt' => '', 'height' => '180', 'style' => 'width:100%;'));
                                }
                                ?>
                            </a>
                        </div>    
                        <div class="col-md-7">
                            <h2>
                                <?php
                                if(mb_strlen($d['Post']['title']) > 35){
                                    echo '<a href="'.$this->Html->url(array('controller' => 'posts', 'action' => 'edit', $d['Post']['id'])).'">'.mb_substr($d['Post']['title'], 0, 35).' [...]'.'</a>';
                                }
                                else{
                                    echo '<a href="'.$this->Html->url(array('controller' => 'posts', 'action' => 'edit', $d['Post']['id'])).'">'.$d['Post']['title'].'</a>';
                                }
                                ?>
                            </h2>
                            <ul class="list-unstyled list-inline blog-info">
                                <li><i class="fa fa-calendar"></i> <?php echo $this->Time->format('d/m/Y', $d['Post']['created']); ?></li>
                                <li><i class="fa fa-user"></i> <?php echo $d['Post']['author']; ?></li>
                                <li><i class="fa fa-tags"></i> <?php echo $d['Post']['cat']; ?></li>
                                <li>
                                    <span class="btn-group">
                                        <a href="<?php echo $this->Html->url(array('controller' => 'posts', 'action' => 'read', 'slug' => $d['Post']['slug'], 'id' => $d['Post']['id'])); ?>" class="btn btn-default btn-xs">
                                            <i class="fa fa-eye"></i> Visionner
                                        </a>
                                        <a href="<?php echo $this->Html->url(array('controller' => 'posts', 'action' => 'edit', $d['Post']['id'])); ?>" class="btn btn-default btn-xs">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                    	<a href="<?php echo $this->Html->url(array('controller' => 'posts', 'action' => 'delete', $d['Post']['id'])); ?>" class="confirm btn btn-default btn-xs">
                                            <font color="red"><i class="fa fa-times"></i></font>
                                        </a>
                                    </span>
                                </li>
                            </ul>
                            <p class="text-justify">
                                <?php
                                $content = ltrim(html_entity_decode(strip_tags($d['Post']['content'])));

                                if(mb_strlen($content) > 305){
                                    echo mb_substr($content, 0, 305).' [...]';
                                }
                                else{
                                    echo $content;
                                }
                                ?>
                            </p>
                        </div>
                    </div>
                    <div class="hidden-lg">
                        <div class="col-md-12">
                            <h2>
                                <?php
                                if(mb_strlen($d['Post']['title']) > 35){
                                    echo '<a href="'.$this->Html->url(array('controller' => 'posts', 'action' => 'edit', $d['Post']['id'])).'">'.mb_substr($d['Post']['title'], 0, 35).' [...]'.'</a>';
                                }
                                else{
                                    echo '<a href="'.$this->Html->url(array('controller' => 'posts', 'action' => 'edit', $d['Post']['id'])).'">'.$d['Post']['title'].'</a>';
                                }
                                ?>
                            </h2>
                            <ul class="list-unstyled list-inline blog-info">
                                <li><i class="fa fa-calendar"></i> <?php echo $this->Time->format('d/m/Y', $d['Post']['created']); ?></li>
                                <li><i class="fa fa-user"></i> <?php echo $d['Post']['author']; ?></li>
                                <li><i class="fa fa-tags"></i> <?php echo $d['Post']['cat']; ?></li>
                                <li>
                                    <span class="btn-group">
                                        <a href="<?php echo $this->Html->url(array('controller' => 'posts', 'action' => 'read', 'slug' => $d['Post']['slug'], 'id' => $d['Post']['id'])); ?>" class="btn btn-default btn-xs">
                                            <i class="fa fa-eye"></i> Visionner
                                        </a>
                                        <a href="<?php echo $this->Html->url(array('controller' => 'posts', 'action' => 'edit', $d['Post']['id'])); ?>" class="btn btn-default btn-xs">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="<?php echo $this->Html->url(array('controller' => 'posts', 'action' => 'delete', $d['Post']['id'])); ?>" class="confirm btn btn-default btn-xs">
                                            <font color="red"><i class="fa fa-times"></i></font>
                                        </a>
                                    </span>
                                </li>
                            </ul>
                            <p class="text-justify">
                                <?php
                                $content = ltrim(html_entity_decode(strip_tags($d['Post']['content'])));

                                if(mb_strlen($content) > 305){
                                    echo mb_substr($content, 0, 305).' [...]';
                                }
                                else{
                                    echo $content;
                                }
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
                <hr class="margin-bottom-40">
                <!--End Blog Post-->
            <?php endforeach; ?>
        </div>
        <!-- End Left Sidebar -->
        <?php echo $this->element('sidebar'); ?>
    </div><!--/row-->        
</div><!--/container-->     
<!--=== End Content Part ===-->