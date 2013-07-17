<?php
/* @var $this TvGpCfgGameInfoController */
/* @var $model TvGpCfgGameInfo */

$this->breadcrumbs=array(
	'Tv Gp Cfg Game Infos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List TvGpCfgGameInfo', 'url'=>array('index')),
	array('label'=>'Create TvGpCfgGameInfo', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tv-gp-cfg-game-info-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Tv Gp Cfg Game Infos</h1>

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
	'id'=>'tv-gp-cfg-game-info-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'l_game_id',
		'l_status',
		'l_func_type',
		'l_game_type',
		'vc_game_name',
		'vc_game_desc',
		/*
		'vc_game_image',
		'l_date',
		'l_time',
		'l_rank_value',
		'vc_search_key',
		'l_cp_code',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
