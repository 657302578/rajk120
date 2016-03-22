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
            <li lang="server"><a href="javascript:void(0)" class="">增值服务</a></li>
            <li lang="screen"><a href="javascript:void(0)" class="">筛选接手</a></li>
            <li lang="express"><a href="javascript:void(0)" class="">快递空包</a></li>
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
      <div id="product" class="div">
        <?php
            $this->renderPartial('/user/taskPublishNav');//加载发布任务公共导航
        ?>
        <div id="product_main" class="product_con" data-step="2" data-intro="在这里，输入您的商品基本信息">
          <ul class="pmm">
            <li style="display:block;" class="lili">
              <div class="drw">
                <div class="pt"> <span class="h40"> <img class="h41" src="<?php echo VERSION2;?>taskcss/blue.png" alt="">商品信息： </span> <!--<span class="h40" style="margin-left: 25px;"><a href="http://www.milioo.com/article/sell/122Q02015.html" target="_blank" style="color: red;font-size: 15px;">查看麦粒计算规则</a></span>--> </div>
                <!--来路任务不同与普通任务不同部分-->
                <div class="product_content1">
                  <ul class="dowebok">
                    <li class="s38" style="width:176px;" title="请选择所属平台">
                        <img src="<?php echo VERSION2;?>taskcss/c12.jpg" alt="">任务所属平台：
                    </li>
                    <li>
                        <select id="platform" name="platform" class="ui-select zhsr">
                            <option value="1">淘宝</option>
                            <option value="2">京东</option>
                            <option value="3">阿里巴巴</option>
                        </select>
						<input type="hidden" name="payWay" value="1" />
                    </li><br /><br />
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
                    <!--<li class="h32"><span>支付 <font class="pdfo">1.0</font> 个麦粒</span></li>-->
                  </ul>
                </div>
                <div class="product_content2">
                  <input type="hidden" name="task_type" value="2">
                  <ul class="pc1">
                    <li class="s35" id="divkey"><img src="<?php echo VERSION2;?>taskcss/c12.jpg" alt="">搜索关键字：</li>
                    <li class="s34">
                      <input type="text" id="txtDes" name="divKey" class="pc11 inputp s36_ts" placeholder="搜索此关键词进店" datatype="*" nullmsg="请填写搜索关键字" errormsg="请填写搜索关键字" />
                    </li>
                    <li class="s38" id="divdes"><img src="<?php echo VERSION2;?>taskcss/c12.jpg" alt="">搜索提示：</li>
                    <li class="s36">
                      <input type="text" name="txtSearchDes" id="txtSearchDes" class="pc11 inputp s36_ts" placeholder="如：搜索结果在第一页第五排" datatype="*" nullmsg="请填写搜索提示" errormsg="请填写搜索提示" />
                    </li>
                  </ul>
                </div>
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
                <!--来路任务不同与普通任务不同部分-->
                <div class="product_content2">
                  <ul class="pc1">
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
                    <li class="s35" title="使用您保存的模板快速读取相关数据">使用任务模板：</li>
                    <li class="s36">
                      <select id="ddlTemplate" name="ddlTemplate" class="ui-select zhsr">
                        <option value="0">请选择模板</option>
                        <option value="0">模板1</option>
                      </select>
                    </li>
                  </ul>
                </div>
                <div class="product_content2">
                  <ul class="pc1" id="ppuul">
                    <div class="c35"><a href="http://help.milioo.com/posts/view/79965" target="_blank"><img src="<?php echo VERSION2;?>taskcss/c3_08.png" alt="收货时间新规" title="收货时间新规"></a></div>
                    <li class="s35" title="选择确认收货时长。ps：如您发布实物任务，需要走快递，那么一般可选72小时后收货">
                        <img src="<?php echo VERSION2;?>taskcss/c12.jpg" alt="">要求确认时间：</li>
                    <li class="s34">
                      <select name="ddlOKDay" id="ddlOKDay" class="ui-select zhsr">
                        <option value="0" selected="selected">马上好评（虚拟任务）</option>
                        <option value="1"></option>
                        <option value="2"></option>
                        <option value="3"></option>
                        <option value="4"></option>
                        <option value="5"></option>
                        <option value="6"></option>
                        <option value="7"></option>
                      </select>
                    </li>
                  </ul>
                </div>
                <div class="product_content2">
                  <ul class="pc1">
                    <li class="s35" title="输入您想提升销量的商品链接"><img src="<?php echo VERSION2;?>taskcss/c12.jpg" alt="">商品链接地址：</li>
                    <li class="s36 s36_ts">
                      <input type="text" class="pc11 inputp inputxt" name="txtGoodsUrl" id="txtGoodsUrl" placeholder="http://" datatype="url" nullmsg="请再商品链接地址！" errormsg="您输入的商品链接地址格式不正确！">
                    </li>
                    <li class="h37" title="请输入打折后的价格，保持平台价格与淘宝价格一致"><img src="<?php echo VERSION2;?>taskcss/c12.jpg" alt="">商品价格：(包含邮费)
                      <input type="text" id="txtPrice" onchange="needMinLi()" name="txtPrice" class="inputp inputxt" datatype="n" nullmsg="请再商品价格！" errormsg="价格必须为整数">
                    </li>
                    <li class="h38" title="您的淘宝商品价格不等于任务价格时，请勾选！改价不要超过商品价格的50%，支付宝使用率低于50%会被淘宝视为信用炒作处理。" style="display: none;">改价：
                      <input type="checkbox" name="cbxIsGJ" class="h39">
                    </li>
                    <li class="h38" title="取消商品价格限制" style="display:none">打折：
                      <input type="checkbox" name="chssp" class="h39">
                    </li>
                    <!--<li class="s37" title="与商品价格、收货时长相关">基本麦粒：
                      <input type="text" id="txtMinMPrice" readonly="" style="background:#F0F0F0;" name="txtMinMPrice" class="inputp">
                    </li>-->
                  </ul>
                </div>
                <div style="clear:both;"></div>
              </div>
            </li>
          </ul>
          <div style="clear:both;"></div>
        </div>
      </div>
      <div id="server" class="span6" data-step="3" data-intro="选择您想要的增值服务，这样能增加安全性">
        <div class="pt"> <span class="h40"> <img class="h41" src="<?php echo VERSION2;?>taskcss/blue.png" alt="">增值服务： </span> </div>
        <div class="pd">
          <ul class="pdul" style="margin-top:15px;">
            <li>
              <div id="a1" lang="1" alt="0" class="nulldiv" title="在拍下商品前使用旺旺或旺信与商家聊天"></div>
              <input type="hidden" name="cbxIsWW" id="aa1" />
            </li>
            <!--<li class="pdli"><span>支付<font class="pdfo">1.0</font>个麦粒</span></li>-->
            <li>
              <div id="a2" lang="2" alt="0" class="nulldiv" title="收藏商家发布的商品"></div>
              <input type="hidden" name="shopcoller" id="aa2">
            </li>
            <!--<li class="pdli"><span>支付<font class="pdfo">0.5</font>个麦粒</span></li>-->
            <li>
              <div id="a3" lang="3" alt="0" class="nulldiv" title="要求接手使用手机付款" style="background-position: 0px -68px;"></div>
              <input type="hidden" name="isMobile" id="aa3" value="0">
            </li>
            <!--<li class="pdli"><span>支付<font class="pdfo">2.0</font>个麦粒</span></li>-->
          </ul>
          <ul class="pdul">
            <li>
              <div id="a4" lang="4" alt="0" class="nulldiv" title="接手确认收货前在旺旺与您聊天确认。如：已收到货，下次还会再来"></div>
              <input type="hidden" name="cbxIsLHS" id="aa4">
            </li>
            <!--<li class="pdli"><span>支付<font class="pdfo">0.5</font>个麦粒</span></li>-->
            <li>
              <div id="a5" lang="5" alt="0" class="nulldiv" title="从头到尾浏览宝贝，并提供底图截图"></div>
              <input type="hidden" name="isViewEnd" id="aa5">
            </li>
            <!--<li class="pdli"><span>支付<font class="pdfo">0.5</font>个麦粒</span></li>-->
          </ul>
          <ul class="pdul">
            <li>
              <div id="a9" lang="8" alt="0" class="nulldiv" title="接手确认收货好评时需要上传的好评图片"></div>
              <input type="hidden" name="pinimage" id="aa9">
            </li>
            <!--<li class="pdli"><span>每张支付<font class="pdfo">0.5</font>个麦粒</span></li>-->
            <li class="pdli">
              <div class="haoPingWrap" style="float:left;margin-left:-68px;"> <span class="uploadImg" style="float:left;height:39px;margin-left:0px;width:131px;">
                <input type="file" name="file" class="file" id="upfile-haoping" size="25">
                <input type="button" class="button" style="width:120px;padding:8px 0px;border-radius:2px;font-size: 16px;background: #f60;border:#f60" value="上传图片">
                </span> <span id="info-upfile-haoping" class="upload-info green"></span> </div>
            </li>
            <li class="pdli">
              <div class="value long">
                <input id="haoping-upfile-1" hidden="" type="text" title="没有图片请保留空" readonly="" style="width:206px;height:20px" maxlength="150" name="photoUrls">
              </div>
            </li>
          </ul>
          <ul class="pdul">
            <li>
              <div id="a10" lang="10" alt="0" class="nulldiv" title="在商品页面停留相应时间，卖家可使用量子查看接手是否达标"></div>
              <input type="hidden" name="stopDsTime" id="aa10">
            </li>
            <li class="pdli11">
              <input type="radio" name="stopTime" value="1" checked="checked">
              停1分钟<span class="f12"> <!--（<font class="pdfo">0.1</font>个麦粒）--></span></li>
            <li class="pdli11">
              <input type="radio" name="stopTime" value="2">
              停2分钟<span class="f12"> <!--（<font class="pdfo">0.3</font>个麦粒）--></span></li>
            <li class="pdli11">
              <input type="radio" name="stopTime" value="3">
              停3分钟<span class="f12"> <!--（<font class="pdfo">0.5</font>个麦粒）--></span></li>
          </ul>
          <ul class="pdul">
            <li>
              <div id="a11" lang="12" alt="0" class="nulldiv" title="规定好评内容。如：衣服质量很好，穿着舒适"></div>
              <input type="hidden" name="cbxIsMsg" id="aa11">
            </li>
            <li class="pdlli12">
              <input id="hpnr" type="text" class="inputp" name="txtMessage" placeholder="如果需要接手方带字好评请勾选，并填写规定好评内容。不勾选则默认不带字好评">
              <!--支付<font class="pdfo">0.5</font>个麦粒--></li>
          </ul>
          <ul class="pdul">
            <li>
              <div id="a12" lang="13" alt="0" class="nulldiv" title="留言提醒接手需要注意的地方，或写暗语。但切勿以此增加要求并要挟接手，否则将予以惩罚"></div>
              <input type="hidden" name="cbxIsTip" id="aa12">
            </li>
            <li class="pdlli13">
              <input type="text" id="lytx" class="inputp" name="txtRemind" placeholder="在此给接手留言提醒注意事项。也可写暗语让您不用登陆平台都知道是刷手">
            </li>
          </ul>
        </div>
      </div>
      <div id="screen" data-step="4" data-intro="筛选出您想要的接手（接手人）">
        <div class="pt"> <span class="h40"> <img class="h41" src="<?php echo VERSION2;?>taskcss/blue.png" alt="">筛选接手： </span> </div>
        <div class="scmain">
          <ul class="pdul">
            <li>
              <div id="a14" lang="14" alt="0" class="nulldiv" title="您手动审核接手，通过后才可接手任务"></div>
              <input type="hidden" name="cbxIsAudit" id="aa14">
            </li>
            <!--<li class="pdli"><span>支付<font class="pdfo">0.5</font>个麦粒</span></li>-->
            <li>
              <div id="a15" lang="15" alt="0" class="nulldiv" title="要求接手使用实名认证的买号"></div>
              <input type="hidden" name="isReal" id="aa15">
            </li>
            <!--<li class="pdli"><span>支付<font class="pdfo">0.5</font>个麦粒</span></li>-->
            <li>
              <div id="a16" lang="16" alt="0" class="nulldiv" title="要求接手方必须是已加入平台商保的接手"></div>
              <input type="hidden" name="cbxIsSB" id="aa16">
            </li>
            <!--<li class="h32"><span>支付<font class="pdfo">2.0</font>个麦粒</span></li>-->
          </ul>
          <ul class="pdul">
            <li>
              <div id="a17" lang="17" alt="0" class="nulldiv" title="限制接手一定时限内接手任务数"></div>
              <input type="hidden" name="cbxIsFMaxMCount" id="aa17">
            </li>
            <li class="pdli11">
              <input type="radio" name="fmaxmc" value="1" checked="checked">
              1天接1个<span class="f12"> <!--（<font class="pdfo">0.5</font>个麦粒）--></span></li>
            <li class="pdli11">
              <input type="radio" name="fmaxmc" value="2">
              1天接2个<span class="f12"> <!--（<font class="pdfo">0.2</font>个麦粒）--></span></li>
            <li class="pdli11">
              <input type="radio" name="fmaxmc" value="3">
              1周接1个<span class="f12"> <!--（<font class="pdfo">1.0</font>个麦粒）--></span></li>
          </ul>
          <ul class="pdul">
            <li>
              <div id="a18" lang="18" alt="0" class="nulldiv" title="指定地区的接手方可接手任务"></div>
              <input type="hidden" name="isLimitCity" id="aa18">
            </li>
            <li class="h34">
              <select id="Province" name="Province" class="ui-select zhsr">
                <option value="北京市">北京市</option>
                <option value="上海市">上海市</option>
                <option value="天津市">天津市</option>
                <option value="重庆市">重庆市</option>
                <option value="河北省">河北省</option>
                <option value="山西省">山西省</option>
                <option value="辽宁省">辽宁省</option>
                <option value="吉林省">吉林省</option>
                <option value="黑龙江">黑龙江</option>
                <option value="江苏省">江苏省</option>
                <option value="浙江省">浙江省</option>
                <option value="安徽省">安徽省</option>
                <option value="福建省">福建省</option>
                <option value="江西省">江西省</option>
                <option value="山东省">山东省</option>
                <option value="河南省">河南省</option>
                <option value="湖北省">湖北省</option>
                <option value="湖南省">湖南省</option>
                <option value="广东省">广东省</option>
                <option value="甘肃省">甘肃省</option>
                <option value="陕西省">陕西省</option>
                <option value="湖南省">湖南省</option>
                <option value="内蒙古">内蒙古</option>
                <option value="广西">广西</option>
                <option value="四川省">四川省</option>
                <option value="贵州省">贵州省</option>
                <option value="云南省">云南省</option>
                <option value="西藏">西藏</option>
                <option value="新疆">新疆</option>
                <option value="香港">香港</option>
                <option value="奥门">奥门</option>
                <option value="台湾">台湾</option>
              </select>
            </li>
            <li class="scli1" title="按住Shifl键加单击选项，可多选！">
             <!-- (支付<font class="pdfo">2.0</font>个麦粒)--></span></li>
          </ul>
          <ul class="pdul">
            <li>
              <div id="a19" lang="19" alt="0" class="nulldiv" title="指定接手买号的等级"></div>
              <input type="hidden" name="isBuyerFen" id="aa19">
            </li>
            <li class="h34">
              <select name="BuyerJifen" id="BuyerJifen" class="ui-select zhsr">
                <option value="1">一心及以上  （支付 0.5 麦粒）</option>
                <option value="2">二心及以上  （支付 1.0 麦粒）</option>
                <option value="3">三心及以上  （支付 2.0 麦粒）</option>
                <option value="4">四心及以上  （支付 3.0 麦粒）</option>
                <option value="5">五心及以上  （支付 4.0 麦粒）</option>
                <option value="6">一钻及以上  （支付 5.0 麦粒）</option>
                <option value="7">二钻及以上  （支付 6.0 麦粒）</option>
                <option value="8">三钻及以上  （支付 7.0 麦粒）</option>
                <option value="9">四钻及以上  （支付 8.0 麦粒）</option>
                <option value="10">五钻及以上  （支付 9.0 麦粒）</option>
              </select>
            </li>
            <li class="scli2">此等级以上可接任务<span><!--（支付<font class="pdfo">0.5 - 9.0</font>个麦粒）--></span></li>
          </ul>
          <ul class="pduzz">
            <li>
              <div id="a20" lang="20" alt="0" class="nulldiv" title="过滤不符合要求的接手"></div>
              <input type="hidden" id="aa20" name="filtertasker">
            </li>
          </ul>
          <div class="nyd">
            <ul class="pdul_1">
              <li class="h100">接手积分不低于 :
              </li>
              <li class="h99">
                <input type="radio" name="fmingrade" value="10" checked="checked">
                10 </li>
              <li class="h99">
                <input type="radio" name="fmingrade" value="30">
                30 </li>
              <li class="h99">
                <input type="radio" name="fmingrade" value="50">
                50</li>
              <li class="h99">
                <input type="radio" name="fmingrade" value="100">
                100</li>
              <li class="s32"><!--<span>支付<font class="pdfo">0.5</font>个麦粒</span>--></li>
            </ul>
            <ul class="pdul_1">
              <li class="h100">接手好评率不低于 :
              </li>
              <li class="h99">
                <input type="radio" name="fmaxabc" value="98" checked="checked" />
                98% </li>
              <li class="h99">
                <input type="radio" name="fmaxabc" value="95" />
                95%</li>
              <li class="h99">
                <input type="radio" name="fmaxabc" value="90" />
                90%</li>
            </ul>
            <ul class="pdul_1">
              <li class="h100">接手被拉黑次数不大于 :
              </li>
              <li class="h99">
                <input type="radio" name="fmaxbbc" value="5" checked="checked" />
                5</li>
              <li class="h99">
                <input type="radio" name="fmaxbbc" value="10" />
                10 </li>
              <li class="h99">
                <input type="radio" name="fmaxbbc" value="15" />
                15</li>
            </ul>
            <ul class="pdul_1">
              <li class="h100">接手被有效投诉次数不大于 :
              </li>
              <li class="h99">
                <input type="radio" name="fmaxbtsc" value="2" checked="checked" />
                2 </li>
              <li class="h99">
                <input type="radio" name="fmaxbtsc" value="3" />
                3 </li>
              <li class="h99">
                <input type="radio" name="fmaxbtsc" value="4" />
                4</li>
            </ul>
          </div>
        </div>
      </div>
      <div id="express" class="div" data-step="5" data-intro="根据您手头的单号资源进行选择，可搜索“空包网”自行购买。">
        <div class="pt"> <span class="h40"> <img class="h41" src="<?php echo VERSION2;?>taskcss/blue.png" alt="">快递空包： </span> <span class="c35"><a href="http://help.milioo.com/posts/view/79452" target="_blank"><img src="<?php echo VERSION2;?>taskcss/c3_08.png" alt="如何解决快递空包" title="如何解决快递空包"></a></span> </div>
        <div class="exmain">
          <ul class="pdul">
            <li>
              <div id="a21" lang="21" alt="0" class="nulldiv" title="要求接手使用真实地址签收快递"></div>
              <input type="hidden" name="isSign" id="aa21">
            </li>
            <!--<li class="pdli"><span>支付<font class="pdfo">2.0</font>个麦粒</span></li>-->
          </ul>
          <ul class="pdul" style="display:none">
            <li>
              <div id="a22" lang="22" alt="0" class="nulldiv" title="购买真实空包快递单号"></div>
              <input type="hidden" name="isxtzs" id="aa22">
            </li>
            <li class="pdli11">
              <input type="radio" name="zd_one">
              顺丰（<font class="pdfo">3</font>元）</li>
          </ul>
          <ul class="pc1">
            <li>
              <div id="a23" lang="23" alt="0" class="nulldiv" title="规定接手拍下商品时使用的地址"></div>
              <input type="hidden" name="cbxIsAddress" id="aa23">
            </li>
            <li class="h97">姓名：
              <input type="text" name="cbxName" id="cbxName" class="shdz pc11 inputp">
            </li>
            <li class="h97">手机：
              <input type="text" name="cbxMobile" id="cbxMobile" class="pc11 inputp shdz" onkeyup="this.value=this.value.replace(/[^0-9-]+/,&#39;&#39;);" maxlength="11">
            </li>
            <li class="h97">邮编：
              <input type="text" name="cbxcode" id="cbxcode" class="pc11 inputp shdz">
            </li>
            <!--<li class="s33"><span>支付<font class="pdfo">0.5</font>个麦粒</span></li>-->
          </ul>
          <div class="address1">
            <div class="add1"> 地址： </div>
            <textarea name="cbxAddress" id="cbxAddress" cols="45" id="cbxAddress" rows="6" class="texta shdz" placeholder="此处填写您要求接收人的修改的收货地址，包含具体省、市、区及详细地址，请不要填写“请带字好评”等引导的文字。"></textarea>
          </div>
          <ul class="pdul moban_t">
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
    
    //计算麦粒
    function needMinLi()
    {
        var txtPrice=$("#txtPrice").val();//商品价格
        var MinLi=0;
        if(txtPrice>0)
        {
            if(txtPrice>0 && txtPrice<81)//价格1-80元
                MinLi=2
            if(txtPrice>80 && txtPrice<151)//价格81-150元
                MinLi=3
            if(txtPrice>150 && txtPrice<201)//价格151-200元
                MinLi=4
            if(txtPrice>200 && txtPrice<351)//价格201-350元
                MinLi=5
            if(txtPrice>350 && txtPrice<501)//价格351-500元
                MinLi=6
            if(txtPrice>500 && txtPrice<1001)//价格501-1000元
                MinLi=8
            if(txtPrice>1000)//价格1001元以上
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
<script src="http://libs.baidu.com/jquery/1.9.1/jquery.min.js"></script>
<script src="http://res.layui.com/lay/lib/layer/layer.js"></script>
<script src="http://res.layui.com/lay/lib/laycode/laycode.min.js"></script>
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
    	layer.confirm('请先绑定淘宝掌柜名', {
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
?>
