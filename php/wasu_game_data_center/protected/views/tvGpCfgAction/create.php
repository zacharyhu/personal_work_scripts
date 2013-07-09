<?php
/* @var $this TvGpCfgActionController */
/* @var $model TvGpCfgAction */

$this->breadcrumbs=array(
	'Tv Gp Cfg Actions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TvGpCfgAction', 'url'=>array('index')),
	array('label'=>'Manage TvGpCfgAction', 'url'=>array('admin')),
);
?>

<h1>Create TvGpCfgAction</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>