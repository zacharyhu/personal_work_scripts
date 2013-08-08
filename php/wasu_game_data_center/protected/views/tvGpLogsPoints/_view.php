<?php
/* @var $this TvGpLogsPointsController */
/* @var $data TvGpLogsPoints */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('l_index')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->l_index), array('view', 'id'=>$data->l_index)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('l_user_id')); ?>:</b>
	<?php echo CHtml::encode($data->l_user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('l_lobby_id')); ?>:</b>
	<?php echo CHtml::encode($data->l_lobby_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('l_source_id')); ?>:</b>
	<?php echo CHtml::encode($data->l_source_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('l_game_type')); ?>:</b>
	<?php echo CHtml::encode($data->l_game_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('l_game_id')); ?>:</b>
	<?php echo CHtml::encode($data->l_game_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('l_before_coin')); ?>:</b>
	<?php echo CHtml::encode($data->l_before_coin); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('l_chg_coin')); ?>:</b>
	<?php echo CHtml::encode($data->l_chg_coin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('l_coin')); ?>:</b>
	<?php echo CHtml::encode($data->l_coin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('l_date')); ?>:</b>
	<?php echo CHtml::encode($data->l_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('l_time')); ?>:</b>
	<?php echo CHtml::encode($data->l_time); ?>
	<br />

	*/ ?>

</div>