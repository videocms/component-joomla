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
                <h2><a href="<?php echo $item->linkURL; ?>"><?php echo $item->title; ?></a></h2>
		<p><?php echo $item->text; ?></p>
		<p><strong>Kategoria</strong>: <?php echo $item->category; ?></p>
		<?php if($item->image){ ?>
			<p><strong>Image</strong>: <img src="images/com_video4you/thumb/<?php echo $item->image; ?>" /></p>
		<?php } ?>
		<p><strong>Video_480p</strong>: <?php echo $item->video480p; ?></p>
		<p><strong>Video_720p</strong>: <?php echo $item->video720p; ?></p>
		<p><strong>Video_1080p</strong>: <?php echo $item->video1080p; ?></p>
		<p><strong>Link URL</strong>: <a href="<?php echo $item->linkURL; ?>">Go to page</a> - <?php echo $item->linkURL; ?></p>
		<br /><br />
	<?php }; ?>
</div>
