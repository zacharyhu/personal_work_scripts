<?php
$this->pageCaption='Gp Dc Daily Turnovers';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='List of all gp dc daily turnovers';
$this->breadcrumbs=array(
	'Gp Dc Daily Turnovers',
);

$this->menu=array(
	array('label'=>'Create GpDcDailyTurnover', 'url'=>array('create')),
	array('label'=>'Manage GpDcDailyTurnover', 'url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
