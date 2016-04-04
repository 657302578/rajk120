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
            		<h3 class="page-header"><i class="fa fa-laptop"></i> 会员详细资料</h3>
            		<ol class="breadcrumb">
            			<li><i class="fa fa-home"></i><a href="<?php  echo $this->createUrl('default/index');?>">首页</a></li>
            			<li><i class="fa fa-laptop"></i>会员管理中心</li>						  	
            		</ol>
            	</div>
            </div>
            <div class="panel panel-default"><!--theBody start-->
                <div class="panel-heading">
                    <i class="fa fa-indent red"></i>
                    <span>会员&nbsp;&nbsp;<span style="color: red; font-size: 14px;"><?php echo $userinfo->Username;?></span>&nbsp;&nbsp;个人信息中心</span>
                    <div class="panel-actions">
    					<button class="btn btn-default"><span class="fa fa-refresh"></span></button>
    				</div>
                </div>
                <div class="panel-body">
                    <!--个人信息开始-->
                    <div class="row inbox">
        				<div class="col-md-3">
        					<div class="panel panel-default">
        						<div class="panel-body inbox-menu">
        							<a class="btn btn-danger btn-block">基本信息</a>
									<form name="form1" class="changeMyInfos" method="post" action="<?php echo $this->createUrl('membercenter/saveUserInfo');?>" >
        							<ul>
        								<li>
        									<a>用户ID：<?php echo $userinfo->id?></a>
        								</li>
        								<li>
        									<a>登录帐号：<?php echo $userinfo->Username?></a>
        								</li>
                                        <li>
        									<span>帐户状态：
												<input type="radio" <?php if($userinfo->Status == 0){?> checked="checked" <?php  } ?> name="Status" value="0" />正常 <input <?php if($userinfo->Status == 1){?> checked="checked" <?php  } ?> type="radio" name="Status" value="1" />冻结中
                                                <br/>
                                                <input type="text" name="dj_time" value="<?php echo date('Y/m/d H:i:s', $userinfo->dj_time);?>"> 冻结截止日期格式如：2016/03/31 12:10:11
                                            </span>
        								</li>
                                        <li>
										真实姓名：<input type="text" name="TrueName" value="<?php echo $userinfo->TrueName;?>" />
        								</li>
        								<li>
        									<a style="cursor: pointer;" class="changePwd" alt="<?php echo $userinfo->id;?>">登录密码：<font style="color:#57A0FF;">修改新密码</font></a>
        								</li>
                                        <li>
        									<a>经验数值：<font style="font-weight:bold; font-size:14px; color:red;"><?php echo $userinfo->Experience;?></font></a>
        								</li>
                                        <li>
        									会员积分：<input type="text" name="Score" value="<?php echo $userinfo->Score;?>" />
        								</li>
										
                                        <li>
        									<a>会员等级：
                                                <?php
                                                    if($userinfo->VipLv<>0) 
                                                        echo "<img src='".VERSION2."img/vip".$userinfo->VipLv.".gif' /><span style='color:red;'>&nbsp;&nbsp;&nbsp;".date('Y-m-d',$userinfo->VipStopTime)."到期</span>";
                                                    else
                                                        echo "普通会员";
                                                ?>
                                            </a>
        								</li>
                                        <li>
        									修改会员等级： 
                                            <label><input <?php if($userinfo->VipLv == 0){?> checked="checked" <?php }?> type="radio" name="VipLv" value="0" />普通会员</label><label><input <?php if($userinfo->VipLv == 1){?> checked="checked" <?php }?> type="radio" name="VipLv" value="1" />VIP</label>
											<br/>
											VIP过期时间：
											<input type="text" name="VipStopTime" <?php if($userinfo->VipLv > 0 && $userinfo->VipStopTime > 0){?> value="<?php echo date('Y/m/d H:i:s',$userinfo->VipStopTime )?>" <?php }else{?> value="<?php echo date('Y/m/d H:i:s',strtotime("+1 month"))?>" <?php } ?> />
        								</li>
                                        <li>
                                            修改支付宝： 
                                            <input type="text" name="alipay_account" value="<?php echo $userinfo->alipay_account;?>" />
                                            
                                       </li>
										<li>
        									<a>是否加入商保：
                                                <input type="radio" <?php if($userinfo->JoinProtectPlan > 0 ){?>  checked="checked" <?php }?> name="JoinProtectPlan" value="1" />是 <input type="radio"  name="JoinProtectPlan" value="0" <?php if($userinfo->JoinProtectPlan == 0 ){?>  checked="checked" <?php }?> />未加入
                                            </a>
        								</li>
                                        <li>
        									<a>用户手机：
                                                    <?php 
                                                    if($userinfo->Phon){
                                                    ?>
                                                    <input name="Phon" type="text" value="<?php echo $userinfo->Phon; ?>" />
                                                    <?php
                                                    }else{
                                                        echo '暂无';
                                                    }
                                                    echo $userinfo->PhonActive!=0?"&nbsp;&nbsp;<span style='color:green; font-weight:bold;'>已激活</span>":"&nbsp;&nbsp;<span style='color:green; font-weight:bold;'>未激活</span>";                                             
                                                    ?>
                                            </a>
        								</li>
                                        <li>
        									新手考试：
												<input <?php if($userinfo->PhonActive == 0){?> checked="checked" <?php }?> type="radio" name="PhonActive" value="0" />未通过 <input <?php if($userinfo->PhonActive == 1){?> checked="checked" <?php }?> type="radio" name="PhonActive" value="1" />已通过
        								</li>
										<li>
        									身份证号码：<input type="text" name="id_card" value="<?php echo $userinfo->id_card?>" />
        								</li>
										<li>
        									身份证正面：<?php if($userinfo->id_photo_front){?><a style="color:#FF0000;" href="<?php echo $userinfo->id_photo_front; ?>" target="_blank" title="查看" >查看</a><?php }else{?>未上传<?php }?>
        								</li>
										<li>
        									身份证反面：<?php if($userinfo->id_photo_rear){?><a style="color:#FF0000;" href="<?php echo $userinfo->id_photo_rear; ?>" target="_blank" title="查看" >查看</a><?php }else{?>未上传<?php }?>
        								</li>
                                        <li>
        									身份证信息是否通过审核：<br>
												<input <?php if($userinfo->id_is_check == 0){?> checked="checked" <?php }?> type="radio" name="id_is_check" value="0" />未通过 <input <?php if($userinfo->id_is_check == 1){?> checked="checked" <?php }?> type="radio" name="id_is_check" value="1" />已通过
        								</li>
        								<li>
        									登录邮箱：<input type="text" name="Email" value="<?php echo $userinfo->Email;?>" />
        								</li>
        								<li>
        									用户QQ：<input type="text" name="QQToken" value="<?php echo $userinfo->QQToken;?>" />
        								</li>
                                        <li>
        									<a>注册时间：<?php echo date('Y年m月d日 H:i:s',$userinfo->RegTime)?></a>
        								</li>
        								<li>
        									后台备注：<textarea name="admin_remarks"><?php echo $userinfo->admin_remarks;?></textarea>
        									
        								</li>
										<li>
										<input type="hidden" name="uid" value="<?php echo $userinfo->id;?>" />
        									<input type="button" name="button" id="saveUserInfo" value="更新会员信息" />
        								</li>
        							</ul>
									</form>
        						</div>
        					</div>
        				</div><!--/.col-->
        				
                        <div class="col-md-3">
        					<div class="panel panel-default">
        						<div class="panel-body inbox-menu">
								<a class="btn btn-danger btn-block">收货地址相关</a>
                                    <ul>
        								<li>
                                        <a>指派的收货地址：
                                            <font style=" color:green;">
                                               <?php
											   	 $addressInfo = Useraddress::model()->find('occupy_uid='.$userinfo->id);
											   	 if(!isset($addressInfo))
											   	 {
											   	     echo '未绑定收货地址';
											   	 }else{
											   	    $shengInfo = Area::model()->findByPk($addressInfo['sheng_id']);
                                                    $shiInfo = Area::model()->findByPk($addressInfo['shi_id']);
                                                    $quInfo = Area::model()->findByPk($addressInfo['qu_id']);
                                                ?>
                                                <?php if(isset($shengInfo)) echo $shengInfo->name;?>&nbsp;<?php if(isset($shiInfo))  echo $shiInfo->name;?>&nbsp;<?php if(isset($quInfo)) echo $quInfo->name;?>&nbsp;<?php echo $addressInfo->address;?>&nbsp;收件人：<?php echo $addressInfo->user_name;?>&nbsp;电话：<?php echo $addressInfo->mobile;?>
                                                <?php }?>
                                            </font>
                                        </a>
                                        </li>
                                        <li>
                                        <a>绑定的收货地址：
                                            <font style=" color:green;">
                                               <?php
											   	 $addressInfo = Useraddress::model()->find('uid='.$userinfo->id);
											   	 if(!isset($addressInfo))
											   	 {
											   	     echo '未绑定收货地址';
											   	 }else{
											   	    $shengInfo = Area::model()->findByPk($addressInfo['sheng_id']);
                                                    $shiInfo = Area::model()->findByPk($addressInfo['shi_id']);
                                                    $quInfo = Area::model()->findByPk($addressInfo['qu_id']);
                                                ?>
                                                <?php if(isset($shengInfo)) echo $shengInfo->name;?>&nbsp;<?php if(isset($shiInfo))  echo $shiInfo->name;?>&nbsp;<?php if(isset($quInfo)) echo $quInfo->name;?>&nbsp;<?php echo $addressInfo->address;?>&nbsp;收件人：<?php echo $addressInfo->user_name;?>&nbsp;电话：<?php echo $addressInfo->mobile;?>
                                                <br/>
                                                <?php
											   	     if($addressInfo->occupy_uid > 0)
											   	     {
											   	         $occUser = User::model()->findByPk($addressInfo->occupy_uid);
											   	         echo isset($occUser) ? '地址使用者：'.$occUser->Username : '当前无人使用此地址';
											   	     }else{
											   	         echo '当前无人使用此地址';
											   	     }
											   	 }
											   	 ?>
                                            </font>
                                        </a>
                                        </li>
                                        <li>
                                        <a>指派新的地址：
										<br/>
                                            <font style=" color:green;">
                                                <select  id="addressId" name="addressId">
                                                    <?php
                                                    foreach ($addressList as $v){
                                                        $shengInfo = Area::model()->findByPk($v['sheng_id']);
                                                        $shiInfo = Area::model()->findByPk($v['shi_id']);
                                                        $quInfo = Area::model()->findByPk($v['qu_id']);
                                                    ?>
                                                        <option value="<?php echo $v->id?>"><?php echo $v->user_name;?>[<?php if(isset($shengInfo)) echo $shengInfo->name;?><?php if(isset($shiInfo)) echo $shiInfo->name;?><?php if(isset($quInfo)) echo $quInfo->name;?>][<?php echo $v->mobile;?>]</option>
                                                    <?php }?>
                                                </select>
												<br/>
                                            </font>
											<input type="button" id="bindAddress" alt="<?php echo $userinfo->id; ?>" name="button" value="确定绑定" />
                                        </a>
                                        </li>
                                    </ul>
        							<a class="btn btn-danger btn-block">财务信息</a>
        							<ul>
        								<li>
        									<a>帐户余额：<font style="font-weight:bold; font-size:14px; color:red;"><?php echo $userinfo->Money;?></font>&nbsp;&nbsp;元&nbsp;&nbsp;&nbsp;&nbsp;<font class="giveMoney" style="color:#57A0FF; cursor: pointer;" alt="<?php echo $userinfo->id;?>">手动充值</font></a>
        								</li>
                                        <li>
        									<a>帐户签收积分：<font style="font-weight:bold; font-size:14px; color:red;"><?php echo $userinfo->MinLi;?></font>&nbsp;&nbsp;个</a>
        								</li>
                                        <li>
        									<a>商保金额：
                                            <font style=" font-weight:bold; font-size:14px; color:red;">
                                                <?php 
                                                    echo $userinfo->JoinProtectPlanMoney;
                                                ?>
                                            </font>&nbsp;&nbsp;元</a>
        								</li>
        							</ul>
                                    
									<a class="btn btn-danger btn-block">安全相关</a>
                                    <ul>
        								<li>
                                        <a>安全码设置：
                                            <font style=" color:green;">
                                                <?php 
                                                    echo $userinfo->SafePwd!=0?"<font style='font-weight:bold; color:green;'>已设置</font>":"<font style='font-weight:bold; color:red;'>未设置</font>";
                                                ?>
                                            </font>
                                        </a>
                                        </li>
                                        <li>
                                        <a>异地登录：
                                            <font style=" color:green;">
                                                <?php 
                                                    echo $userinfo->PlaceOtherLogin!=0?"<font style='font-weight:bold; color:green;'>已开启</font>":"<font style='font-weight:bold; color:red;'>未开启</font>";
                                                ?>
                                            </font>
                                        </a>
                                        </li>
                                    </ul>
        						</div>
        					</div>		
        				</div><!--/.col-->
                        
                        <div class="col-md-3">
        					<div class="panel panel-default">
        						<div class="panel-body contacts">
        							<a class="btn btn-primary btn-block"> 发任务相关</a>
                                    <?php
                                        //已发任务统计
                                        $totalYF=Companytasklist::model()->findAll(array(
                                            'condition'=>'publishid='.$_GET['uid'],
                                            'select'=>'publishid'
                                        ));
                                        //已发任务统计
                                        $totalYWC=Companytasklist::model()->findAll(array(
                                            'condition'=>'publishid='.$_GET['uid'].' and taskCompleteStatus=1',
                                            'select'=>'publishid'
                                        ));
                                        //已发任-暂停中任务统计
                                        $totalZTZ=Companytasklist::model()->findAll(array(
                                            'condition'=>'publishid='.$_GET['uid'].' and status=6',
                                            'select'=>'publishid'
                                        ));
                                        //等待接手任务统计
                                        $totalDDJS=Companytasklist::model()->findAll(array(
                                            'condition'=>'publishid='.$_GET['uid'].' and status=0',
                                            'select'=>'publishid'
                                        ));
                                        //等待审核任务统计
                                        $totalDDSH=Companytasklist::model()->findAll(array(
                                            'condition'=>'publishid='.$_GET['uid'].' and status=1',
                                            'select'=>'publishid'
                                        ));
                                        //等待发货任务统计
                                        $totalDDFH=Companytasklist::model()->findAll(array(
                                            'condition'=>'publishid='.$_GET['uid'].' and status=3',
                                            'select'=>'publishid'
                                        ));
                                        //等待确认任务统计
                                        $totalDDQR=Companytasklist::model()->findAll(array(
                                            'condition'=>'publishid='.$_GET['uid'].' and status=5 and taskCompleteStatus<>1',
                                            'select'=>'publishid'
                                        ));
                                    ?>
        							<ul>
        								<li><span class="label label-danger"></span> 已发任务：<span style="color: red; font-weight:bold; font-size:14px;"><?php echo count($totalYF);?></span></li>
                                        <li><span class="label label-danger"></span> 已完成任务：<span style="color: green; font-weight:bold; font-size:14px;"><?php echo count($totalYWC);?></span></li>
                                        <li><span class="label label-danger"></span> 暂停任务：<span style="color: red; font-weight:bold; font-size:14px;"><?php echo count($totalZTZ);?></span></li>
        								<li><span class="label label-default"></span> 等待接手：<?php echo count($totalDDJS);?></li>
        								<li><span class="label label-success"></span> 要要审核：<?php echo count($totalDDSH);?></li>
        								<li><span class="label label-success"></span> 需要发货：<?php echo count($totalDDFH);?></li>
        								<li><span class="label label-warning"></span> 需要确认：<?php echo count($totalDDQR);?></li>
        							</ul>
                                    <?php
                                        //已接任务统计
                                        $totalYJRW=Companytasklist::model()->findAll(array(
                                            'condition'=>'taskerid='.$_GET['uid'],
                                            'select'=>'publishid'
                                        ));
                                        //已接任务统计
                                        $totalYWCRW=Companytasklist::model()->findAll(array(
                                            'condition'=>'taskerid='.$_GET['uid'].' and taskCompleteStatus=1',
                                            'select'=>'publishid'
                                        ));
                                        //等待商家审核
                                        $totalDDSJSH=Companytasklist::model()->findAll(array(
                                            'condition'=>'taskerid='.$_GET['uid'].' and status=1',
                                            'select'=>'publishid'
                                        ));
                                        //等待付款
                                        $totalDDFK=Companytasklist::model()->findAll(array(
                                            'condition'=>'taskerid='.$_GET['uid'].' and status=2',
                                            'select'=>'publishid'
                                        ));
                                        //等待好评
                                        $totalDDHP=Companytasklist::model()->findAll(array(
                                            'condition'=>'taskerid='.$_GET['uid'].' and status=4',
                                            'select'=>'publishid'
                                        ));
                                        //等待商家确认
                                        $totalDDSJQR=Companytasklist::model()->findAll(array(
                                            'condition'=>'taskerid='.$_GET['uid'].' and status=5 and taskCompleteStatus<>1',
                                            'select'=>'publishid'
                                        ));
                                    ?>
                                    <a class="btn btn-primary btn-block"> 接任务相关</a>
        							<ul>
        								<li><span class="label label-danger"></span> 已接任务：<span style="color: red; font-weight:bold; font-size:14px;"><?php echo count($totalYJRW);?></span></li>
                                        <li><span class="label label-danger"></span> 已完成任务：<span style="color: green; font-weight:bold; font-size:14px;"><?php echo count($totalYWCRW);?></span></li>
        								<li><span class="label label-default"></span> 等待审核：<?php echo count($totalDDSJSH);?></li>
        								<li><span class="label label-success"></span> 等待付款：<?php echo count($totalDDFK);?></li>
        								<li><span class="label label-success"></span> 等待好评：<?php echo count($totalDDHP);?></li>
                                        <li><span class="label label-success"></span> 等待商家确认：<?php echo count($totalDDSJQR);?></li>
        							</ul>
        						</div>
        					</div>		
        				</div><!--/.col-->
                        
                        <div class="col-md-3">
        					<div class="panel panel-default">
        						<div class="panel-body contacts">
        							<a class="btn btn-primary btn-block"> 发起投诉相关</a>
                                    <?php
                                        //发起投诉次数
                                        $totalFQTS=Complianlist::model()->findAll(array(
                                            'condition'=>'douid='.$_GET['uid'],
                                            'select'=>'reason'
                                        ));
                                        //正在处理中
                                        $totalCLZ=Complianlist::model()->findAll(array(
                                            'condition'=>'douid='.$_GET['uid'].' and status<>2',
                                            'select'=>'reason'
                                        ));
                                        //胜利次数
                                        $totalSLCS=Complianlist::model()->findAll(array(
                                            'condition'=>'douid='.$_GET['uid'].' and winid='.$_GET['uid'],
                                            'select'=>'reason'
                                        ));
                                        //失败次数
                                        $totalSBCS=Complianlist::model()->findAll(array(
                                            'condition'=>'douid='.$_GET['uid'].' and winid<>0 and status=2',
                                            'select'=>'reason'
                                        ));
                                        //平手次数
                                        $totalPSCS=Complianlist::model()->findAll(array(
                                            'condition'=>'douid='.$_GET['uid'].' and winid=0 and status=2',
                                            'select'=>'reason'
                                        ));
                                    ?>
        							<ul>
        								<li><span class="label label-danger"></span> 总数：<?php echo count($totalFQTS);?></li>
                                        <li><span class="label label-default"></span> 正在处理：<?php echo count($totalCLZ);?></li>
        								<li><span class="label label-default"></span> 胜利次数：<?php echo count($totalSLCS);?></li>
        								<li><span class="label label-success"></span> 失败次数：<?php echo count($totalSBCS);?></li>
                                        <li><span class="label label-success"></span> 平手次数：<?php echo count($totalPSCS);?></li>
        							</ul>
                                    <a class="btn btn-primary btn-block"> 收到投诉相关</a>
                                    <?php
                                        //收到投诉次数
                                        $totalSDTS=Complianlist::model()->findAll(array(
                                            'condition'=>'uid='.$_GET['uid'],
                                            'select'=>'reason'
                                        ));
                                        //正在处理中
                                        $totalSDCLZ=Complianlist::model()->findAll(array(
                                            'condition'=>'uid='.$_GET['uid'].' and status<>2',
                                            'select'=>'reason'
                                        ));
                                        //胜利次数
                                        $totalSDSLCS=Complianlist::model()->findAll(array(
                                            'condition'=>'uid='.$_GET['uid'].' and winid='.$_GET['uid'],
                                            'select'=>'reason'
                                        ));
                                        //失败次数
                                        $totalSDSBCS=Complianlist::model()->findAll(array(
                                            'condition'=>'uid='.$_GET['uid'].' and winid<>0 and status=2',
                                            'select'=>'reason'
                                        ));
                                        //平手次数
                                        $totalSDPSCS=Complianlist::model()->findAll(array(
                                            'condition'=>'uid='.$_GET['uid'].' and winid=0 and status=2',
                                            'select'=>'reason'
                                        ));
                                    ?>
        							<ul>
        								<ul>
        								<li><span class="label label-danger"></span> 总数：<?php echo count($totalSDTS);?></li>
                                        <li><span class="label label-default"></span> 正在处理：<?php echo count($totalSDCLZ);?></li>
        								<li><span class="label label-default"></span> 胜利次数：<?php echo count($totalSDSLCS);?></li>
        								<li><span class="label label-success"></span> 失败次数：<?php echo count($totalSDSBCS);?></li>
                                        <li><span class="label label-success"></span> 平手次数：<?php echo count($totalSDPSCS);?></li>
        							</ul>
        							</ul>
        						</div>
        					</div>		
        				</div><!--/.col-->
        						
        			</div>
                    <!--个人信息结束-->
                </div>
          </div><!--theBody end-->
            <div class="clear"></div>
		</div>
		<!-- end: Content -->
		<br><br><br>
		
		
		<!-- start: usage -->
		<?php $this->renderPartial("/baseLayout/usage");?>
		<!-- end: usage Menu -->	
		
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
	
	<!-- satrt -->
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
	
	
	<!-- theme scripts -->
	<script src="<?php echo ASSET_URL;?>js/SmoothScroll.js"></script>
	<script src="<?php echo ASSET_URL;?>js/jquery.mmenu.min.js"></script>
	<script src="<?php echo ASSET_URL;?>js/core.min.js"></script>
	<script src="<?php echo ASSET_URL;?>plugins/d3/d3.min.js"></script>	
	
	<!-- inline scripts related to this page -->
	<script src="<?php echo ASSET_URL;?>js/pages/index.js"></script>	
	
	<!-- end: JavaScript-->
	<style>
    .inbox .contacts ul li{color:#666;}
    .text1{
        text-indent: 5px;
    	width:207px;
    	height:28px;
    	border:2px dashed #57a0ff;
    	margin-left:44px;
    	margin-top:9px;
    }
    </style>
    <script src="<?php echo ASSET_URL;?>layer/jquery.min.js"></script>
    <script src="<?php echo ASSET_URL;?>layer/layer.js"></script>
    <script src="<?php echo ASSET_URL;?>layer/laycode.min.js"></script>
    <link href="<?php echo ASSET_URL;?>layer/layer.css" rel="stylesheet" type="text/css" />
    <script>
        $(function(){
		
			$("#bindAddress").click(function(){
				var userId = $(this).attr("alt");
				var addressId = $("#addressId").val();
				$.ajax({
					type:"POST",
					url:"<?php echo $this->createUrl("membercenter/bindUserAddress");?>",
					data:"uid="+userId+"&aid="+addressId,
					success:function(msg){
						if(msg == "SUCCESS")
						{
							layer.confirm('绑定成功!', {
                                	btn: ['知道了'] //按钮
                                },function(){
									location.reload();
								});
						}else{
							layer.confirm('绑定失败！', {
                                	btn: ['知道了'] //按钮
                             });
						}
					}
				});
			});
		
            $("#saveUserInfo").click(function(){
				$.ajax({
						type:"POST",
						url:"<?php echo $this->createUrl('membercenter/saveUserInfo');?>",
						data:$(".changeMyInfos").serialize(),
						success:function(msg){
							if(msg == "NO_UID")
							{
								layer.confirm('无效的UID', {
                                	btn: ['知道了'] //按钮
                                });
							}else if(msg == "NO_USER"){
								layer.confirm('该用户不存在!', {
                                	btn: ['知道了'] //按钮
                                });
							}else if(msg == "FAIL"){
								layer.confirm('修改失败!', {
                                	btn: ['知道了'] //按钮
                                });
							}else{
							layer.confirm('修改成功!', {
                                	btn: ['知道了'] //按钮
                                },function(){
									location.reload();
								});
							}
						}
				 });
			});
            //修改用户密码
            $(".changePwd").click(function(){
                var uid=$(this).attr("alt");//会员id
                //修改用户密码
                layer.confirm('输入新密码：<input type="password" name="newpwd" class="text1 newpwd" style="margin-left:5px;" /><br/>请再次输入：<input type="password" name="newpwd" class="text1 newpwdagain" style="margin-left:5px;" /><br/>', {
                	btn: ['确定修改','取消修改'] //按钮
                },function(){
                    if($(".newpwd").val()=="")
                    {
                        layer.tips('新密码不能为空', '.newpwd');
                        exit;
                    }
                    if($(".newpwdagain").val()=="")
                    {
                        layer.tips('确认密码不能为空', '.newpwdagain');
                        exit;
                    }
                    if($(".newpwd").val()!=$(".newpwdagain").val())//两次输入的密码不相等
                    {
                        layer.tips('两次输入的密码不一致', '.newpwdagain');
                        exit;
                    }
                    
                    //检查通过修改密码
                    $.ajax({
            			type:"POST",
            			url:"<?php echo $this->createUrl('membercenter/changPassword');?>",
            			data:{"newpassword":$(".newpwd").val(),"uid":uid},
            			success:function(msg)
            			{
                            if(msg=="SUCCESS")
                            {
                				layer.confirm('密码修改成功', {
                                	btn: ['知道了'] //按钮
                                });
                            }else
                            {
                                layer.confirm('<span style="color:red;">密码修改失败，您可以联系相关技术人员协助解决</span>', {
                                	btn: ['知道了'] //按钮
                                });
                            }
            			}
            		});
                    
                },function(){
                    location.reload();//重新加载当前页面
                });
                //修改用户密码
            });
            
            //手动充值
            $(".giveMoney").click(function(){
                var uid=$(this).attr("alt");//会员id
                //修改用户密码
                layer.confirm('请输入充值金额：<input type="text" name="Money" class="text1 Money" style="width:100px; margin-left:5px; text-align:center;" />&nbsp;&nbsp;元', {
                	btn: ['确定充值','取消充值'] //按钮
                },function(){
                    if($(".Money").val()=="")
                    {
                        layer.tips('充值金额不能为空', '.Money');
                        exit;
                    }
                    if(isNaN($(".Money").val()))
                    {
                        layer.tips('充值金额必须为数字', '.Money');
                        exit;
                    }
                    
                    //检查通过修改密码
                    $.ajax({
            			type:"POST",
            			url:"<?php echo $this->createUrl('membercenter/givePay');?>",
            			data:{"Money":$(".Money").val(),"uid":uid},
            			success:function(msg)
            			{
                            if(msg=="SUCCESS")
                            {
                				layer.confirm('充值成功', {
                                	btn: ['知道了'] //按钮
                                },function(){
                                    location.reload();
                                });
                            }else
                            {
                                layer.confirm('<span style="color:red;">充值失败，您可以联系相关技术人员协助解决</span>', {
                                	btn: ['知道了'] //按钮
                                },function(){
                                    location.reload();
                                });
                            }
            			}
            		});
                    
                },function(){
                    location.reload();//重新加载当前页面
                });
            });
        })
    </script>
</body>
</html>