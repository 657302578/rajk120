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
    <?php
        $this->renderPartial('/user/taskPublishNav');//加载发布任务公共导航
    ?>
    <div class="cle"></div>
	
    <div class="reListTitle">
      <table width="100%" border="0" cellspacing="0" cellpadding="4" id="tpl">
          <tr>
		  
		  </tr>
	  </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="4" id="tpl">
        <thead>
          <tr>
            <th class="id">链接ID</th>
            <th class="poster">商品名称</th>
            <th class="price">所属店铺</th>
            <th class="oktime">商品链接</th>
            <th class="poster">是否审核</th>
            <th class="do">操作</th>
          </tr>
		  <?php if(isset($linkList)){
		  	foreach($linkList as $v){
		  ?>
		  <tr>
		  		<td><?php echo $v->id;?></td>
		  		<td><?php echo $v->goods_name;?></td>
		  		<td><?php 
					$shopInfo = Blindwangwang::model()->findByPk($v->shop_id);
					echo $shopInfo->wangwang;
				?></td>
		  		<td><?php echo $v->goods_url;?></td>
		  		<td>
					<?php
						if($v->is_check == 0)
						{
							echo '未审核';
						}elseif($v->is_check == 1){
							echo '已审核';
						}else{
							echo '审核未通过';
						}
					?>
				</td>
		  		<td>
					<?php
						if($v->is_check != 1)
						{
						?>
						<a href="<?php echo $this->createUrl('user/editGoodsUrl',array('id' => $v->id));?>" title="修改" >修改</a>
						<a href="<?php echo $this->createUrl('user/delGoodsUrl',array('id' => $v->id));?>" title="删除此商品链接" onclick="return confirm('确定要删除吗？此操作不可恢复！');">删除</a>
						<?php
						}else{
							echo '无';
						}
					?>
				</td>
		  </tr>
		  <?php
		  	}}
		  ?>
		  <tr>
		  <td colspan="6">
		   <!--分页开始-->
		<?php
                $this->widget('CLinkPager', array(
                    'selectedPageCssClass'=>'active',
                    'pages' => $pages,
                    'lastPageLabel' => '最后一页',
                    'firstPageLabel' => '第一页',
                    'header' => false,
                    'nextPageLabel' => ">>",
                    'prevPageLabel' => "<<",
                ));
            ?>
		  </td>
		  </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </div>
</div>