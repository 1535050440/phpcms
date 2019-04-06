<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <title>后台登录</title>
    <link href="statics/admin_login/css/bootstrap.min.css" rel="stylesheet">
    <link href="statics/admin_login/css/font-awesome.min.css" rel="stylesheet">
    <link href="statics/admin_login/css/animate.min.css" rel="stylesheet">
    <link href="statics/admin_login/css/style.min.css" rel="stylesheet">
    <link href="statics/admin_login/css/login.min.css" rel="stylesheet">
    <link href="statics/admin_login/css/jquery.slider.css" rel="stylesheet">
    <script type="text/javascript" src="statics/admin_login/js/jquery.min.js"></script>
    <script>
        if(window.top!==window.self){window.top.location=window.location};
    </script>
</head>

<body class="signin">
<div class="signinpanel">
    <div class="row">
        <div class="col-sm-7" style="color:#fff">
            <div class="signin-info">
                <div class="logopanel m-b">
                </div>
                <div class="m-b"></div>
                <h2>欢迎使用PHPCMS后台管理</h2>
                <ul class="m-b"></ul>
            </div>
        </div>
        <div class="col-sm-5" style="color:#fff">
            <form id="doLogin" name="doLogin" method="post" action="http://www.1yyg.com/admin/Login/doLogin.html">
                <p class="m-t-md" id="err_msg">登录到后台</p>
                <input type="text" class="form-control uname" placeholder="用户名" id="username" name="username" />
                <input type="password" class="form-control pword m-b" placeholder="密码" id="password" name="password" />
                <div style="margin-bottom:70px">
                    <input type="text" class="form-control" placeholder="验证码" style="color:black;width:120px;float:left;margin:0px 0px;" name="code" id="code"/>
                    <img src="statics/admin_login/picture/checkverify.html" onclick="javascript:this.src='http://www.1yyg.com/admin/Login/checkVerify.html?tm='+Math.random();" style="float:right;cursor: pointer"/>
                </div>

                <button type="submit" class="btn btn-primary btn-block">登　录</button>
            </form>
        </div>
    </div>
    <div class="signup-footer">
        <div class="pull-left" style="color:#fff">
            &copy; 2018 一元云购后台管理系统 All Rights Reserved.<br>
            git地址：<a href="https://github.com/qq1415551519/phpcms" style="color:#fff;">https://github.com/qq1415551519/phpcms</a>
        </div>
    </div>
</div>

<script type="text/javascript" src="statics/admin_login/js/bootstrap.min.js"></script>
<script type="text/javascript" src="statics/admin_login/js/jquery.form.js"></script>
<script type="text/javascript" src="statics/admin_login/js/layui.js"></script>
<script type="text/javascript" src="statics/admin_login/js/lunhui.js"></script>
<script type="text/javascript" src="statics/admin_login/js/jquery.slider.min.js"></script>
<script type="text/javascript">
    var check_result = false;
    $("#slider").slider({
        width: 233, // width
        height: 35, // height
        sliderBg: "rgb(232, 232, 232)", // 滑块背景颜色
        color: "rgb(114, 114, 114)", // 文字颜色
        fontSize: 14, // 文字大小
        bgColor: "#1ab394", // 背景颜色
        textMsg: "按住滑块，拖拽验证", // 提示文字
        successMsg: "验证成功", // 验证成功提示文字
        successColor: "#ffffff", // 滑块验证成功提示文字颜色
        time: 400, // 返回时间
        callback: function(result) { // 回调函数，true(成功),false(失败)
            check_result = result;
        }
    });


    $(function(){
        $('#doLogin').ajaxForm({
            beforeSubmit: checkForm, // 此方法主要是提交前执行的方法，根据需要设置
            success: complete, // 这是提交后的方法
            dataType: 'json'
        });

        function checkForm(){
            if( '' == $.trim($('#username').val())){
                lunhui.error('请输入登录用户名');
                return false;
            }

            if( '' == $.trim($('#password').val())){
                lunhui.error('请输入登录密码');
                return false;
            }

            if (1 == 0) {
                if( false == check_result){
                    lunhui.error('请拖动滑块到最右边');
                    return false;
                }
            }
            $('button').addClass('disabled').text('登录中...');
        }


        function complete(data){
            if(data.code==1){
                lunhui.success(data.msg,data.url);
            }else{
                lunhui.error(data.msg);
                $('button').removeClass('disabled').text('登　录');
                return false;
            }
        }
    });

</script>
</body>
</html>