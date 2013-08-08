<?php
$this->pageCaption='月度收入数据';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='月度收入数据';
$this->breadcrumbs=array(
	'月收入数据汇总'=>array('viewlist'),
	'展示',
);
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('gp-dc-monthly-turnover-grid', {
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
    'id'=>'gp-dc-monthly-turnover-grid',
	'cssFile'=>Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('ext.bootstrap-theme.widgets.assets')).'/gridview/styles.css',
// 	'filter'=>$model,
    'dataProvider'=>$model->search(),
	'itemsCssClass'=>'zebra-striped',
    'columns'=>array(
       	array('name'=>'l_month','filter'=>false ,'htmlOptions'=>array('width'=>'10%',),),
		array('name'=>'lobby_id','value'=>'TvGpCfgGameLobbyInfo::model()->getLobbyName($data->lobby_id)','filter'=>false,'htmlOptions'=>array('width'=>'17%',),),
		array('name'=>'cp_code','value'=>'TvGpCfgCpInfo::model()->getCpName($data->cp_code)','filter'=>false ,'htmlOptions'=>array('width'=>'16%',),),
		array('name'=>'action_id','value'=>'TvGpCfgAction::model()->getActionName($data->action_id)','filter'=>false ,'htmlOptions'=>array('width'=>'17%',),),
		array('name'=>'sum','filter'=>false ,'htmlOptions'=>array('width'=>'10%',),),
		array('name'=>'user_no','filter'=>false ,'htmlOptions'=>array('width'=>'10%',),),
		array('name'=>'user_time','filter'=>false ,'htmlOptions'=>array('width'=>'10%',),),
    	array('name'=>'arpu','filter'=>false ,'htmlOptions'=>array('width'=>'10%',),),
    ),
)); 
?>

