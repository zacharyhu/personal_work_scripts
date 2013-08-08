<?php
/* @var $this TvGpLogsPointsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tv Gp Logs Points',
);

$this->menu=array(
	array('label'=>'Create TvGpLogsPoints', 'url'=>array('create')),
	array('label'=>'Manage TvGpLogsPoints', 'url'=>array('admin')),
);
?>

<h1>Tv Gp Logs Points</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
