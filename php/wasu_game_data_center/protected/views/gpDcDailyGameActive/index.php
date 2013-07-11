<?php
$this->pageCaption='Gp Dc Daily Game Actives';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='List of all gp dc daily game actives';
$this->breadcrumbs=array(
	'Gp Dc Daily Game Actives',
);

$this->menu=array(
	array('label'=>'Create GpDcDailyGameActive', 'url'=>array('create')),
	array('label'=>'Manage GpDcDailyGameActive', 'url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
