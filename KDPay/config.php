<?
header( "content-type:text/html; charset=gbk" );
//口袋支付 Kdpay.Com
date_default_timezone_set('PRC');

//接口密钥，需要更换成你自己的密钥，要跟后台设置的一致
//登录API平台，商户管理-->接入方式-->API接入，这里查看自己的密钥和ID
$UserId="1001929";//平台商户ID，需要更换成自己的商户ID

$SalfStr="cea5b374bf75448e8e1bf7e7bb623d68";//商户密钥


//网关地址
$gateWary="http://Api.Duqee.Com/pay/Bank.aspx";


//充值结果后台通知地址
$result_url="http://".$_SERVER["HTTP_HOST"]."/php/result_url.php";


//充值结果用户在网站上的转向地址
$notify_url="http://".$_SERVER["HTTP_HOST"]."/php/notify_Url.php";
?>