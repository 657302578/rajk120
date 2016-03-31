<?php
        echo $this->renderPartial('/user/taobaoTaskNav');//载入淘宝大厅导航
        $ptConfig = Config::model()->findByPk(1);
    ?>

<div class="bdmhIntr">
  <p>1、该页面用来绑定和维护用来接任务、购买任务商品的淘宝买号</p>
  <p>2、一个会员号一天只可以接手<?php echo $ptConfig->buyertaskmaxnum; ?>个任务，接手高于<?php echo $ptConfig->buyertaskmaxnum; ?>个任务，系统将挂起买号，第二天才进行继续接手任务</p>
</div>
<div class="bdmh">
  <form action="<?php $this->createUrl('user/taobaoBindBuyer');?>" method="post">
    <div class="bd_zh clearfix">
      <table width="100%" cellpadding="10">
        <tr>
          <td>淘宝买家账号</td>
          <td align="left"><input type="text" name="bdmh" class="zhsr">
          </td>
          <td>实名认证的身份证号</td>
          <td align="left"><input type="text" name="id_card" class="zhsr"></td>
        </tr>
        <tr>
          <td>账号等级</td>
          <td align="left"><select style="margin-left:26px; width:212px;"  class="zhSort" id="" name="wangwanginfo">
              <option value="0">白号(0-3分)</option>
              <option value="1">一心(4-10分)</option>
              <option value="2">二心(11-40分)</option>
              <option value="3">三心(41-90分)</option>
              <option value="4">四心(90-150分)</option>
              <option value="5">五心(151-250分)</option>
              <option value="6">一钻(251-500分)</option>
              <option value="7">二钻(501-1000分)</option>
              <option value="8">三钻(1001-2000分)</option>
              <option value="9">四钻(2001-5000分)</option>
              <option value="10">五钻(5001-10000分)</option>
            </select>
          </td>
          <td>是否实名认证</td>
          <td align="left"><select style="margin-left:26px; width:212px;"  class="zhSort_s" id="" name="taotaorz">
              <option value="1">已通过淘宝实名认证</option>
              <option value="0">未通过淘宝实名认证</option>
            </select></td>
        </tr>
        <tr>
          <td>绑定的支付宝账户</td>
          <td align="left"><input type="text" name="alipay_account" class="zhsr"></td>
          <td>实名认证时的银行</td>
          <td align="left"><select style="margin-left:26px; width:212px;" name="bank_name" class="zhSort">
              <option value="中国工商银行">中国工商银行</option>
              <option value="中国农业而银行">中国农业而银行</option>
              <option value="中国建设银行">中国建设银行</option>
              <option value="招商银行">招商银行</option>
              <option value="中国银行">中国银行</option>
              <option value="中国邮政储蓄银行">中国邮政储蓄银行</option>
              <option value="交通银行">交通银行</option>
              <option value="中信银行">中信银行</option>
              <option value="中国民生银行">中国民生银行</option>
              <option value="广发银行">广发银行</option>
              <option value="浦发银行">浦发银行</option>
              <option value="兴业银行">兴业银行</option>
              <option value="北京银行">北京银行</option>
              <option value="北京农商银行">北京农商银行</option>
              <option value="平安银行">平安银行</option>
              <option value="其他">其他</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>实名认证的姓名</td>
          <td align="left"><input type="text" name="real_name" class="zhsr"></td>
          <td>实名认证的银行卡号</td>
          <td align="left"><input type="text" name="bank_no" class="zhsr"></td>
        </tr>
        <tr>
          <td colspan="4" align="right"><button class="bdtbmh" style="float:right;">绑定淘宝买号</button></td>
        </tr>
      </table>
    </div>
  </form>
  <div class="bdzhzy" style="text-indent:0; margin-top:130px;">
    <?php
                $addressInfo = Useraddress::model()->findByAttributes( array('occupy_uid'=>Yii::app()->user->getId() ));
                if(isset($addressInfo)){
                    $shengInfo = Area::model()->findByPk($addressInfo['sheng_id']);
                    $shiInfo = Area::model()->findByPk($addressInfo['shi_id']);
                    $quInfo = Area::model()->findByPk($addressInfo['qu_id']);
            ?>
    当前被分配到的地址：<br/>
    <?php echo $shengInfo->name;?>&nbsp;<?php echo $shiInfo->name;?>&nbsp;<?php echo $quInfo->name;?>&nbsp;<?php echo $addressInfo->address;?>&nbsp;收件人：<?php echo $addressInfo->user_name;?>&nbsp;电话：<?php echo $addressInfo->mobile;?><br/>
    请将所有绑定的账号的地址更改为此地址
    <?php
                }
            ?>
  </div>
  <!--买号列表-->
  <table class="t4" style="width: 100%;">
    <tbody>
      <tr>
        <td><table width="100%" cellpadding="0" style="width: 100%;">
            <tbody>
              <tr id="row-head" style="color: #0099cc; font-weight: bold;">
                <td width="10" height="37" class="txjl_bg1"></td>
                <td width="15%" height="37" align="center" valign="middle" class="txjl_bg2" style="font-size:14px">淘宝账号</td>
                <td width="25%" height="37" align="center" valign="middle" class="txjl_bg2" style="font-size:14px" >信誉<span style="color:#FF0000;">(更改需重新审核)</span></td>
                <td width="20%" height="37" align="center" valign="middle" class="txjl_bg2" style="font-size:14px">接单频率（日/周/月）</td>
                <td width="10%" height="37" align="center" valign="middle" class="txjl_bg2" style="font-size:14px" >审核状态</td>
                <td width="10%" height="37" align="center" valign="middle" class="txjl_bg2" style="font-size:14px" >是否启用</td>
                <td width="15%" height="37" align="center" valign="middle" class="txjl_bg2" style="font-size:14px">操作</td>
                <td width="10" height="37" class="txjl_bg3"></td>
              </tr>
              <?php
                            foreach($proInfo as $item){
                        ?>
              <tr>
                <td>&nbsp;</td>
                <td height="80" align="center" valign="middle" class="mh_xxian maihao"><p style="height:25px"> <span class="blue"><?php echo $item->wangwang;?> </span>
                    <?php
                                    if($item->taotaorz){
                                 ?>
                    <img src="<?php echo VERSION2;?>img/sm.jpg" width="34" height="17" title="通过支付宝实名认证用户" align="absmiddle"/>
                    <?php }else
                                    {
                                        echo "<span style='color:red;'>未实名</span>";
                                    }
                                 ?>
                  </p></td>
                <td align="center" valign="middle" class="mh_xxian"><p style="height:25px;line-height:25px;" alt='<?php echo $item->id;?>'> <img src="<?php echo VERSION2;?>img/level/<?php echo $item->wangwanginfo;?>.gif" style="vertical-align: text-top;cursor:pointer;" />
                    <select style="width:100px;" name="taobaoScoreOn" class="mh_bk taobaoScoreOn" id="taobaoScoreOn" style="width:150px;">
                    <option value="0" <?php echo $item->wangwanginfo==0?'selected="selected"':"";?>>白号(0-3分)</option>
                    <option value="1" <?php echo $item->wangwanginfo==1?'selected="selected"':"";?>>一心(4-10分)</option>
                    <option value="2" <?php echo $item->wangwanginfo==2?'selected="selected"':"";?>>二心(11-40分)</option>
                    <option value="3" <?php echo $item->wangwanginfo==3?'selected="selected"':"";?>>三心(41-90分)</option>
                    <option value="4" <?php echo $item->wangwanginfo==4?'selected="selected"':"";?>>四心(90-150分)</option>
                    <option value="5" <?php echo $item->wangwanginfo==5?'selected="selected"':"";?>>五心(151-250分)</option>
                    <option value="6" <?php echo $item->wangwanginfo==6?'selected="selected"':"";?>>一钻(251-500分)</option>
                    <option value="7" <?php echo $item->wangwanginfo==7?'selected="selected"':"";?>>二钻(501-1000分)</option>
                    <option value="8" <?php echo $item->wangwanginfo==8?'selected="selected"':"";?>>三钻(1001-2000分)</option>
                    <option value="9" <?php echo $item->wangwanginfo==9?'selected="selected"':"";?>>四钻(2001-5000分)</option>
                    <option value="10" <?php echo $item->wangwanginfo==10?'selected="selected"':"";?>>五钻(5001-10000分)</option>
                    </select>
                  </p></td>
                <td align="center" valign="middle" class="t42"><?php echo Blindwangwang::getWwTaskNum($item->wangwang, 1, 'day');?> / <?php echo Blindwangwang::getWwTaskNum($item->wangwang, 7, 'day');?> / <?php echo Blindwangwang::getWwTaskNum($item->wangwang, 1, 'month');?> </td>
                <td align="center"><span style="color:#FF0000; font-weight:bold;">
                  <?php if($item->is_check){?>
                  审核通过
                  <?php }elseif($item->is_check == 2){?>
                  审核未通过
                  <?php }else{ ?>
                  未审核
                  <?php } ?>
                  </span> </td>
                <td align="center" class="mh_xxian"><p alt='<?php echo $item->id;?>'>
                    <input type="checkbox" class="changeStatusOn" id="changeStatusOn" value="<?php echo $item->statue;?>" <?php echo $item->statue==1?'checked="checked"':"";?>/>
                  </p></td>
                <td align="center" class="mh_xxian"><a onclick="if(confirm('您确定要删除吗？')) return true; else return false;" href="<?php echo $this->createUrl('user/taobaoBindBuyerDel',array('id'=>$item->id));?>" class="del_seller">删除买号</a> </td>
                <td>&nbsp;</td>
              </tr>
              <?php }?>
            </tbody>
          </table></td>
      </tr>
    </tbody>
  </table>
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
<!--任务列表翻页 end-->
</form>
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
