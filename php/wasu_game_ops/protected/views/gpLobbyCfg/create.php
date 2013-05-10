<?php
/* @var $this GpLobbyCfgController */
/* @var $model GpLobbyCfg */

$this->breadcrumbs=array(
	'Gp Lobby Cfgs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GpLobbyCfg', 'url'=>array('index')),
	array('label'=>'Manage GpLobbyCfg', 'url'=>array('admin')),
);
?>

<h1>Create GpLobbyCfg</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>