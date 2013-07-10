<?php
/* @var $this CpContactInfoController */
/* @var $model CpContactInfo */

$this->breadcrumbs=array(
	'CP联系人信息'=>array('index'),
	$model->contact_name,
);

$this->menu=array(
	array('label'=>'List CpContactInfo', 'url'=>array('index')),
	array('label'=>'Create CpContactInfo', 'url'=>array('create')),
	array('label'=>'Update CpContactInfo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CpContactInfo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CpContactInfo', 'url'=>array('admin')),
);
?>

<h1>联系人详情：     <?php echo $model->contact_name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		//'cp_id',
        array('label'=>'厂商','type'=>'raw','value'=>CHtml::link(CHtml::encode($model->cpName->cp_name),array('cpContactInfo/update','id'=>$model->cp_id))),
		'contact_name',
		'contact_phone',
		 array('label'=>'邮箱','type'=>'raw','value'=>CHtml::mailto($model->contact_email)),
        'contact_qq',
        'contact_others',
		'update_time',
        array('label'=>'联系人类别','value'=>CpContactInfo::model()->getContactType($model->contact_type)),
        array('label'=>'操作 ','type'=>'raw','value'=>CHtml::link(CHtml::encode('更新联系人信息'),array('cpContactInfo/update','id'=>$model->id))),
		//'contact_type',
	),
)); ?>
