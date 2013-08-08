<?php
/* @var $this GpDcUserController */
/* @var $model GpDcUser */

$this->pageCaption='用户管理';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='用户管理';
$this->breadcrumbs=array(
	'用户管理'=>array('admin'),
	'管理',
);
$this->menu=array(
		array('label'=>'', 'url'=>array('index')),
		array('label'=>'', 'url'=>array('create')),
);

?>

<?php 
echo "你可以：";
echo CHtml::link(CHtml::encode('新建用户'),array('GpDcUser/create'));
echo "  或者点击用户名更新用户";
?>


<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'gp-dc-user-grid',
	'dataProvider'=>$model->search(),
	'cssFile'=>Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('ext.bootstrap-theme.widgets.assets')).'/gridview/styles.css',
	'itemsCssClass'=>'zebra-striped',
// 	'filter'=>$model,
	'columns'=>array(
// 		'id',
// 		'login_name',
        array('name'=>'login_name','type'=>'raw','value'=>'CHtml::link(CHtml::encode($data->login_name),array("GpDcUser/update","id"=>$data->id))'),
		'username',
		'password',
		'groupid',
		'update_date',
		array('name'=>'email','type'=>'raw','value'=>'CHtml::mailto($data->email)'),
		'phone',
		array(
		'class'=>'bootstrap.widgets.TbButtonColumn',
		'htmlOptions'=>array('style'=>'width: 50px'),
		),	
// 		array(
// 			'class'=>'CButtonColumn',
// 		),
	),
)); ?>
