<?php
/* @var $this GpDcUserController */
/* @var $model GpDcUser */

$this->pageCaption='系统用户管理';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='----查看单一用户';
$this->breadcrumbs=array(
	'系统用户管理'=>array('admin'),
	'查看  (id: '.$model->id.')',
);

?>


<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
// 		'id',
		'login_name',
		'username',
// 		'password',
		'groupid',
		'update_date',
		'email',
		'phone',
        array('label'=>'操作：','type'=>'raw','value'=>CHtml::link(CHtml::encode('更新用户'),array('GpDcUser/update','id'=>$model->id))),
	),
)); 
?>
