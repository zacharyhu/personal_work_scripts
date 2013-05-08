<?php
/* @var $this CpGameInfoController */
/* @var $data CpGameInfo */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cp_id')); ?>:</b>
	<?php echo CHtml::encode($data->cp_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('game_name')); ?>:</b>
	<?php echo CHtml::encode($data->game_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('game_id')); ?>:</b>
	<?php echo CHtml::encode($data->game_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('game_cp_code')); ?>:</b>
	<?php echo CHtml::encode($data->game_cp_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('game_action_id')); ?>:</b>
	<?php echo CHtml::encode($data->game_action_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('game_desc')); ?>:</b>
	<?php echo CHtml::encode($data->game_desc); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('game_status')); ?>:</b>
	<?php echo CHtml::encode($data->game_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('game_lobby')); ?>:</b>
	<?php echo CHtml::encode($data->game_lobby); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('game_server_ip')); ?>:</b>
	<?php echo CHtml::encode($data->game_server_ip); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('game_server_port')); ?>:</b>
	<?php echo CHtml::encode($data->game_server_port); ?>
	<br />

	*/ ?>

</div>