<div id="product" class="div">
        <?php
        $this->renderPartial('/user/taskPublishNav');//加载发布任务公共导航
    ?>
    <div id="product_main" class="product_con" data-step="2" data-intro="在这里，输入您的商品基本信息">
      <ul class="pmm">
        <li style="display:block;" class="lili">
          <div class="drw">
            <div class="pt"> <span class="h40"> <img class="h41" src="<?php echo VERSION2;?>taskcss/blue.png" alt="">商品信息： </span> <!--<span class="h40" style="margin-left: 25px;"><a href="http://www.milioo.com/article/sell/122Q02015.html" target="_blank" style="color: red;font-size: 15px;">查看签收积分计算规则</a></span>--> </div>
            <!--来路任务不同与普通任务不同部分-->
            <div class="product_content1">
              <ul class="dowebok">
			  <li class="s38" style="width:176px;" title="选择您的淘宝掌柜名">
                    <img src="<?php echo VERSION2;?>taskcss/c12.jpg" alt="">淘宝掌柜名：
                </li>
                <li class="s34 right">
                  <select class="ui-select zhsr" id="ddlZGAccount" name="ddlZGAccount">
                    <?php
                        foreach($sellerInfo as $item){
                    ?>
                    <option <?php if($taskInfo->ddlZGAccount == $item->wangwang ){ ?> selected="selected" <?php }?>  value="<?php echo $item->wangwang;?>"><?php echo $item->wangwang;?></option>
                    <?php }?>
                  </select>
                </li>
				</ul>
				<ul class="dowebok">
				<li class="s35" title="使用您保存的模板快速读取相关数据">使用任务模板：</li>
                <li class="s36">
                  <select id="ddlTemplate" onchange="changeTpl(this.value, 0);" name="ddlTemplate" class="ui-select zhsr">
                    <option value="0">请选择模板</option>
                    <?php
                        if(isset($tplList))
                        {
                            foreach ($tplList as $k => $v)
                            {
                        ?>
                    <option value="<?php echo $v->id;?>"><?php echo $v->tplTo;?></option>
                    <?php
                            }
                        }
                    ?>
                  </select>
                </li>
				</ul>
				<ul class="dowebok">
                <li class="s38" style="width:176px;" title="请选择操作平台">
                    <img src="<?php echo VERSION2;?>taskcss/c12.jpg" alt="">任务操作平台：
                </li>
                <li>
				 <li class="s39 searchway" >
                  <input type="radio" <?php if($taskInfo->operate_pt == 1){ ?> checked="checked"  <?php }?>  name="operate_pt" value="1"  />电脑</li>
                  <li class="s40 searchway" >
                  <input type="radio" <?php if($taskInfo->operate_pt == 2){ ?> checked="checked"  <?php }?> name="operate_pt"  value="2"  />手机 </li>
                </li>
				</ul>
				<ul class="dowebok">
                <li class="s38" style="width:176px;" title="请选择所属平台">
                    <img src="<?php echo VERSION2;?>taskcss/c12.jpg" alt="">任务所属平台：
                </li>
                <li>
				<li class="s39 searchway" >
                  <input <?php if($taskInfo->platform == 1){ ?> checked="checked"  <?php }?> type="radio" name="platform" value="1"  />淘宝</li>
				  <li class="s39 searchway" >
                  <input <?php if($taskInfo->platform == 2){ ?> checked="checked"  <?php }?> type="radio" name="platform"  value="2"  />京东</li>
				  <li class="s39 searchway" >
                  <input <?php if($taskInfo->platform == 3){ ?> checked="checked"  <?php }?> type="radio" name="platform" value="3"  />阿里巴巴</li>
				  <input type="hidden" name="payWay" value="1" />
                </li>
				</ul>
				<ul class="dowebok">
                <li class="s35" title="要求接手使用什么方式搜索进店">进店方式：</li>
                <li class="s39 searchway" title="要求接手搜索商品进店">
                  <input type="radio" name="visitWay" <?php if($taskInfo->visitWay == 1){ ?> checked="checked"  <?php }?> value="1">
                  搜商品 </li>
                <li class="s40 searchway" title="要求接手搜索店铺名进店">
                  <input type="radio" <?php if($taskInfo->visitWay == 2){ ?> checked="checked"  <?php }?> name="visitWay" value="2">
                  搜店铺 </li>
                <li class="s40 searchway" title="要求接手搜索直通车广告进店">
                  <input type="radio" <?php if($taskInfo->visitWay == 3){ ?> checked="checked"  <?php }?>  name="visitWay" value="3">
                  直通车</li>
                <li class="s40 s41 searchway" title="要求接手通过信用评价地址进店">
                  <input type="radio" <?php if($taskInfo->visitWay == 4){ ?> checked="checked"  <?php }?> name="visitWay" value="4">
                  其他</li>
               <!-- <li class="h32"><span>支付 <font class="pdfo">1.0</font> 个签收积分</span></li>-->
              </ul>
			  <!--<ul class="dowebok">
			  	<li class="s35" ><img src="<?php echo VERSION2;?>taskcss/c12.jpg" alt="">搜索关键字：</li>
                <li class="s34">
                  <input type="text" id="txtDes" name="divKey" class="pc11 inputp s36_ts" placeholder="搜索此关键词进店" datatype="*" nullmsg="请填写搜索关键字" errormsg="请填写搜索关键字" />
                </li>
			  </ul>-->
			  <ul class="dowebok">
			  	<li class="s35" >提示：</li>
                <li class="s34">
                  <input style="width:400px;" type="text" name="txtSearchDes" id="txtSearchDes" class="pc11 inputp s36_ts" placeholder="如：天猫搜索关键字“女装”搜索结果在第三页第五排" datatype="*" nullmsg="请填写搜索提示" errormsg="请填写搜索提示" value="<?php echo $taskInfo->txtSearchDes;?>" />
                </li>
			  </ul>
            <div class="product_content2">
              <input type="hidden" name="task_type" value="2">
              <ul class="pc1">
                <li class="s35" id="divkey">商品位置截图：</li>
                <li>
					<input type="hidden" name="task_type" value="1" />
                    <input type="text"  value="<?php  echo  $taskInfo->goodsImgPosition; ?>" id="url3" name="goodsImgPosition" class="pc11 inputp s36_ts" readonly="readonly" placeholder="上传商品位置截图" style="background: #F0F0F0;" /> <input type="button" id="image3" value="选择图片" style="font-weight: normal; background:#3498db; color:#fff; width: 70px; height:30px; font-size:12px;" /><span id="imagewarning" style="color: green; padding-left:10px;"></span>
                </li>
              </ul>
            </div>
			<ul class="dowebok">
                <li class="s38" style="width:176px;" title="请选择所属平台">
                    <img src="<?php echo VERSION2;?>taskcss/c12.jpg" alt="">要求确认时间：
                </li>
                <li>
				<li class="s39 searchway" ><input type="radio" <?php if($taskInfo->ddlOKDay == 0){ ?> checked="checked"  <?php }?>  name="ddlOKDay"  value="0"  />立即确认</li>
				<li class="s39 searchway" ><input type="radio" <?php if($taskInfo->ddlOKDay == 1){ ?> checked="checked"  <?php }?>  name="ddlOKDay"  value="1"  />24小时后</li>
				<li class="s39 searchway" ><input type="radio" <?php if($taskInfo->ddlOKDay == 2){ ?> checked="checked"  <?php }?>  name="ddlOKDay"  value="2"  />48小时后</li>
				<li class="s39 searchway" ><input type="radio" <?php if($taskInfo->ddlOKDay == 3){ ?> checked="checked"  <?php }?>  name="ddlOKDay"  value="3"  />72小时后</li>
				<!--<li class="s39 searchway" ><input type="radio" name="ddlOKDay"  value="4"  />96小时</li>
				<li class="s39 searchway" ><input type="radio" name="ddlOKDay"  value="5"  />120小时</li>
				<li class="s39 searchway" ><input type="radio" name="ddlOKDay"  value="6"  />144小时</li>
				<li class="s39 searchway" ><input type="radio" name="ddlOKDay"  value="7"  />168小时</li>-->
				<li class="s39 searchway" ><input type="radio" <?php if($taskInfo->ddlOKDay == 8){ ?> checked="checked"  <?php }?>  name="ddlOKDay"  value="8"  />根据物流</li>
				</ul>
				<ul class="dowebok">
			  	<li class="s35" ><img src="<?php echo VERSION2;?>taskcss/c12.jpg" alt="">商品链接地址：</li>
                <li class="s34">
                 <select required="required" name="txtGoodsUrl" class="ui-select zhsr">
						<?php
							if(isset($linkUrl))
							{
								foreach($linkUrl as $k => $v){
						?>
							<option <?php if( intval($taskInfo->goods_link_id) == $v->id){?> selected="selected" <?php }?> value="<?php echo $v->id;?>"><?php echo $v->goods_name;?></option>
						<?php
								}
							}
						?>
					</select>
                </li>
			  </ul>
			  <ul class="dowebok">
			  	<li class="s35" ><img src="<?php echo VERSION2;?>taskcss/c12.jpg" alt="">商品金额：</li>
                <li class="s34">
                  <input value="<?php  echo $taskInfo->txtPrice;?>"  style="margin-left:25px;" type="text" name="txtPrice" id="txtPrice" class="pc11 inputp s36_ts" placeholder="" datatype="/^-?[1-9]+(\.\d+)?$|^-?0(\.\d+)?$|^-?[1-9]+[0-9]*(\.\d+)?$/" nullmsg="请填写商品价格" errormsg="请填写商品价格" />
                </li>
			  </ul>
			  <ul class="dowebok">
			  	<li class="s35" ><img src="<?php echo VERSION2;?>taskcss/c12.jpg" alt="">佣金金额：</li>
                <li class="s34"><input value="<?php echo $taskInfo->yongjin_money;?>" type="text" name="yongjin_money" id="yongjin_money" style="width:63px;" class="pc11 inputp s36_ts" placeholder="" datatype="/^-?[1-9]+(\.\d+)?$|^-?0(\.\d+)?$|^-?[1-9]+[0-9]*(\.\d+)?$/" nullmsg="请填写佣金金额" errormsg="请填写佣金金额" />
                </li>
			  </ul>
            <div style="clear:both;"></div>
          </div>
        </li>
      </ul>
      <div style="clear:both;"></div>
    </div>
  </div>
  <div id="server" class="span6" data-step="3" data-intro="选择您想要的增值服务，这样能增加安全性">
    <div class="pt"> <span class="h40"> <img class="h41" src="<?php echo VERSION2;?>taskcss/blue.png" alt="">任务要求： </span> </div>
    <div class="pd">
      <ul class="pdul" style="margin-top:15px;">
        <li>
          <div id="a1" lang="1" alt="0" class="nulldiv" title="在拍下商品前使用旺旺或旺信与商家聊天" <?php if($taskInfo->cbxIsWW){ ?> style="background-position: -122px 0px;" <?php }?> ></div>
          <input type="hidden" name="cbxIsWW" id="aa1" value="<?php echo $taskInfo->cbxIsWW; ?>"/>
        </li>
        <!--<li class="pdli"><span>支付<font class="pdfo">1.0</font>个签收积分</span></li>-->
        <li>
          <div id="a2" lang="2" alt="0" class="nulldiv" title="收藏商家发布的商品" <?php if($taskInfo->shopcoller){ ?> style="background-position: -122px -34px;" <?php }?> ></div>
          <input type="hidden" name="shopcoller" id="aa2" value="<?php echo $taskInfo->shopcoller;?>">
        </li>
		<li>
          <div id="a10" lang="10" alt="0" class="nulldiv" title="在商品页面停留相应时间，卖家可使用量子查看接手是否达标" <?php if($taskInfo->stopDsTime){ ?> style="background-position: -122px -306px;" <?php }?>></div>
          <input type="hidden" name="stopDsTime" id="aa10" value="<?php echo $taskInfo->stopDsTime;?>">
        </li>
		<li>
          <div id="a9" lang="8" alt="0" class="nulldiv" title="接手确认收货好评时需要上传的好评图片" <?php if($taskInfo->pinimage){ ?> style="background-position: -122px -238px;" <?php }?>></div>
          <input type="hidden" name="pinimage" id="aa9" value="<?php echo $taskInfo->pinimage;?>">
        </li>
		<li>
          <div id="a21" lang="21" alt="0" <?php if($taskInfo->isSign){ ?> style="background-position: -122px -680px;" <?php }?> class="nulldiv" title="真实签收"></div>
          <input type="hidden" name="isSign" id="aa21" value="<?php echo $taskInfo->isSign;?>" />
        </li>
      </ul>
      <ul class="pdul">
        <li>
          <div id="a11" <?php if($taskInfo->cbxIsMsg){ ?> style="background-position: -122px -374px;" <?php }?>  lang="12" alt="0" class="nulldiv" title="规定好评内容。如：衣服质量很好，穿着舒适"></div>
          <input type="hidden" name="cbxIsMsg" id="aa11" value="<?php echo $taskInfo->cbxIsMsg;?>">
        </li>
        <li class="pdlli12">
          <input id="hpnr" type="text" class="inputp" name="txtMessage" value="<?php echo $taskInfo->txtMessage;?>" placeholder="如果需要接手方带字好评请勾选，并填写规定好评内容。不勾选则默认不带字好评">
          <!--支付<font class="pdfo">0.5</font>个签收积分--></li>
      </ul>
      <ul class="pdul">
        <li>
          <div id="a12" lang="13" alt="0" class="nulldiv" <?php if($taskInfo->cbxIsTip){ ?> style="background-position: -122px -408px;" <?php } ?> title="留言提醒接手需要注意的地方，或写暗语。但切勿以此增加要求并要挟接手，否则将予以惩罚"></div>
          <input type="hidden" name="cbxIsTip" id="aa12" value="<?php echo $taskInfo->cbxIsTip;?>">
        </li>
        <li class="pdlli13">
          <input type="text" id="lytx" class="inputp" value="<?php echo $taskInfo->txtRemind;?>"  name="txtRemind" placeholder="在此给接手留言提醒注意事项。也可写暗语让您不用登陆平台都知道是刷手">
        </li>
      </ul>
	  
	  <ul class="pc1">
        <li>
          <div id="a23" lang="23" alt="0" class="nulldiv" title="规定接手拍下商品时使用的地址" <?php if($taskInfo->cbxIsAddress){ ?> style="background-position: -122px -748px;" <?php } ?>></div>
          <input type="hidden" name="cbxIsAddress" id="aa23" value="<?php echo $taskInfo->cbxIsAddress ;?>">
        </li>
        <li class="h97">姓名：
          <input type="text" name="cbxName" id="cbxName" class="shdz pc11 inputp" value="<?php echo $zdAddress[0] ;?>">
        </li>
        <li class="h97">手机：
          <input type="text" name="cbxMobile" id="cbxMobile" class="pc11 inputp shdz" onkeyup="this.value=this.value.replace(/[^0-9-]+/,&#39;&#39;);" maxlength="11" value="<?php echo $zdAddress[1] ;?>">
        </li>
        <li class="h97">邮编：
          <input type="text" name="cbxcode" id="cbxcode" class="pc11 inputp shdz" value="<?php echo $zdAddress[2] ;?>">
        </li>
        <!--<li class="s33"><span>支付<font class="pdfo">0.5</font>个签收积分</span></li>-->
      </ul>
      <div class="address1">
        <div class="add1"> 地址： </div>
        <textarea name="cbxAddress" cols="45" id="cbxAddress" rows="6" class="texta shdz" placeholder="此处填写您要求接收人的修改的收货地址，包含具体省、市、区及详细地址，请不要填写“请带字好评”等引导的文字。"><?php echo $zdAddress[3] ;?></textarea>
      </div>
    </div>
  </div>
  <div style="height:230px;" id="screen" data-step="4" data-intro="筛选出您想要的接手（接手人）">
    <div class="pt"> <span class="h40"> <img class="h41" src="<?php echo VERSION2;?>taskcss/blue.png" alt="">筛选接手： </span> </div>
    <div class="scmain">
          <input type="hidden" name="cbxIsAudit" value="1" />
          <input type="hidden" name="isReal" value="1" />
          <input type="hidden" name="cbxIsSB" value="1" />
		  <input type="hidden" name="filtertasker" value="0">
      <ul class="pdul">
        <li>
          <div id="a17" lang="17" alt="0" class="nulldiv" title="限制接手一定时限内接手任务数" <?php if($taskInfo->cbxIsFMaxMCount){ ?> style="background-position: -122px -544px;" <?php } ?> ></div>
          <input type="hidden" name="cbxIsFMaxMCount" id="aa17" value="<?php echo $taskInfo->cbxIsFMaxMCount; ?>">
        </li>
        <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;日不超<input id="task_num_day" onchange="checkTaskNum(this.value,'task_num_day')"  type="text"  class="pc11 inputp s36_ts"   style="width:50px;"  name="fmaxmc_d" value="<?php if(isset($fmaxmc[0])) echo $fmaxmc[0]; ?>" />(>=2)单&nbsp;&nbsp;&nbsp;</li>
        <li>周不超<input onchange="checkTaskNum(this.value,'task_num_w')" id="task_num_w"  type="text"  class="pc11 inputp s36_ts"   style="width:50px;"  name="fmaxmc_w" value="<?php if(isset($fmaxmc[1])) echo $fmaxmc[1]; ?>" />(>=5)单 </li>
        <li>&nbsp;&nbsp;&nbsp;月不超<input onchange="checkTaskNum(this.value,'task_num_month')" id="task_num_month" type="text"  class="pc11 inputp s36_ts"   style="width:50px;"  name="fmaxmc_m" value="<?php if(isset($fmaxmc[2])) echo $fmaxmc[2]; ?>" />(>=10)单 </li>
      </ul>
      <ul class="pdul">
        <li>
          <div id="a18" lang="18" alt="0" class="nulldiv" title="指定地区的接手方可接手任务" <?php if($taskInfo->isLimitCity){ ?> style="background-position: -122px -578px;" <?php } ?>></div>
          <input type="hidden" name="isLimitCity" id="aa18" value="<?php echo $taskInfo->isLimitCity; ?>">
        </li>
		<li class="h97">
          <input type="radio" <?php if($taskInfo->is_xzqx_type == 1){ ?> checked="checked"  <?php }?> name="is_xzqx_type" value="1" />指定 <input <?php if($taskInfo->is_xzqx_type == 2){ ?> checked="checked"  <?php }?> type="radio" name="is_xzqx_type" value="2" />排除
        </li>
        <li class="h97">
          <select style="float:left;" id="Province" name="Province" class="ui-select zhsr">
            <?php 
				foreach($area as $k => $v){
			?>
				<option <?php if($taskInfo->Province == $v['id']){ ?> selected="selected" <?php }?> value="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></option>
			<?php
				}
			?>
          </select>
        </li>
      </ul>
      <ul class="pdul">
        <li>
          <div id="a19" lang="19" alt="0" class="nulldiv" title="指定接手买号的等级" <?php if($taskInfo->isBuyerFen){ ?> style="background-position: -122px -612px;" <?php } ?> ></div>
          <input type="hidden" name="isBuyerFen" id="aa19" value="<?php echo $taskInfo->isBuyerFen;?>">
        </li>
        <li class="h34">
          <select name="BuyerJifen" id="BuyerJifen" class="ui-select zhsr">
            <option <?php if($taskInfo->BuyerJifen == 1){ ?> selected="selected" <?php }?> value="1">一心及以上  <!--（支付 0.5 签收积分）--></option>
            <option <?php if($taskInfo->BuyerJifen == 2){ ?> selected="selected" <?php }?> value="2">二心及以上  <!--（支付 1.0 签收积分）--></option>
            <option <?php if($taskInfo->BuyerJifen == 3){ ?> selected="selected" <?php }?> value="3">三心及以上  <!--（支付 2.0 签收积分）--></option>
            <option <?php if($taskInfo->BuyerJifen == 4){ ?> selected="selected" <?php }?> value="4">四心及以上  <!--（支付 3.0 签收积分）--></option>
            <option <?php if($taskInfo->BuyerJifen == 5){ ?> selected="selected" <?php }?> value="5">五心及以上  <!--（支付 4.0 签收积分）--></option>
            <option <?php if($taskInfo->BuyerJifen == 6){ ?> selected="selected" <?php }?> value="6">一钻及以上  <!--（支付 5.0 签收积分）--></option>
            <option <?php if($taskInfo->BuyerJifen == 7){ ?> selected="selected" <?php }?> value="7">二钻及以上  <!--（支付 6.0 签收积分）--></option>
            <option <?php if($taskInfo->BuyerJifen == 8){ ?> selected="selected" <?php }?> value="8">三钻及以上  <!--（支付 7.0 签收积分）--></option>
            <option <?php if($taskInfo->BuyerJifen == 9){ ?> selected="selected" <?php }?> value="9">四钻及以上  <!--（支付 8.0 签收积分）--></option>
            <option <?php if($taskInfo->BuyerJifen == 10){ ?> selected="selected" <?php }?> value="10">五钻及以上  <!--（支付 9.0 签收积分）--></option>
          </select>
        </li>
      </ul>
    </div>
  </div>