<?php
/* @var $this OpsUserController */
/* @var $model OpsUser */

$this->breadcrumbs=array(
	'Ops Users'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List OpsUser', 'url'=>array('index')),
	array('label'=>'Create OpsUser', 'url'=>array('create')),
	array('label'=>'View OpsUser', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage OpsUser', 'url'=>array('admin')),
);
?>

<h1>Update OpsUser <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>