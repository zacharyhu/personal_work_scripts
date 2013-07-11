<?php

/**
 * This is the model class for table "gp_dc_monthly_user_report".
 *
 * The followings are the available columns in table 'gp_dc_monthly_user_report':
 * @property integer $id
 * @property string $l_month
 * @property integer $lobby_id
 * @property integer $user_login_num
 * @property integer $user_login_time
 * @property integer $user_register
 * @property integer $user_new
 * @property integer $beyond_5
 * @property integer $beyond_10
 * @property integer $beyond_15
 * @property integer $beyond_20
 * @property integer $beyond_25
 */
class GpDcMonthlyUserReport extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GpDcMonthlyUserReport the static model class
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
		return 'gp_dc_monthly_user_report';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('l_month, lobby_id, user_login_num, user_login_time, user_register, user_new, beyond_5, beyond_10, beyond_15, beyond_20, beyond_25', 'required'),
			array('lobby_id, user_login_num, user_login_time, user_register, user_new, beyond_5, beyond_10, beyond_15, beyond_20, beyond_25', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, l_month, lobby_id, user_login_num, user_login_time, user_register, user_new, beyond_5, beyond_10, beyond_15, beyond_20, beyond_25', 'safe', 'on'=>'search'),
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
			'l_month' => '月份',
			'lobby_id' => '大厅/区域',
			'user_login_num' => '用户登录数',
			'user_login_time' => '登录人次',
			'user_register' => '当前注册人数',
			'user_new' => '本月新注册用户数',
			'beyond_5' => '活跃度5天以上',
			'beyond_10' => '活跃度10天以上',
			'beyond_15' => '活跃度15天以上',
			'beyond_20' => '活跃度20天以上',
			'beyond_25' => '活跃度25天以上',
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
		$criteria->compare('l_month',$this->l_month,true);
		$criteria->compare('lobby_id',$this->lobby_id);
		$criteria->compare('user_login_num',$this->user_login_num);
		$criteria->compare('user_login_time',$this->user_login_time);
		$criteria->compare('user_register',$this->user_register);
		$criteria->compare('user_new',$this->user_new);
		$criteria->compare('beyond_5',$this->beyond_5);
		$criteria->compare('beyond_10',$this->beyond_10);
		$criteria->compare('beyond_15',$this->beyond_15);
		$criteria->compare('beyond_20',$this->beyond_20);
		$criteria->compare('beyond_25',$this->beyond_25);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}