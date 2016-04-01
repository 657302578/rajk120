<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>数据分析中心</title>
<!-- Import google fonts - Heading first/ text second -->
<link rel='stylesheet' type='text/css' href='http://fonts.useso.com/css?family=Open+Sans:400,700|Droid+Sans:400,700' />
<!--[if lt IE 9]>
<link href="http://fonts.useso.com/css?family=Open+Sans:400" rel="stylesheet" type="text/css" />
<link href="http://fonts.useso.com/css?family=Open+Sans:700" rel="stylesheet" type="text/css" />
<link href="http://fonts.useso.com/css?family=Droid+Sans:400" rel="stylesheet" type="text/css" />
<link href="http://fonts.useso.com/css?family=Droid+Sans:700" rel="stylesheet" type="text/css" />
<![endif]-->
<!-- Fav and touch icons -->
<link rel="shortcut icon" href="<?php echo ASSET_URL;?>ico/favicon.ico" type="image/x-icon" />
<!-- Css files -->
<link href="<?php echo ASSET_URL;?>css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo ASSET_URL;?>css/jquery.mmenu.css" rel="stylesheet">
<link href="<?php echo ASSET_URL;?>css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo ASSET_URL;?>css/climacons-font.css" rel="stylesheet">
<link href="<?php echo ASSET_URL;?>plugins/xcharts/css/xcharts.min.css" rel=" stylesheet">
<link href="<?php echo ASSET_URL;?>plugins/fullcalendar/css/fullcalendar.css" rel="stylesheet">
<link href="<?php echo ASSET_URL;?>plugins/morris/css/morris.css" rel="stylesheet">
<link href="<?php echo ASSET_URL;?>plugins/jquery-ui/css/jquery-ui-1.10.4.min.css" rel="stylesheet">
<link href="<?php echo ASSET_URL;?>plugins/jvectormap/css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
<link href="<?php echo ASSET_URL;?>css/style.min.css" rel="stylesheet">
<link href="<?php echo ASSET_URL;?>css/add-ons.min.css" rel="stylesheet">
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	    <![endif]-->
<script>
		function checkUser(buyerId, state)
		{
			$.ajax({
				type:"POST",
				url:"<?php echo $this->createUrl('membercenter/changeBuyerState');?>",
				data:"buyerId="+buyerId+"&state="+state,
				success:function(msg){
					if(msg == "BUYER_NO"){
						layer.confirm('该买手不存在！', {
                                	btn: ['知道了'] //按钮
                                });
					}else if(msg == "SUCCESS"){
						layer.confirm('审核成功！', {
                                	btn: ['知道了'] //按钮
                                },function(){
								location.reload();	
							});
					}else{
						layer.confirm('审核失败！', {
                                	btn: ['知道了'] //按钮
                                });
					}
				}
			});
		}
	</script>
</head>
</head>
<body>
<!-- start: Header -->
<?php $this->renderPartial("/baseLayout/header");?>
<!-- end: Header -->
<div class="container-fluid content">
<div class="row">
<!-- start: Main Menu -->
<?php $this->renderPartial("/baseLayout/mainmenu");?>
<!-- end: Main Menu -->
<!-- start: Content -->
<div class="main">
  <div class="row">
    <div class="col-lg-12">
      <h3 class="page-header"><i class="fa fa-laptop"></i> 收货地址</h3>
      <ol class="breadcrumb">
        <li><i class="fa fa-home"></i><a href="<?php  echo $this->createUrl('default/index');?>">首页</a></li>
        <li><i class="fa fa-laptop"></i>平台收货地址管理</li>
      </ol>
    </div>
  </div>
  <br />
  <div class="panel panel-default">
    <!--theBody start-->
    <div class="panel-heading"> <i class="fa fa-indent red"></i> <span>收货地址列表</span>
      <div class="panel-actions">
        <a href="<?php echo $this->createUrl("membercenter/addBuyerAddress")?>" title="添加收货地址功能">添加收货地址</a>
      </div>
    </div>
    <div class="panel-body">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th><div align="center">收货人姓名</div></th>
            <th><div align="center">收货电话</div></th>
            <th><div align="center">收货人详细地址</div></th>
            <th><div align="center">占用者</div></th>
            <th><div align="center">添加时间</div></th>
            <th><div align="center">操作</div></th>
          </tr>
        </thead>
        <tbody>
          <?php
			foreach($proInfo as $item){
		?>
          <tr align="center" style="color:#666;">
            <td><?php echo $item->id;?></td>
            <td><?php echo $item->user_name;?></td>
            <td><?php echo $item->mobile;?></td>
            <td>
				<?php
				    if($item->sheng_id > 0)
				    {
				        $shengInfo = Area::model()->findByPk($item->sheng_id);
				        if(isset($shengInfo)) echo $shengInfo->name;
						$shengInfo = Area::model()->findByPk($item->shi_id);
				          if(isset($shengInfo)) echo $shengInfo->name;
						$shengInfo = Area::model()->findByPk($item->qu_id);
				          if(isset($shengInfo)) echo $shengInfo->name;
				    }
					echo $item->address;
				?>
			</td>
            <td>
				<?php if($item->occupy_uid > 0){
					$ocInfo = User::model()->findByPk($item->occupy_uid);
					if(!isset($ocInfo))
					{
						$temp = Useraddress::model()->findByPk($item->id);
						$temp->occupy_uid = 0;
						$temp->save();
					}
					echo isset($ocInfo) ? $ocInfo->Username : '无';
				}else{echo '无';} ?>
			</td>
            <td><?php echo $item->create_time;?></td>
            <td>
				<a href="<?php echo $this->createUrl("membercenter/addBuyerAddress", array('id' => $item->id))?>" alt="<?php echo $item->id;?>" class="delUserAddress" title="修改收货地址">修改</a>&nbsp;<a href="javascript:delUserAddress(<?php echo $item->id;?>);" alt="<?php echo $item->id;?>" class="delUserAddress" title="删除收货地址">删除</a>
			</td>
          </tr>
          <?php
                            }
                        ?>
        </tbody>
      </table>
      <?php
                    if(isset($pages)){
                ?>
      <div class="breakpage">
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
      </div>
      <!--分页结束-->
      <?php }?>
    </div>
    <!--theBody end-->
    <div class="clear"></div>
  </div>
  <!-- end: Content -->
  <br>
  <br>
  <br>
  <!-- start: usage -->
  <?php $this->renderPartial("/baseLayout/usage");?>
  <!-- end: usage Menu -->
</div>
<!--/container-->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Warning Title</h4>
      </div>
      <div class="modal-body">
        <p>Here settings can be configured...</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<div class="clearfix"></div>
<!-- start: JavaScript-->
<!--[if !IE]>-->
<script src="<?php echo ASSET_URL;?>js/jquery-2.1.1.min.js"></script>
<!--<![endif]-->
<!--[if IE]>
	
		<script src="<?php echo ASSET_URL;?>js/jquery-1.11.1.min.js"></script>
	
	<![endif]-->
<!--[if !IE]>-->
<script type="text/javascript">
			window.jQuery || document.write("<script src='<?php echo ASSET_URL;?>js/jquery-2.1.1.min.js'>"+"<"+"/script>");
		</script>
<!--<![endif]-->
<!--[if IE]>
	
		<script type="text/javascript">
	 	window.jQuery || document.write("<script src='<?php echo ASSET_URL;?>js/jquery-1.11.1.min.js'>"+"<"+"/script>");
		</script>
		
	<![endif]-->
<script src="<?php echo ASSET_URL;?>js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo ASSET_URL;?>js/bootstrap.min.js"></script>
<!-- page scripts -->
<script src="<?php echo ASSET_URL;?>plugins/jquery-ui/js/jquery-ui-1.10.4.min.js"></script>
<script src="<?php echo ASSET_URL;?>plugins/touchpunch/jquery.ui.touch-punch.min.js"></script>
<script src="<?php echo ASSET_URL;?>plugins/moment/moment.min.js"></script>
<script src="<?php echo ASSET_URL;?>plugins/fullcalendar/js/fullcalendar.min.js"></script>
<!--[if lte IE 8]>
		<script language="javascript" type="text/javascript" src="<?php echo ASSET_URL;?>plugins/excanvas/excanvas.min.js"></script>
	<![endif]-->
<script src="<?php echo ASSET_URL;?>plugins/flot/jquery.flot.min.js"></script>
<script src="<?php echo ASSET_URL;?>plugins/flot/jquery.flot.pie.min.js"></script>
<script src="<?php echo ASSET_URL;?>plugins/flot/jquery.flot.stack.min.js"></script>
<script src="<?php echo ASSET_URL;?>plugins/flot/jquery.flot.resize.min.js"></script>
<script src="<?php echo ASSET_URL;?>plugins/flot/jquery.flot.time.min.js"></script>
<script src="<?php echo ASSET_URL;?>plugins/flot/jquery.flot.spline.min.js"></script>
<script src="<?php echo ASSET_URL;?>plugins/xcharts/js/xcharts.min.js"></script>
<script src="<?php echo ASSET_URL;?>plugins/autosize/jquery.autosize.min.js"></script>
<script src="<?php echo ASSET_URL;?>plugins/placeholder/jquery.placeholder.min.js"></script>
<script src="<?php echo ASSET_URL;?>plugins/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo ASSET_URL;?>plugins/datatables/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo ASSET_URL;?>plugins/raphael/raphael.min.js"></script>
<script src="<?php echo ASSET_URL;?>plugins/morris/js/morris.min.js"></script>
<script src="<?php echo ASSET_URL;?>plugins/jvectormap/js/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo ASSET_URL;?>plugins/jvectormap/js/jquery-jvectormap-world-mill-en.js"></script>
<script src="<?php echo ASSET_URL;?>plugins/jvectormap/js/gdp-data.js"></script>
<script src="<?php echo ASSET_URL;?>plugins/gauge/gauge.min.js"></script>
<script src="<?php echo ASSET_URL;?>layer/jquery.min.js"></script>
<script src="<?php echo ASSET_URL;?>layer/layer.js"></script>
<script src="<?php echo ASSET_URL;?>layer/laycode.min.js"></script>
<link href="<?php echo ASSET_URL;?>layer/layer.css" rel="stylesheet" type="text/css" />
<!-- theme scripts -->
<script src="<?php echo ASSET_URL;?>js/SmoothScroll.js"></script>
<script src="<?php echo ASSET_URL;?>js/jquery.mmenu.min.js"></script>
<script src="<?php echo ASSET_URL;?>js/core.min.js"></script>
<script src="<?php echo ASSET_URL;?>plugins/d3/d3.min.js"></script>
<!-- inline scripts related to this page -->
<script src="<?php echo ASSET_URL;?>js/pages/index.js"></script>
<script>
function delUserAddress(id)
{
	if(confirm("确定要删除吗？此操作不可恢复！"))
	{
		$.ajax({
			type:"POST",
			url:"<?php echo $this->createUrl("membercenter/delBuyerAddress");?>",
			data:"id="+id,
			success:function(msg){
				if(msg == "success")
				{
					//询问框
					layer.confirm('删除成功！', {
						btn: ['确定'] //按钮
					},function(){
					   location.reload();//重新刷新当前页面
					});
				}else{
					//询问框
					layer.confirm('删除失败，请重试！', {
						btn: ['确定'] //按钮
					});
				}
			}
		});
	}
}
</script>
<!-- end: JavaScript-->
</body>
</html>
