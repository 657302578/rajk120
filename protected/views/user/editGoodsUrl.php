<link href="<?php echo VERSION2;?>taskcss/main.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo VERSION2;?>taskcss/button.css">
<link rel="stylesheet" type="text/css" href="<?php echo VERSION2;?>taskcss/mm.css">
<?php
    echo $this->renderPartial('/user/taobaoTaskNav');//载入淘宝大厅导航
?>
<div id="content">
  <div class="h15"></div>
  <a id="mao1"></a>
  <div id="body_main" style="background-color:#fff;margin:30px auto;">
    <div class="cle"></div>
    <div class="reListTitle">
	<form action="" method="post">
      <table width="1000" border="0" cellspacing="0" cellpadding="4" id="tpl">
          <tr>
            <td width="94">商品名称：</td>
			<td width="890" align="left" ><input  required="required"  style="float:left;"  type="text" name="goods_name" value="<?php if(($linkInof)) echo $linkInof->goods_name;?>"  class="pc11 inputp"  /></td>
          </tr>
          <tr>
            <td>所属店铺：</td>
			<td align="left">
				<select  required="required"   name="shop_id" class="ui-select zhsr">
                        <option value="">请选择店铺</option>
                        <?php if(isset($shopList)){
							foreach($shopList as $k=>$v){
						?>
							<option <?php if($linkInof  && $linkInof->shop_id == $v->id){?> selected="selected" <?php }?> value="<?php echo $v->id?>"><?php echo $v->wangwang;?></option>
						<?php
							}}
						?>
              </select>
			</td>
          </tr>
          <tr>
            <td>商品链接：</td>
			<td align="left"><input  required="required"  style="float:left;"  value="<?php if(($linkInof)) echo $linkInof->goods_url;?>" type="text" name="goods_url"  class="pc11 inputp"  /></td>
          </tr>
          <tr>
            <td colspan="2" align="center">
				<input type="hidden" name="id" value="<?php if(($linkInof)){echo $linkInof->id;}else{echo 0;}?>" />
				<button type="submit" id="btnCilentAdd" class="button abtn7" style="cursor: pointer;">保存</button>
			</td>
          </tr>
		  
      </table>
	  </form>
    </div>
  </div>
</div>
<!--layer插件-->
<script src="<?php echo ASSET_URL;?>layer/jquery.min.js"></script>
<script src="<?php echo ASSET_URL;?>layer/layer.js"></script>
<script src="<?php echo ASSET_URL;?>layer/laycode.min.js"></script>
<link href="<?php echo ASSET_URL;?>layer/layer.css" rel="stylesheet" type="text/css" />
<script>
$(function(){
	<?php if(!$shopList){?>
	//询问框
    	layer.confirm('请先绑定淘宝掌柜名或淘宝掌柜名未通过审核', {
    		btn: ['现在去绑定','返回任务大厅'] //按钮
    	}, function(){
    		window.location.href="<?php echo $this->createUrl('user/taobaoBindSeller');?>";
    	}, function(){
    		window.location.href="<?php echo $this->createUrl('site/taobaoTask');?>";
    	});      
	<?php }?>
	<?php if(isset($_GET['addResult']) && $_GET['addResult'] == 200){?>
		layer.confirm('保存成功', {
    		btn: ['继续添加','返回商品链接列表'] //按钮
    	}, function(){
    		window.location.href="<?php echo $this->createUrl('user/editGoodsUrl');?>";
    	}, function(){
    		window.location.href="<?php echo $this->createUrl('user/goodsUrlManage');?>";
    	});      
	<?php }?>
});
</script>
