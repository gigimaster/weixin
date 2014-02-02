<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>蓝月亮科学洗衣</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes" />
<meta name="viewport" content="initial-scale=1, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<meta charset="utf-8">
<style>

body, h1, h2, h3, h4, h5, h6, hr, p, blockquote, /* structural elements 结构元素 */
dl, dt, dd, ul, ol, li, /* list elements 列表元素 */
pre,code, /* text formatting elements 文本格式元素 */
form, fieldset, legend, button, input, textarea, /* form elements 表单元素 */
th, td /* table elements 表格元素 */ {
    margin: 0;
    padding: 0;
}
table {
	border-collapse:collapse;
	border-spacing:0;
}
html {
	width:100%;
	height:100%;
	border:none;
}
body,
button, input, select, textarea, td, th{
	font-family: STHeiti,"Microsoft Yahei","微软雅黑",Arial,sans-serif;
}
button, input[type="button"],input[type="submit"], input[type="reset"], input[type="file"]{
	cursor:pointer;
}
@media screen and (-webkit-min-device-pixel-ratio:0){ button, input[type="button"],input[type="submit"], input[type="reset"], input[type="file"]{
padding:1px 6px;} }
textarea,input{
	outline: none;
}

fieldset,img, iframe {
	border:none;  
}

p, div, td {
    word-break: break-all;
}

/** 重置列表元素 **/
ul, ol { list-style: none; }

/** 链接相关 */

a{
	color:#0449be;
}

/* 重置 HTML5 元素 */
article, aside, details, figcaption, figure, footer,header, hgroup, menu, nav, section,
summary, time, mark, audio, video {
    display: block;
    margin: 0;
    padding: 0;
}

body{
	background:url(http://tb1.bdstatic.com/tb/cms/test/ydw/image/activity1/blue-bar.png) repeat-x;
}
.middle-cont{
	width:360px;
	margin:0 auto;
	background:url(http://tb1.bdstatic.com/tb/cms/test/ydw/image/activity1/blue-background.png) no-repeat;
}
.core-cont{
	color: #FAF600;
	line-height: 40px;
	padding: 10px 30px 20px 40px;
	font-size: 24px;
	position: relative;
}
.page-top{
	height: 232px;
}
#wScratchPad3 p{
	color: #000000;
	font-size: 16px;
	font-weight: bold;
	left: 130px;
	background-color:#FAF600;
	position: absolute;
	top: 11px;
	padding: 0 17px;
}
#wScratchPad3{
	float: right;
	margin: 1px 70px 0 0;
}
.zj_desc, .hasChoujiaing, #hasZhongjiaing{
	color: #FFFFFF;
    padding-left: 40px;	
	margin-bottom: 10px;
}
#hasZhongjiaing. hasChoujiaing{

}
</style>
<link href="http://tb1.bdstatic.com/tb/cms/test/ydw/style/alert.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://tb1.bdstatic.com/tb/cms/test/ydw/js/jquery.js"></script>
<script type="text/javascript" src="http://tb1.bdstatic.com/tb/cms/test/ydw/js/wScratchPad.js"></script>
<script type="text/javascript" src="http://tb1.bdstatic.com/tb/cms/test/ydw/js/alert.js"></script>
<script>
var hasZhongJiang = 1;
var hasLingJiang = 1;
var activityStart = 1;
var actovotuEnd = 1;
</script>
</head>
<body>
<div>
<div class="middle-cont">
	<div class='page-top'></div>
    <div style="height: 312px">
	<div class="core-cont">
        <div>刮奖区
        	<div id="wScratchPad3">
            	<p style="">洗衣液旅行装</p>
            </div>
        </div>
    </div>
    <div class="hasZhongjiaing" style="display:none;" id="hasZhongjiaing">
    	<div style="color:red;">恭喜您获得新品体验机会</div>
       	<div>请输入体验编码</div>
        <div style="margin-top: 10px;"><input id="code_input" type="text" name="code" width="100"/><input id="submit" type="button" value="提交"/></div>
    </div>
    <div class="hasChoujiaing" style="display:none;" id="hasChoujiaing">
    	<div style="color:red;">蓝月亮新品体验开始了！</div>
       	<div>快去蓝月亮工作人员处领取蓝月亮洗衣液旅行装1瓶吧!</div>
    </div>
    <div class="zj_desc">
    	奖项说明：<br />
        1.打开不刮奖视为作废<br />
        2.每个微信号拥有一次刮奖机会<br />
        3.奖品：蓝月亮洗衣液旅行装1瓶<br />
    </div>
    </div>
</div>
</div>

<script type="text/javascript">
	function zjResult(no){
		if(no == 1){
			alertDialog('恭喜您中奖啦，请在页面中的输入框内输入编码信息~', function(){
				$("#hasZhongjiaing").show();
			});
		}else{
			alertDialog('很遗憾，您没有中奖');
		}
	}
	var hasZjResult = 0;
	$("#wScratchPad3").wScratchPad({
		width           : 130,                  // set width - best to match image width
		height          : 42,                  // set height - best to match image height
		color           : '#808080',            // set scratch color - if image2 is not set uses color
		overlay         : 'none',               // set the type of overlay effect 'none', 'lighter' - only used with color
		size            : 10,                   // set size of scratcher
		realtimePercent : false,                // Update scratch percent only on the mouseup/touchend (for better performances on mobile device)
		scratchDown     : function(){           // scratchDown callback
		
		},
		scratchUp       : function(e, percent){           // scratchUp callback
			if(percent > 60 && hasZjResult == 0){
				hasZjResult = 1;
				zjResult(1);
			}
			if(percent > 90){				
				this.clear();
			}
		},
		scratchMove     : function(e, percent)  // scratcMove callback
		{

		},
		cursor          : null                  // Set path to custom cursor
	});
</script>
<script>
	$(function(){
		$("#submit").click(function(){
			var code = $("#code_input").val().trim();
			if(code == ''){
				alertDialog("抱歉，您输入的体验编码有误！请再次输入");
				return;
			}else{
				//$.post('#', {"code":code}, function(data){
					var data = {no:1};
					if(data.no == 0){
						window.location.reload();
					}else{
						alertDialog('提交失败，请您重试！');
					}
				//});
			}
		});
	});
</script>
</body>
</html>