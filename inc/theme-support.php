<?php

/*
	
@package thetirral
	
	========================
		THEME SUPPORT OPTIONS
	========================
*/






function thetirral_slider_template() {
	global $tirral_global; 
?>	
	
		<div class="bs-example" data-example-id="simple-carousel">
	<div class="carousel slide" id="carousel-example-generic" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			<li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
			<li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
		</ol>
		<div class="carousel-inner" role="listbox">

			<div class="item active">
				<?php global $tirral_global; ?>
				
				<img src=" <?php echo  $tirral_global['opt-first-slide-img']['url']; ?> " alt="<?php echo  $tirral_global['opt-first-slide-img-description']; ?>">
				<div class="carousel-caption">
					<h3><?php echo  $tirral_global['opt-first-slide-title']; ?></h3>
					<p><?php echo  $tirral_global['opt-first-slide-description']; ?></p>
				</div>
			</div>

			<div class="item">
				<img src=" <?php  echo  $tirral_global['opt-second-slide-img']['url']; ?> " alt="<?php echo  $tirral_global['opt-second-slide-img-description']; ?>">
				<div class="carousel-caption">
					<h3><?php echo  $tirral_global['opt-second-slide-title']; ?></h3>
					<p><?php echo  $tirral_global['opt-second-slide-description']; ?></p>
				</div>
			</div>

			<div class="item">
				<img src=" <?php  echo  $tirral_global['opt-third-slide-img']['url']; ?> " alt="<?php echo  $tirral_global['opt-third-slide-img-description']; ?>">
				<div class="carousel-caption">
					<h3><?php echo  $tirral_global['opt-third-slide-title']; ?></h3>
					<p><?php echo  $tirral_global['opt-third-slide-description']; ?></p>
				</div>
			</div>


		</div>
		<a href="#carousel-example-generic" class="left carousel-control" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>
		<a href="#carousel-example-generic" class="right carousel-control" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
	</div>
</div>
<?php	
}



function thetirral_jumbotron_template() {
	global $tirral_global; 
?>
<div class="jumbotron">
	<img src="<?php  echo  $tirral_global['opt-jumbotron-image']['url']; ?>" alt="some text here">
</div>
<?php	
}




/* 	BLOG LOOP CUSTOM FUNCTIONS */

/* 	функция выводится в файле content.php */
function thetirral_posted_meta(){
	$posted_on = human_time_diff( get_the_time('U') , current_time('timestamp') );
	
	$categories = get_the_category();
	$separator = ', ';
	$output = '';
	$i = 1;
	
	if( !empty($categories) ):
		foreach( $categories as $category ):
			if( $i > 1 ): $output .= $separator; endif;
			$output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( 'View all posts in%s', $category->name ) .'">' . esc_html( $category->name ) .'</a>';
			$i++; 
		endforeach;
	endif;
	
	return '<span class="posted-on">Posted <a href="'. esc_url( get_permalink() ) .'">' . $posted_on . '</a> ago</span> / <span class="posted-in">' . $output . '</span>';
}




/* 	функция выводится в файле content.php */
function thetirral_posted_footer(){
	$comments_num = get_comments_number();
	if( comments_open() ){
		if( $comments_num == 0 ){
			$comments = __('No Comments', 'thetirral');
		} elseif ( $comments_num > 1 ){
			$comments= $comments_num . __(' Comments', 'thetirral');
		} else {
			$comments = __('1 Comment', 'thetirral');
		}
		$comments = '<a class="comments-link" href="' . get_comments_link() . '">'. $comments .' <span class="thetirral-icon thetirral-comment"></span></a>';
	} else {
		$comments = __('Comments are closed', 'thetirral');
	}
	return '<div class="post-footer-container"><div class="row"><div class="col-xs-12 col-sm-6">'. get_the_tag_list('<div class="tags-list"><span class="thetirral-icon thetirral-tag"></span>', ' ', '</div>') .'</div><div class="col-xs-12 col-sm-6 text-right">'. $comments .'</div></div></div>';
}


/* 	функция выводится в файле content-image.php (Если нет заданой картинки ИЗОБРАЖЕНИЯ ЗАПИСИ берется картинка внутри записи и становится картинкой записи)*/
function thetirral_get_attachment( $num = 1 ){
	$output = '';
	if( has_post_thumbnail() && $num == 1 ): 
		$output = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
	else:
		$attachments = get_posts( array( 
			'post_type' => 'attachment',
			'posts_per_page' => $num,
			'post_parent' => get_the_ID()
		) );
		if( $attachments && $num == 1 ):
			foreach ( $attachments as $attachment ):
				$output = wp_get_attachment_url( $attachment->ID );
			endforeach;
		elseif( $attachments && $num > 1 ):
			$output = $attachments;
		endif;
		wp_reset_postdata();
	endif;
	return $output;
}






/* 	функция выводится в файле content-audio.php */
function thetirral_get_embedded_media( $type = array() ){
	$content = do_shortcode( apply_filters( 'the_content', get_the_content() ) );
	$embed = get_media_embedded_in_content( $content, $type );
	
	if( in_array( 'audio' , $type) ):
		$output = str_replace( '?visual=true', '?visual=false', $embed[0] );
	else:
		$output = $embed[0];
	endif;
	
	return $output;
}


/* 	функция выводится в файле content-gallery.php */
function thetirral_get_bs_slides( $attachments ){
	
	$output = array();
	$count = count($attachments)-1;
	
	for( $i = 0; $i <= $count; $i++ ): 
	
		$active = ( $i == 0 ? ' active' : '' );
		
		$n = ( $i == $count ? 0 : $i+1 );
		$nextImg = wp_get_attachment_thumb_url( $attachments[$n]->ID );
		$p = ( $i == 0 ? $count : $i-1 );
		$prevImg = wp_get_attachment_thumb_url( $attachments[$p]->ID );
		
		$output[$i] = array( 
			'class'		=> $active, 
			'url'		=> wp_get_attachment_url( $attachments[$i]->ID ),
			'next_img'	=> $nextImg,
			'prev_img'	=> $prevImg,
			'caption'	=> $attachments[$i]->post_excerpt
		);
	
	endfor;
	
	return $output;
	
}


function tirral_grab_url() {
	if( ! preg_match( '/<a\s[^>]*?href=[\'"](.+?)[\'"]/i', get_the_content(), $links ) ){
		return false;
	}
	return esc_url_raw( $links[1] );
}

function tirral_grab_current_uri() {
	$http = ( isset( $_SERVER["HTTPS"] ) ? 'https://' : 'http://' );
	$referer = $http . $_SERVER["HTTP_HOST"];
	$archive_url = $referer . $_SERVER["REQUEST_URI"];
	
	return $archive_url;
}




/*
	========================
		SINGLE POST CUSTOM FUNCTIONS
	========================
*/

/* 	функция выводится в файле single.php  */

function thetirral_post_navigation(){
	
	$nav = '<div class="row">';
	
	$prev = get_previous_post_link( '<div class="post-link-nav"><span class="thetirral-icon thetirral-chevron-left" aria-hidden="true"></span> %link</div>', '%title' );
	$nav .= '<div class="col-xs-12 col-sm-6">' . $prev . '</div>';
	
	$next = get_next_post_link( '<div class="post-link-nav">%link <span class="thetirral-icon thetirral-chevron-right" aria-hidden="true"></span></div>', '%title' );
	$nav .= '<div class="col-xs-12 col-sm-6 text-right">' . $next . '</div>';
	
	$nav .= '</div>';
	
	return $nav;
	
}




function thetirral_get_post_navigation(){
	
	if( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ):
	
		require( get_template_directory() . '/inc/templates/thetirral-comment-nav.php' );
	
	endif;
	
}




























