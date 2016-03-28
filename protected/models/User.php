<?php

/**
 * This is the model class for table "{{_user}}".
 *
 * The followings are the available columns in table '{{_user}}':
 * @property integer $UserId
 * @property string $Username
 * @property string $PassWord
 * @property string $NickName
 * @property string $Email
 * @property string $QQToken
 * @property integer $VipLv
 * @property integer $Phon
 * @property integer $PhonClock
 * @property string $Question
 * @property string $Anser
 * @property string $TrueName
 * @property string $IdNumber
 * @property string $RegIp
 * @property integer $RegTime
 * @property string $LoginIp
 * @property integer $LoginTime
 * @property integer $IsDefult
 * @property integer $Opend
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{_user}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Username', 'required',"message"=>"must be filled"),
            array('PassWord', 'required',"message"=>"must be filled"),
			/*array('VipLv, Phon, PhonClock, RegTime, LoginTime, IsDefult, Opend', 'numerical', 'integerOnly'=>true),
			array('Username, NickName, Email, QQToken, Question, Anser', 'length', 'max'=>100),
			array('PassWord', 'length', 'max'=>50),
			array('TrueName', 'length', 'max'=>18),
			array('IdNumber, RegIp, LoginIp', 'length', 'max'=>20),*/
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('UserId, Username, PassWord, NickName, Email, QQToken, VipLv, Phon, PhonClock, Question, Anser, TrueName, IdNumber, RegIp, RegTime, LoginIp, LoginTime, IsDefult, Opend', 'safe', 'on'=>'search'),
		);
	}
	
	/**
	 * 获取会员的接单数量
	 * @param int $num
	 * @param string $unit 单位
	 */
	static public function gettasknumbytime($userId,$num,$unit)
	{
	   //进行统计
	   return Companytasklist::model()->count('taskerid='.$userId.' AND taskfristTime >'.strtotime('-'.$num.' '.$unit));
	}
	
	static public function getuserlevelnum($userid)
	{
	    //获取会员的等级数字
	    $userInfo = self::model()->findByPk($userid);
	    $score = isset($userInfo) ? $userInfo->Score : 1;
	    //判断等级
	    if($score >= 1 AND $score < 11) return 1;
	    if($score >= 11 AND $score < 21) return 2;
	    if($score >= 21 AND $score < 31) return 3;
	    if($score >= 31 AND $score < 51) return 4;
	    if($score >= 51 AND $score < 101) return 5;
	    if($score >= 101 AND $score < 201) return 6;
	    if($score >= 201 AND $score < 301) return 7;
	    if($score >= 301 AND $score < 501) return 8;
	    if($score >= 501 AND $score < 1001) return 9;
	    if($score >= 1002 AND $score < 2001) return 10;
	    if($score >= 2001 AND $score < 3001) return 11;
	    if($score >= 3001 AND $score < 5001) return 12;
	    if($score >= 5001 AND $score < 10001) return 13;
	    if($score >= 10001) return 14;
	    
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'UserId' => 'User',
			'Username' => '用户名',
			'PassWord' => '密码',
			'NickName' => '昵称',
			'Email' => '邮箱',
			'QQToken' => 'QQ登录标识',
			'VipLv' => '会员等级',
			'Phon' => '手机',
			'PhonClock' => '手机锁定',
			'Question' => '验证问题',
			'Anser' => '验证答案',
			'TrueName' => '真实姓名',
			'IdNumber' => '身份证',
			'RegIp' => '注册IP',
			'RegTime' => '注册时间',
			'LoginIp' => '登录IP',
			'LoginTime' => '登录时间',
			'IsDefult' => '是否成年',
			'Opend' => '是否开启',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('UserId',$this->UserId);
		$criteria->compare('Username',$this->Username,true);
		$criteria->compare('PassWord',$this->PassWord,true);
		$criteria->compare('NickName',$this->NickName,true);
		$criteria->compare('Email',$this->Email,true);
		$criteria->compare('QQToken',$this->QQToken,true);
		$criteria->compare('VipLv',$this->VipLv);
		$criteria->compare('Phon',$this->Phon);
		$criteria->compare('PhonClock',$this->PhonClock);
		$criteria->compare('Question',$this->Question,true);
		$criteria->compare('Anser',$this->Anser,true);
		$criteria->compare('TrueName',$this->TrueName,true);
		$criteria->compare('IdNumber',$this->IdNumber,true);
		$criteria->compare('RegIp',$this->RegIp,true);
		$criteria->compare('RegTime',$this->RegTime);
		$criteria->compare('LoginIp',$this->LoginIp,true);
		$criteria->compare('LoginTime',$this->LoginTime);
		$criteria->compare('IsDefult',$this->IsDefult);
		$criteria->compare('Opend',$this->Opend);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}