<?php
ini_set("error_reporting", "E_ALL & ~E_NOTICE");

// 解析文章：暂只是添加 h3,h4 锚点，为 <img> 添加 data-action
function parseContent($content)
{
    // 添加 h3,h4 锚点
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

    // <img> 添加 data-action
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

    if ($num == 0) {
        return '';
    } else {
        for ($i = 0; $i < $num; $i++) {
            $a = '<a id="tor-' . $i . '" class="torList" href="#anchor-' . $i . '">' . $tor_i[0][$i] . '</a>';
            $f = $f . $a;
        }
        $f = str_replace('<h3>', '<span class="tori">', $f);
        $f = str_replace('</h3>', '</span><br>', $f);
        $f = str_replace('<h4>', '<span class="torii">', $f);
        $f = str_replace('</h4>', '</span><br>', $f);

        return '<a href="#main">Title</a><br>' . $f . '<a href="javascript:goToComment();">Comment</a>';
    }
}

function post_config($thiss, $isTorTree)
{
    $content = $thiss->content;
    $rst = ['isTorTree' => $isTorTree];
    preg_match_all('/<!-- isTorTree:(.*?); -->/', $content, $isTor);

    if (@$thiss->fields->tor == 'on' || $isTor[1][0] == 'on') {
        $rst['isTorTree'] = 1;
    } else if (@$thiss->fields->tor == 'off' || $isTor[1][0] == 'off') {
        $rst['isTorTree'] = 0;
    }

    return $rst;
}

/**
 * logo字符处理
 *
 * @author Twor
 * @param string $siteName
 * @return array
 */
function siteName(string $siteName)
{
    list($letter, $colors) = explode(":", $siteName);
    $letterLen = mb_strlen($letter, 'utf8');
    $letterArr = str_split($letter);
    $colorsArr = str_split($colors);
    $arrayName = array('letterLen' => $letterLen, 'letter' => $letterArr, 'colors' => $colorsArr);
    return $arrayName;
}

/**
 * 后台主题配置
 *
 * @author Twor
 * @param Typecho_Widget_Helper_Form $themeConfig
 * @return void
 */
function themeConfig(Typecho_Widget_Helper_Form $themeConfig)
{
    $titleName = new Typecho_Widget_Helper_Form_Element_Text('titleName', NULL, 'YUMOE:bbwbb', _t('站点名称'), _t('格式[文本:颜色(b黑色|w白色)],默认五个字符(超出或少于请开启自适应)'));
    $themeConfig->addInput($titleName);
    $style_BG = new Typecho_Widget_Helper_Form_Element_Text('style_BG', NULL, NULL, _t('背景图'), _t('背景图设置。填入图片 URL 地址，留空为关闭'));
    $themeConfig->addInput($style_BG);
    $isIconNav = new Typecho_Widget_Helper_Form_Element_Radio('isIconNav', array(0 => '不开启', 1 => '开启'), 0, _t('导航栏图标'));
    $themeConfig->addInput($isIconNav);
    $isTorTree = new Typecho_Widget_Helper_Form_Element_Radio('isTorTree', array(0 => '不开启', 1 => '开启'), 0, _t('导航树'));
    $themeConfig->addInput($isTorTree);
    $isAutoNav = new Typecho_Widget_Helper_Form_Element_Radio('isAutoNav', array(0 => '不开启', 1 => '开启'), 1, _t('导航自适应'));
    $themeConfig->addInput($isAutoNav);
    $isRSS = new Typecho_Widget_Helper_Form_Element_Radio('isRSS', array(0 => '不开启', 1 => '开启'), 0, _t('RSS订阅'));
    $themeConfig->addInput($isRSS);
}
