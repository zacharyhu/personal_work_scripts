<?php
$this->pageCaption='Gp Dc Monthly Turnovers';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='List of all gp dc monthly turnovers';
$this->breadcrumbs=array(
	'Gp Dc Monthly Turnovers',
);

$this->menu=array(
	array('label'=>'Create GpDcMonthlyTurnover', 'url'=>array('create')),
	array('label'=>'Manage GpDcMonthlyTurnover', 'url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
