<?php
/*------------------------------------------------------------------------
# default.php - Video4you Component
# ------------------------------------------------------------------------
# author    Tomasz Hycnar, Marcin Kukliński
# copyright Copyright (C) 2015. All Rights Reserved
# license   GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
# website   www.timeto.pl
-------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// Connect to database
$db = JFactory::getDBO();
jimport('joomla.filter.output');
?>
<div id="video4you-video4you">
	<?php foreach($this->items as $item){ ?>
		<?php
		$item->category = $db->setQuery('SELECT #__categories.title FROM #__categories WHERE #__categories.id = "'.$item->category.'"')->loadResult();
		if(empty($item->alias)){
			$item->alias = $item->title;
		};
		$item->alias = JFilterOutput::stringURLSafe($item->alias);
		$item->linkURL = JRoute::_('index.php?option=com_video4you&view=video&id='.$item->id.':'.$item->alias);
		?>
                <a href="<?php echo $item->linkURL; ?>">
                <h2><?php echo $item->title; ?></h2>
		<?php if($item->image){ ?>
		<img src="images/com_video4you/thumb/<?php echo $item->image; ?>" /></p>
		<?php } ?>
                </a>
                <p><strong>Kategoria</strong>: <?php echo $item->category; ?></p>
	
	<?php }; ?>
</div>
