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
            		<h3 class="page-header"><i class="fa fa-laptop"></i> 编辑</h3>
            		<ol class="breadcrumb">
            			<li><i class="fa fa-home"></i><a href="<?php  echo $this->createUrl('default/index');?>">首页</a></li>
            			<li><i class="fa fa-laptop"></i>用户充值中心</li>						  	
            		</ol>
            	</div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-indent red"></i>
                    <span>
                        用户充值中心 -编辑
                    </span>
                </div>
                <div class="panel-body">
                    <div class="clear"></div>
                    <div class="theBody"><!--theBody start-->
                    
                    <style>
                    .errorSummary{ border:1px solid #ccc; background:#f7dada;}
                    .errorSummary p{ width:98%; margin:0 auto;}
                    .errorSummary ul{ width:98%; margin:0 auto;}
                    .errorMessage{ display:inline; color:red;}
                    .required{ color:red;}
                    </style>
                    <!--商品描述文本编辑器-->
                     
                    
                    <form action="" method="post">
                    	<div id="article-form_es_" class="errorSummary" style="display:none"><p>请更正下列输入错误:</p>
                    <ul><li>dummy</li></ul></div><!--报错信息-->
                        <table id="articleoth" style="width:100%; line-height:35px; font-size:12px;" cellpadding="0" cellspacing="0" border="0">
                        <tbody>
                    	<tr>
                    		<td><label for="Article_add_time">支付宝订单号</label></td>
                    		<td><input maxlength="10" value="<?php if(isset($data['tno'])) echo $data['tno'];?>" name="data[tno]" id="Article_add_time" type="text"></td>
                    		<td><div class="errorMessage" id="Article_add_time_em_" style="display:none"></div></td>
                    	</tr>
                    
                    	<tr>
                    		<td><label for="Article_sort_order">金额</label></td>
                    		<td><input name="data[money]" id="Article_sort_order" type="text" value="<?php if(isset($data['money'])) echo $data['money'];?>"></td>
                    		<td><div class="errorMessage" id="Article_sort_order_em_" style="display:none"></div></td>
                    	</tr>
                    
                    	<tr>
                    		<td><label for="Article_sort_order">备注</label></td>
                    		<td><input name="data[payno]" id="Article_sort_order" type="text" value="<?php if(isset($data['payno'])) echo $data['payno'];?>"></td>
                    		<td><div class="errorMessage" id="Article_sort_order_em_" style="display:none"></div></td>
                    	</tr>
                    
                    	<tr>
                    		<td><label for="Article_is_delete">是否完成支付</label></td>
                    		<td>
                                <select name="data[status]" id="Shopgoods_is_delete" style="width:50px;padding-left:3px;">
                                    <option <?php if(isset($data['status'])) if( $data['status'] == 0 ) echo 'selected';?> value="0">未完成</option>  
                                    <option <?php if(isset($data['status'])) if( $data['status'] == 1 ) echo 'selected';?> value="1">已完成</option>   
                                </select>
                            </td>
                    		<td><div class="errorMessage" id="Article_is_delete_em_" style="display:none"></div></td>
                    	</tr>
                    	<tr height="10"></tr>
                    	<tr>
                            <td><input name="data[id]" type="hidden" value="<?php if(isset($data['id'])) echo $data['id'];?>"></td>
                            <td><input type="submit" value="确认编辑"></td>
                            <td></td>
                    	</tr>
                        </tbody></table>
                    </form>
                </div><!--theBody end-->
                <div class="clear"></div>
                </div>
            </div>
		</div>
		<!-- end: Content -->
		
	</div><!--/container-->
		
	
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
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	
	<div class="clearfix"></div>
	
	<script src="<?php echo ASSET_URL;?>js/jquery-migrate-1.2.1.min.js"></script>
	
</body>
</html>