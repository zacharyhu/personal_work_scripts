<?php
/* @var $this GpDcUserController */
/* @var $model GpDcUser */

$this->breadcrumbs=array(
	'平台用户管理'=>array('admin'),
	'创建用户',
);

$this->menu=array(
	array('label'=>'List GpDcUser', 'url'=>array('index')),
	array('label'=>'Manage GpDcUser', 'url'=>array('admin')),
);
?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>