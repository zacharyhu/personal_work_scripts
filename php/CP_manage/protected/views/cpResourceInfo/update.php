<?php
/* @var $this CpResourceInfoController */
/* @var $model CpResourceInfo */

$this->breadcrumbs=array(
	'Cp Resource Infos'=>array('index'),
	$model->cp_id=>array('view','id'=>$model->cp_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CpResourceInfo', 'url'=>array('index')),
	array('label'=>'Create CpResourceInfo', 'url'=>array('create')),
	array('label'=>'View CpResourceInfo', 'url'=>array('view', 'id'=>$model->cp_id)),
	array('label'=>'Manage CpResourceInfo', 'url'=>array('admin')),
);
?>

<h1>Update CpResourceInfo <?php echo $model->cp_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>