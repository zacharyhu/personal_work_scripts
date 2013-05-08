<?php
/* @var $this CpResourceInfoController */
/* @var $model CpResourceInfo */

$this->breadcrumbs=array(
	'Cp Resource Infos'=>array('index'),
	$model->cp_id,
);

$this->menu=array(
	array('label'=>'List CpResourceInfo', 'url'=>array('index')),
	array('label'=>'Create CpResourceInfo', 'url'=>array('create')),
	array('label'=>'Update CpResourceInfo', 'url'=>array('update', 'id'=>$model->cp_id)),
	array('label'=>'Delete CpResourceInfo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->cp_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CpResourceInfo', 'url'=>array('admin')),
);
?>

<h1>View CpResourceInfo #<?php echo $model->cp_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'cp_id',
		'ip',
		'port',
		'server',
		'privilege',
	),
)); ?>
