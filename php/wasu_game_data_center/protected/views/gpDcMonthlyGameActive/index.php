<?php
$this->pageCaption='Gp Dc Monthly Game Actives';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='List of all gp dc monthly game actives';
$this->breadcrumbs=array(
	'Gp Dc Monthly Game Actives',
);

$this->menu=array(
	array('label'=>'Create GpDcMonthlyGameActive', 'url'=>array('create')),
	array('label'=>'Manage GpDcMonthlyGameActive', 'url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
