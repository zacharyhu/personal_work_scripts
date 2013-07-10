<?php
/* @var $this CpOperationLogsController */
/* @var $model CpOperationLogs */

$this->breadcrumbs=array(
	'Cp Operation Logs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CpOperationLogs', 'url'=>array('index')),
	array('label'=>'Manage CpOperationLogs', 'url'=>array('admin')),
);
?>

<h1>新建操作日志</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>