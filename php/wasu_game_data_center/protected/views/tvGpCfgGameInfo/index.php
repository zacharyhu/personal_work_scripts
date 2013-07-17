<?php
/* @var $this TvGpCfgGameInfoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tv Gp Cfg Game Infos',
);

$this->menu=array(
	array('label'=>'Create TvGpCfgGameInfo', 'url'=>array('create')),
	array('label'=>'Manage TvGpCfgGameInfo', 'url'=>array('admin')),
);
?>

<h1>Tv Gp Cfg Game Infos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
