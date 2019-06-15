<section id="comments" class="mdui-center mdui-m-y-1">
    <?php $this->comments()->to($comments); ?>
     <!--显示评论总条数-->
     <h3 class="mdui-p-a-2"><a><?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?></a></h3>
    <?php if ($comments->have()): ?><!--如果有评论的才会输出-->
    <!--输出评论列表-->
    <hr>
    <ul id="comment_list" class="mdui-p-a-0"style="list-style:none">
        <?php while($comments->next()): ?>
            <li class="mdui-m-a-1" id="<?php $comments->theId(); ?>" style="border: 1px solid rgb(204, 204, 204)">
                <span class="mdui-float-right mdui-m-a-1"><?php echo $comments->sequence(); ?>楼</span><br>
                <div class="">
                    <div class="o comments-gravatar"><?php $comments->gravatar(40);?></div>
                    <span class="mdui-m-x-1" class=""><?php $comments->author(); ?></span>
                    <?php $comments->dateWord(); ?>
                </div>
                <div class="mdui-typo mdui-m-a-1">
                    <?php $comments->content(); ?>
                </div>  
            </li> 
        <?php endwhile; ?>
    </ul>
    <?php endif; ?>
</section>
    <!-- 判断设置是否允许对当前文章进行评论 -->
    <?php if($this->allow('comment')): ?>
    <section id="content" class="mdui-center mdui-m-y-1">
        <h3 class="mdui-p-a-2"><a>来一发？</a></h3><hr>
        <!-- 输入表单开始 -->
        <form method="post" action="<?php $this->commentUrl() ?>" id="comment_form">
        <!-- 如果当前用户已经登录 -->
        <?php if($this->user->hasLogin()): ?>
            <!-- 显示当前登录用户的用户名以及登出连接 -->
            <div class="mdui-m-x-2">已登录- <a href="<?php $this->options->adminUrl(); ?>"><?php $this->user->screenName(); ?></a> 
            <a href="<?php $this->options->index('Logout.do'); ?>" title="Logout">注销 &raquo;</a></div>

        <!-- 若当前用户未登录 -->
        <?php else: ?>
        <!-- 要求输入名字、邮箱、网址 -->
        <div class="mdui-m-x-2 mdui-textfield mdui-textfield-floating-label">
            <label class="mdui-textfield-label">昵称*</label>
            <input class="mdui-textfield-input" type="text" name="author" value="<?php $this->remember('author'); ?>"/>
        </div>    
        <div class="mdui-m-x-2 mdui-textfield mdui-textfield-floating-label">
            <label class="mdui-textfield-label">邮箱*</label>
            <input class="mdui-textfield-input" type="text" name="mail" value="<?php $this->remember('mail'); ?>"/>
        </div>  
        <div class="mdui-m-x-2 mdui-textfield mdui-textfield-floating-label">
            <label class="mdui-textfield-label">友链</label>
            <input class="mdui-textfield-input" type="text" name="url" value="<?php $this->remember('url'); ?>"/>
        </div>   
        <?php endif; ?>
        <!-- 输入要回复的内容 -->
        <div class="mdui-m-x-2 mdui-textfield mdui-textfield-floating-label">
            <label class="mdui-textfield-label">Message*</label>
            <textarea class="mdui-textfield-input" name="text" rows="4"><?php $this->remember('text'); ?></textarea>
        </div>
            <input class="mdui-m-a-2 mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent" type="submit" value="发送" />
        </form>
    </section>
    <?php endif; ?>
</section>
