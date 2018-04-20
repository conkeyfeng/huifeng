<?php
	$this->getTypes();
	$this->getPlayeds();

	
	// 帐号限制
	if($_REQUEST['username']){
		$_REQUEST['username']=wjStrFilter($_REQUEST['username']);
		if(!ctype_alnum($_REQUEST['username'])) throw new Exception('用户名包含非法字符,请重新输入');
		$userWhere="and b.username like '%{$_REQUEST['username']}%'";
	}
	
	//期号
	if($_REQUEST['actionNo']){
		$_REQUEST['actionNo']=wjStrFilter($_REQUEST['actionNo']);
		$actionNoWhere=" and b.actionNo='{$_REQUEST['actionNo']}'";
	}
	
	//模式
	if($_REQUEST['mode']){
		$_REQUEST['mode']=wjStrFilter($_REQUEST['mode']);
		if(strlen($_REQUEST['mode']) > 5)throw new Exception("模式不正确！");
		$actionNoWhere=" and b.mode='{$_REQUEST['mode']}'";
	}

	// 彩种限制
	if($_REQUEST['type']=intval($_REQUEST['type'])){
		$typeWhere=" and b.type={$_REQUEST['type']}";
	}
	// 玩法限制
	if($_REQUEST['playedId']=intval($_REQUEST['playedId'])){
		$typeWhere=" and b.playedId={$_REQUEST['playedId']}";
	}
	// 下注来源限制
	//if($_REQUEST['betType']!=''){
		//$_REQUEST['betType']=wjStrFilter($_REQUEST['betType']);
		//$betTypeWhere=" and b.betType={$_REQUEST['betType']}";
	//}

	// 时间限制
	if($_REQUEST['fromTime'] && $_REQUEST['toTime']){
		$fromTime=strtotime($_REQUEST['fromTime']);
		$toTime=strtotime($_REQUEST['toTime'])+24*3600;
		$timeWhere="and b.actionTime between $fromTime and $toTime";
	}elseif($_REQUEST['fromTime']){
		$fromTime=strtotime($_REQUEST['fromTime']);
		$timeWhere="and b.actionTime>=$fromTime";
	}elseif($_REQUEST['toTime']){
		$toTime=strtotime($_REQUEST['toTime'])+24*3600;
		$timeWhere="and b.actionTime<$fromTime";
	}else{
		$timeWhere=' and b.actionTime>'.strtotime('00:00');;
	}
	$sql="select id,uid,username,wjorderId,actionNo,actionTime,fpEnable,playedId,type,left(actionData,20) as shows,beiShu,mode,actionNum,lotteryNo,bonus,isDelete,kjTime,fanDianAmount,zjCount from {$this->prename}bets b where 1 $timeWhere $actionNoWhere $typeWhere $betTypeWhere $userWhere order by b.id desc";
	if($_REQUEST['id']){
	$_REQUEST['id']=wjStrFilter($_REQUEST['id']);
	if(!ctype_alnum($_REQUEST['id'])) throw new Exception('单号包含非法字符,请重新输入');
	$sql="select * from {$this->prename}bets b where b.wjorderId='{$_REQUEST['id']}'";}

	$data=$this->getPage($sql, $this->page, $this->pageSize);
	
	$mname=array(
		'2.000'=>'元',
		'1.000'=>'元',
		'0.200'=>'角',
		'0.100'=>'角',
		'0.020'=>'分',
		'0.010'=>'分',
		'0.002'=>'厘',
		'0.001'=>'厘'
	);
?>
<article class="module width_full">
<input type="hidden" value="<?=$this->user['username']?>" />
	<header>
		<h3 class="tabs_involved">普通投注
			<div class="submit_link wz">
			<form action="/admin778899.php/business/betLog" target="ajax" call="defaultSearch" dataType="html">
				期号<input type="text" class="alt_btn" name="actionNo" style="width:90px;" value="<?=$_REQUEST['actionNo']?>"/>
				单号<input type="text" class="alt_btn" name="id" style="width:90px;"/>&nbsp;&nbsp;
				会员<input type="text" class="alt_btn" name="username" style="width:90px;"  value="<?=$_REQUEST['username']?>"/>&nbsp;&nbsp;
				时间从 <input type="date" class="alt_btn" name="fromTime"  value="<?=$_REQUEST['fromTime']?>"/> 到 <input type="date" name="toTime" class="alt_btn"  value="<?=$_REQUEST['toTime']?>"/>&nbsp;&nbsp;
				<select style="width:100px;" name="type">
					<option value="">全部彩种</option>
				<?php if($this->types) foreach($this->types as $var){
					if($var['enable'] && !$var['isDelete']){
				?>
					<option value="<?=$var['id']?>" title="<?=$var['title']?>" <?=$this->iff($_REQUEST['type']==$var['id'], 'selected')?>><?=$this->ifs($var['shortName'], $var['title'])?></option>
				<?php }} ?>
				</select>&nbsp;&nbsp;
				<input type="submit" value="查找" class="alt_btn">
				<input type="reset" value="重置条件">
			</form>
			</div>
		</h3>
	</header>
	<table class="tablesorter" cellspacing="0">
		<thead>
			<tr>
				<th>单号</th>
				<th>用户名</th>
				<th>投注时间</th>
				<th>彩种</th>
				<th>玩法</th>
				<th>期号</th>
				<th>倍数</th>
				<th>注数</th>
				<th>模式</th>
				<th>投注号码</th>
				<th>投注金额</th>
				<th>中奖金额</th>
				<th>返点</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody id="nav01">
		<?php if($data['data']) foreach($data['data'] as $var){ ?>
			<tr data-code='<?=json_encode($var)?>'>
				<td><a href="/admin778899.php/business/betInfo/<?=$var['id']?>" button="修改:beforeEditSave|取消:defaultCloseModal" title="投注信息" width="510" target="modal"><?=$var['wjorderId']?></a></td>
				<td><a href="business/betLog?username=<?=$var['username']?>"><?=$var['username']?></a></td>
				<td><?=date('m-d H:i', $var['actionTime'])?></td>
				<td><a href="business/betLog?type=<?=$var['type']?>"><?=$this->ifs($this->types[$var['type']]['shortName'],$this->types[$var['type']]['title'])?></a></td>
				<td><a href="business/betLog?playedId=<?=$var['playedId']?>"><?=$this->playeds[$var['playedId']]['name']?></a></td>
				<td><a href="business/betLog?actionNo=<?=$var['actionNo']?>"><?=$var['actionNo']?></a></td>
				<td><?=$var['beiShu']?></td>
				<td><?=$var['actionNum']?></td>
				<td><a href="business/betLog?mode=<?=$var['mode']?>"><?=$mname[$var['mode']]?></a></td>
				<td><?=$var['shows']?></td>
				<td><?=number_format($var['mode'] * $var['beiShu'] * $var['actionNum'], 3)?></td>
				<td>
				<?php 
				if($var['isDelete']==1){
					echo '已撤单';
				}else{
					if($var['lotteryNo']){
// 						echo number_format($var['zjCount'] * $var['bonusProp'] * $var['beiShu'] * $var['mode']/2, 2);
						if($var['zjCount']>0){
							echo $var['bonus'];
						}else{
							echo '未中奖';
						}
					}else{
						echo '未开奖';
					}
				}
				?>
                </td>
				<td><?=$var['fanDianAmount']?></td>
				<td><?php if($var['lotteryNo'] || $var['isDelete']==1){ ?>--<?php }else{ ?><a href="Business/deleteCode/<?=$var['id'] ?>" target="ajax" dataType="json"  call="sysReload">撤单</a></td><?php } ?>
			</tr>
		<?php }else{ ?>
    <tr>
        <td colspan="14" align="center">暂时没有投注记录。</td>
    </tr>
<?php } ?>
		</tbody>
	</table>
	<footer>
	<?php
		$rel=get_class($this).'/betLog-{page}?'.http_build_query($_GET,'','&');
		$this->display('inc/page.php', 0, $data['total'], $rel, 'betLogSearchPageAction'); 
	?>
	</footer>
</article>
<script type="text/javascript">  
ghhs("nav01","tr");  
</script>