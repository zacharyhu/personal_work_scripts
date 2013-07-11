<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('l_cp_code')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->l_cp_code), array('view', 'id'=>$data->l_cp_code)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vc_cp_name')); ?>:</b>
	<?php echo CHtml::encode($data->vc_cp_name); ?>
	<br />


</div>