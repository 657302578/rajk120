    <?php
        echo $this->renderPartial('/user/taobaoTaskNav');//载入淘宝大厅导航
    ?>
    <div class="bdmhIntr">
        <p>1、您目前是新手会员用户，可以绑定2个掌柜 <a href="<?php echo $this->createUrl('user/userBuyPoint');?>" target="_blank">申请VIP</a>最高可绑定30个掌柜！<a href="<?php echo $this->createUrl('site/userLeveldoc');?>" target="_blank">查看VIP限权</a></p>
        <p>2、如果您的帐号还没有发布过任务，可以自己免费删除掌柜一次；发布过任务的帐号删除掌柜需要付费5元！</p>
    </div>
    <div class="bdmh">
        <form action="<?php $this->createUrl('user/taobaoBindSeller');?>" method="post">
            <div class="bd_zh clearfix">
                <img src="<?php echo VERSION2;?>img/wang.jpg" alt="" class="wang">
                <div class="bd_zht">淘宝掌柜名（旺旺名）：</div>
                <input type="text" class="zhsr" name="bdmh"/>
                <button class="bdtbmh">绑定淘宝掌柜</button>
                <span style="padding-left: 10px; color:red;"><?php echo @$warning;?></span>
            </div>
            <div class="zh_infs clearfix" style="color: #0099cc; font-weight: bold;">
                <div class="zgPro1">淘宝掌柜帐号</div>
                <div class="zgPro2">总发布任务</div>
                <div class="zgPro3">绑定时间</div>
                <div class="zgPro4">是否激活</div>
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