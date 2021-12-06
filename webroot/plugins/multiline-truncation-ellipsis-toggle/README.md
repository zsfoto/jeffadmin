# 多行文本截断插件

多行文本截断，展开收缩显示

### Install

```html
<link rel="stylesheet" href="${path}/src/index.css" />
<script type="text/javascript" src="${path}/src/jquery.multiTextToggleCollapse.js"></script>
```

### Usage

```html
<div id="wrap-box-baseinfo">简介：这里有很多很多文字</div>
<script>
    // 使用
    $("#wrap-box-baseinfo").multiTextToggleCollapse({
        line: 4, // 最大显示行数，默认是  4
    });
</script>

```


### MIT License

Copyright (c) 2019 C-FED

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.