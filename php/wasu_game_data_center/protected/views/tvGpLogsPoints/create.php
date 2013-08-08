<?php
/* @var $this TvGpLogsPointsController */
/* @var $model TvGpLogsPoints */

$this->breadcrumbs=array(
	'Tv Gp Logs Points'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TvGpLogsPoints', 'url'=>array('index')),
	array('label'=>'Manage TvGpLogsPoints', 'url'=>array('admin')),
);
?>

<h1>Create TvGpLogsPoints</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>