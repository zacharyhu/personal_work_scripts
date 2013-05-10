<?php
/* @var $this CpContactInfoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'CP联系人信息',
);

$this->menu=array(
	array('label'=>'Create CpContactInfo', 'url'=>array('create')),
	array('label'=>'Manage CpContactInfo', 'url'=>array('admin')),
);
?>

<h1>CP联系人信息</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
