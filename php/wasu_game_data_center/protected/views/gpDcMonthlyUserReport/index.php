<?php
$this->pageCaption='Gp Dc Monthly User Reports';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='List of all gp dc monthly user reports';
$this->breadcrumbs=array(
	'Gp Dc Monthly User Reports',
);

$this->menu=array(
	array('label'=>'Create GpDcMonthlyUserReport', 'url'=>array('create')),
	array('label'=>'Manage GpDcMonthlyUserReport', 'url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
