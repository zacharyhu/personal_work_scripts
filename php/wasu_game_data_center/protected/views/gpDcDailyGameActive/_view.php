<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('l_date')); ?>:</b>
	<?php echo CHtml::encode($data->l_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lobby_id')); ?>:</b>
	<?php echo CHtml::encode($data->lobby_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cp_code')); ?>:</b>
	<?php echo CHtml::encode($data->cp_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('game_id')); ?>:</b>
	<?php echo CHtml::encode($data->game_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_num')); ?>:</b>
	<?php echo CHtml::encode($data->user_num); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_time')); ?>:</b>
	<?php echo CHtml::encode($data->user_time); ?>
	<br />


</div>