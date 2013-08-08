<?php
/* @var $this GpDcUserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Gp Dc Users',
);

$this->menu=array(
	array('label'=>'Create GpDcUser', 'url'=>array('create')),
	array('label'=>'Manage GpDcUser', 'url'=>array('admin')),
);
?>

<h1>Gp Dc Users</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
