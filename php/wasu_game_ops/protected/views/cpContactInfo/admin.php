<?php
/* @var $this CpContactInfoController */
/* @var $model CpContactInfo */

$this->breadcrumbs=array(
	'Cp Contact Infos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List CpContactInfo', 'url'=>array('index')),
	array('label'=>'Create CpContactInfo', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#cp-contact-info-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Cp Contact Infos</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cp-contact-info-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		//'cp_id',
        array('name'=>'cp_id','value'=>'$data->cpName->cp_name','filter'=>CpBaseInfo::model()->getCpNameList()),
		'contact_name',
		'contact_phone',
		'contact_email',
        //array('class'=>'CLinkColumn','name'=>'contact_email','url'=>'mailto($data->contact_email)'),
		'update_time',
		/*
		'contact_type',
		*/
		array('name'=>'contact_type','value'=>'CpContactInfo::model()->getContactType($data->contact_type)','filter'=>CpContactInfo::model()->getContactTypeList()),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
