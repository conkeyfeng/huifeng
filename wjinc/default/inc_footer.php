</div>
<div class="user_link">
    <a class="link1" href="#"></a>
    <a class="link2" href="#"></a>
    <a class="link3" href="#"></a>
    <a class="link4" href="#"></a>
    <a class="link5" href="#"></a>
    <a class="link6" href="#"></a>
    <a class="link7" href="#"></a>
    <a class="link8" href="#"></a>
    
</div>

	
</div><center> 
<div class="footer">
     <p>Copyright 汇丰 Reserved      官方邮箱：hfcsd@gmail.com      版权©所有 侵权必究 <a href="javascript:void(0)"><?=$this->settings['webName']?></a><center> 
      
</div>	
	
	
	
	
	
	
	
</div>
<div id="wanjinDialog"></div>
<script type='text/javascript'>
function click(e) {
if (document.all) {
if (event.button==2||event.button==3) { alert("");
oncontextmenu='return false';
}
}
if (document.layers) {
if (e.which == 3) {
oncontextmenu='return false';
}
}
}
if (document.layers) {
document.captureEvents(Event.MOUSEDOWN);
}
document.onmousedown=click;
document.oncontextmenu = new Function("return false;")
document.onkeydown =document.onkeyup = document.onkeypress=function(){ 
if(window.event.keyCode == 123) { 
window.event.returnValue=false;
return(false); 
} 
}
</script>