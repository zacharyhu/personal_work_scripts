<?php
/* @var $this TvGpCfgGameInfoController */
/* @var $model TvGpCfgGameInfo */

$this->breadcrumbs=array(
	'Tv Gp Cfg Game Infos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TvGpCfgGameInfo', 'url'=>array('index')),
	array('label'=>'Manage TvGpCfgGameInfo', 'url'=>array('admin')),
);
?>

<h1>Create TvGpCfgGameInfo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>