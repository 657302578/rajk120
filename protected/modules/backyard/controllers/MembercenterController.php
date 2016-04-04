<?php
    class MembercenterController extends Aclfilter{
        
        public $layout='//layouts/backyard';//定义布局以便加载kindeditor文本编辑器的css与js
        
        /*
            会员管理-会员列表
        */
        public function actionMemberlist()
        {
            parent::acl();
            if(isset($_GET['keyword']) || isset($_GET['id_is_check']))//关键词搜索
            {
                $criteria = new CDbCriteria;
                $criteria->condition = '1 ';
                if(isset($_GET['keyword']) && !empty($_GET['keyword'])) $criteria->condition.=' AND (Username="'.$_GET['keyword'].'" or Phon="'.$_GET['keyword'].'")';
                if(isset($_GET['id_is_check']) && $_GET['id_is_check'] > 0 )
                { 
                    $criteria->condition.=' AND id_is_check='.(intval($_GET['id_is_check'])-1)." AND id_card <> '' AND id_photo_front <> '' AND id_photo_rear <> ''";
                }
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
            $criteria->order ="RegTime asc";
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
        
        public function actionAddBuyerAddress()
        {
            if(isset($_POST['data']))
            {
                if(intval($_POST['data']['id']) > 0)
                {
                    $addressInfo = Useraddress::model()->findByPk(intval($_POST['data']['id']));
                    foreach ($_POST['data'] as $k => $v)
                    {
                        $addressInfo->$k = $v;
                    }
                    $addressInfo->save();
                    $this->redirect( $this->createUrl('membercenter/buyerAddress'));
                }else{
                    $ud = new Useraddress();
                    foreach ($_POST['data'] as $k => $v)
                    {
                        $ud->$k = $v;
                    }
                    $ud->save();
                    $this->redirect( $this->createUrl('membercenter/buyerAddress'));
                }
            }else{
                $areaList = Area::model()->findAll( array(
                    'condition' => 'parentid=0'
                ) );
                
                if(isset($_GET['id']))
                {
                    $addressInfo = Useraddress::model()->findByPk(intval($_GET['id']));
                    if(isset($addressInfo))
                    {
                        $shiList = Area::model()->findAll(array(
                    'condition' => 'parentid='.$addressInfo->sheng_id
                ));
                        $quList = Area::model()->findAll(array(
                    'condition' => 'parentid='.$addressInfo->shi_id
                ));
                        $this->render('editBuyerAddress',array(
                            'area' => $areaList , 'shiList' => $shiList, 'quList' => $quList, 'addressInfo' => $addressInfo
                        ));
                    }
                }else{
                    $this->render('editBuyerAddress',array(
                        'area' => $areaList
                    ));
                }
            }            
        }
        
        public function actionDelBuyerAddress()
        {
            if(isset($_POST['id']))
            {
                $result = Useraddress::model()->deleteByPk(intval($_POST['id']));
                echo $result ? 'success' : 'fail';
            }else{
                echo 'fail';
            }
        }
        
        public function actionUpdateCities()
        {
            $areaName = $_POST['area'];
            $query = Yii::app()->db->createCommand('select id,name from zxjy_area where parentid='.intval($_POST['pid']));
            $data = $query->queryAll();
            $nextArea = $areaName == 'shi' ? 'qu' : 'shi';
            if($areaName == 'qu') $nextArea = '';
            $html='<select name="data['.$areaName.'_id]" id="'.$areaName.'_id" onChange="getSonCity(this.value,\''.$nextArea.'\');">';
            $html.='<option value="">请选择</option>';
            foreach($data as $value=>$name)
            {
                $html.='<option value=\''.$name['id'].'\'>'.$name['name'].'</option>';
            }
            $html .= '</select';
            exit($html);

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
                //从地址库中获取一些地址
                $addressList = Useraddress::model()->findAllBySql("SELECT * FROM zxjy_useraddress WHERE occupy_uid=0 LIMIT 50");
                $this->render('membeDetailInfos',array(
                    'userinfo'=>$userinfo,
                    'addressList' => $addressList
                ));
            }
        }
        
        /*
         * 绑定收货地址
         */
        public function actionBindUserAddress()
        {
            $uid = intval($_POST['uid']);
            $aid = intval($_POST['aid']);
            if(!$uid || !$aid) exit('fail');
            //查询此会员当前绑定的地址
            $nowAddress = Useraddress::model()->find('occupy_uid='.$uid);
            if(isset($nowAddress))
            {
                //解绑
                $nowAddress->occupy_uid = 0;
                $nowAddress->save();
            }
            $newAddress = Useraddress::model()->findByPk($aid);
            if(isset($nowAddress) && $newAddress->occupy_uid <= 0)
            {
                $newAddress->occupy_uid = $uid;
                $newAddress->save();
                exit('SUCCESS');
            }
            exit('fail');
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
            //处理收货地址审核的功能,大于0说明审核通过
            if(intval($_POST['address_is_check']) > 0)
            {
                //审核通过之后，自动分配收货一个收货地址
                $userAddress = Useraddress::model()->findByAttributes( array('uid'=> $userInfo->id));
                if(isset($userAddress))
                {
                    //如果存在收货地址,则修改审核状态
                    $userAddress->is_check =1;
                    $userAddress->save();
                    //分配收货地址
                    $zdAddress = Useraddress::model()->findByAttributes( array('occupy_uid'=> $userInfo->id));
                    if(!isset($zdAddress))
                    {
                        $zdAddress = Useraddress::model()->findByAttributes( array('occupy_uid'=> 0, 'is_check'=>1));
                        $zdAddress->occupy_uid = $userInfo->id;
                        $zdAddress->save();
                    }
                }
            }
            unset($_POST['address_is_check']);
            if($userInfo->id_is_check <= 0 && $_POST['id_is_check'] > 0 )
            {
                $userInfo->id_check_time = date('Y/m/d H:i:s',time());
            }
            foreach ($_POST as $k => $v)
            {
                $userInfo->$k = $v;
            }
            $userInfo->alipay_account = trim($_POST['alipay_account']);
            $userInfo->Phon = trim($_POST['Phon']);
            $userInfo->VipStopTime = strtotime($_POST['VipStopTime']);
            
            echo $userInfo->save() ? 'SUCCESS' : 'FAIL';
        }
        
        /**
         * 审核收货地址
         */
        public function actionShAddress()
        {
            $addressId = intval($_POST['id']);
            $s = intval($_POST['s']);
            //审核通过之后，自动分配收货一个收货地址
            $userAddress = Useraddress::model()->findByPk($addressId);
            if(isset($userAddress))
            {
                //如果存在收货地址,则修改审核状态
                $userAddress->is_check =$s;
                $userAddress->save();
                //分配收货地址
                $zdAddress = Useraddress::model()->findByAttributes( array('occupy_uid'=> $userAddress->uid));
                if(!isset($zdAddress) && $s == 1)
                {
                    $zdAddress = Useraddress::model()->findByAttributes( array('occupy_uid'=> 0, 'is_check'=>1));
                    $zdAddress->occupy_uid = $userAddress->uid;
                    $zdAddress->save();
                }
            }
            echo '200';
        }
        
        /**
         * 买手审核
         */
        public function actionBuyerlist()
        {
            //读取系统中的买号
            parent::acl();
            
            if(isset($_GET['keyword']) || isset($_GET['is_check']))//关键词搜索
            {
                $criteria = new CDbCriteria;
                $criteria->condition = 'catalog=1 ';
                if(isset($_GET['keyword']) && !empty($_GET['keyword'])) $criteria->condition.=' AND (wangwang="'.$_GET['keyword'].'" AND catalog=1)';
                if(isset($_GET['is_check']) && $_GET['is_check'] > 0) $criteria->condition.=' AND is_check='.(intval($_GET['is_check'])-1);
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
         * 掌柜审核
         */
        public function actionZhangguilist()
        {
            //读取系统中的买号
            parent::acl();
            if(isset($_GET['keyword']) || isset($_GET['is_check']))//关键词搜索
            {
                $criteria = new CDbCriteria;
                $criteria->condition = 'catalog=2 ';
                if(isset($_GET['keyword']) && !empty($_GET['keyword'])) $criteria->condition.=' AND (wangwang="'.$_GET['keyword'].'" AND catalog=1)';
                if(isset($_GET['is_check']) && $_GET['is_check'] > 0) $criteria->condition.=' AND is_check='.(intval($_GET['is_check'])-1);
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