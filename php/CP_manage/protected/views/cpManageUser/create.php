<?php
/* @var $this CpManageUserController */
/* @var $model CpManageUser */

$this->breadcrumbs=array(
	'Cp Manage Users'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CpManageUser', 'url'=>array('index')),
	array('label'=>'Manage CpManageUser', 'url'=>array('admin')),
);
?>

<h1>Create CpManageUser</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>