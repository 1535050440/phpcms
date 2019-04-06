
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title>phpcms 登录</title>
<link href="statics/login/css/login.css" rel="stylesheet" type="text/css"/>
<!-- <script language="Javascript" src="http://www.jnk-china.com/statics/js/DD_belatedPNG_0.0.8a.js"></script> -->
<script language="JavaScript">
<!--
	if(top!=self)
	if(self!=top) top.location=self.location;
//-->
</script>
<script type="text/javascript">
	DD_belatedPNG.fix('div, ul, img, li, input , a');
</script>
</head>

<body onload="javascript:document.myform.username.focus();">
	<div class="header">
    	<div class="logo">
        	<img src="./statics/login/images/login1001.jpg" />
        </div>
        <div class="phone">
        	<img src="./statics/login/images/earth.gif" />
        	<img src="./statics/login/images/login1002.jpg" />
        </div>
        <div class="clear"></div>
    </div>

    <div class="content" id="login_bg">
    	<div class="content_1">
        	<div class="content_kk">
            	<h3>网站管理后台系统</h3>
                <ul>
				<form action="index.php?m=admin&c=index&a=login&dosubmit=1" method="post" name="myform">
                	<li><input type="text" value="用户名" name="username" onfocus="if(this.value=='用户名'){this.value=''};" onblur="if(this.value==''){this.value='用户名'};" size="30"/></li>
			
                    <li><input type="password" value="密码"  name="password" onfocus="if(this.value=='密码'){this.value=''};" onblur="if(this.value==''){this.value='密码'};" size="30"/></li>
                    <li id="yzm" class="yzm">
					&nbsp;
					<input type="text" size="7" value="验证码" style="margin-left:-12px;" name="code" onfocus="if(this.value=='验证码'){this.value=''};" onblur="if(this.value==''){this.value='验证码'};"/>
					<img id='code_img' onclick='this.src=this.src+"&"+Math.random()' src='/api.php?op=checkcode&code_len=4&font_size=20&width=130&height=50&font_color=&background='><a href="javascript:document.getElementById('code_img').src='/api.php?op=checkcode&m=admin&c=index&a=checkcode&time='+Math.random();void(0);">单击更换验证码</a></li>
					
                    <li><input type="submit" value="" style="background:url(./statics/login/images/button.png) no-repeat; border:none; width:112px; height:48px;" name="dosubmit"/></li>
</form>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer">
    	<div class="l"></div>
        <div class="r">

        </div>
    </div>


</body>
</html>