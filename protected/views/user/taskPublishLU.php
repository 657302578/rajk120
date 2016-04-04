<link href="<?php echo VERSION2;?>taskcss/main.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo VERSION2;?>taskcss/twitter.css">
<link rel="stylesheet" type="text/css" href="<?php echo VERSION2;?>taskcss/button.css">
<link rel="stylesheet" type="text/css" href="<?php echo VERSION2;?>taskcss/css.css">
<link rel="stylesheet" type="text/css" href="<?php echo VERSION2;?>taskcss/mm.css">
<link rel="stylesheet" type="text/css" href="<?php echo VERSION2;?>taskcss/drop-down.css">
<link rel="stylesheet" type="text/css" href="<?php echo VERSION2;?>taskcss/introjs.css">
<style>
.zhsr{ color:red;}
</style>
<?php
    echo $this->renderPartial('/user/taobaoTaskNav');//载入淘宝大厅导航
?>
<form class="registerform" method="post" action="<?php echo $this->createUrl('user/taskPublistHandle');?>">
<input type="hidden" name="taskCatalog" value="1" /><!--任务类型来路搜索任务-->
<input type="hidden" name="txtMessage" value="" />
<input type="hidden" name="cbxName" value="" />
<input type="hidden" name="cbxcode" value="" />
<input type="hidden" name="cbxAddress" value="" />
<input type="hidden" name="cbxMobile" value="" />
<div id="content">
  <div class="cle"></div>
  <div class="cle"></div>
  <div class="cle"></div>
  <div class="cle"></div>
  <div class="cle"></div>
    <div id="body_main" class="">
      <div class="left_xf fixed" style="top: 200px;">
        <div class="left_xf_nav">
          <ul>
            <li lang="product_main"><a href="javascript:void(0)" class="on">商品信息</a></li>
            <li lang="server"><a href="javascript:void(0)" class="">任务要求</a></li>
            <li lang="screen"><a href="javascript:void(0)" class="">筛选接手</a></li>
          </ul>
        </div>
        <div class="xf_fban">
          <div class="xf_plfb">批量发
            <input type="text" id="txtFCount2" onkeyup="document.getElementById(&#39;txtFCount&#39;).value=this.value;" value="1" class="plrw_input inputxt" maxlength="5" datatype="n" nullmsg="任务数量至少为1" errormsg="必须为数字">个<br /></div>
          <div class="sudiv2" data-step="6" data-intro="立即发布任务">
            <input type="submit" id="btnCilentAddSlide" class="button abtn7" value="立即发布" style="padding:8px 15px;font-size: 18px;">
          </div>
        </div>
      </div>
	  <span id="task_main">
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
                        <option value="<?php echo $item->wangwang;?>"><?php echo $item->wangwang;?></option>
                        <?php }?>
                      </select>
                    </li>
					</ul>
					<ul class="dowebok">
					<li class="s35" title="使用您保存的模板快速读取相关数据">使用任务模板：</li>
                    <li class="s36">
                      <select id="ddlTemplate" onchange="changeTpl(this.value, 1);" name="ddlTemplate" class="ui-select zhsr">
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
                      <input type="radio" checked="checked" name="operate_pt" value="1"  />电脑</li>
                      <li class="s40 searchway" >
                      <input type="radio" name="operate_pt"  value="2"  />手机 </li>
                    </li>
					</ul>
					<ul class="dowebok">
                    <li class="s38" style="width:176px;" title="请选择所属平台">
                        <img src="<?php echo VERSION2;?>taskcss/c12.jpg" alt="">任务所属平台：
                    </li>
                    <li>
					<li class="s39 searchway" >
                      <input checked="checked" type="radio" name="platform" value="1"  />淘宝</li>
					  <li class="s39 searchway" >
                      <input type="radio" name="platform"  value="2"  />京东</li>
					  <li class="s39 searchway" >
                      <input type="radio" name="platform" value="3"  />阿里巴巴</li>
						<input type="hidden" name="payWay" value="1" />
                    </li>
					</ul>
					<ul class="dowebok">
                    <li class="s35" title="要求接手使用什么方式搜索进店">搜索进店方式：</li>
                    <li class="s39 searchway" title="要求接手搜索商品进店">
                      <input type="radio" name="visitWay" checked="checked" value="1">
                      搜商品 </li>
                    <li class="s40 searchway" title="要求接手搜索店铺名进店">
                      <input type="radio" name="visitWay" value="2">
                      搜店铺 </li>
                    <li class="s40 searchway" title="要求接手搜索直通车广告进店">
                      <input type="radio" name="visitWay" value="3">
                      直通车</li>
                    <li class="s40 s41 searchway" title="要求接手通过信用评价地址进店">
                      <input type="radio" name="visitWay" value="4">
                      信用评价</li>
                   <!-- <li class="h32"><span>支付 <font class="pdfo">1.0</font> 个签收积分</span></li>-->
                  </ul>
				  <ul class="dowebok">
				  	<li class="s35" ><img src="<?php echo VERSION2;?>taskcss/c12.jpg" alt="">搜索关键字：</li>
                    <li class="s34">
                      <input type="text" id="txtDes" name="divKey" class="pc11 inputp s36_ts" placeholder="搜索此关键词进店" datatype="*" nullmsg="请填写搜索关键字" errormsg="请填写搜索关键字" />
                    </li>
				  </ul>
				  <ul class="dowebok">
				  	<li class="s35" ><img src="<?php echo VERSION2;?>taskcss/c12.jpg" alt="">搜索提示：</li>
                    <li class="s34">
                      <input type="text" name="txtSearchDes" id="txtSearchDes" class="pc11 inputp s36_ts" placeholder="如：搜索结果在第一页第五排" datatype="*" nullmsg="请填写搜索提示" errormsg="请填写搜索提示" />
                    </li>
				  </ul>
                <div class="product_content2">
                  <input type="hidden" name="task_type" value="2">
                  <ul class="pc1">
                    <li class="s35" id="divkey">商品位置截图：</li>
                    <li>
						<input type="hidden" name="task_type" value="1" />
                        <input type="text" id="url3" name="goodsImgPosition" class="pc11 inputp s36_ts" readonly="readonly" placeholder="上传商品位置截图" style="background: #F0F0F0;" /> <input type="button" id="image3" value="选择图片" style="font-weight: normal; background:#3498db; color:#fff; width: 70px; height:30px; font-size:12px;" /><span id="imagewarning" style="color: green; padding-left:10px;"></span>
                    </li>
                  </ul>
                </div>
				<input type="hidden" name="ddlOKDay" value="0" />
				
					<ul class="dowebok">
				  	<li class="s35" ><img src="<?php echo VERSION2;?>taskcss/c12.jpg" alt="">商品链接地址：</li>
                    <li class="s34">
				<select required="required" name="txtGoodsUrl" class="ui-select zhsr">
						<?php
							if(isset($linkUrl))
							{
								foreach($linkUrl as $k => $v){
						?>
							<option value="<?php echo $v->id;?>"><?php echo $v->goods_name;?></option>
						<?php
								}
							}
						?>
					</select>                    </li>
				  </ul>
				  <input type="hidden" name="txtPrice" value="0" />
				  <ul class="dowebok">
				  	<li class="s35" ><img src="<?php echo VERSION2;?>taskcss/c12.jpg" alt="">佣金金额：</li>
                    <li class="s34"><input type="text" name="yongjin_money" id="yongjin_money" style="width:63px;" class="pc11 inputp s36_ts" placeholder="" datatype="/^-?[1-9]+(\.\d+)?$|^-?0(\.\d+)?$|^-?[1-9]+[0-9]*(\.\d+)?$/" nullmsg="请填写佣金金额" errormsg="请填写佣金金额" />
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
              <div id="a1" lang="1" alt="0" class="nulldiv" title="在拍下商品前使用旺旺或旺信与商家聊天"></div>
              <input type="hidden" name="cbxIsWW" id="aa1" />
            </li>
            <!--<li class="pdli"><span>支付<font class="pdfo">1.0</font>个签收积分</span></li>-->
            <li>
              <div id="a2" lang="2" alt="0" class="nulldiv" title="收藏商家发布的商品"></div>
              <input type="hidden" name="shopcoller" id="aa2">
            </li>
			<li>
              <div id="a10" lang="10" alt="0" class="nulldiv" title="在商品页面停留相应时间，卖家可使用量子查看接手是否达标"></div>
              <input type="hidden" name="stopDsTime" id="aa10">
            </li>
          </ul>
          
          <input type="hidden" name="pinimage" id="aa9" value="0" />
		  <input type="hidden" name="isSign" id="aa21" value="0">
     <input type="hidden" name="cbxIsMsg" id="aa11" value="0">
          <ul class="pdul">
            <li>
              <div id="a12" lang="13" alt="0" class="nulldiv" title="留言提醒接手需要注意的地方，或写暗语。但切勿以此增加要求并要挟接手，否则将予以惩罚"></div>
              <input type="hidden" name="cbxIsTip" id="aa12">
            </li>
            <li class="pdlli13">
              <input type="text" id="lytx" class="inputp" name="txtRemind" placeholder="在此给接手留言提醒注意事项。也可写暗语让您不用登陆平台都知道是刷手">
            </li>
          </ul>
		  <input type="hidden" name="cbxIsAddress" id="aa23" value="0" />
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
              <div id="a17" lang="17" alt="0" class="nulldiv" title="限制接手一定时限内接手任务数"></div>
              <input type="hidden" name="cbxIsFMaxMCount" id="aa17">
            </li>
           <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;日不超<input id="task_num_day" onchange="checkTaskNum(this.value,'task_num_day')" placeholder=">=2"  type="text"  class="pc11 inputp s36_ts"   style="width:50px;"  name="fmaxmc_d" value="" />单&nbsp;&nbsp;&nbsp;</li>
            <li>周不超<input onchange="checkTaskNum(this.value,'task_num_w')" id="task_num_w"  type="text"  class="pc11 inputp s36_ts" placeholder=">=5"   style="width:50px;"  name="fmaxmc_w" value="" />单 </li>
            <li>&nbsp;&nbsp;&nbsp;月不超<input onchange="checkTaskNum(this.value,'task_num_month')" id="task_num_month" type="text"  class="pc11 inputp s36_ts"   style="width:50px;" placeholder=">=10"  name="fmaxmc_m" value="" />单 </li>
          </ul>
          <ul class="pdul">
            <li>
              <div id="a18" lang="18" alt="0" class="nulldiv" title="指定地区的接手方可接手任务"></div>
              <input type="hidden" name="isLimitCity" id="aa18">
            </li>
            <li class="h97">
			<input type="hidden" name="is_xzqx_type" value="2" />
            </li>
            <li class="h97">
              <select style="float:left;" id="Province" name="Province" class="ui-select zhsr">
                <?php 
					foreach($area as $k => $v){
				?>
					<option value="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></option>
				<?php
					}
				?>
              </select>
            </li>
          </ul>
          <ul class="pdul">
            <li>
              <div id="a19" lang="19" alt="0" class="nulldiv" title="指定接手买号的等级"></div>
              <input type="hidden" name="isBuyerFen" id="aa19">
            </li>
            <li class="h34">
              <select name="BuyerJifen" id="BuyerJifen" class="ui-select zhsr">
                <option value="1">一心及以上  <!--（支付 0.5 签收积分）--></option>
                <option value="2">二心及以上  <!--（支付 1.0 签收积分）--></option>
                <option value="3">三心及以上  <!--（支付 2.0 签收积分）--></option>
                <option value="4">四心及以上  <!--（支付 3.0 签收积分）--></option>
                <option value="5">五心及以上  <!--（支付 4.0 签收积分）--></option>
                <option value="6">一钻及以上  <!--（支付 5.0 签收积分）--></option>
                <option value="7">二钻及以上  <!--（支付 6.0 签收积分）--></option>
                <option value="8">三钻及以上  <!--（支付 7.0 签收积分）--></option>
                <option value="9">四钻及以上  <!--（支付 8.0 签收积分）--></option>
                <option value="10">五钻及以上  <!--（支付 9.0 签收积分）--></option>
              </select>
            </li>
            <li class="scli2">此等级以上可接任务<span><!--（支付<font class="pdfo">0.5 - 9.0</font>个签收积分）--></span></li>
          </ul>
        </div>
      </div>
	   </span>
      <div style="height:70px;" id="express" class="div">
        <div class="scmain">
          <ul class="pdul moban_t" style="margin-top:20px;">
		  <li><img class="h41" src="<?php echo VERSION2;?>taskcss/blue.png" alt=""></li>
            <li>
              <div id="a24" lang="24" alt="0" class="nulldiv" title="保存以上信息为模板，方便再次发布"></div>
              <input type="hidden" name="isTpl" id="aa24">
            </li>
            <li class="h97"><font class="muban">名称：</font>
              <input type="text" id="pz11" name="tplTo" class="inputp">
            </li>
          </ul>
        </div>
      </div>
      <div class="sudiv" data-step="5" data-intro="确认提交！" data-position="top" style="cursor: pointer; position: relative; z-index: 9999;">
        <button id="btnCilentAdd" class="button sss abtn7" style="cursor: pointer;">立即发布</button>
      </div>
    </div>
  <div id="subform">
    <div class="center" style="text-align:center;">
      <p class="anone"></p>
      <p class="txtone"> 批量发布数量:
        <input name="txtFCount" type="text" id="txtFCount" onkeyup="document.getElementById(&#39;txtFCount2&#39;).value=this.value;" value="1" class="txt inputxt" maxlength="5" datatype="n" nullmsg="任务数量至少为1" errormsg="必须为数字">
        个<br /></p>
    </div>
  </div>
</div>
</form>
<!--上传商品图片截图-->
<link rel="stylesheet" href="<?php echo ASSET_URL;?>kindeditor/themes/default/default.css" />
<script src="<?php echo ASSET_URL;?>kindeditor/kindeditor.js"></script>
<script src="<?php echo ASSET_URL;?>kindeditor/lang/zh_CN.js"></script>
<script>
function changeTpl(taskId,tplType)
{
	$.ajax({
    			type:"POST",
    			url:"<?php echo $this->createUrl('user/getTaskDetail');?>",
    			data:"taskId="+taskId+"&tplType="+tplType,
                async:false,
    			success:function(msg)
    			{
                    $("#task_main").html(msg);
    			}
    		});
}
	KindEditor.ready(function(K) {
		var editor = K.editor({
			allowFileManager : true
		});
		K('#image3,#url3').click(function() {
			editor.loadPlugin('image', function() {
				editor.plugin.imageDialog({
					showRemote : false,
					imageUrl : K('#url3').val(),
					clickFn : function(url, title, width, height, border, align) {
					    K('#imagewarning').html('图片上传成功');
						K('#url3').val(url);
						editor.hideDialog();
					}
				});
			});
		});
	});
</script>
<script>
    $(function(){
        $(".nulldiv").click(function(){
            var idVal=-(parseInt($(this).attr("lang"))-1)*34;
            if($(this).attr("alt")=="1")//取消选择
            {
                if($(this).attr("id")=="a11")//好评内容取消，则相应内容取消
                {
                    $("#hpnr").val("").removeClass("Validform_error");
                }
                
                if($(this).attr("id")=="a12")//留言提醒取消，则相应内容取消
                {
                    $("#lytx").val("").removeClass("Validform_error");
                }
                
                if($(this).attr("id")=="a23")//收货地址取消，则相应内容取消
                {
                    $("#cbxName,#cbxMobile,#cbxcode,#cbxAddress").val("").removeClass("Validform_error");
                }
                
                $(this).css("background-position","0 "+idVal+"px");
                $(this).next("input").val("0");//随后的input框赋值value为0
                $(this).attr("alt","0");
            }else//选中
            {
                $(this).css("background-position","-122px "+idVal+"px");
                $(this).next("input").val("1");//随后的input框赋值value为1
                $(this).attr("alt","1");
            }
        });
        
        //锚点标记快速定位
        $(".left_xf_nav ul li").click(function(){
            $(".left_xf_nav ul li a").removeClass("on");
            $(this).find("a").addClass("on");
            
            $("html,body").animate({scrollTop:$("#"+$(this).attr("lang")+"").offset().top-200},500);
        });
        
        //窗口滚动区域效果
        $("#product,#server,#screen,#express").hover(function() {
            if($(this).attr("id")=="product")
            {
                $(".left_xf_nav ul li a").removeClass("on");
                $(".left_xf_nav ul li").eq(0).find("a").addClass("on");
            }
            
            if($(this).attr("id")=="server")
            {
                $(".left_xf_nav ul li a").removeClass("on");
                $(".left_xf_nav ul li").eq(1).find("a").addClass("on");
            }
            
            if($(this).attr("id")=="screen")
            {
                $(".left_xf_nav ul li a").removeClass("on");
                $(".left_xf_nav ul li").eq(2).find("a").addClass("on");
            }
            
            if($(this).attr("id")=="express")
            {
                $(".left_xf_nav ul li a").removeClass("on");
                $(".left_xf_nav ul li").eq(3).find("a").addClass("on");
            }
        });
        
    })
    
    //计算签收积分
    function needMinLi()
    {
        var txtPrice=$("#txtPrice").val();//商品价格
        var MinLi=0;
        if(txtPrice>0)
        {
            if(txtPrice>0 && txtPrice<81)//价格1-80金币
                MinLi=2
            if(txtPrice>80 && txtPrice<151)//价格81-150金币
                MinLi=3
            if(txtPrice>150 && txtPrice<201)//价格151-200金币
                MinLi=4
            if(txtPrice>200 && txtPrice<351)//价格201-350金币
                MinLi=5
            if(txtPrice>350 && txtPrice<501)//价格351-500金币
                MinLi=6
            if(txtPrice>500 && txtPrice<1001)//价格501-1000金币
                MinLi=8
            if(txtPrice>1000)//价格1001金币以上
                MinLi=9
            $("#txtMinMPrice").val(MinLi);
        }
        else
        {
            alert('商品价格必须大于0');
            $("#txtPrice").val("").focus();
            $("#txtMinMPrice").val("");
        }
    }
</script>
<!--layer插件-->
<script src="<?php echo ASSET_URL;?>layer/jquery.min.js"></script>
<script src="<?php echo ASSET_URL;?>layer/layer.js"></script>
<script src="<?php echo ASSET_URL;?>layer/laycode.min.js"></script>
<link href="<?php echo ASSET_URL;?>layer/layer.css" rel="stylesheet" type="text/css" />
<!--validform-->
<link rel="stylesheet" href="<?php echo ASSET_URL;?>Validform/css/style.css" type="text/css" media="all" />
<script type="text/javascript" src="<?php echo ASSET_URL;?>Validform/js/Validform_v5.3.2_min.js"></script>
<script type="text/javascript">
$(function(){
    //
    $("#hpnr,#lytx,#cbxName,#cbxMobile,#cbxcode,#cbxAddress,#pz11").keyup(function(){
        if($(this).val!="")
            $(this).removeClass("Validform_error");
    });
    
    //表单检测
	$(".registerform").Validform({
		tiptype:3,
        beforeSubmit:function(curform){//提前前执行函数
        
            //检查好评内容选择了之后是否有填写好评内容
            if($("#aa11").val()==1 && $("#hpnr").val()=="")
            {
                layer.confirm('请填写好评内容', {
            		btn: ['确定'] //按钮
            	}, function(){
            	    $(".layui-layer-shade,.layui-layer").hide();
            		$("html,body").animate({scrollTop:$("#server").offset().top-200},300);                
                    $("#hpnr").focus().addClass("Validform_error");
            	}); 
                return false;
            } 
            //检查好留言提醒选择了之后是否有填写好评内容
            if($("#aa12").val()==1 && $("#lytx").val()=="")
            {
                layer.confirm('请填留言提醒内容', {
            		btn: ['确定'] //按钮
            	}, function(){
            	    $(".layui-layer-shade,.layui-layer").hide();
            		$("html,body").animate({scrollTop:$("#server").offset().top-200},300);                
                    $("#lytx").focus().addClass("Validform_error"); 
            	}); 
                return false;
            } 
            //检查好留言提醒选择了之后是否有填写好评内容
            if($("#aa23").val()==1 && ($("#cbxName").val()=="" ||  $("#cbxMobile").val()=="" ||  $("#cbxcode").val()=="" ||  $("#cbxAddress").val()==""))
            {
                layer.confirm('请将收货地址信息填写完整', {
            		btn: ['确定'] //按钮
            	}, function(){
            	    $(".layui-layer-shade,.layui-layer").hide();
             		$("#cbxName,#cbxMobile,#cbxcode,#cbxAddress").each(function(){
                        if($(this).val()=="")
                            $(this).addClass("Validform_error");
                        else
                            $("#cbxName,#cbxMobile,#cbxcode,#cbxAddress").removeClass("Validform_error");
                    });
                    $("html,body").animate({scrollTop:$("#express").offset().top-200},300);
            	}); 
                return false;
            }  
            
            //检查保存模板选择了之后是否有填写好评内容
            if($("#aa24").val()==1 && $("#lytx").val()=="")
            {
                layer.confirm('请填写模板名称', {
            		btn: ['确定'] //按钮
            	}, function(){
            	    $(".layui-layer-shade,.layui-layer").hide();
            		$("html,body").animate({scrollTop:$("#express").offset().top-200},300);             
                    $("#pz11").focus().addClass("Validform_error");
            	}); 
                return false;
            }                         
    	},
	});
})
</script>
<?php
    if(count($sellerInfo)==false)//如果没有绑定过淘宝掌柜名
    {
?>
    <script>
    	//询问框
    	layer.confirm('请先绑定淘宝掌柜名或淘宝掌柜未通过审核', {
    		btn: ['现在去绑定','返回任务大厅'] //按钮
    	}, function(){
    		window.location.href="<?php echo $this->createUrl('user/taobaoBindSeller');?>";
    	}, function(){
    		window.location.href="<?php echo $this->createUrl('site/taobaoTask');?>";
    	});       
    </script>
<?php
    }
?>
<?php
    if(isset($_GET['taskPublistStatus']) && $_GET['taskPublistStatus']==1)
    {
?>
    
    <script>
    	//询问框
    	layer.confirm('任务发布成功', {
    		btn: ['继续发布','返回任务大厅'] //按钮
    	}, function(){
    		window.location.href="<?php echo $this->createUrl('user/'.$_GET['task_typeUrl'].'');?>";
    	}, function(){
    		window.location.href="<?php echo $this->createUrl('site/taobaoTask');?>";
    	});       
    </script>
<?php
    }
    if(isset($_GET['taskPublistStatus']) && $_GET['taskPublistStatus']==0)
    {
?>
    <script>
    	//询问框
    	layer.confirm('任务发布失败，您可以联系客服人员', {
    		btn: ['继续发布','返回大厅'] //按钮
    	}, function(){
    		window.location.href="<?php echo $this->createUrl('user/'.$_GET['task_typeUrl'].'');?>";
    	}, function(){
    		window.location.href="<?php echo $this->createUrl('site/taobaoTask');?>";
    	});       
    </script>
<?php
    }
	if(isset($_GET['taskPublistStatus']) && $_GET['taskPublistStatus'] == 2){
?>
    <script>
    	//询问框
    	layer.confirm('任务发布失败，您的账户余额不足', {
    		btn: ['去充值','返回大厅'] //按钮
    	}, function(){
    		window.location.href="<?php echo $this->createUrl('user/userPayCenter');?>";
    	}, function(){
    		window.location.href="<?php echo $this->createUrl('site/taobaoTask');?>";
    	});       
    </script>
<?php
	}
?>