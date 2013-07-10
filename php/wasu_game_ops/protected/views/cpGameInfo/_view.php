<?php
/* @var $this CpGameInfoController */
/* @var $data CpGameInfo */
?>

<div class="view">


	<b><?php echo CHtml::encode($data->getAttributeLabel('cp_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->cpName->cp_name),array('CpBaseInfo/view','id'=>$data->cp_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('game_name')); ?>:</b>
	<?php echo  CHtml::link(CHtml::encode($data->game_name),array('view','id'=>$data->id)); ?>
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


	<b><?php echo CHtml::encode($data->getAttributeLabel('game_status')); ?>:</b>
	<?php echo CHtml::encode(GpGameStatusCfg::model()->getStatusName($data->game_status)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('game_lobby')); ?>:</b>
	<?php echo CHtml::encode(GpLobbyCfg::model()->getLobbyName($data->game_lobby)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('game_server_ip')); ?>:</b>
	<?php echo CHtml::encode($data->game_server_ip); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('game_server_port')); ?>:</b>
	<?php echo CHtml::encode($data->game_server_port); ?>
	<br />


</div>