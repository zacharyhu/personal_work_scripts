<?php
/* @var $this CpGameInfoController */
/* @var $model CpGameInfo */

$this->breadcrumbs=array(
	'Cp Game Infos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CpGameInfo', 'url'=>array('index')),
	array('label'=>'Manage CpGameInfo', 'url'=>array('admin')),
);
?>

<h1>Create CpGameInfo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>