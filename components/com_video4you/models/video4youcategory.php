<?php
/*------------------------------------------------------------------------
# video4youcategory.php - Video4you Component
# ------------------------------------------------------------------------
# author    Tomasz Hycnar, Marcin Kukliński
# copyright Copyright (C) 2015. All Rights Reserved
# license   GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
# website   www.timeto.pl
-------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');
// import the Joomla modellist library
jimport('joomla.application.component.modellist');

/**
 * Video4you Cateory Model for Video4you Component
 */
class Video4youModelvideo4youcategory extends JModelList
{
	/**
	 * Method to build an SQL query to load the list data.
	 *
	 * @return      string  An SQL query
	 */
	protected function getListQuery()
	{
		$pk = JRequest::getInt('id');

		// Create a new query object.
		$db = JFactory::getDBO();
		$query	= $db->getQuery(true);
		// Select some fields
		$query->select('*');
		// From the products_product table
		$query->from('#__video4you_video');
		$query->where('category="' . $pk . '"');

		return $query;
	}
}
?>