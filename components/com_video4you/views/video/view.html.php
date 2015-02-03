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
 * HTML Video View class for the Video4you Component
 */
class Video4youViewvideo extends JViewLegacy
{
	// Overwriting JViewLegacy display method
	function display($tpl = null)
	{
		// Assign data to the view
		$this->item = $this->get('Item');
		$db = JFactory::getDBO();
		$this->item->category = $db->setQuery('SELECT #__categories.title FROM #__categories WHERE #__categories.id = "'.$this->item->category.'"')->loadResult();

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