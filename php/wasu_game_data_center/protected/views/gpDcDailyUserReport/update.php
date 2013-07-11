<?php
$this->pageCaption='Update GpDcDailyUserReport '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Gp Dc Daily User Reports'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Gp Dc Daily User Reports', 'url'=>array('index')),
	array('label'=>'Create GpDcDailyUserReport', 'url'=>array('create')),
	array('label'=>'View GpDcDailyUserReport', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Gp Dc Daily User Reports', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>