    <div id="body" style="min-height: 480px;"><!--body start-->
        <div class="zbuy1">
            <div class="zbuy11">
            
                
                <div class="zbuy13" style="float:none; margin-left:auto; margin-right:auto;">
                    <span class="zbuy111">
                        升级VIP
                    </span>
                    <?php
                        $vipInfo=User::model()->findByPk(Yii::app()->user->getId());
                        //VIP已到期或者不是VIP
                        $vipInfo->VipStopTime!=""?$vipInfo->VipStopTime:0;//VIP到期时间处理
                        if($vipInfo->VipStopTime<time()){
                    ?>
                    <div class="zbuy112" >
                        <img src="<?php echo VERSION2;?>img/vip.jpg" alt="" />
                        <span class="zbuy113"> VIP可使用任务大厅搜索、任务刷新置顶等功能</span>
                    </div>
                    <div class="zbuy114">
                        <select id="viptype">
                            <option value="1">VIP</option>
                        </select> 
                        <select id="months">
                            <option value="1">一个月28金币</option>
                            <option value="3">三个月84金币</option>
                            <option value="6">半年168金币</option>
                            <option value="12">一年280金币</option>
                        </select>
                        <input type="hidden" name="hash2" value="eA==">
                    </div>
                    <a href="javascript:;" id="buyvip"><div class="zbuy116">立即购买</div></a>
                    <?php }
                        else
                        {
                            echo "<div style=' margin-top:80px; text-align:center;'>您的会员等级为<img src='".VERSION2."img/vip".$vipInfo->VipLv.".gif' /><span style='padding-left:10px; color:red;'>".date('Y-m-d',$vipInfo->VipStopTime)."到期</span></div>";
                    ?>
                        <div style="text-align: center; line-height:45px;"><a href="<?php echo $this->createUrl('site/userLeveldoc'); ?>" target="_blank" style="color: #57A0FF;">查看会员特权</a></div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
        <!--<div class="cart">
          <div class="cart_nav" id='list'>
              <ul >
                <li><a href="#" type='1'><img src="<?php echo VERSION2;?>img/cart_a.jpg"/></a></li>
                <li class="cart_mar"><a href="#" type='2'><img src="<?php echo VERSION2;?>img/cart_b.jpg"/></a></li>
                <li class="cart_mar"><a href="#" type='3'><img src="<?php echo VERSION2;?>img/cart_c.jpg"/></a></li>
              </ul>
          </div>
        </div>-->
    </div><!--body end-->
<!--layer插件-->
<script src="<?php echo ASSET_URL;?>layer/jquery.min.js"></script>
<script src="<?php echo ASSET_URL;?>layer/layer.js"></script>
<script src="<?php echo ASSET_URL;?>layer/laycode.min.js"></script>
<link href="<?php echo ASSET_URL;?>layer/layer.css" rel="stylesheet" type="text/css" />
<script>
    $(function(){
        //vip二级联动
        $("#viptype").change(function(){
            var vipType=$(this).val();
            if(vipType==1)
                optionHtml='<option value="1">一个月28金币</option><option value="3">三个月76金币</option><option value="6">半年118金币</option><option value="12">一年218金币</option>';
            else if(vipType==2)
                optionHtml='<option value="1">一个月58金币</option><option value="3">三个月99金币</option><option value="6">半年158金币</option><option value="12">一年298金币</option>';
            else
                optionHtml='<option value="1">一个月88金币</option><option value="3">三个月128金币</option><option value="6">半年198金币</option><option value="12">一年368金币</option>';
            $("#months").html(optionHtml);
        });
        
        //点击购买vip
        $("#buyvip").click(function(){
            var MoneyOwn=parseFloat($(".MoneyOwn").html());//余额
            var vipType=parseInt($("#viptype").val());//vip等级
            var month=parseInt($("#months").val());//购买月数
            var vipPriceArr=new Array();
            vipPriceArr[1]=new Array();
            vipPriceArr[1][1]=28;//vip1 一个月价格
            vipPriceArr[1][3]=84;//vip1 三个月价格
            vipPriceArr[1][6]=168;//vip1 半年价格
            vipPriceArr[1][12]=280;//vip1 一年价格
            if(vipPriceArr[vipType][month]>MoneyOwn)
            {
                layer.tips('余额不足，您的余额为'+MoneyOwn+'金币', '#months');
            }
            else
            {
                //检查通过申请提现
                $.ajax({
        			type:"POST",
        			url:"<?php echo $this->createUrl('user/userBuyVipLevel');?>",
        			data:{"vipType":vipType,"month":month,"vipPrice":vipPriceArr[vipType][month]},
        			success:function(msg)
        			{
        				if(msg=="SUCCESS")
                        {
                            //询问框
                        	layer.confirm('VIP购买成功', {
                        		btn: ['知道了'] //按钮
                        	},function(){
                        	    location.reload();//刷新当前页面
                        	});
                        }else
                        {
                            //询问框
                        	layer.confirm('<span style="color:red;">购买VIP失败，您可以联系我们的客服人员</span>', {
                        		btn: ['知道了'] //按钮
                        	},function(){
                        	    location.reload();//刷新当前页面
                        	});
                        }
        			}
        		});
            }
        });
    })
</script>