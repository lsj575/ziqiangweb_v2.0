var className = 'tooltip-box';

    var isIE = navigator.userAgent.indexOf('MSIE') > -1;

    function showTooltip(obj, id, html, width, height) {
        if (document.getElementById(id) == null) {

            var tooltipBox;
            tooltipBox = document.createElement('div');
            tooltipBox.className = className;
            tooltipBox.id = id;
            tooltipBox.innerHTML = html;

            obj.appendChild(tooltipBox);

            //tooltipBox.style.width = width ? width + 'px' : 'auto';
            //tooltipBox.style.height = height ? height + 'px' : 'auto';

            if (!width && isIE) {
                tooltipBox.style.width = tooltipBox.offsetWidth;
            }

            tooltipBox.style.position = "absolute";
            tooltipBox.style.display = "block";

            var left = obj.offsetLeft-20;
            var top = obj.offsetTop-200;

            if (left + tooltipBox.offsetWidth > document.body.clientWidth) {
                var demoLeft = document.getElementById("demo").offsetLeft;
                left = document.body.clientWidth - tooltipBox.offsetWidth - demoLeft;
                if (left < 0) left = 0;
            }

            tooltipBox.style.left = left + 'px';
            tooltipBox.style.top = top + 'px';

            obj.onmouseleave = function () {
                setTimeout(function () {
                    document.getElementById(id).style.display = "none";
                }, 100);
            };

        } else {
            document.getElementById(id).style.display = "block";
        }
    }

    var t = document.getElementById("wxerweima");
    t.onmouseenter = function () {
		var _html = '<div id="mycard"><img src="../index_icon/weixingzh.jpg" alt=""/><h4>微信扫一扫</h4></div>';
        showTooltip(this, "t", _html, 300);
    };
