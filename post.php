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
                <div>
                    <ul class="post-copyright">
                      <li class="post-copyright-author">
                          <strong>本文作者：</strong><?php $this->anthor(); ?>
                      </li>
                      <li class="post-copyright-link">
                        <strong>本文链接：</strong>
                        <a href="<?php $this->permalink() ?>" title="<?php $this->title() ?>"><?php $this->permalink() ?></a>
                    </li>
                    <li class="post-copyright-license">
                        <strong>版权声明： </strong>
                        本博客所有文章除特别声明外，均采用 <a href="http://creativecommons.org/licenses/by-nc-sa/3.0/cn/" rel="external nofollow" target="_blank">CC BY-NC-SA 3.0 CN</a> 许可协议。转载请注明出处！
                    </li>
                </ul>
            </div>
            <div style="display:block;margin-bottom:2em;" class="clearfix">
                <section style="float:left;">
                    <span itemprop="keywords" class="tags"><?php _e('tag(s): '); ?><?php $this->tags(', ', true, 'none'); ?></span>
                </section>
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
