<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>聚宝盆-演示站(平台所有数据均为测试数据)</title>
<meta name="description" content="聚宝盆是中国最好的电商网络推广平台,最安全的淘宝天猫,阿里巴巴,京东刷销量网站,最正规的淘宝卖家平台。专业帮助商家安全刷好评,刷销量,刷信誉,刷评价,同时提供快递单号,出售淘宝实名小号和电脑自动换IP软件，轻松提升搜索排名打造店铺爆款,让您信誉飞涨轻松变皇冠卖家！发任务提升信誉,接任务赚取佣金！
">
<meta name="Keywords" content="淘宝刷单程序源码，淘宝刷单程序，淘宝刷单平台，刷信誉,刷手，刷客，刷客群，刷单，爆款，刷爆款，互刷信誉平台,刷单平台，淘宝刷单,刷宝平台,刷信用,刷钻,刷收藏,刷钻平台,刷宝空包,兼职赚佣金,卖家提升信誉,免费正规安全互刷" />
<link href="<?php echo VERSION2;?>css/css.css" rel="stylesheet" type="text/css" />
<script src="<?php echo VERSION2;?>js/jquery.js"></script>
</head>
<body>
    <div class="top"><!--顶部信息栏-->
        <div class="topCen clearfix">
            <div class="topCen_lf">
                <ul class="line">
                    <?php
                        $articleInfo=Article::model()->findAll(array(
                            'condition'=>'cat_id=38 and is_delete=0',
                            'select'=>'goods_id,goods_name,cat_id',
                            'limit'=>'5'
                        ));
                        foreach($articleInfo as $item){
                    ?>
                    <li class="gg">注意事项：<a title="" href="<?php echo $this->createUrl('news/deatailInfo',array('id'=>$item->goods_id,'catlogid'=>$item->cat_id));?>"><?php
                        echo $item->goods_name;
                    ?></a></li>
                    <?php
                        }
                    ?>
                </ul>
            </div>
            <div class="topCen_r">
                <div class="ml_nologin">
                    <?php if(Yii::app()->user->isGuest){ ?>
                      <div class="ml_login" id="bg"><a href="<?php echo $this->createUrl('passport/login');?>" rel="nofollow" >立即登录</a></div>
                      <!--<div class="ml_login"><a href="#" rel="nofollow" >QQ登录</a></div>-->
                      <div class="ml_login"><a href="<?php echo $this->createUrl('passport/regist');?>" style="text-decoration:none" rel="nofollow" >注册</a></div>
                    <?php }?>
                </div>
                <div class="t_user">
                    <p class="t_userInf"><?php echo Yii::app()->user->getName()=="Guest"?"游客":Yii::app()->user->getName();?></p>
                    <?php
                        if(Yii::app()->user->getId()){
                            $userInfo=User::model()->findByPk(Yii::app()->user->getId());
                    ?>
                    <ul class="t_user_down hide">
                        <li class="bt_1">
                            存款：
                            <span class="or_wz">
                                ￥<span class="MoneyOwn"><?php echo $userInfo->Money;?></span>
                            </span>
                            <span class="dow_rInf">
                                <a href="<?php echo $this->createUrl('user/userPayCenter');?>">充值</a>
                                <a href="<?php echo $this->createUrl('user/userCashToBank');?>">提现</a>
                                <a href="<?php echo $this->createUrl('user/userPayDetail');?>" class="linkIco1"><img src="<?php echo VERSION2;?>img/ico02.png" alt="" /></a>
                            </span>
                        </li>
                        <li class="bt_1">
                            麦粒：
                            <span class="or_wz">
                                <span class="MinLinOwn"><?php echo $userInfo->MinLi;?></span>
                            </span>
                            <span class="dow_rInf">
                                <a href="<?php echo $this->createUrl('user/userBuyPoint');?>">购买</a>
                                <a href="<?php echo $this->createUrl('user/userMiliToCash');?>">兑换</a>
                                <a href="<?php echo $this->createUrl('user/userPayDetail');?>" class="linkIco1"><img src="<?php echo VERSION2;?>img/ico02.png" alt="" /></a>
                            </span>
                        </li>
                        <li class="bt_1">
                            等级：
                            <span class="or_wz">
                                <span>
                                    <?php
                                        switch($userInfo->VipLv)
                                        {
                                            case 0:
                                                echo '新手会员';
                                                break;
                                            case 1:
                                                echo 'Vip1';
                                                break;
                                            case 2:
                                                echo 'Vip2';
                                                break;
                                            case 3:
                                                echo 'Vip3';
                                                break;
                                        }
                                        
                                        if($userInfo->VipLv<>0)//如果是vip会员
                                        {
                                            echo "<span style='padding-left:12px;'>";
                                            if($userInfo->VipStopTime<time())
                                            {
                                                echo "已到期"."<a href='".$this->createUrl('user/userBuyPoint')."' style='color:red; padding-left:8px;'>立即续费</a>";
                                            }else
                                            {
                                                echo date('Y-m-d',$userInfo->VipStopTime)."到期";
                                            }
                                            echo "</span>";
                                        }
                                    ?>
                                </span>
                            </span>
                            <!--<span class="jfspa">
                                积分:
                                <span class="or_wz"><?php echo $userInfo->Score;?></span>
                            </span>-->
                        </li>
                        <li class="t_user_downlast">
                            <a href="<?php echo $this->createUrl('user/userAccountCenter');?>" class="cl">账号设置</a>
                            <a href="<?php echo $this->createUrl('site/loginout');?>" class="bk">退出</a>
                        </li>
                    </ul>
                    <?php
                        }
                    ?>
                </div>
                <!--<div class="sjx">
                    收信信箱
                    <div class="sjxDown hide">
                        <li><a href="<?php echo $this->createUrl('user/userMessage');?>">官方信息</a></li>
                        <li><a href="<?php echo $this->createUrl('user/userMessage');?>">提醒设置</a></li>
                    </div>
                </div>-->
                <div class="sjx">
                    我是商家
                    <div class="sjxDown hide">
                        <li><a href="<?php echo $this->createUrl('user/taskPublishPT');?>">发布任务</a></li>
                        <li><a href="<?php echo $this->createUrl('user/taobaoOutTask');?>">已发任务</a></li>
                        <li><a href="<?php echo $this->createUrl('user/taobaoBindSeller');?>">绑定掌柜</a></li>
                        <li><a href="<?php echo $this->createUrl('user/userTsCenter');?>">我的申诉</a></li>
                    </div>
                </div>
                <div class="sjx">
                    我是接手
                    <div class="sjxDown hide">
                        <li><a href="<?php echo $this->createUrl('site/taobaoTask');?>">任务大厅</a></li>
                        <li><a href="<?php echo $this->createUrl('user/taobaoInTask');?>">已接任务</a></li>
                        <li><a href="<?php echo $this->createUrl('user/taobaoBindBuyer');?>">绑定买号</a></li>
                        <li><a href="<?php echo $this->createUrl('user/userTsCenter');?>">我的申诉</a></li>
                    </div>
                </div>
            </div>
        </div>
    </div><!--顶部信息栏 end-->
    <div class="nav"><!--主导航-->
        <div class="navCen">
            <a href="<?php echo $this->createUrl('site/index');?>" class="logo"><img src="<?php echo VERSION2;?>img/logo1.png" alt="" /></a>
            <ul class="navList">
                <li <?php echo Yii::app()->controller->id=="site" && $this->getAction()->getId()=="index"?"class='selected'":"";?>><a href="<?php echo $this->createUrl('site/index');?>">首页</a></li>
                <li <?php echo Yii::app()->controller->id=="site" && $this->getAction()->getId()=="taobaoTask"?"class='selected'":"";?>><a href="<?php echo $this->createUrl('site/taobaoTask');?>">任务大厅</a></li>
                <li style="display: none;" <?php echo Yii::app()->controller->id=="site" && $this->getAction()->getId()=="1688Task"?"class='selected'":"";?>><a href="<?php echo $this->createUrl('site/1688Task');?>">阿里巴巴</a></li>
                <li <?php echo Yii::app()->controller->id=="user" && $this->getAction()->getId()=="userSpread"?"class='selected'":"";?>><a href="<?php echo $this->createUrl('user/userSpread');?>">我要推广</a></li>
                <li <?php echo in_array(Yii::app()->controller->id,array('site','news')) && in_array($this->getAction()->getId(),array('help','list','deatailInfo'))?"class='selected'":"";?>><a href="<?php echo $this->createUrl('site/help');?>">新手帮助</a></li>
                <li <?php echo Yii::app()->controller->id=="user"?"class='selected'":"";?>><a href="<?php echo $this->createUrl('user/index');?>">会员中心</a></li>
            </ul>
        </div>
    </div><!--主导航 end-->
    <?php
        echo $content;
    ?>
    <div class="foot">
        <div class="footCen clearfix">
            <ul class="footLink1">
                <li><a href="http://www.fromphp.cn/lianxiwomen/" target="_blank">联系我们</a></li>
            </ul>
            <ul class="footLink3">
                <li><a href="http://www.fromphp.cn/xitongjieshao/" target="_blank">功能介绍</a></li>
            </ul>
            <ul class="footLink4">
                <li><a href="http://www.fromphp.cn/goumaichanpin/" target="_blank">购买产品</a></li>
            </ul>
            <div class="footLink2">
                <h1 style="display:block; margin-bottom:12px; font-size:12px; color:#fff;">
                    <a href="/">刷单平台</a>_
                    <a href="/">专业刷单系统</a>_
                    <a href="/">刷单平台系统</a>_
                    <a href="/">刷单平台源码</a>
                </h1>
                <p>Copyright © 2015 Power By <a href="http://www.fromphp.cn" target="_blank">fromphp.cn</a> Software LLC. All Rights Reserved.</p>
            </div>
        </div>
    </div>
    <script src="<?php echo VERSION2;?>js/responsiveslides.min.js"></script>
    <script src="<?php echo VERSION2;?>js/slide.js"></script>
    <script src="<?php echo VERSION2;?>js/index.js"></script>
    <script>
        $(function(){
            $('.why_main a').hover(function(){
            	var iMgf = $(this).attr("lang");
            	$('.why_main a').each(function(){
            		var iMgf = $(this).attr("lang");
            		$(this).find("img").attr("src","<?php echo VERSION2;?>img/"+iMgf+".png");
            	});
            	$(this).find("img").attr("src","<?php echo VERSION2;?>img/"+iMgf+"2.png");
            });
            
            //显示个人资料
            $(".allRw_pro1").hover(function(){
                $(this).find(".person-info").show();
            },function(){
                $(this).find(".person-info").hide();
            });
            
            <?php
                $uinfo=User::model()->findByPk(Yii::app()->user->getId());
                if($uinfo)
                {
                    if($uinfo->Status==1)
                    {
            ?>
                        location.href="<?php echo $this->createUrl('site/loginout');?>";
            <?php
                    }
                }
            ?>
        })
    </script>
</body>
</html>
