<?php
/*------------------------------------------------------------------------
# video.php - Video4you Component
# ------------------------------------------------------------------------
# author    Tomasz Hycnar, Marcin Kukliński
# copyright Copyright (C) 2015. All Rights Reserved
# license   GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
# website   www.timeto.pl
-------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla controllerform library
jimport('joomla.application.component.controllerform');

/**
 * Video4you Controller Video
 */
class Video4youControllervideo extends JControllerForm
{
	public function __construct($config = array())
	{
		$this->view_list = 'video4you'; // safeguard for setting the return view listing to the main view.
		parent::__construct($config);
	}

	/**
	 * Function that allows child controller access to model data
	 * after the data has been saved.
	 * 
	 * @param   JModel  &$model     The data model object.
	 * @param   array   $validData  The validated data.
	 * 
	 * @return  void
	 * 
	 * @since   11.1
	 */
	protected function postSaveHook(JModelLegacy &$model, $validData = array())
	{
		// Get a handle to the Joomla! application object
		$application = JFactory::getApplication();

		$date = date('Y-m-d H:i:s');
		if($validData['date_created'] == '0000-00-00 00:00:00'){
			$data['date_created'] = $date;
		}
		$data['date_modified'] = $date;

		$user = JFactory::getUser();
		if($validData['user_created'] == 0){
			$data['user_created'] = $user->id;
		}
		$data['user_modified'] = $user->id;

		// Delete Image Checked
		if(array_key_exists('image_delete', $_POST)){
			$data['image'] = ''; // set image to nothing in database
			// Delete Image Entirely Check
			$db = JFactory::getDBO();
			$query = $db->getQuery(true)->select('image')->from('#__video4you_video')->where('id="' . $validData['id'] . '"');
			$db->setQuery((string)$query);
			$image = $db->loadResult();
			if($image){
				$query = $db->getQuery(true)->select('CASE WHEN COUNT(*) > 0 THEN 1 ELSE 0 END')->from('#__video4you_video')->where('image="' . $image . '" AND id!="' . $validData['id'] . '"');
				$db->setQuery((string)$query);
				$using = $db->loadResult();
				if($using == 0){ // free to delete
					// Include file system helpers
					jimport('joomla.filesystem.file');
					jimport('joomla.filesystem.folder');
					$full_image = JPATH_SITE . DS . 'images' . DS . 'com_video4you' . DS . $image;
					$thum_image = JPATH_SITE . DS . 'images' . DS . 'com_video4you' . DS . 'thumb' . DS . $image;
					JFile::delete($thum_image);
					if(JFile::delete($full_image)){
						// Add a message to the message queue
						$application->enqueueMessage('Image has been deleted!', 'notice');
					} else {
						// Add a message to the message queue
						$application->enqueueMessage('Image could not be deleted, but was removed from this item.', 'error');
					}
				} else {
					// Add a message to the message queue
					$application->enqueueMessage('Image has been removed from this item, but can not be deleted because it is being used elsewhere.', 'notice');
				}
			}
		}

		// Upload Image
		$file = JRequest::getVar('jform', array(), 'files', 'array');
		if($file['name']['image']){
			$info = Video4youHelper::imageUpload($file, $data, 'image');
			if($info['error'] == 0){
				$data['image'] = $info['image'];
			} else {
				// Add a message to the message queue
				$application->enqueueMessage($info['msg'], 'error');
			}
		}

		$model->save($data);

	}

}
?>