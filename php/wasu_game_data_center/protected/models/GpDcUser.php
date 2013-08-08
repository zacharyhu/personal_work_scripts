<?php

/**
 * This is the model class for table "gp_dc_user".
 *
 * The followings are the available columns in table 'gp_dc_user':
 * @property integer $id
 * @property string $login_name
 * @property string $username
 * @property string $password
 * @property integer $groupid
 * @property string $update_date
 * @property string $email
 * @property integer $phone
 */
class GpDcUser extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'gp_dc_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('login_name, username','required'),
			array('groupid, phone', 'numerical', 'integerOnly'=>true),
			array('login_name', 'length', 'max'=>20),
			array('username, email', 'length', 'max'=>50),
// 			array('password', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, login_name, username, groupid, update_date, email, phone', 'safe', 'on'=>'search'),
		);
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
			'id' => 'ID',
			'login_name' => '登录显示用户名',
			'username' => '登录帐号',
			'password' => '密码',
			'groupid' => '组编号',
			'update_date' => '更新时间',
			'email' => '邮箱',
			'phone' => '电话',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('login_name',$this->login_name,true);
		$criteria->compare('username',$this->username,true);
// 		$criteria->compare('password',$this->password,true);
		$criteria->compare('groupid',$this->groupid);
		$criteria->compare('update_date',$this->update_date,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phone',$this->phone);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return GpDcUser the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	/*
	 * 验证用户密码方法
	*
	*
	*/
	
	public function encrypt($pass)
	{
		return md5($pass);
	}
	
	public function validatePassword($password)
	{
		return $this->encrypt($password)===$this->password;
	}
	
	/*
	 * 加密密码
	*
	*
	*
	*/
	
	protected function beforeSave(){
// 		date_default_timezone_set('UTC');
		$this->update_date = date("Y-m-d H:i:s");;
		if (parent::beforeSave()){//保存之前
// 			if (isset($this->password)){
			if($this->isNewRecord){
				$this->password=$this->encrypt($this->password);
			}else {
				$this->password=$this->password;
			}
			return true;
		}else{
			return  false;
		}
// 		}
	}
	
	public function getUserName($username)
	{
		$uname=GpDcUser::model()->findByAttributes(array('username'=>$username));
		return $uname->login_name;
	}
	
	public function getUserId($username)
	{
		$uname=GpDcUser::model()->findByAttributes(array('username'=>$username));
		return $uname->id;
	}
}
