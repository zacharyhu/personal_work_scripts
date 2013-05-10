<?php
/* @var $this GpLobbyCfgController */
/* @var $model GpLobbyCfg */

$this->breadcrumbs=array(
	'Gp Lobby Cfgs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List GpLobbyCfg', 'url'=>array('index')),
	array('label'=>'Create GpLobbyCfg', 'url'=>array('create')),
	array('label'=>'View GpLobbyCfg', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage GpLobbyCfg', 'url'=>array('admin')),
);
?>

<h1>Update GpLobbyCfg <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>