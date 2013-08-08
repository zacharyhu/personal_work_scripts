<?php

/**
 * This is the model class for table "gp_dc_daily_turnover".
 *
 * The followings are the available columns in table 'gp_dc_daily_turnover':
 * @property integer $id
 * @property string $l_date
 * @property integer $lobby_id
 * @property integer $cp_code
 * @property integer $action_id
 * @property integer $sum
 * @property string $begin_date
 * @property string $end_date
 * @property integer $user_no
 * @property integer $user_time
 * @property string $arpu
 */
class GpDcDailyTurnover extends CActiveRecord
{

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GpDcDailyTurnover the static model class
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
		return 'gp_dc_daily_turnover';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('l_date, lobby_id, cp_code, action_id, sum, user_no, user_time, arpu', 'required'),
			array('lobby_id, cp_code, action_id, sum, user_no, user_time', 'numerical', 'integerOnly'=>true),
			array('arpu', 'length', 'max'=>6),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, l_date, lobby_id, cp_code, action_id, sum, user_no, user_time, arpu', 'safe', 'on'=>'search'),
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
			'l_date' => '日期',
			'lobby_id' => '大厅/区域',
			'cp_code' => 'Cp名称',
			'action_id' => '行为编号',
			'sum' => '总计',
			'user_no' => '充值人数',
			'user_time' => '充值人次',
			'arpu' => 'ARPU值',
				'begin_date'=>'起始日期',
				'end_date'=>'结束日期',
		);
	}

	/**
	 * Model behaviors
	 */
	public function behaviors()
	{
		return array(
				'dateRangeSearch'=>array(
						'class'=>'application.components.behaviors.EDateRangeSearchBehavior',
				),
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

		$criteria->compare('id',$this->id);
// 		$criteria->compare('date',$this->date,true);	
		$criteria->compare('lobby_id',$this->lobby_id);
		$criteria->compare('cp_code',$this->cp_code);
		$criteria->compare('action_id',$this->action_id);
		$criteria->compare('sum',$this->sum);
		$criteria->compare('user_no',$this->user_no);
		$criteria->compare('user_time',$this->user_time);
		$criteria->compare('arpu',$this->arpu,true);
// 		$criteria->addBetweenCondition('date',$this->begin_date,$this->end_date);
//         echo gettype($this->dateRangeSearchCriteria('date',$this->date));
//         print_r("no no no ");
//         exit;
		$criteria->mergeWith($this->dateRangeSearchCriteria('l_date',$this->l_date));
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
				'pagination'=>array(
						'pageSize'=>31,
				),
				'sort'=>array(
						'defaultOrder'=>'l_date desc'
						)
		));
	}
}