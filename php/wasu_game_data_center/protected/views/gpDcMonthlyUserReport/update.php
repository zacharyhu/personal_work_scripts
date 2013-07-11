<?php
$this->pageCaption='Update GpDcMonthlyUserReport '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Gp Dc Monthly User Reports'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Gp Dc Monthly User Reports', 'url'=>array('index')),
	array('label'=>'Create GpDcMonthlyUserReport', 'url'=>array('create')),
	array('label'=>'View GpDcMonthlyUserReport', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Gp Dc Monthly User Reports', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>