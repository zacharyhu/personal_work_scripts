<?php
$this->pageCaption='View TvGpCfgCpInfo #'.$model->l_cp_code;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Tv Gp Cfg Cp Infos'=>array('index'),
	$model->l_cp_code,
);

$this->menu=array(
	array('label'=>'List Tv Gp Cfg Cp Infos', 'url'=>array('index')),
	array('label'=>'Create TvGpCfgCpInfo', 'url'=>array('create')),
	array('label'=>'Update TvGpCfgCpInfo', 'url'=>array('update', 'id'=>$model->l_cp_code)),
	array('label'=>'Delete TvGpCfgCpInfo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->l_cp_code),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tv Gp Cfg Cp Infos', 'url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'baseScriptUrl'=>false,
	'cssFile'=>false,
	'attributes'=>array(
		'l_cp_code',
		'vc_cp_name',
	),
)); ?>
