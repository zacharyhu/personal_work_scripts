<?php
/* @var $this CpBaseInfoController */
/* @var $data CpBaseInfo */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('cp_name')); ?>:</b>
	<?php echo CHtml::encode($data->cp_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cpcode')); ?>:</b>
	<?php echo CHtml::encode($data->cpcode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_time')); ?>:</b>
	<?php echo CHtml::encode($data->create_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_time')); ?>:</b>
	<?php echo CHtml::encode($data->update_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cp_desc')); ?>:</b>
	<?php echo CHtml::encode($data->cp_desc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cp_status')); ?>:</b>
	<?php echo CHtml::encode(CpBaseInfo::model()->getCPStatus($data->cp_status));?>
	<br />

	<!--  b><?php //echo CHtml::encode($data->getAttributeLabel('cp_id')); ?>:</b>-->
	<b><?php echo CHtml::encode("可操作"); ?>:</b>
	<?php echo CHtml::link(CHtml::encode("更多内容.. "), array('view', 'id'=>$data->cp_id));echo " | ";$url_link="更新该CP信息  cpid:".$data->cp_id;echo CHtml::link(CHtml::encode($url_link), array('update', 'id'=>$data->cp_id)); ?>
	<br />

</div>