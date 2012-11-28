<?php echo $this->Form->create('Country', array('inputDefaults' => array('autocomplete' => 'off'))); ?>
<table>
	<tr>
		<td><?php echo $this->Form->input('cid', array('id' => 'cid','type' => 'hidden')); ?></td>
		<td><?php echo $this->Form->input('country',array('id'=>'negara', 'Label' => 'Country', 'type' => 'text')); ?></td>
		<td><?php echo $this->Form->input('city',array('id'=>'city', 'Label' => 'City','type' => 'text')); ?></td>
	</tr>
</table>
<?php echo $this->Form->end(); ?>                    
