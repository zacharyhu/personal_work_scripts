<?php
$this->pageCaption='View TvGpCfgAction #'.$model->l_action_id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Tv Gp Cfg Actions'=>array('index'),
	$model->l_action_id,
);

$this->menu=array(
	array('label'=>'List Tv Gp Cfg Actions', 'url'=>array('index')),
	array('label'=>'Create TvGpCfgAction', 'url'=>array('create')),
	array('label'=>'Update TvGpCfgAction', 'url'=>array('update', 'id'=>$model->l_action_id)),
	array('label'=>'Delete TvGpCfgAction', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->l_action_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tv Gp Cfg Actions', 'url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'baseScriptUrl'=>false,
	'cssFile'=>false,
	'attributes'=>array(
		'l_action_id',
		'l_father_id',
		'vc_business_name',
		'vc_father_name',
		'vc_business_desc',
	),
)); ?>
