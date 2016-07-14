<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"><head>
    <meta http-equiv="X-UA-Compatible" content="IE=8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>微擎 - 微信公众平台自助引擎 -  Powered by WE7.CC</title>
    <meta name="keywords" content="微擎,微信,微信公众平台">
    <meta name="description" content="微信公众平台自助引擎，简称微擎，微擎是一款免费开源的微信公众平台管理系统。">

    <link type="text/css" rel="stylesheet" href="assets/js/token/commons.css">
    <script type="text/javascript" src="assets/js/token/jquery-1.js"></script>
    <script type="text/javascript" src="assets/js/token/bootstrap.js"></script>
    <script type="text/javascript" src="assets/js/token/common.js"></script>
    <script type="text/javascript" src="assets/js/token/emotions.js"></script>
    <script type="text/javascript">
        cookie.prefix = '6e34_';
    </script>
    <!--[if IE 7]>
    <link rel="stylesheet" href="assets/js/token//font-awesome-ie7.min.css">
    <![endif]-->
    <!--[if lte IE 6]>
    <link rel="stylesheet" type="text/css" href="assets/js/token//bootstrap-ie6.min.css">
    <link rel="stylesheet" type="text/css" href="assets/js/token//ie.css">
    <![endif]-->
</head>
<body>
<div class="main">
    <div class="stat">
        <div class="stat-div">
            <form action="index.php?r=index/updates" method="post" class="form-horizontal tab-content" enctype="multipart/form-data">
                <input name="id" value="4" type="hidden">
                <div id="accont-common" class="tab-pane fade active in">
                    <div class="sub-item">
                        <h4 class="sub-title">普通模式</h4>
                    </div>
                    <div class="sub-item" id="table-list">
                        <div class="sub-content">
                            <?php
                                foreach($arr as $val) {
                                    ?>
                                    <table class="tb">
                                        <tbody><tr>
                                            <th><label for="">公众号名称</label></th>
                                            <td>
                                                <input name="name" class="span6" value="<?php echo $val['aname'] ?>" autocomplete="off" type="text">
                                                <!--label for="adv-setting" class="checkbox inline">
                                                    <input type="checkbox" id="adv-setting" hideclass="adv-setting" checked='true'> 服务号
                                                </label-->
                                                <span class="help-block">您可以给此公众号起一个名字, 方便下次修改和查看.</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th style="color:red">接口地址</th>
                                            <td>
                                                <input class="span6" style="width: 500px" value="http://1.6669999.applinzi.com/we7sae/api.php?hash=w0Ws9" readonly="readonly" autocomplete="off" type="text">
                                                <div class="help-block">设置“微信公众平台接口”配置信息中的接口地址</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th style="color:red">微信Token</th>
                                            <td>
                                                <input name="wetoken" style="width: 500px" class="span6" value="<?php echo $val['atoken'] ?>" readonly="readonly" type="text"> <a href="javascript:;" onclick="tokenGen();">生成新的</a>
                                                <div class="help-block">与微信公众平台接入设置值一致，必须为英文或者数字，长度为3到32个字符. 请妥善保管, Token 泄露将可能被窃取或篡改微信平台的操作数据.</div>
                                            </td>
                                        </tr>
                                        <tr class="">
                                            <th>公众号AppId</th>
                                            <td>
                                                <input name="key" class="span6" style="width: 250px"value="<?php echo $val['appid'] ?>"autocomplete="off" type="text">
                                                <div class="help-block">请填写微信公众平台后台的AppId</div>
                                            </td>
                                        </tr>
                                        <tr class="">
                                            <th>公众号AppSecret</th>
                                            <td>
                                                <input name="secret" class="span6" style="width: 250px"  value="<?php echo $val['appsecret'] ?>" autocomplete="off" type="text">
                                                <div class="help-block">请填写微信公众平台后台的AppSecret, 只有填写这两项才能管理自定义菜单</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <td>
                                                <input name="submit" value="提交" class="btn btn-primary span2" type="submit">
                                                <input name="token" value="772ecad6" type="hidden">
                                                <input name="id" value="<?php echo $val['id'] ?>" type="hidden">
                                            </td>
                                        </tr>
                                        </tbody></table>
                                <?php
                                }
                            ?>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</body></html>