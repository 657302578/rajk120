    <!--推广赚钱-->
   	<div class="d_tui">
    	<div class="d_guize">
        	<p class="d_p1">推广规则：通过推广链接注册成功后</p>
            <p class="d_p2">发布或接手10个任务为有效推广</p>
            <p class="d_p3">即奖励您<span>18</span>元现金</p>
            <!--推广链接-->
            <p class="getMyTgLink" style="width:395px; height: 100px; text-indent: -10000px; position: absolute; top:370px; left:310px; cursor: pointer;">
                获取我的专属推广链接
            </p>
            <div class="d_liebiao">
            	<table class="d_lbttable">
                	<tr>
                    	<th class="th1">排名	</th>
                        <th class="th2">用户名</th>
                        <th class="th3">获得返现</th>
                    </tr>
                    <tr>
                    	<td class="d_lbtd">1</td>
                        <td class="d_lbtd1">412027789</td>
                        <td class="d_lbtd2">160</td>
                    </tr>
                    <tr>
                    	<td class="d_lbtd">2</td>
                        <td class="d_lbtd1">407827671</td>
                        <td class="d_lbtd2">144</td>
                    </tr>
                    <tr>
                    	<td class="d_lbtd">3</td>
                        <td class="d_lbtd1">odaycaogen</td>
                        <td class="d_lbtd2">104</td>
                    </tr>
                    <tr>
                    	<td class="d_lbtd">4</td>
                        <td class="d_lbtd1">家有仙妻</td>
                        <td class="d_lbtd2">88</td>
                    </tr>
                    <tr>
                    	<td class="d_lbtd">5</td>
                        <td class="d_lbtd1">qiukeng</td>
                        <td class="d_lbtd2">80</td>
                    </tr>
                    <tr>
                    	<td class="d_lbtd">6</td>
                        <td class="d_lbtd1">Marathonmikesss</td>
                        <td class="d_lbtd2">72</td>
                    </tr>
                     <tr>
                    	<td class="d_lbtd">7</td>
                        <td class="d_lbtd1">suwen</td>
                        <td class="d_lbtd2">56</td>
                    </tr>
                     <tr>
                    	<td class="d_lbtd">8</td>
                        <td class="d_lbtd1">dreamlizer</td>
                        <td class="d_lbtd2">56</td>
                    </tr>
                     <tr>
                    	<td class="d_lbtd">9</td>
                        <td class="d_lbtd1">zhankc</td>
                        <td class="d_lbtd2">56</td>
                    </tr>
                    <tr>
                    	<td class="d_lbtd">10</td>
                        <td class="d_lbtd1">rabbletao</td>
                        <td class="d_lbtd2">56</td>
                    </tr>
                </table>
            </div>
        </div>
       <div class="d_tg">
       		<div class="d_tghy">
            	<ul class="d_tgul clearfix">
                	<li class="d_tgul1">推广会员</li>
                    <li class="d_tgul2">注册时间</li>
                    <li class="d_tgul3">接任务数据(已接/完成)</li>
                    <li class="d_tgul4">发任务数据(已发/完成)</li>
                </ul>
                <?php foreach ($userList as $k => $v){?>
                <ul class="d_tgul clearfix">
                	<li class="d_tgul1"><?php echo $v['Username'];?></li>
                    <li class="d_tgul2"><?php echo date('Y/m/d H:i:s',$v['RegTime']);?></li>
                    <li class="d_tgul3"><?php echo User::gettasknumbytime($v['id'], 1, 'month');?></li>
                    <li class="d_tgul4">
                    <?php
                        echo Companytasklist::model()->count('publishid='.$v['id']);
                    ?>
                    </li>
                   
                </ul>
                <?php }?>
            </div>
       </div>
    </div>
    <!--推广赚钱-->
<!--layer插件-->
<script src="<?php echo ASSET_URL;?>layer/jquery.min.js"></script>
<script src="<?php echo ASSET_URL;?>layer/layer.js"></script>
<script src="<?php echo ASSET_URL;?>layer/laycode.min.js"></script>
<link href="<?php echo ASSET_URL;?>layer/layer.css" rel="stylesheet" type="text/css" />
<script>
    $(function(){
        $(".getMyTgLink").click(function(){
            layer.open({
                type: 2,
                title:'您的专属推广链接',
                area: ['526px','230px'],
                skin: 'layui-layer-rim', //加上边框
                content: ['<?php echo $this->createUrl('user/userSpreadLink');?>', 'no']
            });
        });
    })
</script>