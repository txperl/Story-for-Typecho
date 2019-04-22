<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
</div><!-- end #body -->

<footer id="footer" role="contentinfo">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                &copy; <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>.
                <?php _e('Using <a target="_blank" href="http://www.typecho.org">Typecho</a> & <a target="_blank" href="https://github.com/txperl/Story-for-Typecho">Story</a>'); ?>.
            </div>
        </div>
    </div>
</footer>

<script src="https://lib.baomitu.com/jquery/3.3.1/jquery.min.js"></script>
<script src="<?php $this->options->themeUrl('assert/js/prism.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('assert/js/zoom-vanilla.min.js'); ?>"></script>
<script>
    $(document).ready(function() {
        if (window.location.hash != '') {
            var i = window.location.hash.indexOf('#comment');
            var ii = window.location.hash.indexOf('#respond-post');
            if (i != -1 || ii != -1) {
                document.getElementById('btn-comments').innerText = 'hide comments';
                document.getElementById('comments').style.display = 'block';
            }
        }
    });

    window.onload = function() {
        <?php if ($this->is('post')) : ?>
            <?php $postConfig = post_config($this->content); ?>
            <?php if ($postConfig['isTorTree']) : ?>
                isMenu2('auto');
            <?php endif; ?>
        <?php endif; ?>
        <?php if ($GLOBALS['isAutoNav'] == 'on') : ?>
            var b = document.getElementsByClassName('b');
            var w = document.getElementsByClassName('w');
            var menupgMargin = (b.length + w.length) * 28;
            var srhboxMargin = (b.length + w.length + 3) * 28;
            var menusrhWidth = (b.length + w.length - 1) * 28;
            document.getElementById('menu-page').style['margin-left'] = menupgMargin + 'px';
            document.getElementById('search-box').style['margin-left'] = srhboxMargin + 'px';
            document.getElementById('menu-search').style['width'] = menusrhWidth + 'px';
            if (menusrhWidth < 140) {
                document.getElementById('menu-search').setAttribute('placeholder', 'Search~');
            }
        <?php endif; ?>
    }

    function isMenu() {
        if (document.getElementById('menu-1').style.display == 'inline') {
            $('#search-box').fadeOut(200);
            $('#menu-page').fadeOut(200);
            $('#menu-1').fadeOut(500);
            $('#menu-2').fadeOut(400);
            $('#menu-3').fadeOut(300);
        } else {
            $('#menu-1').fadeIn(150);
            $('#menu-2').fadeIn(150);
            $('#menu-3').fadeIn(150);
        }
    }

    function isMenu1() {
        if (document.getElementById('menu-page').style.display == 'block') {
            $('#menu-page').fadeOut(300);
        } else {
            $('#menu-page').fadeIn(300);
        }
    }

    function isMenu2(c = 'none') {
        if (document.getElementById('torTree')) {
            if ($("#torTree").attr('style') == 'display: none;') {
                $("#torTree").fadeIn(300);
                $("#torTree").css('display', 'inline-block');
            } else {
                $("#torTree").fadeOut(300);
            }
        } else {
            if (c != 'auto') {
                alert('人家是导航树哦！只有在特定的文章页面才会出现哦...');
            }
        }
    }

    function isMenu3() {
        if (document.getElementById('search-box').style.display == 'block') {
            $('#search-box').fadeOut(300);
        } else {
            $('#search-box').fadeIn(300);
        }
    }

    function isComments() {
        if (document.getElementById('btn-comments').innerText == 'show comments') {
            document.getElementById('btn-comments').innerText = 'hide comments';
            document.getElementById('comments').style.display = 'block';
        } else {
            document.getElementById('btn-comments').innerText = 'show comments';
            document.getElementById('comments').style.display = 'none';
        }
    }

    function Search404() {
        $('#menu-1').fadeIn(150);
        $('#menu-2').fadeIn(150);
        $('#menu-3').fadeIn(150);
        $('#search-box').fadeIn(300);
    }

    function goBack() {
        window.history.back();
    }

    function footerPosition() {
        $("footer").removeClass("fixed-bottom");
        var contentHeight = document.body.scrollHeight,
            winHeight = window.innerHeight;
        if (document.getElementsByClassName("post-content")[0]) {
            var winImgNum = document.getElementsByClassName("post-content")[0].getElementsByTagName("img").length;
        } else {
            var winImgNum = 0;
        }
        if (!(contentHeight > winHeight) && winImgNum == 0) {
            $("footer").addClass("fixed-bottom");
        }
    }
    footerPosition();
    $(window).resize(footerPosition);

    function goToComment() {
        document.getElementById('btn-comments').innerText = 'hide comments';
        document.getElementById('comments').style.display = 'block';
        window.location.hash = "#postFun";
    }
</script>

<?php $this->footer(); ?>
</body>

</html>