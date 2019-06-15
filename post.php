<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
 ?>

<!-- post main -->
<section id="content" class="mdui-center mdui-m-y-1">
  <div class="mdui-m-a-1 mdui-p-a-1">
    <h2><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
  </div>
  <div id="contents" class="mdui-m-a-1 mdui-p-a-1 .mdui-typo">
    <?php $this -> content(); ?>
  </div>
</section>
<!-- end post main -->
<!-- <ul class="post-near">
        <li>上一篇: <?php $this->thePrev('%s','没有了'); ?></li>
        <li>下一篇: <?php $this->theNext('%s','没有了'); ?></li>
    </ul> -->

<?php include('comments.php'); ?>
<?php $this->need('footer.php'); ?>
