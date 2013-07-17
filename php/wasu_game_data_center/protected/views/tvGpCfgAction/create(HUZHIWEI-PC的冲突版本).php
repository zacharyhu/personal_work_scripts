<?php
$this->pageCaption='Create TvGpCfgAction';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Define a new tvgpcfgaction';
$this->breadcrumbs=array(
	'Tv Gp Cfg Actions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Tv Gp Cfg Actions', 'url'=>array('index')),
	array('label'=>'Manage Tv Gp Cfg Actions', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>