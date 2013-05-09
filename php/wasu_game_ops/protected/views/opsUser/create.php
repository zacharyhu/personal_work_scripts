<?php
/* @var $this OpsUserController */
/* @var $model OpsUser */

$this->breadcrumbs=array(
	'Ops Users'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List OpsUser', 'url'=>array('index')),
	array('label'=>'Manage OpsUser', 'url'=>array('admin')),
);
?>

<h1>Create OpsUser</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>