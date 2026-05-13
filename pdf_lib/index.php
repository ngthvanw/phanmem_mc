<!DOCTYPE html>
<html>
<head lang="vi">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>In tài liệu</title>

    <style>
        * {box-sizing: border-box;}

        html, body {
            height: 100%;
            overflow: hidden;
        }

        .navbar {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            background: #e74c3c;
            border-bottom: 5px solid #c0392b;
            height: 50px;
            white-space: nowrap;
            overflow-x: auto;
            overflow-y: hidden;
            padding: 0 10px;
        }

        .navbar h1 {
            font-size: 20px;
            color: #fff;
        }

        .menu {
            padding: 0;
            list-style: none;
        }

        .menu li {
            vertical-align: top;
        }

        .menu li a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            font-family: sans-serif;
            padding: 10px 0;
            line-height: 25px;
        }

        .menu li a:hover {
            font-style: italic;
        }

        #panel {
            background: #141f2b;
            padding: 10px;
            height: 100%;
        }

        #panel .editor {
            background: #fff;
        }

        #wrapper {
            overflow: hidden;
            height: 100%;
            background: rgba(193, 193, 193, 1);
        }

        #output {
            width: 100%;
            height: 100%;
            background: rgba(193, 193, 193, 1);
        }
    </style>

</head>
<body>
<div class="pure-g" style="padding-top: 50px; height: 100%;">
    <div id="panel" class="pure-u-1 pure-u-md-1-5">
        <ul class="menu">
            <li><a href="#">Default</a></li>
            <li><a href="#minimal">Minimal</a></li>
            <li><a href="#long">Long text</a></li>
            <li><a href="#content">With content</a></li>
            <li><a href="#multiple">Multiple tables</a></li>
            <li><a href="#html">From html</a></li>
            <li><a href="#header-footer">Header and footer</a></li>
            <li><a href="#horizontal">Horizontal headers</a></li>
            <li><a href="#spans">Rowspan and colspan</a></li>
            <li><a href="#themes">Themes</a></li>
            <li><a href="#custom">Custom style</a></li>
        </ul>

        <button id="download-btn" class="pure-button">Download PDF</button>
    </div>

    <div id="wrapper" class="pure-u-1 pure-u-md-4-5">
        <iframe id="fred" style="border:1px solid #666CCC" title="PDF in an i-Frame" src="ex.php" frameborder="1" scrolling="auto" height="600" width="100%" ></iframe>
    </div>
</div>

</body>
</html>

