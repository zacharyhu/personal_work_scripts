<?php
/* @var $this TvGpCfgActionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tv Gp Cfg Actions',
);

$this->menu=array(
	array('label'=>'Create TvGpCfgAction', 'url'=>array('create')),
	array('label'=>'Manage TvGpCfgAction', 'url'=>array('admin')),
);
?>

<h1>Tv Gp Cfg Actions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
