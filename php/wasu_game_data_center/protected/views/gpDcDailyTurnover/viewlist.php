<?php
$this->pageCaption='每日收入汇总数据';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='查询每天汇总的收入，可按照cp、大厅、游戏进行筛选，根据各列值进行排序';
$this->breadcrumbs=array(
	'每日收入数据'=>array('index'),
	'展示',
);

// $this->menu=array(
// 	array('label'=>'List Gp Dc Daily Turnovers', 'url'=>array('index')),
// 	array('label'=>'Create GpDcDailyTurnover', 'url'=>array('create')),
// );


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('gp-dc-daily-turnover-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<p>可以使用>、< 、= 、等比较符到每列的筛选框进行结果筛选</p>

<?php echo CHtml::link('高级搜索','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->


 <?php 
$this->widget('bootstrap.widgets.TbGridView', array(
    'type'=>'striped bordered condensed',
    'id'=>'gp-dc-daily-turnover-grid',
	'cssFile'=>Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('ext.bootstrap-theme.widgets.assets')).'/gridview/styles.css',
	'filter'=>$model,
    'dataProvider'=>$model->search(),
		'itemsCssClass'=>'zebra-striped',
//     'template'=>"{items}",
    'columns'=>array(
       	array('name'=>'date','htmlOptions'=>array('width'=>'13%',),),
		array('name'=>'lobby_id','value'=>'TvGpCfgGameLobbyInfo::model()->getLobbyName($data->lobby_id)','filter'=>TvGpCfgGameLobbyInfo::model()->getLobbyList(),'htmlOptions'=>array('width'=>'15%',),),
		array('name'=>'cp_code','value'=>'TvGpCfgCpInfo::model()->getCpName($data->cp_code)','filter'=>TvGpCfgCpInfo::model()->getCpList(),'htmlOptions'=>array('width'=>'15%',),),
// 		'action_id',
//         array('name'=>'action_id','value'=>'TvGpCfgAction::model()->getActionName($data->action_id)','filter'=>TvGpCfgAction::model()->getActionList()),
        array('name'=>'action_id','value'=>'TvGpCfgAction::model()->getActionName($data->action_id)','filter'=>TvGpCfgAction::model()->getActionList()),
		array('name'=>'sum','htmlOptions'=>array('width'=>'8%',),),
		array('name'=>'user_no','htmlOptions'=>array('width'=>'10%',),),
		array('name'=>'user_time','htmlOptions'=>array('width'=>'10%',),),
		array('name'=>'arpu','htmlOptions'=>array('width'=>'6%',),),
//         array(
//             'class'=>'bootstrap.widgets.TbButtonColumn',
//             'htmlOptions'=>array('style'=>'width: 50px'),
//         ),
    ),
)); 
?>

 <?php 
//  $this->widget('zii.widgets.grid.CGridView', array(
// 	'id'=>'gp-dc-daily-turnover-grid',
// 	'dataProvider'=>$model->search(),
// 	'filter'=>$model,
// 	'cssFile'=>Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('ext.bootstrap-theme.widgets.assets')).'/gridview/styles.css',
// 	'itemsCssClass'=>'zebra-striped',
// 	'columns'=>array(
// // 		'id',
// 		'date',
// 		'lobby_id',
// 		'cp_code',
// 		'action_id',
// 		'sum',
// 		'user_no',
// 		'user_time',
// 		'arpu',
// 	),
// )); 
?>

