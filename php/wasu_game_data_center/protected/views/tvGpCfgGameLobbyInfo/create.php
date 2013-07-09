<?php
/* @var $this TvGpCfgGameLobbyInfoController */
/* @var $model TvGpCfgGameLobbyInfo */

$this->breadcrumbs=array(
	'Tv Gp Cfg Game Lobby Infos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TvGpCfgGameLobbyInfo', 'url'=>array('index')),
	array('label'=>'Manage TvGpCfgGameLobbyInfo', 'url'=>array('admin')),
);
?>

<h1>Create TvGpCfgGameLobbyInfo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>