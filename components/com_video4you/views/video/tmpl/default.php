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
<!--	<p><strong>Video_480p</strong>: <?php echo $this->item->video480p; ?></p>
	<p><strong>Video_720p</strong>: <?php echo $this->item->video720p; ?></p>
	<p><strong>Video_1080p</strong>: <?php echo $this->item->video1080p; ?></p>-->
<!--                                        <script>
                    videojs.options.flash.swf = "video-js.swf";
                  </script>-->

              <video id="example_video_1" class="video-js vjs-default-skin" controls preload="none" width="640" height="264"
                  poster="images/com_video4you/<?php echo $this->item->image; ?>"
                  data-setup='{ "nativeControlsForTouch": false, "techOrder": ["html5","flash"], "plugins" : { "resolutionSelector" : { "default_res" : "480" } } }'>
                     <?php      
                        if (($this->item->video720p == NULL) && ($this->item->video1080p == NULL))
                         {
                              echo'<source src="'.$this->item->video480p.'" type="video/mp4" data-res="480" />';
                         }
                              elseif (($this->item->video480p == NULL) && ($this->item->video1080p == NULL)) {
                                      echo'<source src="'.$this->item->video720p.'" type="video/mp4" data-res="720" />';
                         }
                              elseif (($this->item->video480p == NULL) && ($this->item->video720p == NULL)){
                                      echo'<source src="'.$Model->video_1080p.'" type="video/mp4" data-res="1080" />';
                         }
                              elseif ($this->item->video480p == NULL) {
                                      echo'<source src="'.$this->item->video720p.'" type="video/mp4" data-res="720" />';
                                      echo'<source src="'.$this->item->video1080p.'" type="video/mp4" data-res="1080" />';
                         }
                              elseif ($this->item->video720p == NULL) {
                                      echo'<source src="'.$this->item->video480p.'" type="video/mp4" data-res="480" />';
                                      echo'<source src="'.$this->item->video1080p.'" type="video/mp4" data-res="1080" />';
                         }
                              elseif ($this->item->video1080p == NULL) {
                                      echo'<source src="'.$this->item->video480p.'" type="video/mp4" data-res="480" />';
                                      echo'<source src="'.$this->item->video720p.'" type="video/mp4" data-res="720" />'; 
                         }
                         else {
                              echo'<source src="'.$this->item->video480p.'" type="video/mp4" data-res="480" />';
                              echo'<source src="'.$this->item->video720p.'" type="video/mp4" data-res="720" />';
                              echo'<source src="'.$this->item->video1080p.'" type="video/mp4" data-res="1080" />';
                        }
        ?>
                <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
              </video>
</div>