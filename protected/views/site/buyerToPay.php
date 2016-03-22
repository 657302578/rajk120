<html>
<style>
    *{ margin:0; padding:0; font-size:12px; font-family:"微软雅黑"}
    a{ text-decoration: none;}
    li{ list-style:none;}
    .payContent{ width:auto; position: relative;}
    .PaystepArea{ width:500px; min-height:480px; margin: 0 auto; line-height: 25px; margin-top:10px; position:relative;}
    .HB{ display: block;}
    .lastStep{ display: none;}
    #image3,#url3,#image4,#url4,#url55,#image55{ border-radius: 3px; cursor: pointer; cursor: pointer;}
    #url3,#url4,#url55,#url5,#url6,#url7,#url8{ width:200px;}
    .hbitem{ width: 100%; height: auto; border:1px dashed #57a0ff; padding: 10px 0;}
    .hbitemTip{ color: red; font-weight: bold;}
    .hbitem li{ width:95%; line-height:25px; margin:0 auto;}
    .hbitem font{ color:#57a0ff; font-weight:bold;}
    .hbitem span{ color:#ff5940;}
    .importantWarning{ line-height: 40px; font-weight:bold; color:red; text-align: center;}
    .firstStep{
        width:480px;
        margin:0 auto;
        height: 35px;
    	text-align: center;
    	line-height: 35px;
        border:none;
    	color: #fff;
    	background: #fc772d;
    	border-radius: 5px;
        cursor: pointer;
        font-size:14px;
        font-weight:bold;
        position: relative;
        left:13px;  
     }
     .cetainStepComplete{
        width:480px;
        margin:0 auto;
        height: 35px;
    	text-align: center;
    	line-height: 35px;
        border:none;
    	color: #fff;
    	background: #fc772d;
    	border-radius: 5px;
        cursor: pointer;
        font-size:14px;
        font-weight:bold;
        position: relative;
        left:13px;         
     }
     #image3,#image4,#image5,#image6,#image7,#image8,.imagewarning{ cursor: pointer; border-radius: 4px;}
</style>
<body>
<!--接手付款步骤区域iframe-->
    <div class="PaystepArea HB"><!--PaystepArea start-->
        <p>该任务属于商品来路任务，且需要接手方<a style="color: red;">货比3家</a>后才能验证商品来路　<a style="color: red;">帮助教程</a></p>
        <!--货比第1家-->
        <div class="hbitemTip">货比第1家商品：</div>
        <div class="hbitem">
          <li><font>第一步</font>：请在淘宝首页搜索：<span><?php echo $taskInfo->divKey;?></span></li>
          <li><font>第二步</font>：根据搜索结果列表，打开其中一个商品</li>
          <li><font>第三步</font>：
            <input type="text" id="url3" name="goodsImgPosition" class="pc11 inputp s36_ts" readonly="readonly" placeholder="上传商品位置截图" style="background: #F0F0F0; height:30px; line-height:30px;">
            <input type="button" id="image3" value="上传货比商品截图" style="font-weight: normal; padding:0 8px; border:none; background:#3498db; color:#fff; width:auto; height:30px; font-size:12px;">
            <span id="imagewarning3" style="color: green; padding-left:10px;"><font style="color:red;">*必须上传</font></span>
          </li>
          <li><font>提示：</font><span>请不要上传重复的商品地址截图和掌柜名名为<font style="color:green;"><?php echo $taskInfo->ddlZGAccount;?></font>的商品</span></li>
        </div>
        <!--货比第2家-->
        <div class="hbitemTip">货比第2家商品：</div>
        <div class="hbitem">
          <li><font>第一步</font>：请在淘宝首页搜索：<span><?php echo $taskInfo->divKey;?></span></li>
          <li><font>第二步</font>：根据搜索结果列表，打开其中一个商品</li>
          <li><font>第三步</font>：
            <input type="text" id="url4" name="goodsImgPosition" class="pc11 inputp s36_ts" readonly="readonly" placeholder="上传商品位置截图" style="background: #F0F0F0; height:30px; line-height:30px;">
            <input type="button" id="image4" value="上传货比商品截图" style="font-weight: normal; padding:0 8px; border:none; background:#3498db; color:#fff; width:auto; height:30px; font-size:12px;">
            <span id="imagewarning4" style="color: green; padding-left:10px;"><font style="color:red;">*必须上传</font></span>
          </li>
          <li><font>提示：</font><span>请不要上传重复的商品地址截图和掌柜名名为<font style="color:green;"><?php echo $taskInfo->ddlZGAccount;?></font>的商品</span></li>
        </div>
        <!--货比第3家-->
        <div class="hbitemTip">货比第3家商品：</div>
        <div class="hbitem">
          <li><font>第一步</font>：请在淘宝首页搜索：<span><?php echo $taskInfo->divKey;?></span></li>
          <li><font>第二步</font>：根据搜索结果列表，打开其中一个商品</li>
          <li><font>第三步</font>：
            <input type="text" id="url55" name="goodsImgPosition" class="pc11 inputp s36_ts" readonly="readonly" placeholder="上传商品位置截图" style="background: #F0F0F0; height:30px; line-height:30px;">
            <input type="button" id="image55" value="上传货比商品截图" style="font-weight: normal; padding:0 8px; border:none; background:#3498db; color:#fff; width:auto; height:30px; font-size:12px;">
            <span id="imagewarning55" style="color: green; padding-left:10px;"><font style="color:red;">*必须上传</font></span>
          </li>
          <li><font>提示：</font><span>请不要上传重复的商品地址截图和掌柜名名为<font style="color:green;"><?php echo $taskInfo->ddlZGAccount;?></font>的商品</span></li>
        </div>
        <div class="importantWarning">请注意：请接手一定在通过验证商品后再淘宝拍下支付，否则将无法继续任务</div>
        <button class="firstStep">确定并进入下一步</button>
    </div><!--PaystepArea end-->
    
    <div class="PaystepArea lastStep"><!--PaystepArea start-->
        <p>完成第一步、第二步商家商品网址进行验证(这是最终购买商品，请拍下)</p>
        <div class="hbitem">
          <li><font>第一步</font>：请在淘宝首页搜索：<span><?php echo $taskInfo->divKey;?></span></li>
          <li><font>第二步</font>：根据搜索提示打开列表中掌柜名为<font><?php echo $taskInfo->ddlZGAccount;?></font>的商品</li>
          <li><font>第三步</font>：复制商品页面地址栏的地址，并粘贴到下面，然后点击【验证商品】按钮；<br />
            <input type="text" id="txtGoodsUrl" name="txtGoodsUrl" checkRes="0" class="pc11 inputp s36_ts" placeholder="商品链接地址" style=" width:300px; text-indent: 10px; height:30px; line-height:30px;" />
            <span id="checkTxtGoodsUrl" style="font-weight: normal; padding:7px 8px; border:none; background:#3498db; color:#fff; text-indent: 10px; width:auto; height:30px; font-size:12px; cursor: pointer;" lang="<?php echo $taskInfo->id;?>">验证商品</span>
            <span id="imagewarning" style="color: green; padding-left:10px;"><font style="color:red;">必须验证</font></span>
          </li>
          <li><font style="color:green; font-weight:bold;">搜索提示1：<?php echo $taskInfo->txtSearchDes;?></font></li>
          <li><font style="color:green; font-weight:bold;">搜索提示2：<a href="javascript:;" class="goodPositionImgTip" lang="<?php echo $taskInfo->goodsImgPosition;?>">点击查看图片</a></font></li>
          
          <li><font>浏览到底</font>：<span>此任务需要上传商品底部图片</span></li>
          <li><font>底部截图</font>：
            <input type="text" id="url5" name="goodsImgPosition" class="pc11 inputp s36_ts" readonly="readonly" placeholder="商品底部截图" style="background: #F0F0F0; height:30px; line-height:30px;">
            <input type="button" id="image5" value="上传商品底部截图" style="font-weight: normal; padding:0 8px; border:none; background:#3498db; color:#fff; width:auto; height:30px; font-size:12px;">
            <span id="imagewarning5" style="color: green; padding-left:10px;"><font style="color:red;">*必须上传</font></span>
          </li>
          
          <li><font>收藏商品</font>：<span>此任务需要上传商品底部图片</span></li>
          <li><font>收藏截图</font>：
            <input type="text" id="url6" name="goodsImgPosition" class="pc11 inputp s36_ts" readonly="readonly" placeholder="商品收藏截图" style="background: #F0F0F0; height:30px; line-height:30px;">
            <input type="button" id="image6" value="上传商品收藏截图" style="font-weight: normal; padding:0 8px; border:none; background:#3498db; color:#fff; width:auto; height:30px; font-size:12px;">
            <span id="imagewarning6" style="color: green; padding-left:10px;"><font style="color:red;">*必须上传</font></span>
          </li>
          
          <li><font>商品浏览</font>：<span>些任务需要额外浏览店内其他2件商品，浏览后进行截图</span></li>
          <li><font>商品截图</font>：
            <input type="text" id="url7" name="goodsImgPosition" class="pc11 inputp s36_ts" readonly="readonly" placeholder="商品1截图" style="background: #F0F0F0; height:30px; line-height:30px;">
            <input type="button" id="image7" value="上传商品1浏览截图" style="font-weight: normal; padding:0 8px; border:none; background:#3498db; color:#fff; width:auto; height:30px; font-size:12px;">
            <span id="imagewarning7" style="color: green; padding-left:10px;"><font style="color:red;">*必须上传</font></span>
          </li><br />
          <li><font>商品截图</font>：
            <input type="text" id="url8" name="goodsImgPosition" class="pc11 inputp s36_ts" readonly="readonly" placeholder="商品2截图" style="background: #F0F0F0; height:30px; line-height:30px;">
            <input type="button" id="image8" value="上传商品2浏览截图" style="font-weight: normal; padding:0 8px; border:none; background:#3498db; color:#fff; width:auto; height:30px; font-size:12px;">
            <span id="imagewarning8" style="color: green; padding-left:10px;"><font style="color:red;">*必须上传</font></span>
          </li>
          <div class="importantWarning">请注意：请接手一定在通过验证商品后再淘宝拍下支付，否则将无法继续任务</div>
          <button class="cetainStepComplete" lang="<?php echo $taskInfo->id;?>">确定完成任务</button>
        </div>
    </div>
<!--上传商品图片截图-->
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
					    K('#imagewarning3').html('图片上传成功');
						K('#url3').val(url);
						editor.hideDialog();
					}
				});
			});
		});
        
        K('#image4,#url4').click(function() {
			editor.loadPlugin('image', function() {
				editor.plugin.imageDialog({
					showRemote : false,
					imageUrl : K('#url4').val(),
					clickFn : function(url, title, width, height, border, align) {
					    K('#imagewarning4').html('图片上传成功');
						K('#url4').val(url);
						editor.hideDialog();
					}
				});
			});
		});
        
        K('#image55,#url55').click(function() {
			editor.loadPlugin('image', function() {
				editor.plugin.imageDialog({
					showRemote : false,
					imageUrl : K('#url55').val(),
					clickFn : function(url, title, width, height, border, align) {
					    K('#imagewarning55').html('图片上传成功');
						K('#url55').val(url);
						editor.hideDialog();
					}
				});
			});
		});
        
        K('#image5,#url5').click(function() {
			editor.loadPlugin('image', function() {
				editor.plugin.imageDialog({
					showRemote : false,
					imageUrl : K('#url5').val(),
					clickFn : function(url, title, width, height, border, align) {
					    K('#imagewarning5').html('图片上传成功');
						K('#url5').val(url);
						editor.hideDialog();
					}
				});
			});
		});
        
        
        K('#image6,#url6').click(function() {
			editor.loadPlugin('image', function() {
				editor.plugin.imageDialog({
					showRemote : false,
					imageUrl : K('#url6').val(),
					clickFn : function(url, title, width, height, border, align) {
					    K('#imagewarning6').html('图片上传成功');
						K('#url6').val(url);
						editor.hideDialog();
					}
				});
			});
		});
        
        K('#image7,#url7').click(function() {
			editor.loadPlugin('image', function() {
				editor.plugin.imageDialog({
					showRemote : false,
					imageUrl : K('#url7').val(),
					clickFn : function(url, title, width, height, border, align) {
					    K('#imagewarning7').html('图片上传成功');
						K('#url7').val(url);
						editor.hideDialog();
					}
				});
			});
		});
        
        K('#image8,#url8').click(function() {
			editor.loadPlugin('image', function() {
				editor.plugin.imageDialog({
					showRemote : false,
					imageUrl : K('#url8').val(),
					clickFn : function(url, title, width, height, border, align) {
					    K('#imagewarning8').html('图片上传成功');
						K('#url8').val(url);
						editor.hideDialog();
					}
				});
			});
		});
	});
    
    $(function(){
        //上传完货比截图进入下一步
        $(".firstStep").click(function(){
            if($("#url3").val()=="")
            {
                alert('请上传第1家货比截图');
                exit;
            }
            else if($("#url4").val()=="")
            {
                alert('请上传第2家货比截图');
                exit;
            }else if($("#url55").val()=="")
            {
                alert('请上传第3家货比截图');
                exit;
            }else
            {
                $(".HB").hide();//第一步隐藏
                $(".lastStep").show();//第一步显示
            }
        });
        
        //通过链接地址验证商品
        $("#checkTxtGoodsUrl").click(function(){
            if($("#txtGoodsUrl").val()=="")
            {
                alert("商品地址不能为空，否则无法验证");
                $("#txtGoodsUrl").focus();
            }
            else//通过接手填写的商品地址验证商品是否正确
            {
                $.ajax({
        			type:"POST",
        			url:"<?php echo $this->createUrl('site/buyerToPay');?>",
        			data:{"txtGoodsUrl":$("#txtGoodsUrl").val(),"id":$(this).attr("lang")},
        			success:function(msg)
        			{
        				if(msg=="SUCCESS")
                        {
                            $("#imagewarning font").html("<font style='color:green;'>商品验证成功</font>");//验证成功提示
                            $("#txtGoodsUrl").attr("checkRes","1").css("background","#ccc");//验证成功后将文本域设置为只读
                        }else{
                            $("#imagewarning font").html("商品验证失败");//验证失败提示
                            $("#txtGoodsUrl").val("");//验证失败，将文本清空
                        }
        			}
        		});
            }
        });
        
        //点击查看商品位置图片提示
        $(".goodPositionImgTip").click(function(){
            layer.open({
                type: 1,
                title: '<span style="color:green; font-weight:bold; font-size:14px;">商品位置提示</span>',
                skin: 'layui-layer-rim', //加上边框
                area: ['480px', '460px'], //宽高
                content: '<img src="'+$(this).attr("lang")+'">'
            });
        })
        
        //最后一步确认提交
        $(".cetainStepComplete").click(function(){
            var url3=$("#url3").val();//货比3家1截图
            var url4=$("#url4").val();//货比3家2截图
            var url55=$("#url55").val();//货比3家3截图
            var url5=$("#url5").val();//浏览底部截图
            var url6=$("#url6").val();//收藏截图
            var url7=$("#url7").val();//店内其他商品1截图
            var url8=$("#url8").val();//店内其他商品2截图
            if(url3=="" || url4=="")//检测货比2家截图是否上传
            {
                alert("货比3家截图都必须上传");
                $(".HB").show();//第一步隐藏
                $(".lastStep").hide();//第一步显示
                exit;
            }
            
            if($("#txtGoodsUrl").attr("checkRes")==1)//检测商品是否验证成功
            {
                if(url5=="" || url6=="" || url7=="" || url8=="")//检查截图是否上传完全
                {
                    alert("底部截图、收藏截图、店内其他商品截图必须上传，请检查");
                }else{
                    //检测全部通过
                    $.ajax({
            			type:"POST",
            			url:"<?php echo $this->createUrl('site/buyerToPayCertain');?>",
            			data:{"url3":url3,"url4":url4,"url55":url55,"url5":url5,"url6":url6,"url7":url7,"url8":url8,"taskid":$(this).attr("lang")},
            			success:function(data)
            			{
            				if(data=="SUCCESS")
                            {
                                layer.confirm('恭喜您付款成功', {
                            		btn: ['确定'] //按钮
                            	}, function(){
                            	    window.parent.location.reload();//刷新父级页面
                            	    var index = parent.layer.getFrameIndex(window.name);//获取窗口索引
                            	    parent.layer.close(index);//关闭父级
                            	});
                            }else
                            {
                                layer.confirm('付款失败，请联系客服人员', {
                            		btn: ['确定'] //按钮
                            	}, function(){
                            	    window.parent.location.reload();//刷新父级页面
                            	    var index = parent.layer.getFrameIndex(window.name);//获取窗口索引
                            	    parent.layer.close(index);//关闭父级
                            	}); 
                            }
            			}
            		});
                }
            }else//不通过
            {
                alert("请先验证商品");
            }
        });
    })
</script>
</body>
</html>