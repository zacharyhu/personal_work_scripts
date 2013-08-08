<?php

/**
 * This is the model class for table "tv_gp_logs_points".
 *
 * The followings are the available columns in table 'tv_gp_logs_points':
 * @property integer $l_index
 * @property integer $l_user_id
 * @property integer $l_lobby_id
 * @property integer $l_source_id
 * @property integer $l_game_type
 * @property integer $l_game_id
 * @property integer $l_before_coin
 * @property integer $l_chg_coin
 * @property integer $l_coin
 * @property integer $l_date
 * @property integer $l_time
 */
class TvGpLogsPoints extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tv_gp_logs_points';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('l_user_id, l_lobby_id, l_source_id, l_game_type, l_game_id, l_before_coin, l_chg_coin, l_coin, l_date, l_time', 'required'),
			array('l_user_id, l_lobby_id, l_source_id, l_game_type, l_game_id, l_before_coin, l_chg_coin, l_coin, l_date, l_time', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('l_index, l_user_id, l_lobby_id, l_source_id, l_game_type, l_game_id, l_before_coin, l_chg_coin, l_coin, l_date, l_time', 'safe', 'on'=>'search'),
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
			'l_index' => 'L Index',
			'l_user_id' => '亿家游号',
			'l_lobby_id' => '大厅编号',
			'l_source_id' => '来源编号(101充值,201玩游戏)',
			'l_game_type' => '游戏类型',
			'l_game_id' => '游戏编号(0=非游戏中产生)',
			'l_before_coin' => '变化前游戏点',
			'l_chg_coin' => '变化游戏点',
			'l_coin' => '游戏点余额',
			'l_date' => '日期(YYMMDD)',
			'l_time' => '时间(HHMMSS)',
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

		$criteria->compare('l_index',$this->l_index);
		$criteria->compare('l_user_id',$this->l_user_id);
		$criteria->compare('l_lobby_id',$this->l_lobby_id);
		$criteria->compare('l_source_id',$this->l_source_id);
		$criteria->compare('l_game_type',$this->l_game_type);
		$criteria->compare('l_game_id',$this->l_game_id);
		$criteria->compare('l_before_coin',$this->l_before_coin);
		$criteria->compare('l_chg_coin',$this->l_chg_coin);
		$criteria->compare('l_coin',$this->l_coin);
		$criteria->compare('l_date',$this->l_date);
		$criteria->compare('l_time',$this->l_time);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TvGpLogsPoints the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
