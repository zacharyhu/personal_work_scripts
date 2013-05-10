<?php
/* @var $this GpLobbyCfgController */
/* @var $data GpLobbyCfg */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('game_lobby')); ?>:</b>
	<?php echo CHtml::encode($data->game_lobby); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lobby_name')); ?>:</b>
	<?php echo CHtml::encode($data->lobby_name); ?>
	<br />


</div>