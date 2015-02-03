<?php
/*------------------------------------------------------------------------
# controller.php - Video4you Component
# ------------------------------------------------------------------------
# author    Tomasz Hycnar, Marcin Kukliński
# copyright Copyright (C) 2015. All Rights Reserved
# license   GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
# website   www.timeto.pl
-------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla controller library
jimport('joomla.application.component.controller');

/**
 * Video4you Component Controller
 */
class Video4youController extends JControllerLegacy
{
    function test() {
        $tekst = JRequest::getVar( 'id' );
        echo $tekst;
    }
}
?>