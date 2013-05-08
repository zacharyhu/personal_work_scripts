<?php
/* @var $this CpBaseInfoController */
/* @var $model CpBaseInfo */

$this->breadcrumbs=array(
	'游戏CP基本信息'=>array('index'),
	'管理',
);

$this->menu=array(
	array('label'=>'列表所有CP信息', 'url'=>array('index')),
	array('label'=>'新建Cp基本信息', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#cp-base-info-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>管理CP基础信息</h1>

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
	'id'=>'cp-base-info-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
// 		'cp_id',
		'cp_name',
		'cpcode',
		'create_time',
		'update_time',
		'cp_desc',		
		//'cp_status',
        //下拉CPstatus选项,
        array('name'=>'cp_status','value'=>'CpBaseInfo::model()->getCPStatus($data->cp_status)','filter'=>CpBaseInfo::model()->getCPStatusList()),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
