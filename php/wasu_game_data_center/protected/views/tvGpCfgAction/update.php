<?php
/* @var $this TvGpCfgActionController */
/* @var $model TvGpCfgAction */

$this->breadcrumbs=array(
	'Tv Gp Cfg Actions'=>array('index'),
	$model->l_action_id=>array('view','id'=>$model->l_action_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TvGpCfgAction', 'url'=>array('index')),
	array('label'=>'Create TvGpCfgAction', 'url'=>array('create')),
	array('label'=>'View TvGpCfgAction', 'url'=>array('view', 'id'=>$model->l_action_id)),
	array('label'=>'Manage TvGpCfgAction', 'url'=>array('admin')),
);
?>

<h1>Update TvGpCfgAction <?php echo $model->l_action_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>