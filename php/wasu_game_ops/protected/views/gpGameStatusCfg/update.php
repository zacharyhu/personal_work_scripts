<?php
/* @var $this GpGameStatusCfgController */
/* @var $model GpGameStatusCfg */

$this->breadcrumbs=array(
	'Gp Game Status Cfgs'=>array('index'),
	$model->ip=>array('view','id'=>$model->ip),
	'Update',
);

$this->menu=array(
	array('label'=>'List GpGameStatusCfg', 'url'=>array('index')),
	array('label'=>'Create GpGameStatusCfg', 'url'=>array('create')),
	array('label'=>'View GpGameStatusCfg', 'url'=>array('view', 'id'=>$model->ip)),
	array('label'=>'Manage GpGameStatusCfg', 'url'=>array('admin')),
);
?>

<h1>Update GpGameStatusCfg <?php echo $model->ip; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>