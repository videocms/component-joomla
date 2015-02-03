<?php
/*------------------------------------------------------------------------
# edit.php - Video4you Component
# ------------------------------------------------------------------------
# author    Tomasz Hycnar, Marcin Kukliński
# copyright Copyright (C) 2015. All Rights Reserved
# license   GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
# website   www.timeto.pl
-------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');
JHtml::_('behavior.keepalive');
$params = $this->form->getFieldsets('params');
$componentParams = JComponentHelper::getParams('com_video4you');

?>
<style type="text/css">
	.full, .thumb { border: 1px solid #CCC; float: left; margin: 0 10px 0 0; padding: 10px; }
	.full h2, .thumb h2 { margin: 0; padding: 0; }
</style>
<ul class="nav nav-tabs hidden" >
	<li class="active"><a data-toggle="tab" href="#home">tab</a></li>
</ul>
<form action="<?php echo JRoute::_('index.php?option=com_video4you&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data">
	<div class="row-fluid">
		<div class="span12 form-horizontal">
			<fieldset class="adminform">
				<legend><?php echo JText::_( 'Details' ); ?></legend>
				<div class="adminformlist">
					<?php foreach($this->form->getFieldset('details') as $field){ ?>
						<div>
							<?php echo $field->label; echo $field->input;?>
							<?php if($field->fieldname == 'image' && $field->value){ ?>
							<label>Delete Image</label><input type="checkbox" name="image_delete" value="1" />
							<div class="clearfix"></div>
							<?php } ?>
						</div>
						<?php if($field->fieldname == 'image' && $field->value){ ?>
						<label>Image Preview</label>
						<div class="full">
							<h2>Full Image</h2>
							<img src="<?php echo JURI::root(false) . 'images/com_video4you/' . $field->value; ?>" />
						</div>
						<div class="thumb">
							<h2>Thumb Image</h2>
							<img src="<?php echo JURI::root(false) . 'images/com_video4you/thumb/' . $field->value; ?>" />
						</div>
						<?php } ?>
						<div class="clearfix"></div>
					<?php }; ?>
				</div>
			</fieldset>
		</div>
	</div>
	<div>
		<input type="hidden" name="task" value="video.edit" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
</form>