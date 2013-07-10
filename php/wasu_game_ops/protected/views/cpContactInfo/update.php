<?php
/* @var $this CpContactInfoController */
/* @var $model CpContactInfo */

$this->breadcrumbs=array(
	'联系人信息'=>array('index'),
	$model->contact_name=>array('view','id'=>$model->id),
	'更新',
);

$this->menu=array(
	array('label'=>'List CpContactInfo', 'url'=>array('index')),
	array('label'=>'Create CpContactInfo', 'url'=>array('create')),
	array('label'=>'View CpContactInfo', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CpContactInfo', 'url'=>array('admin')),
);
?>

<h1>Update CpContactInfo <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>