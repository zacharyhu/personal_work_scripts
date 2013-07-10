<?php
/* @var $this CpOperationLogsController */
/* @var $model CpOperationLogs */

$this->breadcrumbs=array(
	'Cp Operation Logs'=>array('index'),
	$model->arch_id,
);

$this->menu=array(
	array('label'=>'List CpOperationLogs', 'url'=>array('index')),
	array('label'=>'Create CpOperationLogs', 'url'=>array('create')),
	array('label'=>'Update CpOperationLogs', 'url'=>array('update', 'id'=>$model->arch_id)),
	array('label'=>'Delete CpOperationLogs', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->arch_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CpOperationLogs', 'url'=>array('admin')),
);
?>

<h1>View CpOperationLogs #<?php echo $model->arch_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
// 		'arch_id',
		'arch_title',
		array('label'=>'厂商','type'=>'raw','value'=>CHtml::link(CHtml::encode($model->cpName->cp_name),array('cpBaseInfo/View','id'=>$model->cp_id))),
		'arch_content',
		'update_time',
		'author',
	),
)); ?>
