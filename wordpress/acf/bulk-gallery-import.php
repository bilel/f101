<?php
/**
 * Template Name: PIXTEST
 */

get_header();?>
<?php
//Let's assume you renamed all your pictures using the same slug of thir corresponding posts. and already uploaded them to the Media Gallery
//YOUR LOOP
//This script will update every Custom Post Type "CAR" listed under the custom Taxonomy category "BMW"
$the_query = new WP_Query( array(
    'post_type' => 'car',
	'posts_per_page' => -1,
    'tax_query' => array( 
        array (
			
			'post_status' => 'publish',
			
            'taxonomy' => 'cars',
            'field' => 'slug',
            'terms' => 'BMW',
			
        )
    ),
) );
$directory = wp_upload_dir();
$diri = $directory['path'];


while ( $the_query->have_posts() ) :
    $the_query->the_post();
	
	$hot = get_post($post_id); 
	$slug = $hot->post_name;
  
  //Let's assume the ACF Gallery field name is called album
  //we check if the field is empty
	if(! get_field('album') ){
		
	 
	 chdir($diri); 
 //We create an array of Post Attachment's IDs
 $reized = glob("$slug-[0-9]*x[0-9]*.*", GLOB_BRACE); 
 $allimages = glob("$slug*.{jpg,JPG,jpeg,JPEG,png,PNG}", GLOB_BRACE);
 
$images = array_diff($allimages1, $resized);
$idx = array();

 foreach($images as $image){
   array_push($idx,get_attachment_url_by_slug(basename($image,".jpeg")));
 }
 
 update_field( 'album', $idx , $hot->ID );
 set_post_thumbnail($hot->ID, $idx[0]);

	}
endwhile;
wp_reset_query();

wp_reset_postdata(); 
get_footer();
?>
