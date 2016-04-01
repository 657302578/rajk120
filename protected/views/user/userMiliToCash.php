        <?php
            echo $this->renderPartial('/user/usercenterTopNav');
            $userInfo=User::model()->findByPk(Yii::app()->user->getId());
        ?>
        <!--签收积分回收-->
        <div class="d_qie6 clearfix">
         	<div class="d_mili">
            	<p>签收积分回收</p>
            </div>
            <div class="d_hs clearfix">
                <p class="d_yongyou">你现在有：<span style="font-weight: bold;"><?php echo $userInfo->MinLi;?></span>个签收积分</p>
            </div>
            <div class="d_hssl clearfix">
            	<form class="d_hssl_form clearfix">
                	<span>回收数量：</span>
                	<select class="d_hssl_s MinLi" name="MinLi">
                    	<option>10</option>
                        <option>20</option>
                        <option>50</option>
                        <option>100</option>
                        <option>200</option>
                        <option>500</option>
                        <option>1000</option>
                        <option>5000</option>
                    </select>
                    <span class="d_hsslspan">个</span>
                </form>
                
                <div class="d_duihuan clearfix">
                	<a class="d_duohuan_a MinLinToCsh" href="javascript:;">兑换</a>
                    <p>签收积分回收价格：1个签收积分
                        <?php
                            switch($userInfo->VipLv)
                            {
                                case 0:
                                    echo 0.42;
                                    break;
                                case 1:
                                    echo 0.43;
                                    break;
                                case 2:
                                    echo 0.45;
                                    break;
                                case 3:
                                    echo 0.48;
                                    break;
                            }
                        ?>
                    金币</p>
                    <a class="d_huishou" href="<?php echo $this->createUrl('site/userLeveldoc');?>" target="_blank">查看等级回收价格</a>
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
        //点击兑换
        $(".MinLinToCsh").click(function(){
            if(parseFloat($(".MinLi").val())>parseFloat($(".MinLinOwn").html()))
            {
                layer.confirm('回收签收积分的数量不能大于您帐户签收积分的总数', {
            		btn: ['知道了'] //按钮
            	});
            }else
            {
                //输入安全码
                layer.confirm('输入安全码<input type="password" name="safePwd" class="text1 safePwd" style="margin-left:5px;" />', {
                	btn: ['确定'] //按钮
                },function(){
                    if($(".safePwd").val()=="")//安全码必填
                    {
                        layer.tips('请输入安全码', '.safePwd');
                    }else
                    {
                        $.ajax({
                			type:"POST",
                			url:"<?php echo $this->createUrl('user/checkSafePwd');?>",
                			data:{"safePwd":$(".safePwd").val()},
                			success:function(msg)
                			{
                				if(msg=="SUCCESS")//安全码正确
                                {
                                    //签收积分回收开始
                                    $.ajax({
                            			type:"POST",
                            			url:"<?php echo $this->createUrl('user/userMiliToCash');?>",
                            			data:"MinLi="+$(".MinLi").val(),
                            			success:function(msg)
                            			{
                                            if(msg=="SUCCESS")
                                            {
                                                layer.confirm('签收积分回收成功，请注意您的帐户金额与签收积分数量的变化', {
                                            		btn: ['知道了'] //按钮
                                            	},function(){
                                            	   location.reload();
                                            	});
                                            }else
                                            {
                                                layer.confirm('回收签收积分的数量不能大于您帐户签收积分的总数', {
                                            		btn: ['知道了'] //按钮
                                            	},function(){
                                            	   location.reload();
                                            	});
                                            }
                            			}
                            		});
                                    //签收积分回收结束
                                }else
                                {
                                    $(".safePwd").val("");
                                    layer.tips('安全码不正确', '.safePwd');
                                }
                			}
                		});
                    }
                });
                //输入安全码
            }
        });
    })
</script>