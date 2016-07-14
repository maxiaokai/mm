<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>

</head>
<body>

<div class="container clearfix">

    <!--/sidebar-->
    <div class="main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="index.php?r=home/index">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="">IP管理</a><span class="crumb-step">&gt;</span><span>新增IP</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="index.php?r=show/add_pro"  method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody>
                        <tr>
                            <th><i class="require-red">*</i>新增IP：</th>
                            <td>
                                <input class="common-text required" id="title" name="ip" size="50"  type="text" placeholder="请输入正确的IP地址">
                            </td>
                        </tr>
                        <tr>
                            <th></th>
                            <td>
                                <input class="btn btn-primary btn6 mr10" value="提交" id="button" type="submit">
                                <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button" >
                            </td>
                        </tr>

                </form>
            </div>
        </div>

    </div>
    <!--/main-->
</div>
</body>
</html>
<script src="js/jquery-1.9.1.min.js"></script>
<script >
    $('#button').click(function(){
        var ip=$('#title').val();
        $.get('index.php?r=show/add_pro',{ip:ip},function(msg){
            if(msg==1){
                alert('ip已存在');
            }else if(msg==2){
                alert('ip添加成功');
            }else if(msg==3){
                alert('ip添加失败');
            }
        })
    })
</script>