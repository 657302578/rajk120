<?php
    class TaskcenterController extends Aclfilter{
        
        public $layout='//layouts/backyard';//定义布局以便加载kindeditor文本编辑器的css与js
        
        /*
            ***冻结帐号
        */
        public function actionTasklist()
        {
            parent::acl();
            $criteria = new CDbCriteria;
            $criteria->order ="time desc";
        
            //分页开始
            $total = Companytasklist::model()->count($criteria);
            $pages = new CPagination($total);
            $pages->pageSize=10;//分页大小
            $pages->applyLimit($criteria);
            
            $proreg = Companytasklist::model()->findAll($criteria);
            //分页结束
            
            $this->renderPartial('tasklist',array(
                'total'=>$total,
                'proInfo' => $proreg,
                'pages' => $pages
            ));
        }
    }
?>