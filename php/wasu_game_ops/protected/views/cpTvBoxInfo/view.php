<?php
/* @var $this CpTvBoxInfoController */
/* @var $model CpTvBoxInfo */

$this->breadcrumbs=array(
	'Cp Tv Box Infos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CpTvBoxInfo', 'url'=>array('index')),
	array('label'=>'Create CpTvBoxInfo', 'url'=>array('create')),
	array('label'=>'Update CpTvBoxInfo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CpTvBoxInfo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CpTvBoxInfo', 'url'=>array('admin')),
);
?>

<h1>View CpTvBoxInfo #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'code',
		'type',
		'status',
		'cpid',
		'update_time',
	),
)); ?>
