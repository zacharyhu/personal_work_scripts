<?php
/* @var $this TvGpLogsPointsController */
/* @var $model TvGpLogsPoints */

$this->breadcrumbs=array(
	'Tv Gp Logs Points'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List TvGpLogsPoints', 'url'=>array('index')),
	array('label'=>'Create TvGpLogsPoints', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tv-gp-logs-points-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Tv Gp Logs Points</h1>

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
	'id'=>'tv-gp-logs-points-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'l_index',
		'l_user_id',
		'l_lobby_id',
		'l_source_id',
		'l_game_type',
		'l_game_id',
		/*
		'l_before_coin',
		'l_chg_coin',
		'l_coin',
		'l_date',
		'l_time',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
