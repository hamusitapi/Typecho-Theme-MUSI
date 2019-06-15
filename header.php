<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html lang="zh-cn">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title><?php $this->archiveTitle('','',' - '); ?><?php $this->options->title(); ?></title>
<!-- 调用 -->
<link rel="stylesheet" type="text/css" media="all" href="<?php $this->options->themeUrl('style.css'); ?>" />
<link rel="stylesheet" href="https://cdnjs.loli.net/ajax/libs/mdui/0.4.2/css/mdui.min.css">
<script src="https://cdnjs.loli.net/ajax/libs/mdui/0.4.2/js/mdui.min.js"></script>
<script src="https://apps.bdimg.com/libs/jquery/2.1.2/jquery.js"></script>
</head>
<body class="mdui-loaded mdui-theme-accent-indigo mdui-color-white">
<header class="mdui-center mdui-typo mdui-valign">
	<a class="mdui-center dh_link" href="<?php $this->options->siteUrl(); ?>">首页</a>
	<?php $this->widget('Widget_Metas_Category_List')->to($category); ?>
	<?php while ($category->next()): ?>
	<a class="mdui-center dh_link" <?php if ($this->is('category', $category->slug)): ?> class="current"<?php endif; ?> href="<?php $category->permalink(); ?>"><?php $category->name(); ?></a>
	<?php endwhile; ?>
</header>
<main class="mdui-typo">
<div style="height:60px;width:100%;"></div>

<?php if ($this->is('index')) : ?>
<section class="mdui-center mdui-valign mdui-row mdui-m-t-1">
	<div class="mdui-center mdui-m-y-2">
		<div id="logo" class="mdui-center" ><?php echo $this->author->gravatar(90);?></div>
			<h1 class="mdui-m-y-1" style="width:100%;text-align:center;"><a href="<?php $this->options->siteUrl(); ?>" title="首页"><?php $this->options->title() ?></a></h1>
			<span class=""><?php $this->options->description() ?></span>
		</div>
</section>
<?php endif; ?>
<?php if ($this->is('post')) : ?>
<section class="mdui-center mdui-valign mdui-m-t-1">
	<div class="mdui-p-a-1">
		<a href="<?php $this->options->siteUrl(); ?>" style="display:inline">首页</a>&raquo;
		<?php if ($this->is('index')): ?><!-- 页面为首页时 -->
			最新文章
		<?php elseif ($this->is('post')): ?><!-- 页面为文章单页时 -->
			<?php $this->category(); ?> &raquo; <?php $this->title() ?>
		<?php else: ?><!-- 页面为其他页时 -->
			<?php $this->archiveTitle(' &raquo; ','',''); ?>
		<?php endif; ?>
	</div>
</section>
<?php endif; ?>

	<!-- 面包屑 -->
	<!-- 搜索框 -->
	