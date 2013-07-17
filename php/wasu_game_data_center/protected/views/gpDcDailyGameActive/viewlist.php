<?php
$this->pageCaption='每日游戏活跃数据';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='查询每天汇总的游戏活跃数据，可按照cp、大厅、游戏进行筛选，根据各列值进行排序';
$this->breadcrumbs=array(
	'每日游戏活跃数据'=>array('viewlist'),
	'展示',
);
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
<div class="search-form" >
<?php $this->renderPartial('_search_date',array(
	'model'=>$model,
)); 
?>
</div><!-- search-form -->

 <?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'type'=>'striped bordered condensed',
    'id'=>'gp-dc-daily-turnover-grid',
	'cssFile'=>Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('ext.bootstrap-theme.widgets.assets')).'/gridview/styles.css',
	'filter'=>$model,
    'dataProvider'=>$model->search(),
	'itemsCssClass'=>'zebra-striped',
    'columns'=>array(
       	array('name'=>'l_date','filter'=>false ,'htmlOptions'=>array('width'=>'13%',),),
//     	array('name'=>'date','class'=>'SYDateColumn','htmlOptions'=>array('width'=>'13%',),),
		array('name'=>'lobby_id','value'=>'TvGpCfgGameLobbyInfo::model()->getLobbyName($data->lobby_id)','filter'=>false ,'htmlOptions'=>array('width'=>'15%',),),
		array('name'=>'cp_code','value'=>'TvGpCfgCpInfo::model()->getCpName($data->cp_code)','filter'=>false ,'htmlOptions'=>array('width'=>'15%',),),
    	array('name'=>'game_id','value'=>'TvGpCfgGameInfo::model()->getGameName($data->game_id)','filter'=>false ,'htmlOptions'=>array('width'=>'15%',),),    		
		array('name'=>'user_num','filter'=>false ,'htmlOptions'=>array('width'=>'10%',),),
		array('name'=>'user_time','filter'=>false ,'htmlOptions'=>array('width'=>'10%',),),
    ),
)); 
?>

