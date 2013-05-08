<?php
/* @var $this CpResourceInfoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cp Resource Infos',
);

$this->menu=array(
	array('label'=>'Create CpResourceInfo', 'url'=>array('create')),
	array('label'=>'Manage CpResourceInfo', 'url'=>array('admin')),
);
?>

<h1>Cp Resource Infos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
