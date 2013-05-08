<?php
/* @var $this CpContactInfoController */
/* @var $model CpContactInfo */

$this->breadcrumbs=array(
	'Cp Contact Infos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
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