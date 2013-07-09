<?php

/**
 * This is the model class for table "tv_gp_cfg_action".
 *
 * The followings are the available columns in table 'tv_gp_cfg_action':
 * @property integer $l_action_id
 * @property integer $l_father_id
 * @property string $vc_business_name
 * @property string $vc_father_name
 * @property string $vc_business_desc
 */
class TvGpCfgAction extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TvGpCfgAction the static model class
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
		return 'tv_gp_cfg_action';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('l_action_id, l_father_id, vc_business_name, vc_father_name, vc_business_desc', 'required'),
			array('l_action_id, l_father_id', 'numerical', 'integerOnly'=>true),
			array('vc_business_name, vc_father_name', 'length', 'max'=>64),
			array('vc_business_desc', 'length', 'max'=>256),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('l_action_id, l_father_id, vc_business_name, vc_father_name, vc_business_desc', 'safe', 'on'=>'search'),
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
			'l_action_id' => 'L Action',
			'l_father_id' => 'L Father',
			'vc_business_name' => 'Vc Business Name',
			'vc_father_name' => 'Vc Father Name',
			'vc_business_desc' => 'Vc Business Desc',
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

		$criteria->compare('l_action_id',$this->l_action_id);
		$criteria->compare('l_father_id',$this->l_father_id);
		$criteria->compare('vc_business_name',$this->vc_business_name,true);
		$criteria->compare('vc_father_name',$this->vc_father_name,true);
		$criteria->compare('vc_business_desc',$this->vc_business_desc,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}