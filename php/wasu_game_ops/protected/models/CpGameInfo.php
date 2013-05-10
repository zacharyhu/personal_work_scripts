<?php

/**
 * This is the model class for table "cp_game_info".
 *
 * The followings are the available columns in table 'cp_game_info':
 * @property integer $id
 * @property integer $cp_id
 * @property string $game_name
 * @property integer $game_id
 * @property integer $game_cp_code
 * @property string $game_action_id
 * @property string $game_desc
 * @property integer $game_status
 * @property integer $game_lobby
 * @property string $game_server_ip
 * @property string $game_server_port
 */
class CpGameInfo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CpGameInfo the static model class
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
		return 'cp_game_info';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cp_id, game_name, game_id, game_cp_code, game_action_id, game_desc, game_status, game_lobby, game_server_ip, game_server_port', 'required'),
			array('cp_id, game_id, game_cp_code, game_status', 'numerical', 'integerOnly'=>true),
			array('game_name, game_server_port', 'length', 'max'=>20),
			array('game_action_id, game_server_ip', 'length', 'max'=>40),
			array('game_desc', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, cp_id, game_name, game_id, game_cp_code, game_action_id, game_desc, game_status, game_lobby, game_server_ip, game_server_port', 'safe', 'on'=>'search'),
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
				'cpName'=>array(self::BELONGS_TO,'CpBaseInfo','cp_id'),
				'LobbyName'=>array(self::BELONGS_TO,'GpLobbyCfg','game_lobby'),
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
			'game_name' => '游戏名称',
			'game_id' => 'GameID',
			'game_cp_code' => 'Game CpCode',
			'game_action_id' => 'Game Action ID',
			'game_desc' => '游戏描述',
			'game_status' => '游戏状态',
			'game_lobby' => '地区大厅名称',
			'game_server_ip' => '服务端IP',
			'game_server_port' => '服务端端口',
		);
	}

	
	/*
	 * defined lobby id->name
	 * 
	 * 
	 */
	
	
	
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
		$criteria->compare('cp_id',$this->cp_id);
		$criteria->compare('game_name',$this->game_name,true);
		$criteria->compare('game_id',$this->game_id);
		$criteria->compare('game_cp_code',$this->game_cp_code);
		$criteria->compare('game_action_id',$this->game_action_id,true);
		$criteria->compare('game_desc',$this->game_desc,true);
		$criteria->compare('game_status',$this->game_status);
		$criteria->compare('game_lobby',$this->game_lobby);
		$criteria->compare('game_server_ip',$this->game_server_ip,true);
		$criteria->compare('game_server_port',$this->game_server_port,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}