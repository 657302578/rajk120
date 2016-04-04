<?php
            echo $this->renderPartial('/user/usercenterTopNav')
        ?>
<!--维护资料密码-->

<div class="d_qie2">
  <div class="d_menu">
    <ul>
      <li class="now"> 修改个人资料 </li>
      <li class="changeMyPasspord"> 修改登录密码 </li>
      <li class="changeSafePwd"> 修改安全操作码 </li>
      <li class="getBackSafePwd"> 取回安全操作码 </li>
    </ul>
  </div>
  <div class="d_n">
    <form class="changeMyInfos">
      <div class="d_new1">
        <!--d_new1 start-->
        <p class="d_name">用户名：<span class="d_span"><?php echo Yii::app()->user->getName();?></span></p>
        <div class="touxiang clearfix">
          <p>头像：</p>
          <img class="myheadImg" src="<?php echo $userinfo->MyPhoto!=""?$userinfo->MyPhoto:VERSION2.'img/avatar.png';?>" />
          <div class="xiugai"> <span class="xiu_span" id="image3"><a href="javascript:;">点击修改头像</a></span> <span class="xiu_span1">图片建议大小：150px*150px,格式：.jpg,.gif,.bmp</span>
            <input type="hidden" id="url3" name="headImg" class="pc11 inputp s36_ts" readonly="readonly" placeholder="上传头像" style="background: #F0F0F0; height:30px; line-height:30px;" value="<?php echo $userinfo->MyPhoto;?>">
            <span id="imagewarning3" style="color: green; padding-left:10px;"><font style="color:red;"></font></span> </div>
        </div>
        <div class="d_phone clearfix">
          <p>手机号码：</p>
          <span class="d_p_span1"><?php echo substr_replace($userinfo->Phon,'***',3,4);?></span><span class="d_p_span2 changMyPhone"><a href="javascript:;">修改手机号</a></span> </div>
        <div class="d_input">
          <ul>
            <li class="newinput"><font class="newth">QQ号码：</font>
              <input type="text" name="qq" class="myqq" value="<?php echo $userinfo->QQToken;?>" <?php echo $userinfo->QQToken!=""?'readonly="readonly" style="background:#e9e8e8"':''?>/>
              <span style="color: red; padding-left:10px;">接任务时财付通使用此QQ号，收款人必须与真实姓名一致，一经设置，无法自行修改。</span></li>
            <li class="newinput"><font class="newth">真实姓名：</font><input type="text" name="truename" value="<?php echo $userinfo->TrueName;?>" class="myname" <?php echo $userinfo->TrueName!=""?'readonly="readonly" style="background:#e9e8e8"':''?> />
              <span style="color: red;">真实姓名和身份证号码一经设置，无法更改，请谨慎填写，这将关系到您后期的提现等操作！！</span></li>
            <li class="newinput"><font class="newth">身份证号：</font>
              <input type="text"  <?php echo ($userinfo->id_card != "" && $userinfo->id_is_check == 1 ) ? 'readonly="readonly" style="background:#e9e8e8"':''?> name="id_card" value="<?php echo $userinfo->id_card;?>" class="myname"  />
			  <span style="color:#FF0000; font-weight:bold;"><?php if($userinfo->id_is_check) {?>审核通过<?php }elseif($userinfo->id_is_check == 2){?>审核未通过，请修改<?php }else{?>待审核(审核通过后才能接单)<?php }?></span>
            </li>
            <li class="newinput"><font class="newth">身份证正面：</font><input type="text" name="id_photo_front" <?php echo ($userinfo->id_photo_front != "" && $userinfo->id_is_check == 1 )?'readonly="readonly" style="background:#e9e8e8"':''?> id="id_photo_front_show" value="<?php echo $userinfo->id_photo_front;?>" class="myname"  />
			  <?php if($userinfo->id_is_check != 1){?>
			  <a id="id_photo_front" href="javascript:;">点击上传照片</a><span>请上传高清大图原图，上传后请联系客服QQ及时审核。</span>
			  <?php if(!empty($userinfo->id_photo_front)){?> <a href="<?php echo $userinfo->id_photo_front;?>" target="_blank" title="查看">查看</a> <?php }?>
			  <?php }else{?>
			  	<a href="<?php echo $userinfo->id_photo_front;?>" target="_blank" title="查看">查看</a>
			  <?php }?>
			  
            </li>
            <li class="newinput"><font class="newth">身份证反面：</font><input type="text" <?php echo ($userinfo->id_photo_rear && $userinfo->id_is_check == 1) != ""?'readonly="readonly" style="background:#e9e8e8"':''?> name="id_photo_rear" id="id_photo_rear_show" value="<?php echo $userinfo->id_photo_rear;?>" class="myname"  />
			  <?php if($userinfo->id_is_check != 1){?>
			 <a id="id_photo_rear" href="javascript:;">点击上传照片</a><span>请上传高清大图原图，上传后请联系客服QQ及时审核。</span>
			     <?php if(!empty($userinfo->id_photo_rear)){?> <a href="<?php echo $userinfo->id_photo_rear;?>" target="_blank" title="查看">查看</a> <?php }?>
			 <?php }else{?>
			  	<a href="<?php echo $userinfo->id_photo_rear;?>" target="_blank" title="查看">查看</a>
			  <?php }?>
			  
            </li>
			<li class="newinput"><font class="newth">支付宝账号：</font><input type="text"  <?php if(!empty($userinfo->alipay_account)){ ?> readonly="readonly" style="background:#e9e8e8" <?php }?> name="alipay_account" id="alipay_account" value="<?php echo $userinfo->alipay_account;?>" class="myname"  /><span style="color: red;">请填写与真实姓名一致的收款支付宝帐号，仅发任务可不填，一经设置，无法自行修改。</span>
            </li>
            <li class="newinput"><font class="newth">Email :</font><span class="emailstyle"><?php echo substr_replace($userinfo->Email,'***',3,3);?></span	></li>
          </ul>
        </div>
        <input type="hidden" name="sex" value="1" />
        <!-- <div class="d_check clearfix">
          <ul>
            <li class="newinput"><font class="newth">性别 :</font>
              <label>
              <input type="radio" name="sex" class="d_radio1 mysex" value="1" <?php echo $userinfo->Sex==1?'checked="checked"':'';?> />
              <span>男</span></label>
              <label>
              <input type="radio" name="sex" value="0" class="d_radio2 mysex" <?php echo $userinfo->Sex==0?'checked="checked"':'';?>/>
              <span>女</span></label>
            </li>
			<input type="hidden" name="PlaceOtherLogin" value="0" />
          </ul>
        </div> -->
        <div class="d_check clearfix">
            <ul>
            <li class="newinput">
                  <font class="newth">收货地址 :</font>
                  <?php
                  echo CHtml::dropDownList('idProvince', ''.isset($address) ? $address->sheng_id : ''.'', CHtml::listData($area, 'id', 'name'),
                      array(
                          'prompt' => '选择省份',
                          'ajax' => array(
                              'type' => 'POST',
                              'url' => $this->createUrl('user/updateCities'),
                              'dataType' => 'json',
                              'data' => array('idProvince' => 'js:this.value'),
                              'success' => 'function(data) {
                            $("#idCity").html(data.dropDownCities);
                            $("#idDistrict").html(data.dropDownDistricts);
                        }',
                          )));
                  echo CHtml::dropDownList('idCity', ''.isset($address) ? $address->shi_id : ''.'',  CHtml::listData($shi, 'id', 'name'),
                      array(
                          'prompt' => '选择城市',
                          'ajax' => array(
                              'type' => 'POST',
                              'url' => $this->createUrl('user/updateDistricts'),
                              'update' => '#idDistrict',
                              'data' => array('idCity' => 'js:this.value'),
                          )));
                  echo CHtml::dropDownList('idDistrict', ''.isset($address) ? $address->qu_id : ''.'',  CHtml::listData($qu, 'id', 'name'), array('prompt' => '选择区域'));
                  ?>
              </li>
              <li class="newinput">
              <font class="newth">收货人姓名：</font>
              <input type="text" name="addr[user_name]" value="<?php if($address) echo  $address->user_name;?>" <?php if(isset($address) && !empty($address->user_name)){?> readonly="readonly" style="background:#e9e8e8" <?php } ?> />
                </li>
                <li class="newinput"><font class="newth">收货人手机号：</font><input <?php if(isset($address) && !empty($address->mobile)){?> readonly="readonly" style="background:#e9e8e8" <?php } ?> type="text" name="addr[mobile]" value="<?php if($address) echo  $address->mobile;?>" /><br/>
                </li><li class="newinput"><font class="newth">收货人地址：</font><input <?php if(isset($address) && !empty($address->address)){?> readonly="readonly" style="background:#e9e8e8" <?php } ?> type="text" name="addr[address]" value="<?php if($address) echo  $address->address;?>" />
              
              </li><li class="newinput">
              <span class="shuoming">仅发任务可不填写，接任务必须填写！</span>
            </li>
          </ul>
        </div>
        <div class="d_tijiao"><a href="javascript:;" class="changMyInfo">提交更改</a></div>
      </div>
    </form>
  </div>
</div>
<!--维护资料密码-->
<!--注册登录检测-->
<script src="<?php echo VERSION2;?>js/jquery.js"></script>
<link rel="stylesheet" href="<?php echo ASSET_URL;?>kindeditor/themes/default/default.css" />
<script src="<?php echo ASSET_URL;?>kindeditor/kindeditor.js"></script>
<script src="<?php echo ASSET_URL;?>kindeditor/lang/zh_CN.js"></script>
<!--layer插件-->
<script src="<?php echo ASSET_URL;?>layer/jquery.min.js"></script>
<script src="<?php echo ASSET_URL;?>layer/layer.js"></script>
<script src="<?php echo ASSET_URL;?>layer/laycode.min.js"></script>
<link href="<?php echo ASSET_URL;?>layer/layer.css" rel="stylesheet" type="text/css" />
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
					    layer.tips('头像上传成功，记得要提交更改哦-_-', '.touxiang img'); 
						K('#url3').val(url);
                        K('.touxiang img').attr("src",url);
						editor.hideDialog();
					}
				});
			});
		});
		K('#id_photo_front').click(function() {
			editor.loadPlugin('image', function() {
				editor.plugin.imageDialog({
					showRemote : false,
					imageUrl : K('#id_photo_front_show').val(),
					clickFn : function(url, title, width, height, border, align) {
						K('#id_photo_front_show').val(url);
						editor.hideDialog();
					}
				});
			});
		});
		//
		K('#id_photo_rear').click(function() {
			editor.loadPlugin('image', function() {
				editor.plugin.imageDialog({
					showRemote : false,
					imageUrl : K('#id_photo_rear_show').val(),
					clickFn : function(url, title, width, height, border, align) {
						K('#id_photo_rear_show').val(url);
						editor.hideDialog();
					}
				});
			});
		});
		//
	});
    
    $(function(){
        $("#sheng_id").change(function(){
            alert('ddd');
        });
        //修改个人资料
        $(".changMyInfo").click(function(){
            if($(".myqq").val()=="")//QQ不为空
            {
                layer.tips('QQ号不能为空', '.myqq');
            }else if($(".myname").val()=="")//真实姓名不能为空
            {
                layer.tips('真实姓名不能为空', '.myname');
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
                				if(msg=="SUCCESS")//安全正确
                                {
                                    //ajax提交需要修改的资料
                                    $.ajax({
                            			type:"POST",
                            			url:"<?php echo $this->createUrl('user/userAccountCenter');?>",
                            			data:$(".changeMyInfos").serialize(),
                            			success:function(msg)
                            			{
                            				if(msg=="SUCCESS")
                                            {
                                                layer.confirm('资料修改成功', {
                                                	btn: ['知道了'] //按钮
                                                },function(){
                                                    location.reload();
                                                });
                                            }else
                                            {
                                                layer.confirm('资料修改失败，您可以联系我们的客服人员', {
                                                	btn: ['知道了'] //按钮
                                                },function(){
                                                    location.reload();
                                                });
                                            }
                            			}
                            		});
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
        
        //修改密码
        $(".changeMyPasspord").click(function(){
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
            				if(msg=="SUCCESS")//安全正确
                            {
                                layer.confirm('输入新密码：<input type="password" name="newpwd" class="text1 newpwd" style="margin-left:5px;" /><br/>请再次输入：<input type="password" name="newpwd" class="text1 newpwdagain" style="margin-left:5px;" /><br/>', {
                                	btn: ['确定修改','取消修改'] //按钮
                                },function(){
                                    if($(".newpwd").val()=="")
                                    {
                                        layer.tips('新密码不能为空', '.newpwd');
                                        exit;
                                    }
                                    if($(".newpwdagain").val()=="")
                                    {
                                        layer.tips('确认密码不能为空', '.newpwdagain');
                                        exit;
                                    }
                                    if($(".newpwd").val()!=$(".newpwdagain").val())//两次输入的密码不相等
                                    {
                                        layer.tips('两次输入的密码不一致', '.newpwdagain');
                                        exit;
                                    }
                                    
                                    //检查通过修改密码
                                    $.ajax({
                            			type:"POST",
                            			url:"<?php echo $this->createUrl('user/changPassword');?>",
                            			data:{"newpassword":$(".newpwd").val()},
                            			success:function(msg)
                            			{
                                            if(msg=="SUCCESS")
                                            {
                                				layer.confirm('密码修改成功，您需要使用新密码重新登录', {
                                                	btn: ['重新登录'] //按钮
                                                },function(){
                                                    window.location.href='<?php echo $this->createUrl('site/loginout')?>';
                                                },function(){
                                                    window.location.href='<?php echo $this->createUrl('site/loginout')?>';
                                                });
                                            }else
                                            {
                                                layer.confirm('<span style="color:red;">密码修改失败，您可以联系我们的客服人员</span>', {
                                                	btn: ['知道了'] //按钮
                                                },function(){
                                                    location.reload();
                                                });
                                            }
                            			}
                            		});
                                    
                                },function(){
                                    location.reload();//重新加载当前页面
                                });
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
        });
        
        //修改安全码
        $(".changeSafePwd").click(function(){
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
                                layer.confirm('输入新安全码：<input type="password" name="newSafepwd" class="text1 newSafepwd" style="margin-left:5px;" /><br/>再次确认输入：<input type="password" name="newSafepwd" class="text1 newSafepwdagain" style="margin-left:5px;" /><br/>', {
                                	btn: ['确定修改','取消修改'] //按钮
                                },function(){
                                    if($(".newSafepwd").val()=="")
                                    {
                                        layer.tips('新的安全码不能为空', '.newSafepwd');
                                        exit;
                                    }
                                    if($(".newSafepwdagain").val()=="")
                                    {
                                        layer.tips('确认安全码不能为空', '.newSafepwdagain');
                                        exit;
                                    }
                                    if($(".newSafepwd").val()!=$(".newSafepwdagain").val())//两次输入的密码不相等
                                    {
                                        layer.tips('两次输入的安全码不一致', '.newSafepwdagain');
                                        exit;
                                    }
                                    
                                    //检查通过修改密码
                                    $.ajax({
                            			type:"POST",
                            			url:"<?php echo $this->createUrl('user/changSafepwd');?>",
                            			data:{"newSafepwd":$(".newSafepwd").val()},
                            			success:function(msg)
                            			{
                                            if(msg=="SUCCESS")
                                            {
                                				layer.confirm('安全码修改成功', {
                                                	btn: ['知道了'] //按钮
                                                },function(){
                                                    location.reload();
                                                });
                                            }else
                                            {
                                                layer.confirm('<span style="color:red;">安全码修改失败，您可以联系我们的客服人员</span>', {
                                                	btn: ['知道了'] //按钮
                                                },function(){
                                                    location.reload();
                                                });
                                            }
                            			}
                            		});
                                    
                                },function(){
                                    location.reload();//重新加载当前页面
                                });
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
        });
        
        //取回安全操作码
        $(".getBackSafePwd").click(function(){
            layer.open({
                type: 2,
                title:'找回安全操作码',
                area: ['500px','330px'],
                skin: 'layui-layer-rim', //加上边框
                content: ['<?php echo $this->createUrl('user/usergetBackSafePwd');?>', 'no']
            });
        });
        
        //修改手机号码
        $(".changMyPhone").click(function(){
            layer.open({
                type: 2,
                title:'修改手机号码',
                area: ['500px','330px'],
                skin: 'layui-layer-rim', //加上边框
                content: ['<?php echo $this->createUrl('user/userChangPhone');?>', 'no']
            });
        });
    })
</script>
