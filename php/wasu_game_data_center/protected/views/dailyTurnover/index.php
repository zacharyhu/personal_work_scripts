<?php
/* @var $this DailyTurnoverController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Daily Turnovers',
);

$this->menu=array(
	array('label'=>'Create DailyTurnover', 'url'=>array('create')),
	array('label'=>'Manage DailyTurnover', 'url'=>array('admin')),
);
?>

<h1>Daily Turnovers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
