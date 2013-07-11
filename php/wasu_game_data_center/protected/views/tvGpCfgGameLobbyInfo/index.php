<?php
$this->pageCaption='Tv Gp Cfg Game Lobby Infos';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='List of all tv gp cfg game lobby infos';
$this->breadcrumbs=array(
	'Tv Gp Cfg Game Lobby Infos',
);

$this->menu=array(
	array('label'=>'Create TvGpCfgGameLobbyInfo', 'url'=>array('create')),
	array('label'=>'Manage TvGpCfgGameLobbyInfo', 'url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
