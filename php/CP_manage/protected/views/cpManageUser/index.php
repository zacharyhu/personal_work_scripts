<?php
/* @var $this CpManageUserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cp Manage Users',
);

$this->menu=array(
	array('label'=>'Create CpManageUser', 'url'=>array('create')),
	array('label'=>'Manage CpManageUser', 'url'=>array('admin')),
);
?>

<h1>Cp Manage Users</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
