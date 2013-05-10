<?php
/* @var $this GpGameStatusCfgController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Gp Game Status Cfgs',
);

$this->menu=array(
	array('label'=>'Create GpGameStatusCfg', 'url'=>array('create')),
	array('label'=>'Manage GpGameStatusCfg', 'url'=>array('admin')),
);
?>

<h1>Gp Game Status Cfgs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
