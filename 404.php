<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="container-fluid">
    <div class="row">
        <div id="main" role="main">
            <ul class="post-list clearfix">
                <li class="post-item grid-item">
                    <a class="post-link">
                        <h3 class="post-title">404,<br>不知道发生了什么...</h3>
                        <div class="post-meta">(,,• ₃ •,,)</div>
                    </a>
                </li>
                <li class="post-item grid-item">
                    <a href="javascript:Search404();" class="post-link">
                        <h3 class="post-title">搜索一下</h3>
                        <div class="post-meta">(•̀ᴗ•́)و ̑̑</div>
                    </a>
                </li>
                <li class="post-item grid-item">
                    <a class="post-link" href="<?php $this->options->siteUrl(); ?>">
                        <h3 class="post-title">返回首页</h3>
                        <div class="post-meta">(・(ｪ)・)</div>
                    </a>
                </li>
                <li class="post-item grid-item">
                    <a class="post-link">
                        <h3 class="post-title">没了哦</h3>
                        <div class="post-meta">(○’ω’○)</div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

<?php $this->need('footer.php'); ?>