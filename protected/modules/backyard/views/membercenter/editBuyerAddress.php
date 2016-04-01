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
		<script type="text/javascript">
		    function getSonCity(pid, domid)
			{
				if(pid > 0)
				{
					$.ajax({
						type:"POST",
						url:"<?php echo $this->createUrl('membercenter/updateCities');?>",
						data:"pid="+pid+"&area="+domid,
						success:function(msg)
						{
							$("#"+domid).html(msg);
							if(domid == 'shi') $("#qu").html('');
							if(domid == 'shi') $("#"+qu).html();
							
						}
					});
				}
			}
		</script>
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
            			<li><i class="fa fa-laptop"></i>用户管理</li>						  	
            		</ol>
            	</div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-indent red"></i>
                    <span>
                        收货地址管理 - 编辑地址信息 
                    </span>
					<div class="panel-actions">
						<a href="javascript:history.back();" title="返回">返回</a>
					 </div>
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
                    <form action="" method="post">
                    	<div id="article-form_es_" class="errorSummary" style="display:none"><p>请更正下列输入错误:</p>
                    <ul><li>dummy</li></ul></div><!--报错信息-->
                        <table id="articleoth" style="width:100%; line-height:35px; font-size:12px;" cellpadding="0" cellspacing="0" border="0">
                        <tbody>
                    	<tr>
                   		  <td width="8%"><label for="Article_add_time">收货人所在地区：</label></td>
                    		<td width="88%">
							<select name="data[sheng_id]" onChange="getSonCity(this.value,'shi')">
								<?php
									foreach($area as $k=>$v){
								?>
								<option <?php if(isset($addressInfo) && $addressInfo->sheng_id == $v->id){?>  selected="selected" <?php }?>  value="<?php echo $v->id;?>"><?php echo $v->name ?></option>
								<?php
									}
								?>
							</select>
							<span id="shi">
							<?php if(isset($shiList)){?>
							<select name="data[shi_id]" onChange="getSonCity(this.value,'qu')">
								<?php foreach($shiList as $v){?>
								<option <?php if(isset($addressInfo) && $addressInfo->shi_id == $v->id){?>  selected="selected" <?php }?> value="<?php echo $v->id;?>"><?php echo $v->name;?></option>
								<?php }?>
							</select>
							<?php }?>
							</span>
							<span id="qu">
							<?php if(isset($shiList)){?>
							<select name="data[qu_id]">
								<?php foreach($quList as $v){?>
								<option <?php if(isset($addressInfo) && $addressInfo->qu_id == $v->id){?>  selected="selected" <?php }?> value="<?php echo $v->id;?>"><?php echo $v->name;?></option>
								<?php }?>
							</select>
							<?php }?>
							</span>
							
							</td>
                    		<td width="4%"><div class="errorMessage" id="Article_add_time_em_" style="display:none"></div></td>
                    	</tr>
                    
                    	<tr>
                    		<td><label for="Article_sort_order">收货人姓名</label></td>
                    		<td><input required="required" name="data[user_name]" id="Article_sort_order" type="text" value="<?php if(isset($addressInfo)) echo $addressInfo->user_name;?>"></td>
                    		<td><div class="errorMessage" id="Article_sort_order_em_" style="display:none"></div></td>
                    	</tr>
                    	<tr>
                    		<td><label for="Article_sort_order">收货人手机号</label></td>
                    		<td><input required="required" name="data[mobile]" id="Article_sort_order" type="text" value="<?php if(isset($addressInfo)) echo $addressInfo->mobile;?>"></td>
                    		<td><div class="errorMessage" id="Article_sort_order_em_" style="display:none"></div></td>
                    	</tr>
                    
                    	<tr>
                    		<td><label for="Article_sort_order">收货人详细地址：</label></td>
                    		<td><input required="required" name="data[address]" id="Article_sort_order" type="text" value="<?php if(isset($addressInfo)) echo $addressInfo->address;?>"></td>
                    		<td><div class="errorMessage" id="Article_sort_order_em_" style="display:none"></div></td>
                    	</tr>
                    	<tr height="10"></tr>
                    	<tr>
                            <td><input name="data[id]" type="hidden" value="<?php if(isset($addressInfo)) echo $addressInfo->id;?>"></td>
                            <td><input type="submit" value="保存"></td>
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
	
	<div class="clearfix"></div>
</body>
</html>