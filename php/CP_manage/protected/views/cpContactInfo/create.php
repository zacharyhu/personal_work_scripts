<?php
/* @var $this CpContactInfoController */
/* @var $model CpContactInfo */

$this->breadcrumbs=array(
	'Cp Contact Infos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CpContactInfo', 'url'=>array('index')),
	array('label'=>'Manage CpContactInfo', 'url'=>array('admin')),
);
?>

<h1>Create CpContactInfo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>