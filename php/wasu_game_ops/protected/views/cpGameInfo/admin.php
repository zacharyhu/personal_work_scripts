<?php
/* @var $this CpGameInfoController */
/* @var $model CpGameInfo */

$this->breadcrumbs=array(
	'Cp Game Infos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List CpGameInfo', 'url'=>array('index')),
	array('label'=>'Create CpGameInfo', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#cp-game-info-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Cp Game Infos</h1>

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
	'id'=>'cp-game-info-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'cp_id',
		'game_name',
		'game_id',
		'game_cp_code',
		'game_action_id',
		/*
		'game_desc',
		'game_status',
		'game_lobby',
		'game_server_ip',
		'game_server_port',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
