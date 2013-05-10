<?php

/**
 * This is the model class for table "gp_lobby_cfg".
 *
 * The followings are the available columns in table 'gp_lobby_cfg':
 * @property integer $id
 * @property integer $game_lobby
 * @property string $lobby_name
 */
class GpLobbyCfg extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'gp_lobby_cfg';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('game_lobby, lobby_name', 'required'),
			array('game_lobby', 'numerical', 'integerOnly'=>true),
			array('lobby_name', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, game_lobby, lobby_name', 'safe', 'on'=>'search'),
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
			'game_lobby' => 'Game Lobby',
			'lobby_name' => 'Lobby Name',
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
		$criteria->compare('game_lobby',$this->game_lobby);
		$criteria->compare('lobby_name',$this->lobby_name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getLobbyList()
	{
		$LobbyList = GpLobbyCfg::model()->findAll();
		return CHtml::listData($LobbyList, 'game_lobby', 'lobby_name');
	}
	
	public function getLobbyName($game_lobby)
	{
		$LobbyName = GpLobbyCfg::model()->findByAttributes(array('game_lobby'=>$game_lobby));
		return $LobbyName->lobby_name;		
	}
	
	
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return GpLobbyCfg the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
