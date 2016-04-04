<?php
        echo $this->renderPartial('/user/taobaoTaskNav');//载入淘宝大厅导航
    ?>
<?php
        $GetConditionArr=$_GET;//查询条件整理
        //初始化
        if(!isset($_GET['platform']))
            $GetConditionArr['platform']='noVal';
            
        if(!isset($_GET['payWay']))
            $GetConditionArr['payWay']='noVal';
            
        if(!isset($_GET['BuyerJifen']))
            $GetConditionArr['BuyerJifen']='noVal';
            
        if(!isset($_GET['isMobile']))
            $GetConditionArr['isMobile']='noVal';
            
        if(!isset($_GET['task_type']))
            $GetConditionArr['task_type']='noVal';
            
        if(!isset($_GET['MinLi']))
            $GetConditionArr['MinLi']='noVal';
            
        if(!isset($_GET['txtPrice']))
            $GetConditionArr['txtPrice']='noVal';
            
        if(!isset($_GET['ddlOKDay']))
            $GetConditionArr['ddlOKDay']='noVal';
        //var_dump(@$GetConditionArr);
    ?>

<div class="dtSort">
  <div class="dtSortCen">
    <div class="dtSortLis">
      <div class="dtSortLis_t">任务平台<span style="color:#FF0000">(VIP)</span>：</div>
      <div class="<?php echo !isset($_GET['platform']) || @$_GET['platform']=='noVal' || @$_GET['platform']==''?'dtSortLis_pro':'dtSortLis_proBeore';?>"><a href="<?php
                        @$GetConditionArr['platform']='noVal';
                        echo $this->createUrl('site/taobaoTask',$GetConditionArr);
                    ?>">不限</a></div>
      <ul class="dtSortList">
        <li><a <?php echo @$_GET['platform']==1?'class="searchOn"':'';?> href="<?php
                        @$GetConditionArr['platform']=1;
                        echo $this->createUrl('site/taobaoTask',$GetConditionArr);
                    ?>">淘宝</a></li>
        <li><a <?php echo @$_GET['platform']==2?'class="searchOn"':'';?> href="<?php
                        @$GetConditionArr['platform']=2;
                        echo $this->createUrl('site/taobaoTask',$GetConditionArr);
                    ?>">京东</a></li>
        <li><a <?php echo @$_GET['platform']==3?'class="searchOn"':'';?> href="<?php
                        @$GetConditionArr['platform']=3;
                        echo $this->createUrl('site/taobaoTask',$GetConditionArr);
                    ?>">阿里巴巴</a></li>
      </ul>
      <?php @$GetConditionArr['platform'] = $_GET['platform'];?>
    </div>
    <!--<div class="dtSortLis">
                <div class="dtSortLis_t">付款方式：</div>
                <div class="<?php echo !isset($_GET['payWay']) || @$_GET['payWay']=='noVal' || @$_GET['payWay']==''?'dtSortLis_pro':'dtSortLis_proBeore';?>"><a href="<?php
                        @$GetConditionArr['payWay']='noVal';
                        echo $this->
    createUrl('site/taobaoTask',$GetConditionArr);
    ?>">不限</a></div>
  <ul class="dtSortList">
    <li><a <?php echo @$_GET['payWay']==1?'class="searchOn"':'';?> href="<?php
                        @$GetConditionArr['payWay']=1;
                        echo $this->createUrl('site/taobaoTask',$GetConditionArr);
                    ?>">威客垫付</a></li>
    <li><a <?php echo @$_GET['payWay']==2?'class="searchOn"':'';?> href="<?php
                        @$GetConditionArr['payWay']=2;
                        echo $this->createUrl('site/taobaoTask',$GetConditionArr);
                    ?>">平台代付</a></li>
  </ul>
  <?php @$GetConditionArr['payWay'] = $_GET['payWay'];?>
</div>
-->
<div class="dtSortLis">
  <div class="dtSortLis_t">星级要求<span style="color:#FF0000"><span style="color:#FF0000">(VIP)</span></span>：</div>
  <div class="<?php echo !isset($_GET['BuyerJifen']) || @$_GET['BuyerJifen']=='noVal' || @$_GET['BuyerJifen']==''?'dtSortLis_pro':'dtSortLis_proBeore';?>"><a href="<?php
                        @$GetConditionArr['BuyerJifen']='noVal';
                        echo $this->createUrl('site/taobaoTask',$GetConditionArr);
                    ?>">不限</a></div>
  <ul class="dtSortList" id="dtSortListOth">
    <li><a <?php echo @$_GET['BuyerJifen']==1?'class="searchOn"':'';?> href="<?php
                        $GetConditionArr['BuyerJifen']=1;
                        echo $this->createUrl('site/taobaoTask',$GetConditionArr);
                    ?>">一心</a></li>
    <li><a <?php echo @$_GET['BuyerJifen']==2?'class="searchOn"':'';?> href="<?php
                        $GetConditionArr['BuyerJifen']=2;
                        echo $this->createUrl('site/taobaoTask',$GetConditionArr);
                    ?>">二心</a></li>
    <li><a <?php echo @$_GET['BuyerJifen']==3?'class="searchOn"':'';?> href="<?php
                        $GetConditionArr['BuyerJifen']=3;
                        echo $this->createUrl('site/taobaoTask',$GetConditionArr);
                    ?>">三心</a></li>
    <li><a <?php echo @$_GET['BuyerJifen']==4?'class="searchOn"':'';?> href="<?php
                        $GetConditionArr['BuyerJifen']=4;
                        echo $this->createUrl('site/taobaoTask',$GetConditionArr);
                    ?>">四心</a></li>
    <li><a <?php echo @$_GET['BuyerJifen']==5?'class="searchOn"':'';?> href="<?php
                        $GetConditionArr['BuyerJifen']=5;
                        echo $this->createUrl('site/taobaoTask',$GetConditionArr);
                    ?>">五心</a></li>
    <li><a <?php echo @$_GET['BuyerJifen']==6?'class="searchOn"':'';?> href="<?php
                        $GetConditionArr['BuyerJifen']=6;
                        echo $this->createUrl('site/taobaoTask',$GetConditionArr);
                    ?>">一钻</a></li>
    <li><a <?php echo @$_GET['BuyerJifen']==7?'class="searchOn"':'';?> href="<?php
                        $GetConditionArr['BuyerJifen']=7;
                        echo $this->createUrl('site/taobaoTask',$GetConditionArr);
                    ?>">二钻</a></li>
    <li><a <?php echo @$_GET['BuyerJifen']==8?'class="searchOn"':'';?> href="<?php
                        $GetConditionArr['BuyerJifen']=8;
                        echo $this->createUrl('site/taobaoTask',$GetConditionArr);
                    ?>">三钻</a></li>
    <li><a <?php echo @$_GET['BuyerJifen']==9?'class="searchOn"':'';?> href="<?php
                        $GetConditionArr['BuyerJifen']=9;
                        echo $this->createUrl('site/taobaoTask',$GetConditionArr);
                    ?>">四钻</a></li>
    <li><a <?php echo @$_GET['BuyerJifen']==10?'class="searchOn"':'';?> href="<?php
                        $GetConditionArr['BuyerJifen']=10;
                        echo $this->createUrl('site/taobaoTask',$GetConditionArr);
                    ?>">五钻</a></li>
  </ul>
  <?php @$GetConditionArr['BuyerJifen'] = $_GET['BuyerJifen'];?>
</div>
<div class="dtSortLis">
  <div class="dtSortLis_t">任务类型<span style="color:#FF0000">(VIP)</span>：</div>
  <div class="<?php echo !isset($_GET['isMobile']) || @$_GET['isMobile']=='noVal' || @$_GET['isMobile']==''?'dtSortLis_pro':'dtSortLis_proBeore';?>"><a href="<?php
                        @$GetConditionArr['isMobile']='noVal';
                        echo $this->createUrl('site/taobaoTask',$GetConditionArr);
                    ?>">不限</a></div>
  <ul class="dtSortList">
    <li><a <?php echo @$_GET['isMobile']==1?'class="searchOn"':'';?> href="<?php
                        $GetConditionArr['isMobile']=1;
                        echo $this->createUrl('site/taobaoTask',$GetConditionArr);
                    ?>">手机任务</a></li>
    <li><a <?php echo @$_GET['isMobile']==2?'class="searchOn"':'';?> href="<?php
                        $GetConditionArr['isMobile']=2;
                        echo $this->createUrl('site/taobaoTask',$GetConditionArr);
                    ?>">电脑任务</a></li>
  </ul>
  <?php @$GetConditionArr['isMobile'] = $_GET['isMobile'];?>
</div>
<!--<div class="dtSortLis">
                <div class="dtSortLis_t">商品类型：</div>
                <div class="<?php echo !isset($_GET['task_type']) || @$_GET['task_type']=='noVal' || @$_GET['task_type']==''?'dtSortLis_pro':'dtSortLis_proBeore';?>"><a href="<?php
                        @$GetConditionArr['task_type']='noVal';
                        echo $this->
createUrl('site/taobaoTask',$GetConditionArr);
                    ?>">不限</a>
</div>
<ul class="dtSortList">
  <li><a <?php echo isset($_GET['task_type']) && @$_GET['task_type']!=1 && @$_GET['task_type']!='' && @$_GET['task_type']!='noVal'?'class="searchOn"':'';?>  href="<?php
                        $GetConditionArr['task_type']=0;
                        echo $this->createUrl('site/taobaoTask',$GetConditionArr);
                    ?>">虚拟商品</a></li>
  <li><a <?php echo @$_GET['task_type']==1?'class="searchOn"':'';?>  href="<?php
                        $GetConditionArr['task_type']=1;
                        echo $this->createUrl('site/taobaoTask',$GetConditionArr);
                    ?>">实物商品</a></li>
</ul>
<?php @$GetConditionArr['task_type'] = $_GET['task_type'];?>
</div>
-->
<!--<div class="dtSortLis">
                <div class="dtSortLis_t">佣金奖励：</div>
                <div class="<?php echo !isset($_GET['MinLi']) || @$_GET['MinLi']=='noVal' || @$_GET['MinLi']==''?'dtSortLis_pro':'dtSortLis_proBeore';?>"><a href="<?php
                        @$GetConditionArr['MinLi']='noVal';
                        echo $this->
createUrl('site/taobaoTask',$GetConditionArr);
                    ?>">不限</a>
</div>
<ul class="dtSortList">
  <li><a <?php echo @$_GET['MinLi']==1?'class="searchOn"':'';?> href="<?php
                        $GetConditionArr['MinLi']=1;
                        echo $this->createUrl('site/taobaoTask',$GetConditionArr);
                    ?>">1-10麦粒</a></li>
  <li><a <?php echo @$_GET['MinLi']==2?'class="searchOn"':'';?> href="<?php
                        $GetConditionArr['MinLi']=2;
                        echo $this->createUrl('site/taobaoTask',$GetConditionArr);
                    ?>">11-20麦粒</a></li>
  <li><a <?php echo @$_GET['MinLi']==3?'class="searchOn"':'';?> href="<?php
                        $GetConditionArr['MinLi']=3;
                        echo $this->createUrl('site/taobaoTask',$GetConditionArr);
                    ?>">21-30麦粒</a></li>
  <li><a <?php echo @$_GET['MinLi']==4?'class="searchOn"':'';?> href="<?php
                        $GetConditionArr['MinLi']=4;
                        echo $this->createUrl('site/taobaoTask',$GetConditionArr);
                    ?>">30-40麦粒</a></li>
  <li><a <?php echo @$_GET['MinLi']==5?'class="searchOn"':'';?> href="<?php
                        $GetConditionArr['MinLi']=5;
                        echo $this->createUrl('site/taobaoTask',$GetConditionArr);
                    ?>">41麦粒以上</a></li>
</ul>
<?php @$GetConditionArr['MinLi'] = $_GET['MinLi'];?>
</div>
-->
<div class="dtSortLis">
  <div class="dtSortLis_t">任务金额<span style="color:#FF0000">(VIP)</span>：</div>
  <div class="<?php echo !isset($_GET['txtPrice']) || @$_GET['txtPrice']=='noVal' || @$_GET['txtPrice']==''?'dtSortLis_pro':'dtSortLis_proBeore';?>"><a href="<?php
                        @$GetConditionArr['txtPrice']='noVal';
                        echo $this->createUrl('site/taobaoTask',$GetConditionArr);
                    ?>">不限</a></div>
  <ul class="dtSortList">
    <li><a <?php echo @$_GET['txtPrice']==1?'class="searchOn"':'';?> href="<?php
                        $GetConditionArr['txtPrice']=1;
                        echo $this->createUrl('site/taobaoTask',$GetConditionArr);
                    ?>">0-100元</a></li>
    <li><a <?php echo @$_GET['txtPrice']==2?'class="searchOn"':'';?> href="<?php
                        $GetConditionArr['txtPrice']=2;
                        echo $this->createUrl('site/taobaoTask',$GetConditionArr);
                    ?>">101-200元</a></li>
    <li><a <?php echo @$_GET['txtPrice']==3?'class="searchOn"':'';?> href="<?php
                        $GetConditionArr['txtPrice']=3;
                        echo $this->createUrl('site/taobaoTask',$GetConditionArr);
                    ?>">201-300元</a></li>
    <li><a <?php echo @$_GET['txtPrice']==4?'class="searchOn"':'';?> href="<?php
                        $GetConditionArr['txtPrice']=4;
                        echo $this->createUrl('site/taobaoTask',$GetConditionArr);
                    ?>">301-500元</a></li>
    <li><a <?php echo @$_GET['txtPrice']==5?'class="searchOn"':'';?> href="<?php
                        $GetConditionArr['txtPrice']=5;
                        echo $this->createUrl('site/taobaoTask',$GetConditionArr);
                    ?>">501-1000元</a></li>
    <li><a <?php echo @$_GET['txtPrice']==10?'class="searchOn"':'';?> href="<?php
                        $GetConditionArr['txtPrice']=10;
                        echo $this->createUrl('site/taobaoTask',$GetConditionArr);
                    ?>">1000以上</a></li>
  </ul>
  <?php @$GetConditionArr['txtPrice'] = $_GET['txtPrice'];?>
</div>
<div class="dtSortLis">
  <div class="dtSortLis_t">收货时长<span style="color:#FF0000">(VIP)</span>：</div>
  <div class="<?php echo !isset($_GET['ddlOKDay']) || @$_GET['ddlOKDay']=='noVal' || @$_GET['ddlOKDay']==''?'dtSortLis_pro':'dtSortLis_proBeore';?>"><a href="<?php
                        @$GetConditionArr['ddlOKDay']='noVal';
                        echo $this->createUrl('site/taobaoTask',$GetConditionArr);
                    ?>">不限</a></div>
  <ul class="dtSortList">
    <li><a <?php echo @$_GET['ddlOKDay']==1?'class="searchOn"':'';?> href="<?php
                        $GetConditionArr['ddlOKDay']=1;
                        echo $this->createUrl('site/taobaoTask',$GetConditionArr);
                    ?>">立刻确认</a></li>
    <li><a <?php echo @$_GET['ddlOKDay']==2?'class="searchOn"':'';?> href="<?php
                        $GetConditionArr['ddlOKDay']=2;
                        echo $this->createUrl('site/taobaoTask',$GetConditionArr);
                    ?>">24小时确认</a></li>
    <li><a <?php echo @$_GET['ddlOKDay']==3?'class="searchOn"':'';?> href="<?php
                        $GetConditionArr['ddlOKDay']=3;
                        echo $this->createUrl('site/taobaoTask',$GetConditionArr);
                    ?>">48小时确认</a></li>
    <li><a <?php echo @$_GET['ddlOKDay']==4?'class="searchOn"':'';?> href="<?php
                        $GetConditionArr['ddlOKDay']=4;
                        echo $this->createUrl('site/taobaoTask',$GetConditionArr);
                    ?>">72小时确认</a></li>
    <li><a <?php echo @$_GET['ddlOKDay']==8?'class="searchOn"':'';?> href="<?php
                        $GetConditionArr['ddlOKDay']=8;
                        echo $this->createUrl('site/taobaoTask',$GetConditionArr);
                    ?>">根据物流</a></li>
  </ul>
  <?php @$GetConditionArr['ddlOKDay'] = $_GET['ddlOKDay'];?>
</div>
</div>
</div>
<div class="dtrw">
  <!--大厅任务-->
  <div class="dtrwCen">
    <div class="dtrwCen_t">
      <div class="rwso">
        <form action="<?php echo $this->createUrl('site/taobaoTask');?>" method="post">
          <input type="text" name="keywords" class="rwsoInp" placeholder="任务编号搜索">
          <input type="submit" class="rwsoImg" value="&nbsp">
        </form>
      </div>
      <a style="float:right; margin-right:20px;" href="javascript:window.location.href='<?php echo Yii::app()->request->url;?>';" class="rw_sx1">刷新任务</a> <a style="float:right; margin-right:20px;" href="<?php echo $this->createUrl('user/taskPublishPT');?>" class="rw_fb1">发布任务</a> </div>
  </div>
  <ul class="dtrwLis">
    <?php
                foreach($proInfo as $item){
				$myinfo=User::model()->findByPk($item->publishid);
            ?>
    <li class="taskItem">
    <div class="rebh">
      <!--<img class="payWay" width="30" src="<?php 
                        switch($item->
      payWay)
      {
      case 1://接手垫付
      echo VERSION2."/img/ykdf.jpg";
      break;
      default://平台代付
      echo VERSION2."/img/df.jpg";
      break;
      }
      ?>" lang='<?php echo $item->payWay;?>' />-->
      <!--<img class="platform" width="30" src="<?php 
                        switch($item->
      platform)
      {
      case 1:
      echo VERSION2."/img/tm.jpg";
      break;
      case 2:
      echo VERSION2."/img/jd.jpg";
      break;
      default:
      echo VERSION2."/img/1688.jpg";
      break;
      }
      ?>" lang='<?php echo $item->platform;?>' />--> <font>任务编号</font>：<span><?php echo $item->time.'*'.$item->id;?></span> <img title="<?php 
                        switch($item->BuyerJifen)
                        {
                            case 1:
                                $dj="一心";
                                break;
                            case 2:
                                $dj="二心";
                                break;
                            case 3:
                                $dj="三心";
                                break;
                            case 4:
                                $dj="四心";
                                break;
                            case 5:
                                $dj="五心";
                                break;
                            case 6:
                                $dj="一钻";
                                break;
                            case 7:
                                $dj="二钻";
                                break;
                            case 8:
                                $dj="三钻";
                                break;
                            case 9:
                                $dj="四钻";
                                break;
                            default:
                                $dj="五钻";
                                break;
                        }
                        echo "卖家要求威客买号等级在".$dj."以上";
                    ;?>"  class="BuyerJifen" lang="<?php echo $item->BuyerJifen;?>" src="<?php echo VERSION2;?>img/level/<?php echo $item->BuyerJifen;?>.gif" style="vertical-align: text-top;cursor:pointer;" /> <span style="float:right; margin-right:20px;">会员等级：<img src="<?php echo VERSION2; ?>img/newlevel/<?php echo User::getuserlevelnum($item->publishid);?>.gif" />
      <?php if( $myinfo->VipLv > 0 && $myinfo->VipStopTime > time() ){?>
      <img src="<?php echo VERSION2;?>img/newlevel/VIP.png" />
      <?php }?>
      </span> </div>
    <div class="allRw_pro"> <img src="<?php echo VERSION2;?>img/p<?php echo $item->taskCatalog==0?2:1;?>.jpg" alt="" title="<?php echo $item->taskCatalog==0?"普通任务":"来路搜索任务";?>" class="allRw_proImg" />
      <div class="allRw_pros">
        <div class="allRw_prosLis">
          <div class="allRw_pro_intr clearfix">
            <div class="allRw_pro1"> 掌柜：<span><?php echo XUtils::cutstr($item->ddlZGAccount,4)."***";?></span>
              <!--掌柜个人信息-->
              <?php
                                        
                                        //好评
                                        $hp=Appraise::model()->findAllByAttributes(array(
                                            'uid'=>$item->publishid,
                                            'status'=>2
                                        ));
                                        //中评
                                        $zp=Appraise::model()->findAllByAttributes(array(
                                            'uid'=>$item->publishid,
                                            'status'=>1
                                        ));
                                        //差评
                                        $cp=Appraise::model()->findAllByAttributes(array(
                                            'uid'=>$item->publishid,
                                            'status'=>0
                                        ));
                                        //被拉黑名单次数
                                        $countBlack=Myblackerlist::model()->findAllByAttributes(array(
                                            'blackerusername'=>$myinfo->Username
                                        ));
                                    ?>
              <div class="person-info">
                <ul>
                  <li class="xf_name" title="经验值越高，代表会员越熟悉任务流程">经验：<b><?php echo $myinfo->Experience;?></b><span>好评率：<b>
                    <?php
                                            if((count($zp)+count($cp))==0)
                                            {
                                                echo "100%";
                                            }
                                            else{
                                                echo (count($hp)/(count($zp)+count($cp)))."%";
                                            }
                                          ?>
                    </b></span></li>
                  <li class="xf_hzc"><span class="hp">好评：<b><?php echo count($hp);?></b></span><span class="zp">中评：<b><?php echo count($zp);?></b></span><span class="cp">差评：<b><?php echo count($cp);?></b></span></li>
                  <li class="xf_hmd">已被<b><?php echo count($countBlack);?></b>人加入黑名单<a class="jh_btn button border-blue jrhmd" href="<?php echo $this->createUrl('user/userBlackAccountList');?>" target="_blank">加入黑名单</a></li>
                </ul>
              </div>
            </div>
            <ul class="othallRw_pro clearfix">
              <li title="在拍下商品并支付后，<?php echo $item->ddlOKDay*24==0?"立即":"在".($item->ddlOKDay*24)."小时后";?>且物流信息显示已签收后确认收货五星好评！"> 收货时长： <span> 
			  <?php
			  	if($item->ddlOKDay == 8)
				{
				echo '根据物流';
				}else{
			  	 echo $item->ddlOKDay*24==0?"立即":($item->ddlOKDay*24)."小时立即";
				}
			  ?> 
			  </span> 五星好评 </li>
              <li title="平台担保：此任务卖家已缴纳全额担保存款，接手可放心购买，任务完成后，买家平台账号自动获得相应存款"> 任务金额：<span><?php echo $item->txtPrice;?></span>元&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;任务佣金： <span><?php echo $item->yongjin_money;?></span>元 </li>
              <!--<li title="完成任务后，您能获得的任务奖励，可兑换成RMB">
                                    悬赏麦粒： <span><?php echo $item->
              MinLi;?></span>个
              </li>
              -->
            </ul>
          </div>
          <div class="allRw_proLink">
            <?php
                                    if($item->isLimitCity)
									{
										if(intval($item->Province) > 0)
										{
											$areaInfo = Area::model()->findByPk($item->Province);
											if($item->is_xzqx_type == 2)
											{
											    $bzStr = 'style="text-decoration:line-through;"';
											}else{
											    $bzStr = '';
											}
											echo '<a '.$bzStr.' >'.$areaInfo->name.'</a>';
										}else{
                                        	echo '<a style="border-color:red; color:red;">'.$item->Province.'</a>';
										}
									}
                                    if($item->isMobile)
                                        echo '<a>手机</a>';
                                    if($item->isSign)
                                        echo '<a>真签</a>';
									if($item->cbxIsAddress)
										echo '<a>地址</a>';
                                    if($item->isReal)
                                        echo '<a>实名</a>';
                                    if($item->cbxIsWW)
                                        echo '<a>旺聊</a>';
                                    if($item->stopDsTime)
                                        echo '<a>停留</a>';
                                    if($item->cbxIsLHS)
                                        echo '<a>旺收</a>';
                                    if($item->cbxIsMsg)
                                        echo '<a>评语</a>';
                                    {
                                        $itemImg=$item->taskerSCImg!=""?$item->taskerSCImg:"";
                                        echo '<a class="bueryImg" alt="'.$itemImg.'">收藏</a>';
                                    }
                                    if($item->isViewEnd)
                                    {
                                        $itemImg=$item->taskerBottomImg!=""?$item->taskerBottomImg:"";
                                        echo '<a class="bueryImg" alt="'.$itemImg.'">底图</a>';
                                    }
                                    if($item->txtSearchDes)
                                    {
                                        echo '<a alt="'.$item->txtSearchDes.'" title="'.$item->txtSearchDes.'">提示</a>';
                                    }
                                    if($item->txtRemind)
                                    {
                                        echo '<a alt="'.$item->txtRemind.'" title="'.$item->txtRemind.'">留言</a>';
                                    }
                                ?><a class="bueryImg" alt="<?php echo $item->taskerHPingImg!=""?$item->taskerHPingImg:"";?>">评图</a> </div>
        </div>
      </div>
      <?php
					   //查看此会员是否申请过此任务
					   if(Yii::app()->user->getId())
					   {
					       $aTinfo = Usertasklist::model()->findByAttributes( array('task_id' => $item->id, 'uid' => Yii::app()->user->getId(), 'state' => 0));
					   }
					   if(isset($aTinfo) && $aTinfo->id > 0)
					   {
					       //获取卖家家的信息
					       $sellerInfo = User::model()->findByPk($item->publishid);  
					?>
      <table cellpadding="5">
        <tr>
          <td><a href="javascript:;" style="top:0px;" class="qcrw" lang="<?php echo $item->id;?>" alt="<?php echo $item->publishid;?>">等待审核</a></td>
        </tr>
        <tr>
          <td align="center" valign="middle"><?php if($sellerInfo && $aTinfo->state == 0){?>
            <img style="margin-left:20px; margin-top:10px;" style="CURSOR: pointer" onclick="javascript:window.open('http://b.qq.com/webc.htm?new=0&sid=<?php echo $sellerInfo->QQToken;?>&o=联系卖家&q=7', '_blank', 'height=502, width=644,toolbar=no,scrollbars=no,menubar=no,status=no');"  border="0" SRC=http://wpa.qq.com/pa?p=1:<?php echo $sellerInfo->QQToken;?>:1 alt="请及时联系商家QQ，并将您的旺旺号等级信息截图给商家，以便更快被审核" title="请及时联系商家QQ，并将您的旺旺号等级信息截图给商家，以便更快被审核"> <?php echo $sellerInfo->QQToken;?>
            <?php }?>
          </td>
        </tr>
      </table>
      <?php }else{?>
      <a href="javascript:;" class="qcrw taskTask" lang="<?php echo $item->id;?>" alt="<?php echo $item->publishid;?>">立即申请</a>
      <?php }?>
    </div>
    </li>
    <?php }?>
  </ul>
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
</div>
<!--大厅任务 end-->
<!--layer插件-->
<script src="<?php echo ASSET_URL;?>layer/jquery.min.js"></script>
<script src="<?php echo ASSET_URL;?>layer/layer.js"></script>
<script src="<?php echo ASSET_URL;?>layer/laycode.min.js"></script>
<link href="<?php echo ASSET_URL;?>layer/layer.css" rel="stylesheet" type="text/css" />
<script>
        $(function(){
            //选手抢任务
            $(".taskTask").click(function(){
                var taskid=$(this).attr("lang");//任务id
                if($(this).attr("alt")==<?php echo Yii::app()->user->getId()==true?Yii::app()->user->getId():"'noLogin'";?>)
                {
                    //询问框
                	layer.confirm('您不能接自己的任务', {
                		btn: ['确定'] //按钮
                	});
                }
                else{
                    $.ajax({
            			type:"POST",
            			url:"<?php echo $this->createUrl('site/takeTask');?>",
            			data:"checkBase=DOIT&taskId="+taskid,
            			success:function(msg)
            			{
       			              
            				if(msg=="GUEST")//没有登录，提示登录
                            {
                                //询问框
                            	layer.confirm('您还没有登录，请先登录', {
                            		btn: ['立即登录'] //按钮
                            	}, function(){
                            		window.location.href="<?php echo $this->createUrl('passport/login');?>";
                            	});
                            }else if(msg == "USER_DAY_TASK_LIMIT"){
							  <?php
							  	$ptConfig = Config::model()->findByPk(1);
							  ?>
								layer.confirm('<span style="color:red;">每日最多可接<?php echo $ptConfig->buyertaskmaxnum;?>任务，请明日再来继续接任务！</span>', {
                                            		btn: ['知道了'] //按钮
                                });						
							}else if(msg == "ADDRESS_NO_PIPEI"){
								layer.confirm('<span style="color:red;">您不符合条件！</span>', {
                                            		btn: ['知道了'] //按钮
                                });
							}else if(msg == "ten_day_cftask"){
								 layer.confirm('<span style="color:red;">您10天内做过该会员的任务，不能再次申请他的任务。</span>', {
									btn: ['知道了'] //按钮
								});
							}else  if(msg=="NOBUYSER")//没有绑定买号，去绑定
                            {
                                //询问框
                            	layer.confirm('您还没有符合条件的买号或买号未通过审核，去绑定吗？', {
                            		btn: ['确定','取消'] //按钮
                            	}, function(){
                            		window.location.href="<?php echo $this->createUrl('user/taobaoBindBuyer');?>";
                            	});
                            }else if(msg == 'EXAM_NOT_PASS'){
							//询问框
                            	layer.confirm('您还没有通过新手考试，现在去考试吗？', {
                            		btn: ['确定','取消'] //按钮
                            	}, function(){
                            		window.location.href="<?php echo $this->createUrl('user/userExam');?>";
                            	});
							
							}else if(msg == 'NO_ALIPAY_ACCOUNT'){
                            	//询问框
                            	layer.confirm('您还没有绑定收款支付宝账号，去绑定吗？', {
                            		btn: ['确定','取消'] //按钮
                            	}, function(){
                            		window.location.href="<?php echo $this->createUrl('user/userAccountCenter');?>";
                            	});
                            }else if(msg == 'NO_USER_ADDRESS'){
                            	//询问框
                            	layer.confirm('您还没有绑定刷单地址，去绑定吗？', {
                            		btn: ['确定','取消'] //按钮
                            	}, function(){
                            		window.location.href="<?php echo $this->createUrl('user/userAccountCenter');?>";
                            	});
                            }else if(msg == 'NO_JOIN_PL'){
								//询问框
                            	layer.confirm('您还没有加入商保，请先加入商保', {
                            		btn: ['确定'] //按钮
                            	}, function(){
                            		window.location.href="<?php echo $this->createUrl('user/userSBcenter');?>";
                            	});
							}
                            else//相应买号供选择并且去绑定且返回绑定结果
                            {
                                //询问框
                            	layer.confirm(msg, {
                            		btn: ['确定','取消'] //按钮
                            	}, function(){//任务绑定接手选择的旺旺
                            	    $.ajax({
                            			type:"POST",
                            			url:"<?php echo $this->createUrl('site/takeTask');?>",
                            			data:{"taskerWangwang":$('input:radio[name="buyerSelected"]:checked').val(),"taskid":taskid},
                            			success:function(msg)
                            			{
                            				if(msg=="SUCCESS")//绑定成功
                                            {
                                                //询问框
                                            	layer.confirm('<span style="color:red;">申请成功！<br/>建议您将买号交易情况通过QQ截图发给商家，这样有助于商家尽快审核。</span>', {
                                            		btn: ['我知道了，去查看任务'] //按钮
                                            	}, function(){
                                            		window.location.href="<?php echo $this->createUrl('site/taobaoTask');?>";
                                            	});
                                            }else if(msg == 'ID_INFO_BE_EMPTY'){
												//询问框
                                            	layer.confirm('<span style="color:red;">必须完善身份证信息才能接单！</span>', {
                                            		btn: ['现在去完善','知道了'] //按钮
                                            	},function(){
                                            	   location.href="<?php echo $this->createUrl('user/userAccountCenter');?>";
                                            	});
											}else if(msg == 'ID_NOT_CHECK'){
												layer.confirm('<span style="color:red;">您的身份证信息未通过审核，暂时不能接单，请联系客服进行审核！</span>', {
                                            		btn: ['知道了'] //按钮
                                            	});
											}else if(msg == 'NO_binding_ADDRESS'){
                                            	//询问框
                                            	layer.confirm('<span style="color:red;">接手必须绑定收货地址才能接任务！</span>', {
                                            		btn: ['现在去绑定','知道了'] //按钮
                                            	},function(){
                                            	   location.href="<?php echo $this->createUrl('user/userAccountCenter');?>";
                                            	});
                                            }
                                            else if(msg=="NOJoinProtectPlan"){//没有加入商保
                                                //询问框
                                            	layer.confirm('<span style="color:red;">接手必须加入商保才能接任务，您还没有加入商保</span>', {
                                            		btn: ['现在去加入商保','知道了'] //按钮
                                            	},function(){
                                            	   location.href="<?php echo $this->createUrl('user/userSBcenter');?>";
                                            	});
                                            }else if(msg == 'ALLOW_GET_300'){
                                            	layer.confirm('<span style="color:red;">您的账户余额不能申请此任务，规则如下：<br/>a)余额150金币以下，可接300元以内的任务；<br/>b)余额150-1000金币，可接余额2倍金额以内的任务；<br/>c)余额1000金币以上，可接任意金额任务。<br/></span>', {
                                            		btn: ['知道了'] //按钮
                                            	});
                                            }else if(msg == 'ALLOW_GET_1000'){
                                            	layer.confirm('<span style="color:red;">您的账户余额不能申请此任务，规则如下：<br/>a)余额150金币以下，可接300元以内的任务；<br/>b)余额150-1000金币，可接余额2倍金额以内的任务；<br/>c)余额1000金币以上，可接任意金额任务。<br/></span>', {
                                            		btn: ['知道了'] //按钮
                                            	});
                                            }else if(msg=="NOBuyerJifen"){//等级不符合要求
                                                layer.confirm('<span style="color:red;">您选择的买号等级没有达到该任务的要求</span>', {
                                            		btn: ['知道了'] //按钮
                                            	});
                                            }else if(msg=="NOProvince"){//不符合任务的区域要求
                                                layer.confirm('<span style="color:red;">您所在的区域不符合该任务的区域要求</span>', {
                                            		btn: ['知道了'] //按钮
                                            	});
                                            }else if(msg=="INBlack"){
                                                layer.confirm('<span style="color:red;">你在该商家的黑名单中，无法接其任务</span>', {
                                            		btn: ['知道了'] //按钮
                                            	});
                                            }else if(msg=="TASKSTOP")//任务被商家暂停
                                            {
                                                //询问框
                                            	layer.confirm('亲，此任务刚被商家暂停，抢接它任务吧', {
                                            		btn: ['确定'] //按钮
                                            	},function(){
                                            	   location.reload();//重新刷新当前页面
                                            	});
                                            }else if(msg == "ACCEPT_NUM_MAX"){
                                            	layer.confirm('<span style="color:red;">您已有5个任务正在等待审核，请稍后再申请！</span>', {
                                            		btn: ['知道了'] //按钮
                                            	});
                                            }
                                            else//绑定失败
                                            {
                                                //询问框
                                            	layer.confirm('买号绑定失败，请联系客服人员', {
                                            		btn: ['确定'] //按钮
                                            	});
                                            }
                            			}
                            		});
                            	});
                            }
            			}
            		});
                }
            });
        })
    </script>
<script>
		function myrefresh()
		{
			   window.location.reload();
		}
        $(function(){
			<?php
				if(empty($_GET['page']) || intval($_GET['page']) == 1){
			?>
			//setTimeout('myrefresh()',10000); //指定1分钟刷新一次 
			<?php }?>
            //垫付或者平台代付提示
            $(".payWay").click(function(){
                if($(this).attr("lang")==1)
                {
                    layer.confirm('此任务为<a href="javascript:;" style="color:red;">全程垫付</a>，等任务结束后垫付金额与佣金将到达您的帐户中。<a href="javascript:;" style="color:red;">[全程垫付详情介绍]</a>', {
                    	btn: ['知道了'] //按钮
                    });
                }
                 
                if($(this).attr("lang")==2)
                {
                    layer.confirm('此任务为<a href="javascript:;" style="color:red;">平台代付</a>，等任务结束佣金将到达您的帐户。<a href="javascript:;" style="color:red;">[平台详情介绍]</a>', {
                    	btn: ['知道了'] //按钮
                    });
                }
            });
            
            //所属平台提示
            $(".platform").click(function(){
                if($(this).attr("lang")==1)
                {
                    layer.confirm('此任务为<a href="javascript:;" style="color:red;">淘宝任务</a>', {
                    	btn: ['知道了'] //按钮
                    });
                }
                 
                if($(this).attr("lang")==2)
                {
                    layer.confirm('此任务为<a href="javascript:;" style="color:red;">京东任务</a>', {
                    	btn: ['知道了'] //按钮
                    });
                }
                 
                if($(this).attr("lang")==3)
                {
                    layer.confirm('此任务为<a href="javascript:;" style="color:red;">阿里巴巴任务</a>', {
                    	btn: ['知道了'] //按钮
                    });
                }
            });
            
            //接手等级要求提示
            $(".BuyerJifen").click(function(){
                var dj;
                switch(parseInt($(this).attr("lang")))
                {
                    case 1:
                        dj="一心";
                        break;
                    case 2:
                        dj="二心";
                        break;
                    case 3:
                        dj="三心";
                        break;
                    case 4:
                        dj="四心";
                        break;
                    case 5:
                        dj="五心";
                        break;
                    case 6:
                        dj="一钻";
                        break;
                    case 7:
                        dj="二钻";
                        break;
                    case 8:
                        dj="三钻";
                        break;
                    case 9:
                        dj="四钻";
                        break;
                    default:
                        dj="五钻";
                        break;
                }
                layer.confirm('此任务对威客帐号等级要求为：<a href="javascript:;" style="color:red;">'+dj+'以上</a>', {
                	btn: ['知道了'] //按钮
                });
            });
        })
    </script>
