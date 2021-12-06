; (function (window, $, undefined) {
    // <div class="tool-multiwrapbox" id="wrap-box-baseinfo">
    // 	<div class="multi-text">简介：${baseInfo["基金简介"]}</div>
    // 	<div class="multi-text_after"><span class="after-dots">... </span><span class="after-op op-btn"
    // 		id="btn-collapse">展开</span>
    // 	</div>
    // </div>

    var RESET_CLASS = 'reset-style';

    $.fn.multiTextToggleCollapse = function (settings) {
        var defalutConfig = {
            line: 4,
        };

        var config = $.extend(defalutConfig, settings);

        var $wrapBox = this;
        var wrapBox = $wrapBox[0];
        var text = $wrapBox.text();
        var textHeight = parseInt($wrapBox.css("height"));

        var lineHeightStr = $wrapBox.css("line-height"); // normal 12px 1.2 120% 1.2em
        var fontSize = parseInt($wrapBox.css("font-size")); // 12px -> 12

        var strategyMode = {
            "normal": function () {
                return fontSize;
            },
            "px": function (num) {
                return +num;
            },
            "em": function (num) {
                return num * fontSize;
            },
            "%": function (num) {
                return num / 100 * fontSize;
            },
            "void": function (num) {
                return num * fontSize;
            }
        };

        var num = (lineHeightStr.match(/\d+(.\d+)?/) || [1])[0]; // 12px -> 12
        var unit = lineHeightStr.replace(num, '') || 'void'; // 12px -> px

        var lineHeight = strategyMode[unit](num).toFixed(2);

        $wrapBox.addClass('tool-multiwrapbox');

        var visibleHeight = config.line * lineHeight;
        // 向上取整，尽量让可视区大点 (bug edge 下的 visibleHeight 和其他浏览器计算不同)
        visibleHeight = Math.ceil(visibleHeight);
        // 如果文本内容少于容器大小，则退出，不进行截断处理
        if (textHeight <= visibleHeight) {
            return;
        }

        wrapBox.style.cssText = ';height:' + visibleHeight + 'px;';

        var textBox = document.createElement("div");

        textBox.className = "multi-text";
        textBox.innerHTML = text;

        var collapseBtn = document.createElement("span");

        collapseBtn.className = "after-op op-btn op-collapse";
        collapseBtn.innerHTML = "kevesebb";

        textBox.appendChild(collapseBtn);

        var dots = document.createElement("span");

        dots.className = "after-dots";
        dots.innerHTML = "...";

        var expandBtn = document.createElement("span");

        expandBtn.className = "after-op op-btn";
        expandBtn.innerHTML = "többet mutat";
        var btnWrapBox = document.createElement("div");

        btnWrapBox.className = "multi-text_after";
        btnWrapBox.style.cssText = ';top:' + (config.line - 1) * lineHeight + 'px;';

        btnWrapBox.appendChild(dots);
        btnWrapBox.appendChild(expandBtn);

        $wrapBox.html('');
        $wrapBox.append(textBox);
        $wrapBox.append(btnWrapBox);


        var $btnWrapBox = $(btnWrapBox);

        // 展开
        expandBtn.onclick = function () {
            $btnWrapBox.hide();
            $wrapBox.addClass(RESET_CLASS);
        };
        // 收起
        collapseBtn.onclick = function () {
            $btnWrapBox.show();
            $wrapBox.removeClass(RESET_CLASS);
        };
    };

}(this, jQuery));
