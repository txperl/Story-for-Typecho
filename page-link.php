<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<?php
/**
 * 友链
 *
 * @package custom
 * @Descripttion: 友情链接模板
 * @Author: Twor
 * @Link: https://twor.me
 */
$this->need('header.php');
?>

<div class="container-fluid">
    <div class="row">
        <div id="main" role="main">
            <ul class="post-list clearfix" id="link-list">
                <div id="format">

                </div>
            </ul>

            <article class="posti" itemscope itemtype="http://schema.org/BlogPosting">
                <div id="postFun" style="display:block;margin-bottom:2em;" class="clearfix">
                    <section style="float:left;">
                        <span itemprop="keywords" class="tags"><?php _e('tag(s): '); ?><?php $this->tags(', ', true, 'links'); ?></span>
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


<script type="text/javascript">
    var links = `<?php
                    $html = $this->row['text'];
                    $text = explode("Links:", $html);
                    echo trim($text[1]);
                    ?>`;
    var diytext = `<?php
                    $markdown = new Markdown();
                    $diytext =  trim($text[0]);
                    $diythml = $markdown->convert($diytext);
                    echo $diythml;
                    ?>`;
    datas = links.split("\n");
    for (var i = 0; i < datas.length; i++) {
        datas[i] = datas[i].split(",");
    }
    var format = document.getElementById("format");
    if (diytext.length !== 0) {
        format.innerHTML = diytext;
    }


    function creatArticle(datas) {
        var parent = document.getElementById("link-list");
        for (var i = 0; i < datas.length; i++) {
            var li = document.createElement("li");
            li.className = "post-item grid-item";
            parent.appendChild(li);
            var a = document.createElement("a");
            a.className = "post-link";
            a.href = datas[i][2];
            li.appendChild(a);
            var h3 = document.createElement("h3");
            h3.className = "post-title";
            a.appendChild(h3);
            h3.innerHTML = datas[i][0] + '<br>';
            var time = document.createElement("time");
            time.className = "index-time";
            h3.appendChild(time);
            time.innerHTML = datas[i][1];
            if (datas[i][3] !== undefined) {
                var div = document.createElement("div");
                div.className = "post-meta";
                a.appendChild(div);
                div.innerHTML = datas[i][3];
            }

        }
    }
    creatArticle(datas);
</script>

<?php $this->need('footer.php'); ?>