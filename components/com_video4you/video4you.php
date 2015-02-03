<?php
/*------------------------------------------------------------------------
# video4you.php - Video4you Component
# ------------------------------------------------------------------------
# author    Tomasz Hycnar, Marcin Kukliński
# copyright Copyright (C) 2015. All Rights Reserved
# license   GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
# website   www.timeto.pl
-------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// Added for Joomla 3.0
if(!defined('DS')){
	define('DS',DIRECTORY_SEPARATOR);
};

// Set the component css/js
$document = JFactory::getDocument();
$document->addStyleSheet('components/com_video4you/assets/css/bootstrap.css');
$document->addStyleSheet('components/com_video4you/assets/css/video4you.css');
$document->addStyleSheet('components/com_video4you/assets/videojs/video-js.css');
$document->addStyleSheet('components/com_video4you/assets/videojs/video-js.min.css');
$document->addStyleSheet('components/com_video4you/assets/videojs/quality-selector/button-styles.css');
$document->addScript('components/com_video4you/assets/videojs/video.js');
$document->addScript('components/com_video4you/assets/videojs/quality-selector/video-quality-selector.js');
$document->addCustomTag( '<script>videojs.options.flash.swf = "/components/com_video4you/assets/videojs/video-js.swf";</script>' );

// Require helper file
JLoader::register('Video4youHelper', dirname(__FILE__) . DS . 'helpers' . DS . 'video4you.php');

// import joomla controller library
jimport('joomla.application.component.controller');

// Get an instance of the controller prefixed by Video4you
$controller = JControllerLegacy::getInstance('Video4you');

// Perform the request task
$controller->execute(JRequest::getCmd('task'));

// Redirect if set by the controller
$controller->redirect();
?>