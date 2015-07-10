<?php
/* content youtube */
global $yt_post;
?>
<a class="youtube social-feed col-md-3 youtube-video-open" href="#" data-id="<?php echo $yt_post['snippet']['resourceId']['videoId'];?>">
	<div class="cada">
		<div class="col-md-12 thumb nopadding">
			<img src="<?php echo esc_url($yt_post['snippet']['thumbnails']['medium']['url']);?>">
		</div><!-- .col-md-12 thumb -->
		<div class="col-md-12 description">
			<?php echo $yt_post['snippet']['title'];?>
		</div><!-- .col-md-12 description -->
		<div class="clear"></div>
	</div><!-- each -->
</a><!-- .col-md-12 -->
