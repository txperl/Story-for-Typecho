### Story
每个人都有属于自已的故事，我们编织着、叙述着，只为了那个必定动人的结局。

爱上自已的故事，爱上别人的故事，交织着的，是美好，是快乐，是幸福。

> 最近想开始记录一下自已的所见所得，感觉缺了一个可以让人安心记录的地方。
> 就这样，Story 诞生了。

Demo: [Yumoe](https://yumoe.com/).

Version@[Halo](https://github.com/ruibaby/halo)：[story-halo](https://github.com/ruibaby/story-halo) by ruibaby, thanks.
Version@[纸小墨](https://www.chole.io/)：[ink-theme-story](https://github.com/akkuman/ink-theme-story) by akkuman, thanks.

### Story v1@.0
#### 预览图
[主页](https://i.loli.net/2018/10/09/5bbcbea01d230.png)

#### 述说

个人认为这是一个适合写作与阅读的主题，所以我打算在这篇发布文章中以长段落的形式来写。首先，说说为什么要写 Typecho 版本的吧。具体有三点：一是 Typecho 轻量(相对)；二是习惯写 Typecho 主题了，本地有很多写的练手项目可以参考；三是我本身对博客系统不怎么感冒，用了一个就不怎么想换了。本来打算把 Story 也写得很轻量，但迫于一些原因，就引用了以下项目(感谢): [75CDN](https://cdn.baomitu.com/), [Bootstrap 4](https://getbootstrap.com/), [jQuery](https://jquery.com/), [zoom_vanilla.js](https://github.com/spinningarrow/zoom-vanilla.js), [Prism.js](https://prismjs.com/), [Twemoji Awesome](https://github.com/ellekasai/twemoji-awesome). 其实 jQuery 就用了它的 `FadeIn()`, `FadeOut()` 函数，本来打算用纯 JavaScript 语法写的，但，emm...Prism 也是见仁见智吧，很多人都不需要的。

#### 主题的一些食用说明
##### config.php
Story 包含一个全局配置文件。

```
//on 为开启
//off&其他 为关闭
$GLOBALS['isAutoNav'] = 'off'; //自动设置导航栏中 margin 及 width 值（推荐开启）
$GLOBALS['isIconNav'] = 'off'; //将导航栏中的 1,2,3 替换成 Emoji 图标

$GLOBALS['style_BG'] = ''; //背景图设置。填入图片 URL 地址，留空为关闭
```

##### 菜单

标题旁边有一个 · 字符，点击后便可显示菜单。**1**,**2**,**3** 分别代表 **独立页面菜单**、**导航树**(仅在文章界面有用，仅解析 h3,h4 标签)以及**搜索框**。

若您觉得 1,2,3 太抽象，可以将 `config.php` 中 `$GLOBALS['isIconNav']` 设置为 `on` 即可替换成相应 Emoji 图标。

##### 网站标题修改

本主题要修改标题必须自行修改代码...位于 `header.php` 的 `class .header-logo(54行处)` ，用 `<span class="b"></span>` 及 `<span class="w"></span>` 把自已的站点标题拼接出来就行了，其他可以不做修改。

##### 修改网站标题后菜单定位
您可以将 `config.php` 中 `$GLOBALS['isAutoNav']` 设置为 `on` 即可自动调整，无需进行以下操作。

若您网站标题字数与原来(5个英文字母)不同，那要自行修改菜单的 `margin` 值。位于 `assert/css/main.css` 的 `#menu-page(598行处)` 及 `#search-box(618行处)` ，每个字符格子宽度为 28px ，可自行计算（别忘了算上菜单格，有4个）。

##### 背景图设置
若要设置背景图，请修改位于 `config.php` 的 `$GLOBALS['style_BG']` 变量值。改为图片链接即可，留空即为关闭。

##### 其他

以上的特别说明如果有很多人介意的话，应该还是会写个配置文件然后用 PHP 自动生成修改的...

其他没有特别说明的基本不需要修改，当然你也可以按照个人兴趣随意修改。

若有什么不清楚可以给我发邮件或是到[主题发布页](https://yumoe.com/archives/story.html)&GitHub询问。

### 写在最后

#### 版权声明

##### 感谢

- (在 述说 中提到的)
- [Art Chen](https://about.me/hermitage)-[Artifact.me](https://artifact.me/)-[Element](https://github.com/artchen/hexo-theme-element) 主题首页样式参考（获得许可）
- [Jimmy](https://jimmycai.com/) Yellow 主题评论框参考（告知）

##### 许可

本程序源代码可任意修改并任意使用，但禁止商业化用途。一旦使用，任何不可知事件都与原作者无关，原作者不承担任何后果。

如果您喜欢，希望可以在页面某处保留原作者(Trii Hsia)版权信息。

感谢。