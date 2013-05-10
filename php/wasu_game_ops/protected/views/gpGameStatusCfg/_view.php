<?php
/* @var $this GpGameStatusCfgController */
/* @var $data GpGameStatusCfg */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ip')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ip), array('view', 'id'=>$data->ip)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('game_status')); ?>:</b>
	<?php echo CHtml::encode($data->game_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_name')); ?>:</b>
	<?php echo CHtml::encode($data->status_name); ?>
	<br />


</div>