<?php

/**
 * This is the model class for table "gp_dc_daily_game_active".
 *
 * The followings are the available columns in table 'gp_dc_daily_game_active':
 * @property integer $id
 * @property integer $l_date
 * @property integer $lobby_id
 * @property integer $cp_code
 * @property integer $game_id
 * @property integer $user_num
 * @property integer $user_time
 */
class GpDcDailyGameActive extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GpDcDailyGameActive the static model class
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
		return 'gp_dc_daily_game_active';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('l_date, lobby_id, cp_code, game_id, user_num, user_time', 'required'),
			array('l_date, lobby_id, cp_code, game_id, user_num, user_time', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, l_date, lobby_id, cp_code, game_id, user_num, user_time', 'safe', 'on'=>'search'),
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
			'lobby_id' => '大厅',
			'cp_code' => 'CP名称',
			'game_id' => '游戏名',
			'user_num' => '点击用户数',
			'user_time' => '点击人次',
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
// 		$criteria->compare('l_date',$this->l_date);
		$criteria->compare('lobby_id',$this->lobby_id);
		$criteria->compare('cp_code',$this->cp_code);
		$criteria->compare('game_id',$this->game_id);
		$criteria->compare('user_num',$this->user_num);
		$criteria->compare('user_time',$this->user_time);
//添加日期区间
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