<?php
/* @var $this CpResourceInfoController */
/* @var $model CpResourceInfo */

$this->breadcrumbs=array(
	'Cp Resource Infos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CpResourceInfo', 'url'=>array('index')),
	array('label'=>'Manage CpResourceInfo', 'url'=>array('admin')),
);
?>

<h1>Create CpResourceInfo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>