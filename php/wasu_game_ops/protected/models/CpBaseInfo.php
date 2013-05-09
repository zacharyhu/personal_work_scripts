<?php

/**
 * This is the model class for table "cp_base_info".
 *
 * The followings are the available columns in table 'cp_base_info':
 * @property integer $cp_id
 * @property string $cp_name
 * @property integer $cpcode
 * @property integer $create_time
 * @property string $update_time
 * @property string $begin_date
 * @property string $end_date
 * @property string $cp_desc
 * @property string $cp_status
 */
class CpBaseInfo extends CActiveRecord
{
	public $begin_date='1970-01-01 00:00:00';
	public $end_date='3000-01-01 00:00:00';
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CpBaseInfo the static model class
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
		return 'cp_base_info';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cp_name, cpcode, cp_desc', 'required'),
			array('cpcode', 'numerical', 'integerOnly'=>true),
			array('cp_name,cpcode', 'length', 'max'=>20),
			array('cp_desc,cp_status', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cp_id, cp_name, cpcode, create_time, update_time, cp_desc, cp_status', 'safe', 'on'=>'search'),
		);
	}
	/**
	 * create or update cp status
	 * cp状态对应数组，省去查询关联数据库步骤，不会长期修改
	 *
	 */
	public function getCPStatusList()
	{
		return array('0'=>'商务对接中','1'=>'技术对接验收过程中','2'=>'已上线运营');
	}
	public function getCPStatus($cp_status)
	{
		$status_arr=array('0'=>'商务对接中','1'=>'技术对接验收过程中','2'=>'已上线运营');
		return $status_arr[$cp_status];
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
			'cp_id' => 'CpID',
			'cp_name' => '厂商名称',
			'cpcode' => 'CPcode',
			'create_time' => '创建时间',
			'update_time' => '更新时间',
				//增加attribute属性
			'begin_date' => '最后更新起始时间',
			'end_date' => '最后更新结束时间',
			'cp_desc' => '厂商描述',
			'cp_status' => '厂商状态',
		);
	}

	public function getCpNameList()
	{
		$CpNameList = CpBaseInfo::model()->findAll();
		return CHtml::listData($CpNameList, 'cp_id', 'cp_name');
// 		echo '<pre>';
// 		foreach($CpNameList as $cplist){
// 			print_r($cplist->attributes);
// 		}
// 		echo '</pre>';
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

		$criteria->compare('cp_id',$this->cp_id);
		$criteria->compare('cp_name',$this->cp_name,true);
		$criteria->compare('cpcode',$this->cpcode);
		$criteria->compare('create_time',$this->create_time);
		//$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('cp_desc',$this->cp_desc,true);
		$criteria->compare('cp_status',$this->cp_status);
		//添加搜索时的updatetime between条件参数
		$criteria->addBetweenCondition('update_time',$this->begin_date,$this->end_date);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}