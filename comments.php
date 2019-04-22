<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<?php
//代码参考 Theme Quark http://sunhua.me/Quark.html
function threadedComments($comments, $options)
{
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';
        } else {
            $commentClass .= ' comment-by-user';
        }
    }
    $commentLevelClass = $comments->levels > 0 ? ' comment-child' : ' comment-parent';
    if ($comments->url) {
        $author = '<a href="' . $comments->url . '"' . '" target="_blank"' . ' rel="external nofollow">' . $comments->author . '</a>';
    } else {
        $author = $comments->author;
    }
    ?>
    <li id="li-<?php $comments->theId(); ?>" class="comment-body<?php
                                                                if ($comments->levels > 0) {
                                                                    echo ' comment-child';
                                                                    $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
                                                                } else {
                                                                    echo ' comment-parent';
                                                                }
                                                                $comments->alt(' comment-odd', ' comment-even');
                                                                echo $commentClass;
                                                                ?>">
        <div id="<?php $comments->theId(); ?>">
            <?php $avatar = 'https://secure.gravatar.com/avatar/' . md5(strtolower($comments->mail)) . '?s=80&r=X&d='; ?>
            <img class="avatar" src="<?php echo $avatar ?>" alt="<?php echo $comments->author; ?>" />
            <div class="comment_main">
                <?php $comments->content(); ?>
                <div class="comment_meta">
                    <span class="comment_author"><?php echo $author ?></span> <span class="comment_time"><?php $comments->date(); ?></span><span class="comment_reply"><?php $comments->reply(); ?></span>
                </div>
            </div>
        </div>
        <?php if ($comments->children) { ?><div class="comment-children"><?php $comments->threadedComments($options); ?></div><?php } ?>
    </li>
<?php } ?>

<div id="comments" class="gen">
    <?php $this->comments()->to($comments); ?>

    <?php if ($this->allow('comment')) : ?>
        <div id="<?php $this->respondId(); ?>" class="respond">
            <div class="cancel-comment-reply">
                <?php $comments->cancelReply(); ?>
            </div>

            <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
                <div class="comment-inputs">
                    <?php if ($this->user->hasLogin()) : ?>
                        <p><?php _e('登录身份: '); ?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a></p>
                    <?php else : ?>
                        <input type="text" name="author" id="comment-name" class="text" placeholder="<?php _e('name'); ?>" value="<?php $this->remember('author'); ?>" required />

                        <input type="email" name="mail" id="comment-mail" class="text" placeholder="<?php _e('mail'); ?>" value="<?php $this->remember('mail'); ?>" <?php if ($this->options->commentsRequireMail) : ?> required<?php endif; ?> />

                        <input type="url" name="url" id="comment-url" class="text" placeholder="<?php _e('https://'); ?>" value="<?php $this->remember('url'); ?>" <?php if ($this->options->commentsRequireURL) : ?> required<?php endif; ?> />
                    <?php endif; ?>
                </div>
                <div class="comment-editor">
                    <textarea name="text" id="textarea" class="textarea" required onkeydown="if((event.ctrlKey||event.metaKey)&&event.keyCode==13){document.getElementById('submitComment').click();return false};"><?php $this->remember('text'); ?></textarea>
                </div>
                <div class="comment-buttons">
                    <div class="left">
                        <span>Edit with markdown</span>
                    </div>
                    <div class="right">
                        <button id="submitComment" type="submit" class="submit"><?php _e('Submit'); ?></button>
                    </div>
                </div>
            </form>
        </div>
    <?php else : ?>
        <h2>
            <center><?php _e('抱歉，评论已关闭...'); ?></center>
        </h2>
    <?php endif; ?>

    <?php if ($comments->have()) : ?>
        <h2><?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?></h2>

        <?php $comments->listComments(); ?>

        <div class="nav-page">
            <center><?php $comments->pageNav('&laquo;', '&raquo;'); ?></center>
        </div>
    <?php endif; ?>
</div>