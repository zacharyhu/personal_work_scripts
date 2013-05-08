<?php
/* @var $this CpContactInfoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cp Contact Infos',
);

$this->menu=array(
	array('label'=>'Create CpContactInfo', 'url'=>array('create')),
	array('label'=>'Manage CpContactInfo', 'url'=>array('admin')),
);
?>

<h1>Cp Contact Infos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
