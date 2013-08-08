<?php
$this->pageCaption='每日用户数据';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='每天用户行为相关数据';
$this->breadcrumbs=array(
	'每日用户数据'=>array('viewlist'),
	'展示',
);
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('gp-dc-monthly-user-report-grid', {
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
    'id'=>'gp-dc-monthly-user-report-grid',
	'cssFile'=>Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('ext.bootstrap-theme.widgets.assets')).'/gridview/styles.css',
// 	'filter'=>$model,
// 	'filter'=>'',
    'dataProvider'=>$model->search(),
	'itemsCssClass'=>'zebra-striped',
    'columns'=>array(
       	array('name'=>'l_month','htmlOptions'=>array('width'=>'10%',),),
		array('name'=>'lobby_id','value'=>'TvGpCfgGameLobbyInfo::model()->getLobbyName($data->lobby_id)','htmlOptions'=>array('width'=>'20%',),),
		array('name'=>'user_login_num','htmlOptions'=>array('width'=>'6%',),),
		array('name'=>'user_login_time','htmlOptions'=>array('width'=>'6%',),),
		array('name'=>'user_register','htmlOptions'=>array('width'=>'6%',),),
        array('name'=>'user_new','htmlOptions'=>array('width'=>'6%',),),
    	array('name'=>'beyond_5','htmlOptions'=>array('width'=>'6%',),),
    	array('name'=>'beyond_10','htmlOptions'=>array('width'=>'6%',),),
    	array('name'=>'beyond_15','htmlOptions'=>array('width'=>'6%',),),
    	array('name'=>'beyond_20','htmlOptions'=>array('width'=>'6%',),),
    	array('name'=>'beyond_25','htmlOptions'=>array('width'=>'6%',),),
    ),
)); 
?>

