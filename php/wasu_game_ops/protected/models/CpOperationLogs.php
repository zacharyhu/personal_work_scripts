<?php

/**
 * This is the model class for table "cp_operation_logs".
 *
 * The followings are the available columns in table 'cp_operation_logs':
 * @property integer $arch_id
 * @property string $arch_title
 * @property integer $cp_id
 * @property string $arch_content
 * @property string $update_time
 * @property string $author
 */
class CpOperationLogs extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cp_operation_logs';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('arch_title, cp_id, arch_content,', 'required'),
			array('cp_id', 'numerical', 'integerOnly'=>true),
			array('arch_title', 'length', 'max'=>60),
			array('arch_content', 'length', 'max'=>2550),
			array('author', 'length', 'max'=>50),
			array('arch_id, arch_title, cp_id, arch_content, update_time, author', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('arch_id, arch_title, cp_id, arch_content, update_time, author', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'arch_id' => '记录ID',
			'arch_title' => '记录标题',
			'cp_id' => 'Cp',
			'arch_content' => 'Arch Content',
			'update_time' => 'Update Time',
			'author' => '作者',
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

		$criteria->compare('arch_id',$this->arch_id);
		$criteria->compare('arch_title',$this->arch_title,true);
		$criteria->compare('cp_id',$this->cp_id);
		$criteria->compare('arch_content',$this->arch_content,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('author',$this->author,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CpOperationLogs the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	protected  function beforeSave(){
		if (parent::beforeSave()){
			$this->author = Yii::app()->user->name;	
			return 	true	;
		}else {
			return false;
		}
	}
}
