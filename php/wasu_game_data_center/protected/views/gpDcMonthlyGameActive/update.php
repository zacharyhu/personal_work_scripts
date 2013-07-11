<?php
$this->pageCaption='Update GpDcMonthlyGameActive '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Gp Dc Monthly Game Actives'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Gp Dc Monthly Game Actives', 'url'=>array('index')),
	array('label'=>'Create GpDcMonthlyGameActive', 'url'=>array('create')),
	array('label'=>'View GpDcMonthlyGameActive', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Gp Dc Monthly Game Actives', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>