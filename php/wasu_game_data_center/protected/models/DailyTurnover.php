<?php

/**
 * This is the model class for table "gp_dc_daily_turnover".
 *
 * The followings are the available columns in table 'gp_dc_daily_turnover':
 * @property integer $id
 * @property string $date
 * @property integer $lobby_id
 * @property integer $cp_code
 * @property integer $action_id
 * @property integer $sum
 * @property integer $user_no
 * @property integer $user_time
 * @property string $arpu
 */
class DailyTurnover extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DailyTurnover the static model class
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
			array('date, lobby_id, cp_code, action_id, sum, user_no, user_time, arpu', 'required'),
			array('lobby_id, cp_code, action_id, sum, user_no, user_time', 'numerical', 'integerOnly'=>true),
			array('arpu', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, date, lobby_id, cp_code, action_id, sum, user_no, user_time, arpu', 'safe', 'on'=>'search'),
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
			'date' => '日期',
			'lobby_id' => '大厅',
			'cp_code' => 'CP',
			'action_id' => 'action',
			'sum' => '总金额',
			'user_no' => '充值人数',
			'user_time' => '充值人次',
			'arpu' => 'Arpu',
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
		$criteria->compare('date',$this->date,true);
		$criteria->compare('lobby_id',$this->lobby_id);
		$criteria->compare('cp_code',$this->cp_code);
		$criteria->compare('action_id',$this->action_id);
		$criteria->compare('sum',$this->sum);
		$criteria->compare('user_no',$this->user_no);
		$criteria->compare('user_time',$this->user_time);
		$criteria->compare('arpu',$this->arpu,true);
// 		$criteria->order = 'date desc,lobby_id desc,cp_code desc,action_id desc';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
				'pagination'=>array(
						'pageSize'=>30, //代表每页显示2条信息
				),
				'sort'=>array(
						'defaultOrder'=>'date desc,lobby_id desc,cp_code desc,action_id desc',
						),
		));
	}
}