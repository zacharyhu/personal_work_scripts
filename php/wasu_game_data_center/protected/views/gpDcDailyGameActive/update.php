<?php
$this->pageCaption='Update GpDcDailyGameActive '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Gp Dc Daily Game Actives'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Gp Dc Daily Game Actives', 'url'=>array('index')),
	array('label'=>'Create GpDcDailyGameActive', 'url'=>array('create')),
	array('label'=>'View GpDcDailyGameActive', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Gp Dc Daily Game Actives', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>