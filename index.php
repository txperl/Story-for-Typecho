<?php

/**
 * 每个人都有属于自已的故事，我们编织着、叙述着，只为了那个必定动人的结局。
 * 爱上自已的故事，爱上别人的故事，交织着的，是美好，是快乐，是幸福。
 * 本项目属于 ProjectNatureSimple
 * 
 * @package Story
 * @author Trii Hsia
 * @version v1@.21
 * @link https://yumoe.com
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>

<div class="container-fluid">
    <div class="row">
        <div id="main" role="main">
            <ul class="post-list clearfix">
                <?php while ($this->next()) : ?>
                    <li class="post-item grid-item" itemscope itemtype="http://schema.org/BlogPosting">
                        <a class="post-link" href="<?php $this->permalink() ?>">
                            <?php
                            if (@$this->fields->cover) {
                                echo '<span class="cover" style="background: url(' . $this->fields->cover . ') center/cover no-repeat;"></span>';
                            }
                            ?>
                            <h3 class="post-title"><time class="index-time" datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date('M j, Y'); ?></time><br><?php $this->title() ?></h3>
                            <?php if ($this->category) : ?>
                                <div class="post-meta">
                                    <?php echo $this->category(', ', false); ?>
                                </div>
                            <?php endif; ?>
                        </a>
                    </li>
                <?php endwhile; ?>
            </ul>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="nav-page">
            <?php $this->pageNav('&laquo;', '&raquo;'); ?>
        </div>
    </div>
</div>

<?php $this->need('footer.php'); ?>