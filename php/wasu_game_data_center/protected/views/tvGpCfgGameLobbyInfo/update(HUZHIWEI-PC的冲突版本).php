<?php
$this->pageCaption='Update TvGpCfgGameLobbyInfo '.$model->l_lobby_id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Tv Gp Cfg Game Lobby Infos'=>array('index'),
	$model->l_lobby_id=>array('view','id'=>$model->l_lobby_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tv Gp Cfg Game Lobby Infos', 'url'=>array('index')),
	array('label'=>'Create TvGpCfgGameLobbyInfo', 'url'=>array('create')),
	array('label'=>'View TvGpCfgGameLobbyInfo', 'url'=>array('view', 'id'=>$model->l_lobby_id)),
	array('label'=>'Manage Tv Gp Cfg Game Lobby Infos', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>