<?php

/**
 * This is the model class for table "tv_gp_cfg_game_lobby_info".
 *
 * The followings are the available columns in table 'tv_gp_cfg_game_lobby_info':
 * @property integer $l_lobby_id
 * @property string $vc_org_name
 * @property string $vc_recharge_ipaddr
 * @property integer $l_recharge_port
 * @property integer $l_payment
 * @property integer $l_day_money
 * @property integer $l_month_money
 * @property string $vc_business_id
 * @property integer $l_status
 * @property string $vc_filter_gameid
 * @property string $vc_order_id
 */
class TvGpCfgGameLobbyInfo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TvGpCfgGameLobbyInfo the static model class
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
		return 'tv_gp_cfg_game_lobby_info';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('l_lobby_id, vc_org_name, vc_recharge_ipaddr, l_recharge_port, l_payment, l_day_money, l_month_money, vc_business_id, l_status, vc_filter_gameid, vc_order_id', 'required'),
			array('l_lobby_id, l_recharge_port, l_payment, l_day_money, l_month_money, l_status', 'numerical', 'integerOnly'=>true),
			array('vc_org_name, vc_recharge_ipaddr', 'length', 'max'=>32),
			array('vc_business_id, vc_filter_gameid, vc_order_id', 'length', 'max'=>256),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('l_lobby_id, vc_org_name, vc_recharge_ipaddr, l_recharge_port, l_payment, l_day_money, l_month_money, vc_business_id, l_status, vc_filter_gameid, vc_order_id', 'safe', 'on'=>'search'),
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
			'l_lobby_id' => 'L Lobby',
			'vc_org_name' => 'Vc Org Name',
			'vc_recharge_ipaddr' => 'Vc Recharge Ipaddr',
			'l_recharge_port' => 'L Recharge Port',
			'l_payment' => 'L Payment',
			'l_day_money' => 'L Day Money',
			'l_month_money' => 'L Month Money',
			'vc_business_id' => 'Vc Business',
			'l_status' => 'L Status',
			'vc_filter_gameid' => 'Vc Filter Gameid',
			'vc_order_id' => 'Vc Order',
		);
	}

	/**
	 * 创建获取大厅列表方法
	 */
	
	public function getLobbyList()
	{
		$lobbylist = TvGpCfgGameLobbyInfo::model()->findAll();
		return CHtml::listData($lobbylist, 'l_lobby_id', 'vc_org_name');
	}
	
	public function getLobbyName($lobbyid)
	{
		$lobbydata = TvGpCfgGameLobbyInfo::model()->findByAttributes(array('l_lobby_id'=>$lobbyid));
		return $lobbydata->vc_org_name;
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

		$criteria->compare('l_lobby_id',$this->l_lobby_id);
		$criteria->compare('vc_org_name',$this->vc_org_name,true);
		$criteria->compare('vc_recharge_ipaddr',$this->vc_recharge_ipaddr,true);
		$criteria->compare('l_recharge_port',$this->l_recharge_port);
		$criteria->compare('l_payment',$this->l_payment);
		$criteria->compare('l_day_money',$this->l_day_money);
		$criteria->compare('l_month_money',$this->l_month_money);
		$criteria->compare('vc_business_id',$this->vc_business_id,true);
		$criteria->compare('l_status',$this->l_status);
		$criteria->compare('vc_filter_gameid',$this->vc_filter_gameid,true);
		$criteria->compare('vc_order_id',$this->vc_order_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}