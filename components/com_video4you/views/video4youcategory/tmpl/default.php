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
<h1 class="page-header"><?php echo $this->document->title; ?></h1>
<div id="category-video4you-content">
<?php foreach($this->items as $item){ ?>
	<p><strong>Title</strong>: <?php echo $item->title; ?></p>
	<p><strong>Text</strong>: <?php echo $item->text; ?></p>
	<p><strong>Category</strong>: <?php echo $item->category; ?></p>
	<?php if($item->image){ ?>
		<p><strong>Image</strong>: <img src="images/com_video4you/<?php echo $item->image; ?>" /></p>
	<?php } ?>
	<p><strong>Video_480p</strong>: <?php echo $item->video480p; ?></p>
	<p><strong>Video_720p</strong>: <?php echo $item->video720p; ?></p>
	<p><strong>Video_1080p</strong>: <?php echo $item->video1080p; ?></p>
<?php } ?>
</div>