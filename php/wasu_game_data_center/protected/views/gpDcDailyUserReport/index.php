<?php
$this->pageCaption='Gp Dc Daily User Reports';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='List of all gp dc daily user reports';
$this->breadcrumbs=array(
	'Gp Dc Daily User Reports',
);

$this->menu=array(
	array('label'=>'Create GpDcDailyUserReport', 'url'=>array('create')),
	array('label'=>'Manage GpDcDailyUserReport', 'url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
