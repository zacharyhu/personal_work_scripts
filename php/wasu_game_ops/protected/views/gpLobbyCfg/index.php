<?php
/* @var $this GpLobbyCfgController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Gp Lobby Cfgs',
);

$this->menu=array(
	array('label'=>'Create GpLobbyCfg', 'url'=>array('create')),
	array('label'=>'Manage GpLobbyCfg', 'url'=>array('admin')),
);
?>

<h1>Gp Lobby Cfgs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
