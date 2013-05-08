<?php

/**
 * This is the model class for table "cp_resource_info".
 *
 * The followings are the available columns in table 'cp_resource_info':
 * @property integer $cp_id
 * @property string $ip
 * @property integer $port
 * @property string $server
 * @property string $privilege
 */
class CpResourceInfo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CpResourceInfo the static model class
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
		return 'cp_resource_info';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ip, port, server, privilege', 'required'),
			array('port', 'numerical', 'integerOnly'=>true),
			array('ip', 'length', 'max'=>50),
			array('server, privilege', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cp_id, ip, port, server, privilege', 'safe', 'on'=>'search'),
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
			'cp_id' => 'Cp',
			'ip' => 'Ip',
			'port' => 'Port',
			'server' => 'Server',
			'privilege' => 'Privilege',
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

		$criteria->compare('cp_id',$this->cp_id);
		$criteria->compare('ip',$this->ip,true);
		$criteria->compare('port',$this->port);
		$criteria->compare('server',$this->server,true);
		$criteria->compare('privilege',$this->privilege,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}