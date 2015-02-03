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

?>
<div id="video4you-content">
	<h2><?php echo $this->item->title; ?></h2>
	<p><?php echo $this->item->text; ?></p>
	<p><strong>Kategoria</strong>: <?php echo $this->item->category; ?></p>
	<?php if($this->item->image){ ?>
		<p><strong>Image</strong>: <img src="images/com_video4you/<?php echo $this->item->image; ?>" /></p>
	<?php } ?>
	<p><strong>Video_480p</strong>: <?php echo $this->item->video480p; ?></p>
	<p><strong>Video_720p</strong>: <?php echo $this->item->video720p; ?></p>
	<p><strong>Video_1080p</strong>: <?php echo $this->item->video1080p; ?></p>
</div>