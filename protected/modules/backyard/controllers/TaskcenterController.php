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
        
        public function actionGoodsUrlManage()
        {
            parent::acl();
            $criteria = new CDbCriteria;
            $criteria->condition = '1';
            if(isset($_GET['goods_name'])) $criteria->condition.= ' AND goods_name LIKE \''.strval($_GET['goods_name']).'\'';
            if(isset($_GET['is_check'])) $criteria->condition.= ' AND is_check='.intval($_GET['is_check']-1);
            $criteria->order ="create_time desc";
        
            //分页开始
            $total = Goodsurl::model()->count($criteria);  
            $pages = new CPagination($total);
            $pages->pageSize=10;//分页大小
            $pages->applyLimit($criteria);
            $proreg = Goodsurl::model()->findAll($criteria);
            
            //分页结束
            $this->renderPartial('goodsUrlManage',array(
                'total'=>$total,
                'proInfo' => $proreg,
                'pages' => $pages
            ));
        }
        
        public function actionCheckGoodsUrl()
        {
            if(isset($_POST['id']) && isset($_POST['s']))
            {
                $goodsInfo = Goodsurl::model()->findByPk(intval($_POST['id']));
                if(!isset($goodsInfo)) exit(500);
                $goodsInfo->is_check = intval($_POST['s']);
                $goodsInfo->check_time = time();
                echo $goodsInfo->save() ? '200' : '500';
            }else{
                echo '501';
            }
        }
        
        
    }
?>