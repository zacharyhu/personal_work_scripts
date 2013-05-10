<?php
/* @var $this GpGameStatusCfgController */
/* @var $model GpGameStatusCfg */

$this->breadcrumbs=array(
	'Gp Game Status Cfgs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GpGameStatusCfg', 'url'=>array('index')),
	array('label'=>'Manage GpGameStatusCfg', 'url'=>array('admin')),
);
?>

<h1>Create GpGameStatusCfg</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>