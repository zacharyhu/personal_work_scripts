<?php

/**
 * This is the model class for table "gp_dc_daily_user_report".
 *
 * The followings are the available columns in table 'gp_dc_daily_user_report':
 * @property string $l_date
 * @property integer $lobby_id
 * @property integer $user_login_num
 * @property integer $user_login_time
 * @property integer $user_register
 * @property integer $user_new
 */
class GpDcDailyUserReport extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GpDcDailyUserReport the static model class
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
		return 'gp_dc_daily_user_report';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('l_date, lobby_id, user_login_num, user_login_time, user_register, user_new', 'required'),
			array('lobby_id, user_login_num, user_login_time, user_register, user_new', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('l_date, lobby_id, user_login_num, user_login_time, user_register, user_new', 'safe', 'on'=>'search'),
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
			'l_date' => 'L Date',
			'lobby_id' => 'Lobby',
			'user_login_num' => 'User Login Num',
			'user_login_time' => 'User Login Time',
			'user_register' => 'User Register',
			'user_new' => 'User New',
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

		$criteria->compare('l_date',$this->l_date,true);
		$criteria->compare('lobby_id',$this->lobby_id);
		$criteria->compare('user_login_num',$this->user_login_num);
		$criteria->compare('user_login_time',$this->user_login_time);
		$criteria->compare('user_register',$this->user_register);
		$criteria->compare('user_new',$this->user_new);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}