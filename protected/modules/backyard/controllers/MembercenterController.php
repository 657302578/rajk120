<?php
    class MembercenterController extends Aclfilter{
        
        public $layout='//layouts/backyard';//定义布局以便加载kindeditor文本编辑器的css与js
        
        /*
            会员管理-会员列表
        */
        public function actionMemberlist()
        {
            parent::acl();
            if(isset($_POST['keyword']) || isset($_GET['id_is_check']))//关键词搜索
            {
                $criteria = new CDbCriteria;
                $criteria->condition = '1 ';
                if(isset($_POST['keyword']) && !empty($_POST['keyword'])) $criteria->condition=' AND (Username="'.$_POST['keyword'].'" or Phon="'.$_POST['keyword'].'")';
                if(isset($_POST['id_is_check']) && $_POST['id_is_check'] > 0 ) $criteria->condition.=' AND id_is_check='.(intval($_POST['id_is_check'])-1);
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
        
        /**
         * 收货地址管理
         */
        public function actionBuyerAddress()
        {
            parent::acl();
            $criteria = new CDbCriteria;
            $criteria->order ="id desc";
            //分页开始
            $total = Useraddress::model()->count($criteria);
            $pages = new CPagination($total);
            $pages->pageSize=12;//分页大小
            $pages->applyLimit($criteria);
            $proreg = Useraddress::model()->findAll($criteria);
            //分页结束
            $this->renderPartial('buyerAddress',array(
                'proInfo' => $proreg,
                'pages' => $pages
            ));
        }
        
        /**
         * 保存收货地址
         */
        public function actionSaveBuyerAddress()
        {
            
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
        /**
         * 保存会员信息
         */
        public function actionSaveUserInfo()
        {
            if(!isset($_POST['uid']))
            {
                echo 'NO_UID';
                exit;
            }
            $userInfo = User::model()->findByPk($_POST['uid']);
            if(!$userInfo) exit('NO_USER');
            unset($_POST['uid'], $_POST['submit']);
            if($userInfo->id_is_check <= 0 && $_POST['id_is_check'] > 0 )
            {
                $userInfo->id_check_time = date('Y/m/d H:i:s',time());
            }
            foreach ($_POST as $k => $v)
            {
                $userInfo->$k = $v;
            }
            echo $userInfo->save() ? 'SUCCESS' : 'FAIL';
        }
        
        /**
         * 买手审核
         */
        public function actionBuyerlist()
        {
            //读取系统中的买号
            parent::acl();
            if(isset($_POST['keyword']) || isset($_POST['is_check']))//关键词搜索
            {
                $criteria = new CDbCriteria;
                $criteria->condition = '1 ';
                if(isset($_POST['keyword']) && !empty($_POST['keyword'])) $criteria->condition.=' AND (wangwang="'.$_POST['keyword'].'" AND catalog=1)';
                if(isset($_POST['is_check']) && $_POST['is_check'] > 0) $criteria->condition.=' AND is_check='.(intval($_POST['is_check'])-1);
                //分页开始
                $total = Blindwangwang::model()->count($criteria);
                $pages = new CPagination($total);
                $pages->pageSize=12;//分页大小
                $pages->applyLimit($criteria);
            
                $proreg = Blindwangwang::model()->findAll($criteria);
                //分页结束
                $this->renderPartial('buyerlist',array(
                    'proInfo' => $proreg,
                    'pages' => $pages
                ));
                Yii::app()->end();
            }
            $criteria = new CDbCriteria;
            $criteria->condition = 'catalog=1';
            $criteria->order ="id desc";
            
            //分页开始
            $total = Blindwangwang::model()->count($criteria);
            $pages = new CPagination($total);
            $pages->pageSize=12;//分页大小
            $pages->applyLimit($criteria);
            
            $proreg = Blindwangwang::model()->findAll($criteria);
            //分页结束
            $this->renderPartial('buyerlist',array(
                'proInfo' => $proreg,
                'pages' => $pages
            ));
        }
        
        /**
         * 审核买手状态
         */
        public function actionChangeBuyerState()
        {
            $uid = intval($_POST['buyerId']);
            $info = Blindwangwang::model()->findByPk($uid);
            if(!$info) exit('BUYER_NO');
            $info->is_check = $_POST['state'];
            $info->updatetime = time();
            echo $info->save() ? 'SUCCESS' : 'fail';
        }
        
        /**
         * 买手审核
         */
        public function actionZhangguilist()
        {
            //读取系统中的买号
            parent::acl();
            if(isset($_POST['keyword']) || isset($_POST['is_check']))//关键词搜索
            {
                $criteria = new CDbCriteria;
                $criteria->condition = '1 ';
                if(isset($_POST['keyword']) && !empty($_POST['keyword'])) $criteria->condition.=' AND (wangwang="'.$_POST['keyword'].'" AND catalog=1)';
                if(isset($_POST['is_check']) && $_POST['is_check'] > 0) $criteria->condition.=' AND is_check='.(intval($_POST['is_check'])-1);
                //分页开始
                $total = Blindwangwang::model()->count($criteria);
                $pages = new CPagination($total);
                $pages->pageSize=12;//分页大小
                $pages->applyLimit($criteria);
        
                $proreg = Blindwangwang::model()->findAll($criteria);
                //分页结束
                $this->renderPartial('sellerlist',array(
                    'proInfo' => $proreg,
                    'pages' => $pages
                ));
                Yii::app()->end();
            }
            $criteria = new CDbCriteria;
            $criteria->condition = 'catalog=2';
            $criteria->order ="id desc";
        
            //分页开始
            $total = Blindwangwang::model()->count($criteria);
            $pages = new CPagination($total);
            $pages->pageSize=12;//分页大小
            $pages->applyLimit($criteria);
        
            $proreg = Blindwangwang::model()->findAll($criteria);
            //分页结束
            $this->renderPartial('sellerlist',array(
                'proInfo' => $proreg,
                'pages' => $pages
            ));
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