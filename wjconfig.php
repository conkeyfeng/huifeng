<?php
require_once('wjsqlin.php');
$conf['debug']['level']=5;

$conf['db']['dsn']='mysql:host=localhost;dbname=aw';
$conf['db']['user']='root';
$conf['db']['password']='root';
$conf['db']['charset']='utf8';
$conf['db']['prename']='ssc_';

$conf['cache']['expire']=0;
$conf['cache']['dir']='_cachede#43ER2/';

$conf['url_modal']=2; 

$conf['action']['template']='wjinc/default/';
$conf['action']['modals']='wjaction/default/';

$conf['member']['sessionTime']=15*60;



error_reporting(E_ERROR & ~E_NOTICE);
//error_reporting(0);
ini_set('date.timezone', 'asia/shanghai');
//ini_set('session.cookie_domain', '.zye.cc');
ini_set('display_errors', 'Off');

//$GLOBALS['SUPER-ADMIN-UID']=1;
//global $fromTime, $toTime;
if(strtotime(date('Y-m-d H:i:s',time()))>strtotime(date('Y-m-d',time()).' 03:00:00')){
	
	$GLOBALS['fromTime']=strtotime(date('Y-m-d').' 03:00:00');
	$GLOBALS['toTime']=strtotime(date('Y-m-d',strtotime("+1 day")).' 03:00:00');
}else{
	$GLOBALS['fromTime']=strtotime(date('Y-m-d',strtotime("-1 day")).' 03:00:00');
	$GLOBALS['toTime']=strtotime(date('Y-m-d',time()).' 03:00:00');
}
