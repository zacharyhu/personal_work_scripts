<?php
/* @var $this CpOperationLogsController */
/* @var $data CpOperationLogs */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('arch_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->arch_id), array('view', 'id'=>$data->arch_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('arch_title')); ?>:</b>
	<?php echo CHtml::encode($data->arch_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cp_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->cpName->cp_name),array('CpBaseInfo/view','id'=>$data->cp_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('arch_content')); ?>:</b>
	<?php echo CHtml::encode($data->arch_content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_time')); ?>:</b>
	<?php echo CHtml::encode($data->update_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('author')); ?>:</b>
	<?php echo CHtml::encode($data->author); ?>
	<br />


</div>