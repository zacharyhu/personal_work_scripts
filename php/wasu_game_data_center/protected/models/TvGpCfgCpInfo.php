<?php

/**
 * This is the model class for table "tv_gp_cfg_cp_info".
 *
 * The followings are the available columns in table 'tv_gp_cfg_cp_info':
 * @property integer $l_cp_code
 * @property string $vc_cp_name
 */
class TvGpCfgCpInfo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TvGpCfgCpInfo the static model class
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
		return 'tv_gp_cfg_cp_info';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('l_cp_code, vc_cp_name', 'required'),
			array('l_cp_code', 'numerical', 'integerOnly'=>true),
			array('vc_cp_name', 'length', 'max'=>64),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('l_cp_code, vc_cp_name', 'safe', 'on'=>'search'),
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
			'l_cp_code' => 'L Cp Code',
			'vc_cp_name' => 'Vc Cp Name',
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

		$criteria->compare('l_cp_code',$this->l_cp_code);
		$criteria->compare('vc_cp_name',$this->vc_cp_name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}