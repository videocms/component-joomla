<?php
/*------------------------------------------------------------------------
#  - Video4you Component
# ------------------------------------------------------------------------
# author    Tomasz Hycnar, Marcin Kukliński
# copyright Copyright (C) 2015. All Rights Reserved
# license   GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
# website   www.timeto.pl
-------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import the list field type
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');

/**
 * Video4you Category Select Form Field class for the Video4you component
 */
class JFormFieldvideo4youcategoryzero extends JFormFieldList
{
	/**
	 * The video4youcategoryzero field type.
	 *
	 * @var		string
	 */
	protected $type = 'video4youcategoryzero';

	/**
	 * Method to get a list of options for a list input.
	 *
	 * @return	array		An array of JHtml options.
	 */
	protected function getOptions()
	{
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('#__categories.id as id, #__categories.title as title');
		$query->from('#__categories');
		$query->where('extension="com_video4you"');
		$db->setQuery((string)$query);
		$items = $db->loadObjectList();
		$options = array();
		if($items){
			foreach($items as $item){
				$options[] = JHtml::_('select.option', $item->id, ucwords($item->title));
			};
		};
		$options = array_merge(parent::getOptions(), $options);

		return $options;
	}
}
?>