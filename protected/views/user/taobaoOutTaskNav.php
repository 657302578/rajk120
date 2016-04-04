            <?php
                //统计各个状态的任务数量
                
                //1.我发布的-可处理的任务数量
                $taobaoOutTaskCount=Companytasklist::model()->findAll(array(
                    'condition'=>'publishid='.Yii::app()->user->getId().' and id IN(select task_id from zxjy_usertasklist WHERE task_id IN(select id from zxjy_companytasklist  WHERE publishid='.Yii::app()->user->getId().' AND state=0))'
                ));
                
                //2.我发布的-等待我返款
                $taobaoOutTaskStopCount=Companytasklist::model()->findAll(array(
                    'condition'=>'publishid='.Yii::app()->user->getId().' and status IN(2,3)'
                ));
				
                //2.我发布的-等待我返款
                $taobaoOutTaskStopCount2=Companytasklist::model()->findAll(array(
                    'condition'=>'publishid='.Yii::app()->user->getId().' and status IN(6,0)'
                ));
                
                //3.我发布的-等待我完成
                $taobaoOutTaskCompleteCount=Companytasklist::model()->findAll(array(
                    'condition'=>'publishid='.Yii::app()->user->getId().' and status IN(4,5) AND taskCompleteStatus=0'
                ));
                
                //4.我发布的-全部的任务数量
                $taobaoOutTaskAllListCount=Companytasklist::model()->findAll(array(
                    'condition'=>'publishid='.Yii::app()->user->getId()
                ));
                
            ?>
            <ul class="yfrwPro clearfix">
			 <li style="width:204px;" <?php echo Yii::app()->controller->id=="user" && $this->getAction()->getId()=="taobaoOutTaskStop2"?"class='yjrwProSelected'":"";?>><a href="<?php echo $this->createUrl('user/taobaoOutTaskStop2');?>">等待接手申请<span><?php echo count($taobaoOutTaskStopCount2);?></span></a></li>
                <li style="width:204px;" <?php echo Yii::app()->controller->id=="user" && $this->getAction()->getId()=="taobaoOutTask"?"class='yjrwProSelected'":"";?>><a href="<?php echo $this->createUrl('user/taobaoOutTask');?>">等待我审核<span><?php echo count($taobaoOutTaskCount);?></span></a></li>
                <li style="width:204px;" <?php echo Yii::app()->controller->id=="user" && $this->getAction()->getId()=="taobaoOutTaskStop"?"class='yjrwProSelected'":"";?>><a href="<?php echo $this->createUrl('user/taobaoOutTaskStop');?>">等待我返款<span><?php echo count($taobaoOutTaskStopCount);?></span></a></li>
                <li style="width:204px;" <?php echo Yii::app()->controller->id=="user" && $this->getAction()->getId()=="taobaoOutTaskComplete"?"class='yjrwProSelected'":"";?>><a href="<?php echo $this->createUrl('user/taobaoOutTaskComplete');?>">等待我完成<span><?php echo count($taobaoOutTaskCompleteCount);?></span></a></li>
                <li style="width:204px;" <?php echo Yii::app()->controller->id=="user" && $this->getAction()->getId()=="taobaoOutTaskAllList"?"class='yjrwProSelected'":"";?>><a href="<?php echo $this->createUrl('user/taobaoOutTaskAllList');?>">全部任务<span><?php echo count($taobaoOutTaskAllListCount);?></span></a></li>
            </ul>