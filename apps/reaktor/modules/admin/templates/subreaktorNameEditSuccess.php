<?php
// auto-generated by sfPropelCrud
// date: 2008/04/02 13:21:49
?>
<?php use_helper('Object') ?>

<?php echo form_tag('@subreaktornameupdate') ?>

<?php echo object_input_hidden_tag($edit_subreaktor, 'getId') ?>
<?php echo object_input_hidden_tag($edit_subreaktor, 'getName') ?>

<h2><?php echo __('Translating %item_name%', array('%item_name%' => $edit_subreaktor->getName())); ?></h2>
<table>
<tbody>
<tr>
  <th style="padding-right: 10px;"><?php echo __('subReaktor reference') ?>:</th>
  <td><?php echo $edit_subreaktor->getReference(); ?></td>
</tr>
<tr>
  <th><?php echo __('Translated name') ?></th>
  <td><?php echo object_input_tag($edit_subreaktor, 'getName', array (
  'disabled' => false,
)) ?></td>
</tr>
</tbody>
</table>
<hr />
<?php echo submit_tag(__('Save')) ?>
&nbsp;<?php echo link_to(__('Cancel'), '@subreaktornames') ?>
<?php echo '</form>'; ?>
