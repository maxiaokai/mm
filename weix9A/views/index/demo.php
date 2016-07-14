<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>微擎 - 微信公众平台自助引擎 -  Powered by WE7.CC</title>
    <meta name="keywords" content="微擎,微信,微信公众平台" />
    <meta name="description" content="微信公众平台自助引擎，简称微擎，微擎是一款免费开源的微信公众平台管理系统。" />
    <link rel="stylesheet" type="text/css" href="public/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="public/css/main.css"/>
    <script type="text/javascript" src="public/js/libs/modernizr.min.js"></script>
    <link type="text/css" rel="stylesheet" href="assets/js/token/commons.css?v=1465971255" />
    <script type="text/javascript" src="../bootstrap-3.3.5-dist/js/bootstrap.js"></script>
    <script type="text/javascript" src="assets/js/token/common.js?v=1465971255"></script>
    <script type="text/javascript" src="assets/js/token/emotions.js"></script>
    <script src="assets/js/jq.js"></script>
    <script src="assets/js/jquery-zclip-master/jquery.zclip.js"></script>
    <!--[if IE 7]>
    <![endif]-->
    <!--[if lte IE 6]>

    <![endif]-->
</head>
<body >


<div class="main">
    <div class="account">
        <form action="show.php?r=show/updates" method="post" class="form-horizontal tab-content" enctype="multipart/form-data">
            <?php
            foreach($arr as $val) {
                ?>
                <div class="navbar-inner thead">
                    <h4>
                        <span class="pull-right">
                        <a onclick="return confirm('删除帐号将同时删除全部规则及回复，确认吗？');return false;
                        " href="index.php?r=index/delete&id=<?php echo $val['id'] ?>">删除</a>
                        <a href="index.php?r=index/update&id=<?php echo $val['id'] ?>">编辑</a>
                        <a href="account.php?act=switch&id=4">切换</a></span>
                        <span class="pull-left"><small>（微信号：<?php echo $val['aname'] ?>）（所属用户：<span><?php echo $val['name'] ?></span>）</small></span>
                    </h4>
                </div>
                <div class="tbody">
                    <div class="con">
                        <div class="name pull-left">API地址</div>
                        <div class="input-append pull-left" id="api_4">
                            <input id="" type="text" value="<?php echo $val['aurl'] ?>">
                            <button class="btn" type="button">复制</button>
                        </div>
                    </div>
                    <div class="con">
                        <div class="name pull-left">Token</div>
                        <div class="input-append pull-left" id="token_4">
                            <input id="" type="text" value="<?php echo $val['atoken'] ?>">
                            <button class="btn" type="button">复制</button>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </form>
        <script>
            $(function() {
                $("#api_4 button").zclip({
                    path:'assets/js/jquery-zclip-master/ZeroClipboard.swf',
                    copy:$('#api_4 input').val()
                });
                $("#token_4 button").zclip({
                    path:'assets/js/jquery-zclip-master/ZeroClipboard.swf',
                    copy:$('#').val()
                });
            });
        </script>

    </div>
</div>
<div id="footer">
		<span class="pull-right">
			<p align="center">Powered by <a href="http://www.we7.cc"><b>微擎</b></a> v0.52 &copy; 2014 <a href="http://www.we7.cc">www.we7.cc</a></p>
		</span>
		<span class="pull-right">
			<p align="center"><a href="http://www.we7.cc">关于微擎</a>&nbsp;&nbsp;<a href="http://bbs.we7.cc">微擎帮助</a></p>
		</span>
</div>
<div class="emotions" style="display:none;"></div>
</body>
</html>