<?php
/*------------------------------------------------------------------------
# view.html.php - Video4you Component
# ------------------------------------------------------------------------
# author    Tomasz Hycnar, Marcin Kukliński
# copyright Copyright (C) 2015. All Rights Reserved
# license   GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
# website   www.timeto.pl
-------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport('joomla.application.component.view');

/**
 * HTML Video4you Category View class for the Video4you Component
 */
class Video4youViewvideo4youcategory extends JViewLegacy
{
	// Overwriting JViewLegacy display method
	function display($tpl = null)
	{
		// Assign data to the view
		$this->items = $this->get('Items');

		// Check for errors.
		if (count($errors = $this->get('Errors'))){
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		};

		// Display the view
		parent::display($tpl);
	}
}
?>