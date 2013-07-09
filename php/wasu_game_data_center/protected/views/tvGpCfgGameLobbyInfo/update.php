<?php
/* @var $this TvGpCfgGameLobbyInfoController */
/* @var $model TvGpCfgGameLobbyInfo */

$this->breadcrumbs=array(
	'Tv Gp Cfg Game Lobby Infos'=>array('index'),
	$model->l_lobby_id=>array('view','id'=>$model->l_lobby_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TvGpCfgGameLobbyInfo', 'url'=>array('index')),
	array('label'=>'Create TvGpCfgGameLobbyInfo', 'url'=>array('create')),
	array('label'=>'View TvGpCfgGameLobbyInfo', 'url'=>array('view', 'id'=>$model->l_lobby_id)),
	array('label'=>'Manage TvGpCfgGameLobbyInfo', 'url'=>array('admin')),
);
?>

<h1>Update TvGpCfgGameLobbyInfo <?php echo $model->l_lobby_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>