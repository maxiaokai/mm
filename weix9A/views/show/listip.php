<!DOCTYPE html>
<html class=" js flexbox canvas canvastext webgl no-touch geolocation postmessage no-websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients no-cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths" style=""><head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <title>后台管理</title>

</head>
<body>

<div class="container clearfix">

    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="index.php?r=">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">IP管理</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="index.php?r=home/sou" method="post">
                    <table class="search-tab">
                        <tbody>
                        <tr>
                            <th width="70">关键字:</th>
                            <td><input class="common-text" placeholder="请输入ip" name="keywords" id="" type="text"></td>
                            <td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>
                        </tr>
                        </tbody></table>
                </form>
            </div>
        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" method="post" >
                <div class="result-title">
                    <div class="result-list">
                        <a href="index.php?r=show/addip"><i class="icon-font"></i>新增IP</a>
                        <a id="batchDel" href="javascript:void(0)"><i class="icon-font"></i>批量删除</a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tbody><tr>
                            <th class="tc" width="5%"><input class="allChoose" name="" type="checkbox"></th>
                            <th>ID</th>
                            <th>Ip</th>
                            <th>操作</th>
                        </tr>
                        <?php
                        foreach($arr as $val){
                            ?>
                            <tr>
                                <td class="tc"><input name="id[]"  type="checkbox"></td>
                                <td><?php echo $val['id'] ?></td>
                                <td ><?php echo $val['ip'] ?></td>
                                <td>
                                    <a class="link-del" href="index.php?r=show/del&id=<?php echo $val['id'] ?>" >删除</a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        <tr>
                        </tbody></table>
                    <div class="list-page"> 2 条 1/1 页</div>
                </div>
            </form>
        </div>
    </div>
    <!--/main-->
</div>

</body></html>
