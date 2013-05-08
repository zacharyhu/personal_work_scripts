<?php
/* @var $this CpManageUserController */
/* @var $model CpManageUser */

$this->breadcrumbs=array(
	'Cp Manage Users'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CpManageUser', 'url'=>array('index')),
	array('label'=>'Create CpManageUser', 'url'=>array('create')),
	array('label'=>'Update CpManageUser', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CpManageUser', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CpManageUser', 'url'=>array('admin')),
);
?>

<h1>View CpManageUser #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'Username',
		'Password',
		'email',
		'groupid',
	),
)); ?>
