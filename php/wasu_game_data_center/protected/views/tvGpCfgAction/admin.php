<?php
/* @var $this TvGpCfgActionController */
/* @var $model TvGpCfgAction */

$this->breadcrumbs=array(
	'Tv Gp Cfg Actions'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List TvGpCfgAction', 'url'=>array('index')),
	array('label'=>'Create TvGpCfgAction', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tv-gp-cfg-action-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Tv Gp Cfg Actions</h1>

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
	'id'=>'tv-gp-cfg-action-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'l_action_id',
		'l_father_id',
		'vc_business_name',
		'vc_father_name',
		'vc_business_desc',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
