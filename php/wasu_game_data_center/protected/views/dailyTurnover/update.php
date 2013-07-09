<?php
/* @var $this DailyTurnoverController */
/* @var $model DailyTurnover */

$this->breadcrumbs=array(
	'Daily Turnovers'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DailyTurnover', 'url'=>array('index')),
	array('label'=>'Create DailyTurnover', 'url'=>array('create')),
	array('label'=>'View DailyTurnover', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage DailyTurnover', 'url'=>array('admin')),
);
?>

<h1>Update DailyTurnover <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>