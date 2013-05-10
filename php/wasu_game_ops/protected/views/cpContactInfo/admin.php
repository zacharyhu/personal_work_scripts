<?php
/* @var $this CpContactInfoController */
/* @var $model CpContactInfo */

$this->breadcrumbs=array(
	'CP联系人信息'=>array('index'),
	'管理',
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

<h1>管理联系人信息</h1>


<?php echo CHtml::link('高级搜索','#',array('class'=>'search-button')); ?>
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
        array('name'=>'cp_id','value'=>'$data->cpName->cp_name','filter'=>CpBaseInfo::model()->getCpNameList(),'htmlOptions'=>array(
		'width'=>'12%',),),
		array('name'=>'contact_name','value'=>'$data->contact_name','htmlOptions'=>array('width'=>'12%',),),
		array('name'=>'contact_phone','value'=>'$data->contact_phone','htmlOptions'=>array('width'=>'15%',),),
		//'contact_email',
        array('type'=>'raw','name'=>'contact_email','value'=>'CHtml::mailto($data->contact_email)','htmlOptions'=>array('width'=>'20%',),),
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
