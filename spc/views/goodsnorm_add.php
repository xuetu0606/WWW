<?php
$_LANG['js']['color']    	= '颜色';
$_LANG['js']['pic']    		= '图片';
$_LANG['js']['uploadpic']   = '上传';
$_LANG['js']['norm_name']	= '名称';
$js = $_LANG['js'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加商品分类</title>
<link href="templates/style/admin.css" rel="stylesheet" type="text/css" />
<script src="templates/js/jquery.min.js" type="text/javascript"></script>
<script src="templates/js/artDialog.js?skin=default"></script>
<script src="templates/js/iframeTools.source.js"></script>
<script src="templates/js/checkf.func.js"></script>
<script src="templates/js/artDialog_js.php"></script>
<script src="templates/js/mgr.func.js"></script>
<script type="text/javascript" src="plugin/colorpicker/colorpicker.js"></script>
<script>
/* 显示上传窗口 */
function showupload(inputname)
{
	DialogIframe('uploadfile.php?inputname='+inputname,'上传',400,130,'','上传','','dosubmit');
}
</script>
<?php 
 foreach($js as $k=>$v) 
 {
 echo "<script> var {$k}	= '{$v}'; </script>";
 }
		
?>
</head>
<body>
<div class="formHeader"> <span class="title">添加商品分类</span> <a href="javascript:location.reload();" class="reload">刷新</a> </div>
<form name="form" id="form" method="post" action="test.php" onsubmit="return cfm_btype();" enctype="multipart/form-data">
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="formTable">
		<tr>
			<td width="25%" height="40" align="right">规则名称：</td>
			<td width="75%"><select name="parentid" id="parentid">
					<option value="0">一级商品分类</option>
					<?php GetAllType('#@__goodstype','#@__goodstype','id'); ?>
				</select>
				<span class="maroon">*</span><span class="cnote">带<span class="maroon">*</span>号表示为必填项</span></td>
		</tr>
		<tr>
			<td height="40" align="right">规则别名：</td>
			<td><input type="text" name="classname" id="classname" class="input" />
				<span class="maroon">*</span></td>
		</tr>
		<tr>
			<td height="40" align="right">分类名称：</td>
			<td><input type="text" name="picurl" id="picurl" class="input" />
				<span class="cnote"></span></td>
		</tr>
		<tr>
              <td height="40" align="right">显示类型：</td>
              <td>
                  <input name="rdotype" type="radio" value="text" checked="checked" onclick="shownorm('text')">&nbsp;文字&nbsp;
                  <input name="rdotype" type="radio" value="color" onclick="shownorm('color')">&nbsp;颜色&nbsp;
                  <input name="rdotype" type="radio" value="image" onclick="shownorm('image')">&nbsp;图片
              </td>
          </tr>
		         <tr>
              <td align="right">
           		  规格：<span class="cnote"><a href="javascript:AddDmTr('tboption', '');">[+]</a></span>：
              </td>
              <td>
               	  <table border="0" cellspacing="0" cellpadding="0" align="left" id="tboption" >
                      <tr>
                          <td> 
                              <span class="delvote">[<a href="javascript:;" onclick="DelDmTr($(this),'')">-</a>]</span>
                              <span class="delvote"><span class="red" data='1'>*</span>名称：<input type="hidden" name="norm[0][id]"/><input type="text" name="norm[0][name]"  class="v5-input in180"/>&nbsp;</span>
                              <span class="dn" name="color[]">颜色：<input type="text" name="norm[0][color]" id="color_1"  class="v5-input in180" onclick="colorpicker('colorpanel_1', 'color_1', 'color_1');" />
							  <span id="colorpanel_1"></span> &nbsp;</span>
                             <span class="dn" name="image[]">图片：<input type="file" name="norm[0][pic]" id="pic_1"  class="v5-input in180" /></span>
                          </td>
                      </tr>
                  </table>
              </td>
          </tr>
		  <tr>
              <td align="right">排序：</td>
              <td>
                  <input type="text" id="orderid" name="orderid" class="v5-input in60" value="7" onkeyup="value=value.replace(/[^\d]/g,'')">
                  </td>
          </tr>
	</table>
	<div class="formSubBtn">
	<input type="submit" class="submit" id="dosubmit" value="提交" />
		<input type="button" class="back" value="返回" onclick="history.go(-1);" />
		<input type="hidden" name="action" id="action" value="add" />
		<input name="act" id="act" type="hidden" value="subadd" />
	</div>
</form>
</body>
</html>