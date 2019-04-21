<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="container-fluid">
    <div class="row">
        <div id="main" class="col-12 clearfix" role="main">
            <article class="posti" itemscope itemtype="http://schema.org/BlogPosting">
                <h1 class="post-title" itemprop="name headline"><?php $this->title() ?></h1>
                <div class="post-meta">
                    <p>Written by <a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a> with ♥ on <time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date('F j, Y'); ?></time> in <?php $this->category(', ', true, 'none'); ?></p>
                </div>

                <div class="post-content" itemprop="articleBody">
                    <?php parseContnet($this->content); ?>
                </div>

                <div id="postFun" style="display:block;margin-bottom:2em;" class="clearfix">
                    <section style="float:left;">
                        <span itemprop="keywords" class="tags"><?php _e('tag(s): '); ?><?php $this->tags(', ', true, 'none'); ?></span>
                    </section>
                    <section style="float:right;">
                        <span><a id="btn-comments" href="javascript:isComments();">show comments</a></span> · <span><a href="javascript:goBack();">back</a></span> · 
                        <span><a href="<?php $this->options->siteUrl(); ?>">home</a></span>
                    </section>
                </div>

                <?php $this->need('comments.php'); ?>

                <?php
                  $torHTML = post_tor($this->content);
                  if ($torHTML != '') {
                    print_r('<div id="postTorTree"><div id="torTree" style="display: none;"><div class="torArcT"><div class="torArcTile">' . $torHTML . '</div></div></div></div>');
                  }
                ?>
            </article>
        </div>
    </div>
</div>

<?php $this->need('footer.php'); ?>
