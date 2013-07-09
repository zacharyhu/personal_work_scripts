<?php
/* @var $this TvGpCfgGameLobbyInfoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tv Gp Cfg Game Lobby Infos',
);

$this->menu=array(
	array('label'=>'Create TvGpCfgGameLobbyInfo', 'url'=>array('create')),
	array('label'=>'Manage TvGpCfgGameLobbyInfo', 'url'=>array('admin')),
);
?>

<h1>Tv Gp Cfg Game Lobby Infos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
