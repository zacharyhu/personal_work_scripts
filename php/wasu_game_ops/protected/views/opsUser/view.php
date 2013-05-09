<?php
/* @var $this OpsUserController */
/* @var $model OpsUser */

$this->breadcrumbs=array(
	'Ops Users'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List OpsUser', 'url'=>array('index')),
	array('label'=>'Create OpsUser', 'url'=>array('create')),
	array('label'=>'Update OpsUser', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete OpsUser', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage OpsUser', 'url'=>array('admin')),
);
?>

<h1>View OpsUser #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'login_name',
		'username',
		'password',
		'groupid',
		'update_date',
		'email',
		'phone',
	),
)); ?>
