<?php
/* @var $this DailyTurnoverController */
/* @var $model DailyTurnover */

$this->breadcrumbs=array(
	'Daily Turnovers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DailyTurnover', 'url'=>array('index')),
	array('label'=>'Manage DailyTurnover', 'url'=>array('admin')),
);
?>

<h1>Create DailyTurnover</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>