<?php
/* @var $this CpTvBoxInfoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cp Tv Box Infos',
);

$this->menu=array(
	array('label'=>'Create CpTvBoxInfo', 'url'=>array('create')),
	array('label'=>'Manage CpTvBoxInfo', 'url'=>array('admin')),
);
?>

<h1>Cp Tv Box Infos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
