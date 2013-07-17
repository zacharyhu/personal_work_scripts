<?php

/**
 * This is the model class for table "tv_gp_cfg_game_info".
 *
 * The followings are the available columns in table 'tv_gp_cfg_game_info':
 * @property integer $l_game_id
 * @property integer $l_status
 * @property integer $l_func_type
 * @property integer $l_game_type
 * @property string $vc_game_name
 * @property string $vc_game_desc
 * @property string $vc_game_image
 * @property integer $l_date
 * @property integer $l_time
 * @property integer $l_rank_value
 * @property string $vc_search_key
 * @property string $l_cp_code
 */
class TvGpCfgGameInfo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tv_gp_cfg_game_info';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('l_game_id, l_status, l_game_type, vc_game_image, l_date, l_time, l_rank_value, vc_search_key', 'required'),
			array('l_game_id, l_status, l_func_type, l_game_type, l_date, l_time, l_rank_value', 'numerical', 'integerOnly'=>true),
			array('vc_game_name, vc_game_desc', 'length', 'max'=>32),
			array('vc_game_image, vc_search_key', 'length', 'max'=>256),
			array('l_cp_code', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('l_game_id, l_status, l_func_type, l_game_type, vc_game_name, vc_game_desc, vc_game_image, l_date, l_time, l_rank_value, vc_search_key, l_cp_code', 'safe', 'on'=>'search'),
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
			'l_game_id' => '游戏编号(100~999)',
			'l_status' => '游戏状态(0=正常,1=删除)',
			'l_func_type' => 'L Func Type',
			'l_game_type' => '游戏类型',
			'vc_game_name' => '游戏名称',
			'vc_game_desc' => '游戏描述',
			'vc_game_image' => '游戏图片',
			'l_date' => 'L Date',
			'l_time' => '创建日期(YYMMDD)',
			'l_rank_value' => '游戏排名权重(tv_gp_cfg_base_value, 103)',
			'vc_search_key' => '游戏搜索关键字(空格分隔)',
			'l_cp_code' => '游戏商编号',
		);
	}
	
	/**
	 * 添加查询游戏列表信息
	 */
	public function getGameList()
	{
		$gamelist = TvGpCfgGameInfo::model()->findAll();
		return CHtml::listData($gamelist, 'l_game_id', 'vc_game_name');
	}

	/**
	 * 添加查询游戏方法
	 */
	public function getGameName($gameid)
	{
		$game_name_list = TvGpCfgGameInfo::model()->findByAttributes(array('l_game_id'=>$gameid));
		return $game_name_list->vc_game_name;
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

		$criteria->compare('l_game_id',$this->l_game_id);
		$criteria->compare('l_status',$this->l_status);
		$criteria->compare('l_func_type',$this->l_func_type);
		$criteria->compare('l_game_type',$this->l_game_type);
		$criteria->compare('vc_game_name',$this->vc_game_name,true);
		$criteria->compare('vc_game_desc',$this->vc_game_desc,true);
		$criteria->compare('vc_game_image',$this->vc_game_image,true);
		$criteria->compare('l_date',$this->l_date);
		$criteria->compare('l_time',$this->l_time);
		$criteria->compare('l_rank_value',$this->l_rank_value);
		$criteria->compare('vc_search_key',$this->vc_search_key,true);
		$criteria->compare('l_cp_code',$this->l_cp_code,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TvGpCfgGameInfo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
