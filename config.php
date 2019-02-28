<?php
//on 为开启
//off&其他 为关闭

$GLOBALS['isAutoNav'] = 'on'; //自动设置导航栏中 margin 及 width 值（推荐开启）
$GLOBALS['isIconNav'] = 'off'; //将导航栏中的 1,2,3 替换成 Emoji 图标
$GLOBALS['isRSS'] = 'on'; //在菜单栏中加入 RSS 按钮

$GLOBALS['style_BG'] = 'https://api.paugram.com/wallpaper/'; //背景图设置。填入图片 URL 地址，留空为关闭
$GLOBALS['shortcut_ico'] = 'https://tu-1252943311.cos.ap-shanghai.myqcloud.com/forest_128px_1215523_easyicon.net.ico'; //填写网站图标地址
$GLOBALS['NAME']= 'INNEI'; //网站标题修改,限制5个字母. 如需添加5个以上,自行修改
$GLOBALS['RUNTIME']='PHP'; //这里选择显示运行时间, PHP为显示服务器运行时间, JS为自定义时间
?>