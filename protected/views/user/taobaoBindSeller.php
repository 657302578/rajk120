    <?php
        echo $this->renderPartial('/user/taobaoTaskNav');//载入淘宝大厅导航
    ?>
    <div class="bdmh">
        <form action="<?php $this->createUrl('user/taobaoBindSeller');?>" method="post">
            <div class="bd_zh clearfix">
                <div class="bd_zht">淘宝掌柜名（旺旺名）：</div>
                <input type="text" class="zhsr" name="bdmh"/>
				<div class="bd_zht">店铺首页地址：</div>
                <input type="text" class="zhsr" name="shop_url" />
				<br/><br/>
				<div class="bd_zht">认证链接：</div>
                <input type="text" class="zhsr" name="auth_url" />
				<button class="bdtbmh">绑定淘宝掌柜</button>
                <span style="padding-left: 10px; color:red;"><?php echo @$warning;?></span>
            </div>
			<div style="font-weight:bold; font-size:12px; margin-left:20px; margin-top:30px;">
				<?php
					$auth_price = mt_rand(1,9).'.'.mt_rand(1,9);
				?>
				<input type="hidden" name="auth_price" value="<?php echo $auth_price;?>" />
				<br/><br/><br/>
				请在您要认证的店铺中新建一个宝贝，命名为“认证链接”，价格为<?php echo $auth_price;?>元，然后复制链接填写到“认证链接中”，然后点击“绑定淘宝掌柜”
			</div>
            <div class="zh_infs clearfix" style="color: #0099cc; font-weight: bold;">
                <div class="zgPro1">淘宝掌柜帐号</div>
                <div class="zgPro2">总发布任务</div>
                <div class="zgPro3">绑定时间</div>
                <div class="zgPro4">是否激活</div>
                <div class="zgPro4">是否审核</div>
                <div class="zgPro5">操作</div>
            </div>
        </form>
            <?php
                foreach($proInfo as $item){
            ?>
            <div class="zh_infs zh_infsItem clearfix">
                <div class="zgPro1">
                    <p class="mh_zg">
                        <span class="mico zg_tbico"></span> <span class="seller" style="cursor:pointer;"><?php echo $item->wangwang;?></span>
                        <?php
                            if($item->statue)
                            {
                        ?>
                                <span class="green status" style="color: green;">&nbsp;(已激活)</span> 
                        <?php }else{?>
                                <span class="red status" style="color: red;">&nbsp;(未激活)</span> 
                        <?php }?>
                    </p>
                </div>
                <div class="zgPro2">0</div>
                <div class="zgPro3"><?php echo date('Y-m-d H:i:s',$item->blindtime);?></div>
                <div class="zgPro4">
                    <p alt='<?php echo $item->id;?>'>
                        <input type="checkbox" class="changeStatusOn" id="changeStatusOn" style="position: relative; top:15px;" value="<?php echo $item->statue;?>" <?php echo $item->statue==1?'checked="checked"':"";?>/>
                    </p>
                </div>
                <div class="zgPro4">
                    <p style="color:#FF0000; font-weight:bold;" alt='<?php echo $item->id;?>'>
                       <?php if($item->is_check == 1){?>审核通过<?php }elseif($item->is_check == 2){ ?>未通过<?php }else{ ?>未审核<?php }?>
                    </p>
                </div>
				
                <div class="zgPro5">
                    <a onclick="if(confirm('您确定要删除吗？')) return true; else return false;" href="<?php echo $this->createUrl('user/taobaoBindSellerDel',array('id'=>$item->id));?>" class="del_seller">删除掌柜</a>
                </div>
            </div>
            <?php
                }
            ?>
            <div class="breakpage"><!--分页开始-->
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
            </div><!--分页结束-->
        </div><!--任务列表翻页 end-->
    </div>
    <script>
        $(function(){
            //修改买号相关状态
            $(".realnameOn,.changeStatusOn,.taobaoScoreOn").change(function(){
                $.ajax({
        			type:"POST",
        			url:"<?php echo $this->createUrl('user/taobaoBindBuyerChangeInfo');?>",
        			data:{"id":$(this).parent().attr('alt'),"value":$(this).val(),"action":$(this).attr('id')},
        			success:function(msg)
        			{
        				if(msg)
                            location.reload();
                        else
                        {
                            alert("信息修改失败，请联系网站客服");
                        }
        			}
        		});
            });
        })
    </script>