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
    overflow-x:hidden;
	background:url(/img/blue-bar.png?v=1.1) repeat-x;
}
.middle-cont{
	width:330px;
	margin:0 auto;
	background:url(/img/blue-background.png?v=1.1) no-repeat;
}
.core-cont{
	color: #FAF600;
	line-height: 40px;
	padding: 10px 30px 20px 40px;
	font-size: 24px;
	position: relative;
}
.page-top{
	height: 234px;
}
#wScratchPad3 p{
	color: #000000;
	font-size: 16px;
	font-weight: bold;
	left: 131px;
	background-color:#FAF600;
	position: absolute;
	top: 11px;
	padding: 0 11px;
}
#wScratchPad3{
	float: right;
	margin: 1px 40px 0 0;
}
.zj_desc, .hasChoujiaing, #hasZhongjiaing{
	color: #FFFFFF;
    padding-left: 40px;	
	margin-bottom: 10px;
}
#hasZhongjiaing. hasChoujiaing{

}
</style>
<link href="/css/alert.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/wScratchPad.js"></script>
<script type="text/javascript" src="/js/alert.js"></script>
</head>
<body>
<div>
<div class="middle-cont">
	<div class='page-top'></div>
    <div style="height: 312px; width:320px;">
<?php
   	if($pass){
?>
	<div class="core-cont">
        <div>刮奖区
        	<div id="wScratchPad3">
            	<p style="">洗衣液旅行装</p>
            </div>
        </div>
    </div>
    <div class="hasZhongjiaing" style="display:none;" id="hasZhongjiaing">
    	<div style="color:#FAF600">恭喜您获得新品体验机会</div>
       	<div>请输入体验码</div>
        <div style="margin-top: 10px;"><input id="code_input" type="text" name="code" width="100"/><input id="submit" type="button" value="提交"/></div>
    </div>
<?php }else{?>
	<div class="hasChoujiaing">
    	<div style="color:#FAF600">您已经领过奖品啦！</div>
       	<div>期待下一次活动再来~</div>
    </div>
<?php }?>

    <div class="hasChoujiaing" style="display:none;" id="hasChoujiaing">
    	<div style="color:#FAF600;">蓝月亮新品体验开始了！</div>
       	<div>快去蓝月亮工作人员处领取蓝月亮洗衣液旅行装1瓶吧!</div>
    </div>
    <div class="zj_desc" id='zj_desc'>
    	奖项说明：<br />
        1、每个微信号拥有一次刮奖机会<br />
        2、请到指定超市参与本次活动<br />
        3、奖品：蓝月亮洗衣液旅行装1瓶<br />
        <span style='font-size:12px;'>蓝月亮（中国）有限公司保留此活动的最终解释权</span>
    </div>
    </div>
</div>
</div>

<script type="text/javascript">
	function zjResult(no){
		if(no == 1){
			alertDialog('恭喜您中奖啦，请在页面中的输入框内输入体验码~', function(){
				$("#hasZhongjiaing").show();
			});
		}else{
			alertDialog('很遗憾，您没有中奖');
		}
	}
	var hasZjResult = 0;
    var num = 0, wrap = $("#wScratchPad3");
	$("#wScratchPad3").wScratchPad({
		width           : 120,                  // set width - best to match image width
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
        scratchDown     : function(){
            if(num == 0){
                wrap.find('canvas').css('margin-left', '1px');
                num = 1;
            }else{
                wrap.find('canvas').css('margin-left', '0px');
                num = 0;
            }
        },
		cursor          : null                  // Set path to custom cursor
	});
</script>
<script>
var openid = '<?php echo $openid ?>';
	$(function(){
		$("#submit").click(function(){
			var code = $("#code_input").val().trim();
			if(code == ''){
				alertDialog("抱歉，您输入的体验码有误！请再次输入");
				return;
			}else{
				$.get('/apitest/act_code_check', {"openid":openid, "code": code}, function(data){
					data =  eval('(' + data + ')');
					if(data.no == 0){
						alertDialog('快去蓝月亮工作人员处领取蓝月亮洗衣液旅行装1瓶吧!');
						$('#hasZhongjiaing').hide();
						$('#hasChoujiaing').show();
					}else{
						alertDialog('抱歉，您输入的体验码有误，请再次输入！');
					}
				});
			}
		});
	});
</script>
<script>
function detectWeixinApi(callback) {
    window.WeixinJSBridge === void 0 || window.WeixinJSBridge.invoke === void 0 ? setTimeout(function() {
        detectWeixinApi(callback)
    },
    200) : callback()
}
detectWeixinApi(function(){
 	// 分享到朋友圈;
    WeixinJSBridge.on('menu:share:timeline', function(argv){
		WeixinJSBridge.invoke('shareTimeline',{
		"img_url"    : 'http://115.28.57.26/img/share_img.jpg',
		"img_width"  : "640",
		"img_height" : "640",
		"link"       : location.href,
		"desc"       : '',
		"title"      : '蓝月亮洗衣液(旅行装)免费大派送-蓝月亮科学洗衣'
		}, function(res) {});
	});
});

</script>
</body>
</html>
