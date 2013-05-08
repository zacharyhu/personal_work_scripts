<?php
/* @var $this CpManageUserController */
/* @var $model CpManageUser */

$this->breadcrumbs=array(
	'Cp Manage Users'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CpManageUser', 'url'=>array('index')),
	array('label'=>'Create CpManageUser', 'url'=>array('create')),
	array('label'=>'View CpManageUser', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CpManageUser', 'url'=>array('admin')),
);
?>

<h1>Update CpManageUser <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>