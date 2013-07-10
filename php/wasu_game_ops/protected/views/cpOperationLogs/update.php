<?php
/* @var $this CpOperationLogsController */
/* @var $model CpOperationLogs */

$this->breadcrumbs=array(
	'Cp Operation Logs'=>array('index'),
	$model->arch_id=>array('view','id'=>$model->arch_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CpOperationLogs', 'url'=>array('index')),
	array('label'=>'Create CpOperationLogs', 'url'=>array('create')),
	array('label'=>'View CpOperationLogs', 'url'=>array('view', 'id'=>$model->arch_id)),
	array('label'=>'Manage CpOperationLogs', 'url'=>array('admin')),
);
?>

<h1>Update CpOperationLogs <?php echo $model->arch_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>