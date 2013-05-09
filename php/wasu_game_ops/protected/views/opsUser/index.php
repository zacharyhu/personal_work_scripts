<?php
/* @var $this OpsUserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ops Users',
);

$this->menu=array(
	array('label'=>'Create OpsUser', 'url'=>array('create')),
	array('label'=>'Manage OpsUser', 'url'=>array('admin')),
);
?>

<h1>Ops Users</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
