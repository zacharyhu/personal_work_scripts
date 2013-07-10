<?php
/* @var $this CpOperationLogsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cp Operation Logs',
);

$this->menu=array(
	array('label'=>'Create CpOperationLogs', 'url'=>array('create')),
	array('label'=>'Manage CpOperationLogs', 'url'=>array('admin')),
);
?>

<h1>Cp Operation Logs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
