<input type="hidden" name="playedGroup" value="<?=$this->groupId?>" />
<input type="hidden" name="playedId" value="<?=$this->played?>" />
<input type="hidden" name="type" value="<?=$this->type?>" />

<div class="pp pp11" action="tzKLSFSelect" length="1" >

	<input type="button" value="01" class="code d min" />
	<input type="button" value="02" class="code s min" />
	<input type="button" value="03" class="code d min" />
	<input type="button" value="04" class="code s min" />
	<input type="button" value="05" class="code d min" />
	<input type="button" value="06" class="code s min" />
	<input type="button" value="07" class="code d min" />
	<input type="button" value="08" class="code s min" />
	<input type="button" value="09" class="code d min" />
	<input type="button" value="10" class="code s min" />
	<input type="button" value="11" class="code d max" />
	<input type="button" value="12" class="code s max" />
	<input type="button" value="13" class="code d max" />
	<input type="button" value="14" class="code s max" />
	<input type="button" value="15" class="code d max" />
	<input type="button" value="16" class="code s max" />
	<input type="button" value="17" class="code d max" />
	<input type="button" value="18" class="code s max" />
	<div class="clearfix"></div>
	<input type="button" value="清" class="action action_2 none" />
    <input type="button" value="双" class="action action_2 even" />
    <input type="button" value="单" class="action action_2 odd" />
    <input type="button" value="小" class="action action_2 small" />
    <input type="button" value="大" class="action action_2 large" />
    <input type="button" value="全" class="action action_2 all" />
</div>

<?php
	$maxPl=$this->getPl($this->type, $this->played);
?>
<script type="text/javascript">
$(function(){
	gameSetPl(<?=json_encode($maxPl)?>);
})
</script>
