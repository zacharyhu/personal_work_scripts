<?php
/* @var $this GpDcUserController */
/* @var $model GpDcUser */

$this->pageCaption='系统用户管理';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='----更新用户';
$this->breadcrumbs=array(
	'系统用户管理'=>array('admin'),
	'更新(id: '.$model->id.')',
);

?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>