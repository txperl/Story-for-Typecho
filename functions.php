<?php
ini_set("error_reporting", "E_ALL & ~E_NOTICE");
/**
 * 主题配置
 * @param $form
 */
function themeConfig($form)
{
    // 导航栏自适应
    $isAutoNav = new Typecho_Widget_Helper_Form_Element_Radio('isAutoNav',
        array('on' => _t('开启'),
            'off' => _t('关闭'),
        ), 'off', _t('导航栏自适应'), _t('默认关闭，开启后自动设置导航栏中 <code>margin</code> 及 <code>width</code> 值（推荐开启）。'));
    $form->addInput($isAutoNav);
    // 表情替换数字
    $isIconNav = new Typecho_Widget_Helper_Form_Element_Radio('isIconNav',
        array('on' => _t('开启'),
            'off' => _t('关闭'),
        ), 'off', _t('表情替换数字'), _t('默认关闭，开启后将导航栏中的 1,2,3 替换成 Emoji 图标。'));
    $form->addInput($isIconNav);
    // 开启订阅功能
    $isRSS = new Typecho_Widget_Helper_Form_Element_Radio('isRSS',
        array('on' => _t('开启'),
            'off' => _t('关闭'),
        ), 'off', _t('RSS 订阅'), _t('默认关闭，在菜单栏中加入 RSS 按钮。'));
    $form->addInput($isRSS);
    // 文章导航树
    $isTorTree = new Typecho_Widget_Helper_Form_Element_Radio('isTorTree',
        array('on' => _t('开启'),
            'off' => _t('关闭'),
        ), 'off', _t('文章导航树'), _t('默认关闭，开启后将默认显示文章导航树。'));
    $form->addInput($isTorTree);
    // 背景图片
    $style_BG = new Typecho_Widget_Helper_Form_Element_Text('style_BG',
        NULL, NULL, _t('背景图设置'), _t('填入图片 URL 地址，留空为关闭。'));
    $form->addInput($style_BG->addRule('xssCheck', _t('请不要在 URL 中使用特殊字符')));
    // favicon
    $favicon = new Typecho_Widget_Helper_Form_Element_Text('favicon', NULL, NULL, _t('Favicon 地址'), _t('一般为 http://www.domain.com/favicon.ico，支持 https:// 或 //（自适应），留空则不设置'));
    $form->addInput($favicon->addRule('xssCheck', _t('请不要在 URL 中使用特殊字符')));
    // 苹果标准
    $iOSIcon = new Typecho_Widget_Helper_Form_Element_Text('iOSIcon', NULL, NULL, _t('Apple Touch Icon 地址'), _t('一般为 http://www.domain.com/image.png，支持 https:// 或 //（自适应），留空则不设置'));
    $form->addInput($iOSIcon->addRule('xssCheck', _t('请不要在 URL 中使用特殊字符')));
}

function parseContent($content)
{
    //解析文章 暂只是添加 h3,h4 锚点，为 <img> 添加 data-action

    //添加 h3,h4 锚点
    $ftitle = array();
    preg_match_all('/<h([3-4])>(.*?)<\/h[3-4]>/', $content, $title);
    $num = count($title[0]);

    for ($i = 0; $i < $num; $i++) {
        $f = $title[2][$i];
        $type = $title[1][$i];
        if ($type == '3') {
            $ff = '<h3 id="anchor-' . $i . '" class="torAn">' . $f . '</h3>';
        }
        if ($type == '4') {
            $ff = '<h4 id="anchor-' . $i . '" class="torAn">' . $f . '</h4>';
        }
        array_push($ftitle, $ff);
    }
    for ($i = 0; $i < $num; $i++) {
        $content = str_replace_limit($title[0][$i], $ftitle[$i], $content);
    }

    //<img> 添加 data-action
    $fimg = array();
    preg_match_all('/<img (.*?)>/', $content, $img);
    $num = count($img[0]);

    for ($i = 0; $i < $num; $i++) {
        $f = $img[1][$i];
        $ff = '<img data-action="zoom" ' . $f . '>';

        array_push($fimg, $ff);
    }
    for ($i = 0; $i < $num; $i++) {
        $content = str_replace_limit($img[0][$i], $fimg[$i], $content);
    }

    print_r($content);
}

function str_replace_limit($search, $replace, $subject, $limit = 1)
{
    if (is_array($search)) {
        foreach ($search as $k => $v) {
            $search[$k] = '`' . preg_quote($search[$k], '`') . '`';
        }
    } else {
        $search = '`' . preg_quote($search, '`') . '`';
    }

    return preg_replace($search, $replace, $subject, $limit);
}

function post_tor($content)
{
    $f = '';
    preg_match_all('/<h[3-4]>(.*?)<\/h[3-4]>/', $content, $tor_i);
    $num = count($tor_i[0]);
    for ($i = 0; $i < $num; $i++) {
        $a = '<a id="tor-' . $i . '" class="torList" href="#anchor-' . $i . '">' . $tor_i[0][$i] . '</a>';
        $f = $f . $a;
    }
    $f = str_replace('<h3>', '<span class="tori">', $f);
    $f = str_replace('</h3>', '</span><br>', $f);
    $f = str_replace('<h4>', '<span class="torii">', $f);
    $f = str_replace('</h4>', '</span><br>', $f);
    if ($num == 0) {
        return '';
    } else {
        return '<a href="#main">Title</a><br>' . $f . '<a href="javascript:goToComment();">Comment</a>';
    }
}

function post_config($content)
{
    $rst = ['isTorTree' => (($GLOBALS['isTorTree'] == 'on') ? 1 : 0)];
    preg_match_all('/<!-- isTorTree:(.*?); -->/', $content, $isTor);
    if ($isTor[1][0] == 'on') {
        $rst['isTorTree'] = 1;
    } else if ($isTor[1][0] == 'off') {
        $rst['isTorTree'] = 0;
    }

    return $rst;
}
