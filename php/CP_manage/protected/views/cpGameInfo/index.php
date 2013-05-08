<?php
/* @var $this CpGameInfoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cp Game Infos',
);

$this->menu=array(
	array('label'=>'Create CpGameInfo', 'url'=>array('create')),
	array('label'=>'Manage CpGameInfo', 'url'=>array('admin')),
);
?>

<h1>Cp Game Infos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
