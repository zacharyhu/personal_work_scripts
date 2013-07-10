<?php

/**
 * This is the model class for table "cp_contact_info".
 *
 * The followings are the available columns in table 'cp_contact_info':
 * @property integer $id
 * @property integer $cp_id
 * @property string $contact_name
 * @property string $contact_phone
 * @property string $contact_email
 * @property string $update_time
 * @property integer $contact_type
 * @property integer $contact_qq
 * @property string $contact_othes
 */
class CpContactInfo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CpContactInfo the static model class
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
		return 'cp_contact_info';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cp_id, contact_name, contact_type', 'required'),
			array('cp_id, contact_type', 'numerical', 'integerOnly'=>true),
			array('cp_id,contact_name, contact_phone', 'length', 'max'=>20),
			array('contact_email', 'length', 'max'=>50),
			array('cp_id, contact_name, contact_phone, contact_email, update_time, contact_type, contact_qq, contact_others', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, cp_id, contact_name, contact_phone, contact_email, update_time, contact_type, contact_qq, contact_others', 'safe', 'on'=>'search'),
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
				//关联cpid到cpname
				'cpName'=>array(self::BELONGS_TO,'CpBaseInfo','cp_id')
		);
	}
	
	
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'cp_id' => 'Cp名称',
			'contact_name' => '联系人',
			'contact_phone' => '电话',
			'contact_email' => '邮箱',
			'update_time' => '更新时间',
			'contact_type' => '联系人类别',
			'contact_qq'=> 'QQ',
			'contact_others'=>'其他联系方式',
		);
	}

	
	/*
	 * 配置固定联系人类别
	 * 
	 * 
	 */
	
	
	
	public function getContactTypeList()
	{
		return array('0'=>'商务联系人','1'=>'运营联系人','2'=>'技术联系人');
	}
	
	public function getContactType($typeid)
	{
		$ContactTypeList=array('0'=>'商务联系人','1'=>'运营联系人','2'=>'技术联系人');
		return $ContactTypeList[$typeid];
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

		//$criteria->compare('id',$this->id);
		$criteria->compare('cp_id',$this->cp_id);
		$criteria->compare('contact_name',$this->contact_name,true);
		$criteria->compare('contact_phone',$this->contact_phone,true);
		$criteria->compare('contact_email',$this->contact_email,true);
		$criteria->compare('contact_qq',$this->contact_qq,true);
		$criteria->compare('contact_others',$this->contact_others,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('contact_type',$this->contact_type);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getContactList($cpid){
		$ContactList = CpContactInfo::model()->findAllByAttributes(array('cp_id'=>$cpid));
		return $ContactList;
	}
}