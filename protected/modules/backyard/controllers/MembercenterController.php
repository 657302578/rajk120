<?php
    class MembercenterController extends Aclfilter{
        
        public $layout='//layouts/backyard';//定义布局以便加载kindeditor文本编辑器的css与js
        
        /*
            会员管理-会员列表
        */
        public function actionMemberlist()
        {
            parent::acl();
            if(isset($_POST['keyword']))//关键词搜索
            {
                $criteria = new CDbCriteria;
                $criteria->condition='Username="'.$_POST['keyword'].'" or Phon="'.$_POST['keyword'].'"';
                //分页开始
                $total = User::model()->count($criteria);
                $pages = new CPagination($total);
                $pages->pageSize=12;//分页大小
                $pages->applyLimit($criteria);
                
                $proreg = User::model()->findAll($criteria);
                //分页结束
                $this->renderPartial('memberlist',array(
                    'proInfo' => $proreg,
                    'pages' => $pages
                ));
                Yii::app()->end();
            }
            $criteria = new CDbCriteria;
            $criteria->order ="RegTime desc";
        
            //分页开始
            $total = User::model()->count($criteria);
            $pages = new CPagination($total);
            $pages->pageSize=12;//分页大小
            $pages->applyLimit($criteria);
            
            $proreg = User::model()->findAll($criteria);
            //分页结束
            $this->renderPartial('memberlist',array(
                'proInfo' => $proreg,
                'pages' => $pages
            ));
        }
        
        
        /*
            会员管理-冻结帐号
        */
        public function actionStopaccount()
        {
            parent::acl();
            $userinfo=User::model()->findByPk($_GET['userid']);
            $userinfo->Status=1;
            $userinfo->save();
            $this->redirect(Yii::app()->request->urlReferrer);
        }
        
        /*
            会员管理-解冻帐号
        */
        public function actionStartaccount()
        {
            parent::acl();
            $userinfo=User::model()->findByPk($_GET['userid']);
            $userinfo->Status=0;
            $userinfo->save();
            $this->redirect(Yii::app()->request->urlReferrer);
        }
        
        
        /*
            会员管理-会员信息
        */
        public function actionMembeDetailInfos()
        {
            parent::acl();
            if(isset($_GET['uid']) && $_GET['uid']<>0)
            {
                $userinfo=User::model()->findByPk($_GET['uid']);
                $this->render('membeDetailInfos',array(
                    'userinfo'=>$userinfo
                ));
            }
        }
        
        /*
            会员管理-修改会员密码
        */
        public function actionChangPassword()
        {
            parent::acl();
            if(isset($_POST['newpassword']) && $_POST['newpassword']!="" && isset($_POST['uid']) && $_POST['uid']!="")
            {
                $userinfo=User::model()->findByPk($_POST['uid']);
                $userinfo->PassWord=md5($_POST['newpassword']);//修改密码
                if($userinfo->save())
                    echo "SUCCESS";
                else
                    echo "FAIL";
            }
            else
                echo "FAIL";
            
        }
        
        /*
            会员管理-手动充值
        */
        public function actionGivePay()
        {
            if(isset($_POST['Money']) && $_POST['Money']!="" && isset($_POST['uid']) && $_POST['uid']!="")
            {
                $userinfo=User::model()->findByPk($_POST['uid']);
                $userinfo->Money=$userinfo->Money+$_POST['Money'];//改变金额
                if($userinfo->save())
                    echo "SUCCESS";
                else
                    echo "FAIL";
            }
            else
                echo "FAIL";
        }
    }
?>