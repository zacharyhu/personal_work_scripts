<?php
$this->pageCaption='Create TvGpCfgGameLobbyInfo';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Define a new tvgpcfggamelobbyinfo';
$this->breadcrumbs=array(
	'Tv Gp Cfg Game Lobby Infos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Tv Gp Cfg Game Lobby Infos', 'url'=>array('index')),
	array('label'=>'Manage Tv Gp Cfg Game Lobby Infos', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>