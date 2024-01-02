<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="container-fluid">
    <div class="row">
        <div id="main" class="col-12 clearfix" role="main">
            <article class="posti" itemscope itemtype="http://schema.org/BlogPosting">
                <h1 style="text-align:right;" class="post-title" itemprop="name headline"><?php $this->title() ?></h1>
                <div class="post-content" itemprop="articleBody">
                    <?php $this->content(); ?>
                </div>

                <div id="postFun" style="display:block;margin-bottom:2em;" class="clearfix">
                    <section style="float:right;">
                        <span><a id="btn-comments" href="javascript:isComments();">show comments</a></span> · <span><a href="javascript:goBack();">back</a></span> ·
                        <span><a href="<?php $this->options->siteUrl(); ?>">home</a></span>
                    </section>
                </div>

                <?php $this->need('comments.php'); ?>

            </article>
        </div>
    </div>
</div>

<?php $this->need('footer.php'); ?>