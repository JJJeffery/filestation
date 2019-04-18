<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<link rel="shortcut icon" href="/Public/images/file_station_ico.png">
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>文件中转站</title>
<script type="text/javascript">
    function changeVerify(){
        document.getElementById('verify').src="/jeffery/login/verify?"+Math.random();
    }
</script>
<style type="text/css">
    *{margin: 0;padding: 0;}
    a{
        text-decoration: none;
        color: white;
    }    
    #login{
        color: #fff;
        background: #222 url('/Public/images/bg-login.gif');
    }
    #login-wrapper {
        background: url('/Public/images/bg-login-top.png') top left repeat-x;
    }
    #login-wrapper #login-top {
        width: 100%;
        padding: 140px 0 50px 0;
        text-align: center;
    }
    #login-wrapper #login-content {
        text-align: left;
        width: 265px;
        margin: 0 auto;
        position: relative;
    }
    #login-wrapper #login-content p{
        height: 40px;       
    }
                
    #login-wrapper #login-content label {
        height: 40px;   
        line-height: 40px;
        color: #fff;
        font-weight: normal;
        font-size: 16px;
        font-family: Helvetica, Arial, sans-serif;
        float: left;
        width: 90px;
    }
    #login-wrapper #login-content .text-input{
        margin-top: 8px;
        height: 20px;
    }
    #verify{
        width: 90px;
        height: 30px;
        display: block;
        float: right;
    }
    .button {
        font-family: Verdana, Arial, sans-serif;
        display: inline-block;
        background: #459300 url('/Public/images/bg-button-green.gif') top left repeat-x !important;
        border: 1px solid #459300 !important;
        padding: 4px 7px 4px 7px !important;
        color: #fff !important;
        font-size: 11px !important;
        cursor: pointer;
        position: absolute;
        right: 0;
        margin-top: 10px;
    }               
    .button:hover {
        text-decoration: underline;
    }               
    .button:active {
        padding: 5px 7px 3px 7px !important;
    }
</style>
</head>
<body id="login">
<div id="login-wrapper">
    <div id="login-top">
        <h1>文件中转站后台登录</h1>
    </div>
    <div id="login-content">
        <form action="/jeffery/login/check" method="post">
            <p><label>Username</label><span><input class="text-input" type="text" name="username"/></span></p>
            <div class="clear"></div>
            <p><label>Password</label><input class="text-input" type="password" name="password"/></p>
            <div class="clear"></div>
            <p><label>Verifycode</label><input class="text-input" type="text" name="verify" size="4"/><img src="/jeffery/login/verify" onclick="changeVerify()" id="verify" style="cursor:pointer;"/></p>
            <p><input class="button" type="submit" value="Sign In" /></p>
        </form>
    </div>
</div>
</body>
</html>