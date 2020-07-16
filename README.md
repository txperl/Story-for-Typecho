## Story for Typecho

每个人都有属于自己的故事，我们编织着、叙述着，只为了那个必定动人的结局。

爱上自已的故事，爱上别人的故事，交织着的，是美好，是快乐，是幸福。

> 最近想开始记录一下自己的所见所得，感觉缺了一个可以让人安心记录的地方。
>  
> 就这样，Story 诞生了。

### 展示站

[Yumoe](https://yumoe.com/)



### 预览图

![主页](https://i.loli.net/2018/10/09/5bbcbea01d230.png)

![截图](screenshot.png)

### 食用说明

全新的版本对配置方式进行了优化，无需修改配置文件，在控制台的「设置外观」中即可对主题进行定制。

#### 菜单定制

标题旁边有一个 · 字符，点击后便可显示菜单。

| 显示名 | 功能 | 说明 |
| :---: | :---: | :---: |
| 「**1**」 | 独立页面菜单 | / |
| 「**2**」 | 导航树 | 仅在文章界面可用，仅解析 h3, h4 标签 |
| 「**3**」 | 搜索框 | / |

> 小贴士：若觉得 1, 2, 3 太抽象，可以设置替换成相应 Emoji 图标。

#### 标题定制

要修改标题必须自行修改代码... 位于 `header.php` 的 `class .header-logo(56行处)` ，用 `<span class="b"></span>` 及 `<span class="w"></span>` 把自已的站点标题拼接出来就行了，其他可以不做修改。

#### 导航栏自适应

如果进行了标题定制且数量与原本（五个英文字母）不同，则需要开启此功能。

> 若不想开启（？）也可以自行修改菜单的 `margin` 值。位于 `assert/css/main.css` 的 `#menu-page(765行处)` 及 `#search-box(787行处)` ，每个字符格子宽度为 28px ，可自行计算（别忘了算上菜单格，有4个）。

#### 导航树

可以在「设置外观」中开启，若想手动控制（？），请在文章任意位置（推荐开头）添加 `<!-- isTorTree:on; -->` 或 `<!-- isTorTree:off; -->` 。

值得一提的是，当页面宽度小于 1024px ，导航树将不再显示。

#### 其他

其他没有特别说明的基本不需要修改，当然你也可以按照个人兴趣随意修改。

若有什么不清楚可以给我发邮件或是到[主题发布页](https://yumoe.com/archives/story.html) & [GitHub](https://github.com/txperl/Story-for-Typecho) 询问。

### 写在最后

#### 感谢

* [@Halo](https://github.com/ruibaby/halo) ： [story-halo](https://github.com/ruibaby/story-halo) by [ruibaby](https://github.com/ruibaby)
* [@纸小墨](https://www.chole.io/) ： [ink-theme-story](https://github.com/akkuman/ink-theme-story) by [akkuman](https://github.com/akkuman)
* [@VeriPress](https://github.com/veripress/veripress) ： [Story-for-VeriPress](https://github.com/txperl/Story-for-VeriPress)
* [@Vndroid](https://github.com/Vndroid/)
* [Art Chen](https://about.me/hermitage) ： [Artifact.me](https://artifact.me/) - [Element](https://github.com/artchen/hexo-theme-element) 主题首页样式参考（获得许可）
* [Jimmy](https://jimmycai.com/) ：Yellow 主题评论框参考（获得许可）

#### 许可

本程序源代码可任意修改并任意使用，但禁止商业化用途。一旦使用，任何不可知事件都与原作者无关，原作者不承担任何后果。

如果您喜欢，希望可以在页面保留原作者 (Trii Hsia) 版权信息。

感谢。

