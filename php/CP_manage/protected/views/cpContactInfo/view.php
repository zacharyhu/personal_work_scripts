<?php
/* @var $this CpContactInfoController */
/* @var $model CpContactInfo */

$this->breadcrumbs=array(
	'Cp Contact Infos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CpContactInfo', 'url'=>array('index')),
	array('label'=>'Create CpContactInfo', 'url'=>array('create')),
	array('label'=>'Update CpContactInfo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CpContactInfo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CpContactInfo', 'url'=>array('admin')),
);
?>

<h1>View CpContactInfo #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		//'cp_id',
		'contact_name',
		'contact_phone',
		'contact_email',
		'update_time',
		'contact_type',
	),
)); ?>
