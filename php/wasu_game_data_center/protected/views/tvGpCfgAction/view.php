<?php
/* @var $this TvGpCfgActionController */
/* @var $model TvGpCfgAction */

$this->breadcrumbs=array(
	'Tv Gp Cfg Actions'=>array('index'),
	$model->l_action_id,
);

$this->menu=array(
	array('label'=>'List TvGpCfgAction', 'url'=>array('index')),
	array('label'=>'Create TvGpCfgAction', 'url'=>array('create')),
	array('label'=>'Update TvGpCfgAction', 'url'=>array('update', 'id'=>$model->l_action_id)),
	array('label'=>'Delete TvGpCfgAction', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->l_action_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TvGpCfgAction', 'url'=>array('admin')),
);
?>

<h1>View TvGpCfgAction #<?php echo $model->l_action_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'l_action_id',
		'l_father_id',
		'vc_business_name',
		'vc_father_name',
		'vc_business_desc',
	),
)); ?>
