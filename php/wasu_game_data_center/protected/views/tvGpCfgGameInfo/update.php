<?php
/* @var $this TvGpCfgGameInfoController */
/* @var $model TvGpCfgGameInfo */

$this->breadcrumbs=array(
	'Tv Gp Cfg Game Infos'=>array('index'),
	$model->l_game_id=>array('view','id'=>$model->l_game_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TvGpCfgGameInfo', 'url'=>array('index')),
	array('label'=>'Create TvGpCfgGameInfo', 'url'=>array('create')),
	array('label'=>'View TvGpCfgGameInfo', 'url'=>array('view', 'id'=>$model->l_game_id)),
	array('label'=>'Manage TvGpCfgGameInfo', 'url'=>array('admin')),
);
?>

<h1>Update TvGpCfgGameInfo <?php echo $model->l_game_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>