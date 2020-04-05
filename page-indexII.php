<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php
/**
 * 首页 二
 *
 * @package custom
 */
$this->need('header.php');
?>

<div class="container-fluid">
    <div class="row">
        <div id="main" class="col-12 clearfix" role="main">
            <article class="posti" itemscope itemtype="http://schema.org/BlogPosting">
                <div id="postTorTree">
                    <div id="indexIITor">
                        <?php $this->widget('Widget_Metas_Tag_Cloud', 'sort=count&ignoreZeroCount=1&desc=1')->to($tags); ?>
                        <?php while ($tags->next()) : ?>
                            <span><a href="<?php $tags->permalink(); ?>"><?php $tags->name(); ?></a></span>
                        <?php endwhile; ?>
                    </div>
                </div>
                <div id="indexIIList">
                    <?php
                    $this->widget('Widget_Contents_Post_Recent', 'pageSize=896006')->to($obj);
                    $year = $mon = $i = $j = 0;
                    $output = '';
                    while ($obj->next()) {
                        $catHTML = '';
                        $year_tmp = date('Y', $obj->created);
                        $mon_tmp = date('m', $obj->created);
                        $y = $year;
                        $m = $mon;
                        if ($year != $year_tmp && $year > 0) $output .= '</ul>';
                        if ($year != $year_tmp) {
                            $year = $year_tmp;
                            $output .= '<h4>' . $year . '</h4><ul>';
                        }
                        foreach ($obj->categories as $key => $c) {
                            $catHTML .= ' <a href="' . $c['permalink'] . '">#' . $c['name'] . '</a>';
                        }
                        $output .= '<li>' . '<a href="' . $obj->permalink . '">' . $obj->title . '</a><span>' . date('n.j', $obj->created) . $catHTML . '</span></li>';
                    }
                    echo $output;
                    ?>
                </div>
            </article>
        </div>
    </div>
</div>

<?php $this->need('footer.php'); ?>