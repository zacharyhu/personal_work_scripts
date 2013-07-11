<?php
$this->pageCaption='Manage Gp Dc Daily Game Actives';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Administer all gp dc daily game actives';
$this->breadcrumbs=array(
	'Gp Dc Daily Game Actives'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Gp Dc Daily Game Actives', 'url'=>array('index')),
	array('label'=>'Create GpDcDailyGameActive', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('gp-dc-daily-game-active-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

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
	'id'=>'gp-dc-daily-game-active-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'cssFile'=>Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('ext.bootstrap-theme.widgets.assets')).'/gridview/styles.css',
	'itemsCssClass'=>'zebra-striped',
	'columns'=>array(
		'id',
		'l_date',
		'lobby_id',
		'cp_code',
		'game_id',
		'user_num',
		/*
		'user_time',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
