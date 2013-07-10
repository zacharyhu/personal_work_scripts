<?php
/* @var $this CpGameInfoController */
/* @var $model CpGameInfo */

$this->breadcrumbs=array(
	'CP游戏列表'=>array('index'),
	'管理',
);

$this->menu=array(
	array('label'=>'列表游戏信息', 'url'=>array('index')),
	array('label'=>'新建游戏信息', 'url'=>array('create')),
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

<h1>游戏信息列表</h1>
<p>
点击游戏链接查看更多游戏相关信息</br>
</p>
<p>
</p>

<?php echo CHtml::link('点击多项搜索','#',array('class'=>'search-button')); ?>
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
		//'id',
		//'cp_id',
        array('name'=>'cp_id','type'=>'raw','value'=>'CHtml::link(CHtml::encode($data->cpName->cp_name),array("CpBaseInfo/view","id"=>$data->cp_id))','filter'=>CpBaseInfo::model()->getCpNameList()),
		array('name'=>'game_name','type'=>'raw','value'=>'CHtml::link(CHtml::encode($data->game_name),array("CpGameInfo/view","id"=>$data->id))'),
		//'game_id',
		//'game_cp_code',
		//'game_action_id',
// 		'//game_desc',
// 		'game_status',
        array('name'=>'game_status','value'=>'GpGameStatusCfg::model()->getStatusName($data->game_status)','filter'=>GpGameStatusCfg::model()->getStatusList()),
//  		array('name'=>'game_lobby','value'=>'GpLobbyCfg::model()->getLobbyName($data->game_lobby)','filter'=>GpLobbyCfg::model()->getLobbyList()),
		//'game_server_ip',
		//'game_server_port',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
