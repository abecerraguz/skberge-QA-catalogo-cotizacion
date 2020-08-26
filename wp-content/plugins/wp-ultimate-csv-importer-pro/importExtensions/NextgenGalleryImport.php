<?php
/******************************************************************************************
 * Copyright (C) Smackcoders. - All Rights Reserved under Smackcoders Proprietary License
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * You can contact Smackcoders at email address info@smackcoders.com.
 *******************************************************************************************/

namespace Smackcoders\WCSV;


if ( ! defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly
class NextGenGalleryImport {
	private static $nextgengallery_core_instance = null,$smack_instance;

	public  function __construct(){
		add_action('wp_ajax_zip_ngg_upload', array($this , 'zip_ngg_upload'));
	}	
	
	public static function getInstance() {	
		if (self::$nextgengallery_core_instance == null) {
			self::$nextgengallery_core_instance = new NextGenGalleryImport();
			self::$smack_instance = SmackCSV::getInstance();
			return self::$nextgengallery_core_instance;
		}
		return self::$nextgengallery_core_instance;
	}

	public function zip_ngg_upload(){
		global $wpdb;
		$zip_file_name = $_FILES['zipFile']['name'];
		$zipname = preg_replace('/\\.[^.\\s]{3,4}$/', '', $zip_file_name);
		update_option( 'smack_zip_name',$zipname);
		$zip_folder_name = explode('.zip',$zip_file_name);
		$zip_folder_name = $zip_folder_name[0];
		$hash_key = self::$smack_instance->convert_string2hash_key($zip_file_name);
		$upload_dir = self::$smack_instance->create_upload_dir();
		$path = $upload_dir . $hash_key . '.zip';
		move_uploaded_file($_FILES['zipFile']['tmp_name'], $path);
		chmod($path, 0777);
		$zip = new \ZipArchive;
		$res = $zip->open($path);
		$get_ngg_options = get_option('ngg_options');
		$get_gallery_path = explode('/', $get_ngg_options['gallerypath']);
		$gallery_name=$zip_folder_name;
		$gallery_table = $wpdb->prefix . 'ngg_gallery';
		$wpdb->insert( $gallery_table, array(
			'title' => $zip_folder_name ,
			'name'  => $zip_folder_name,
			'slug'   => $zip_folder_name,
			'path'    => 'wp-content/gallery/'.$gallery_name.'/'
		)
	);
		$gallery_dir = WP_CONTENT_DIR . '/' . $get_gallery_path[1];
		$image_id = $wpdb->insert_id;
		$storage  = \C_Gallery_Storage::get_instance();
		$params = array('watermark' => false, 'reflection' => false);
		$result = $storage->generate_thumbnail($image_id, $params);
		$upload_dir = wp_upload_dir();
		$gallery_table = $wpdb->prefix . 'ngg_gallery';
		$get_gallery_id = $wpdb->get_col($wpdb->prepare("select gid from $gallery_table where name='$gallery_name'"));	
		$gallery_id = $get_gallery_id[0];
		$gallery_abspath = $storage->get_gallery_abspath($gallery_id);
		$image_abspath = $storage->get_full_abspath($image_id);
		$storage->get_full_url($image_id);
		$storage->_image_mapper->find($image_id);
		$target_basename = \M_I18n::mb_basename($image_abspath);
		if (strpos($image_abspath, $gallery_abspath) === 0) {
			$target_relpath = substr($image_abspath, strlen($gallery_abspath));
		} else {
			if ($gallery_id) {
				$target_relpath = path_join(strval($gallery_id), $target_basename);
			} else {
				$target_relpath = $target_basename;
			}
		}
		$target_relpath = trim($target_relpath, '\\/');
		$target_path = path_join($gallery_dir, $target_relpath);
		$max_count = 100;
		$count = 0;
		while (@file_exists($target_path) && $count <= $max_count) {
			$count++;
			$pathinfo = \M_I18n::mb_pathinfo($target_path);
			$dirname = $pathinfo['dirname'];
			$filename = $pathinfo['filename'];
			$extension = $pathinfo['extension'];
			$rand = mt_rand(1, 9999);
			$basename = $filename . '_' . sprintf('%04d', $rand) . '.' . $extension;
			$target_path = path_join($dirname, $basename);
		}
		$target_dir = $gallery_dir;
		wp_mkdir_p($target_dir);
		if ($res === TRUE) {
			$zip->extractTo($target_dir);
			$zip->close();
			$result['success'] = true;
		} else {
			$result['success'] = false;
		}	

		$wpdb->delete( $wpdb->prefix.'ngg_gallery', array( 'gid' => $gallery_id));

		echo wp_json_encode($result);
		wp_die();
	}
	
	public function nextgenImport($header_array ,$value_array , $map , $post_id , $selected_type) {
		global $wpdb;
		foreach($map as $key => $value){
			$csv_value= trim($map[$key]);
			if(!empty($csv_value)){
				$get_key= array_search($csv_value , $header_array);
				if(isset($value_array[$get_key])){
					$csv_element = $value_array[$get_key];  
					$wp_element= trim($key);

					if(!empty($csv_element) && !empty($wp_element)){
						$post_values[$wp_element] = $csv_element;
					}
				}
			}
		}
		if(!empty($post_values['nextgen_gallery'])) {
			$thumbnailId = self::importImage($header_array ,$value_array , $map , $post_id , $selected_type,$post_values);
		}
		if($thumbnailId != null) {
			set_post_thumbnail( $post_id, $thumbnailId );
		}
	}

	public function importImage($header_array ,$value_array , $map , $post_id , $selected_type,$post_values) {
		
		global $wpdb;
		$get_ngg_options = get_option('ngg_options');
		$get_gallery_path = explode('/', $get_ngg_options['gallerypath']);
		$gallery_name=$post_values['nextgen_gallery'];
		$gallery_dir = WP_CONTENT_DIR . '/' . $get_gallery_path[1] . '/' . $gallery_name;
		$names = glob($gallery_dir.'/'.'*.*');
		foreach($names as $values){
			if (strpos($values, $post_values['image_url']) !== false) {
				$fImg_name = content_url().'/'.$get_gallery_path[1] . '/' . $gallery_name.'/'.$post_values['image_url'];
			}
		}           		
		$path_parts = pathinfo($post_values['image_url']);
		$real_fImg_name=$path_parts['filename'];
		$fImg_name = @basename($post_values['image_url']);
		$fImg_name = str_replace(' ', '-', trim($fImg_name));
		$fImg_name = preg_replace('/[^a-zA-Z0-9._\-\s]/', '', $fImg_name);
		$fImg_name = urlencode($fImg_name);	
		$gallery_table = $wpdb->prefix . 'ngg_gallery';
		$get_gallery_id = $wpdb->get_results("select gid from $gallery_table where name='$gallery_name'",ARRAY_A);	
		$gallery_id = $get_gallery_id[0]['gid'];		
		$img_import_date = date('Y-m-d H:i:s');
		// Download external images to your media if true
		$ngg_gallery_info = $this->createAttachmentEntryInNGGGalley($real_fImg_name, $gallery_id, $fImg_name, $img_import_date,$post_values);
		$image_id = $ngg_gallery_info['gallery_id'];

		if($image_id && $ngg_gallery_info['alreadyexists'] !== true){

			$gallery_dir = WP_CONTENT_DIR . '/' . $get_gallery_path[1] . '/' . $gallery_name;
			$storage  = \C_Gallery_Storage::get_instance();
			$params = array('watermark' => false, 'reflection' => false);
			$storage->generate_thumbnail($image_id, $params);
			$copy_image = TRUE;
			$gallery_abspath = $storage->get_gallery_abspath($gallery_id);
			$image_abspath = $storage->get_full_abspath($image_id);
			$url = $storage->get_full_url($image_id);
			$image = $storage->_image_mapper->find($image_id);
			$target_basename = \M_I18n::mb_basename($image_abspath);
			if (strpos($image_abspath, $gallery_abspath) === 0) {
				$target_relpath = substr($image_abspath, strlen($gallery_abspath));
			} else {
				if ($gallery_id) {
					$target_relpath = path_join(strval($gallery_id), $target_basename);
				} else {
					$target_relpath = $target_basename;
				}
			}
			$target_relpath = trim($target_relpath, '\\/');
			$target_path = path_join($gallery_dir, $target_relpath);
			$image= file_get_contents($post_values['image_url']);
			file_put_contents(ABSPATH .'wp-content/gallery/'.$gallery_name.'/'.$fImg_name,$image);
			file_put_contents(ABSPATH .'wp-content/gallery/'.$gallery_name.'/thumbs/'.'thumbs_'.$fImg_name,$image);
			$max_count = 100;
			$count = 0;
			while (@file_exists($target_path) && $count <= $max_count) {
				$count++;
				$pathinfo = \M_I18n::mb_pathinfo($target_path);
				$dirname = $pathinfo['dirname'];
				$filename = $pathinfo['filename'];
				$extension = $pathinfo['extension'];
				$rand = mt_rand(1, 9999);
				$basename = $filename . '_' . sprintf('%04d', $rand) . '.' . $extension;
				$target_path = path_join($dirname, $basename);
			}
			$attachment_id = $wpdb->get_results("select ID from {$wpdb->prefix}posts where guid = '$url'" ,ARRAY_A);
			if ($copy_image) {
				@copy($image_abspath, $target_path);
				if (!$attachment_id) {
					$size = @getimagesize($target_path);
					$image_type = $size ? $size['mime'] : 'image/jpeg';
					$title = sanitize_file_name($image->alttext);
					$caption = sanitize_file_name($image->description);
					$attachment = array('post_title' => $title, 'post_content' => $caption, 'post_status' => 'attachment', 'post_parent' => 0, 'post_mime_type' => $image_type, 'guid' => $url);
				}
				update_post_meta($attachment_id, '_ngg_image_id', $image_id);
				wp_update_attachment_metadata($attachment_id, wp_generate_attachment_metadata($attachment_id, $target_path));
			}			
			return $attachment_id;
		}
	}

	public function createAttachmentEntryInNGGGalley($real_fImg_name, $gallery_id, $fImg_name, $img_import_date,$post_values){

		global $wpdb;
		$ngg_gallery_id = $wpdb->get_var("SELECT pid FROM ".$wpdb->prefix."ngg_pictures WHERE filename = '$fImg_name'");
		if(!$ngg_gallery_id){
			$wpdb->insert( $wpdb->prefix .'ngg_pictures', array(
				'image_slug' => $real_fImg_name,
				'galleryid'  => $gallery_id,
				'filename'   => $fImg_name,
				'alttext'    => $post_values['alttext'],
				'imagedate'  => $img_import_date,
				'description' => $post_values['description']

			)
		);
			return ['gallery_id' => $wpdb->insert_id, 'alreadyexists' => false];
		}

		return ['gallery_id' => $ngg_gallery_id, 'alreadyexists' => true];
	}

	public function nextgenGallery($data_array)
	{ 
		global $wpdb;
		$get_ngg_options = get_option('ngg_options');
		$get_gallery_path = explode('/', $get_ngg_options['gallerypath']);
		$gallery_id = $data_array['nextgen_gallery'];
		$gallery_table = $wpdb->prefix . 'ngg_gallery';
		$get_gallery_name = $wpdb->get_results("select * from $gallery_table where gid= {$gallery_id}",ARRAY_A);
		$gallery = $get_gallery_name[0]['path'];
		
		$gallery_name = str_replace('wp-content/gallery/', '', $gallery);
		
		$gallery_dir = WP_CONTENT_DIR . '/' . $get_gallery_path[1] . '/' . $gallery_name;
		$names = glob($gallery_dir . '/' . '*.*');
		foreach ($names as $values) {
			if (strpos($values, $data_array['featured_image']) !== false) {
				$fImg_name = content_url() . '/' . $get_gallery_path[1] . '/' . $gallery_name . '/' . $data_array['featured_image'];
			}
		}
		$path_parts = pathinfo($data_array['featured_image']);
		$real_fImg_name = $path_parts['filename'];
		$fImg_name_zip = @basename($data_array['featured_image']);
		$fImg_name = @basename($data_array['featured_image']);
		$fImg_name = str_replace(' ', '-', trim($fImg_name));
		$fImg_name = preg_replace('/[^a-zA-Z0-9._\-\s]/', '', $fImg_name);
		$fImg_name = urlencode($fImg_name);

		$gallery_table = $wpdb->prefix . 'ngg_gallery';
		$img_import_date = date('Y-m-d H:i:s'); 
		$wpdb->insert(
			$wpdb->prefix . 'ngg_pictures',
			array(
				'image_slug' => $real_fImg_name,
				'galleryid'  => $gallery_id,
				'filename'   => $fImg_name,
				'alttext'    => $data_array['alt_text'], //changed
				'imagedate'  => $img_import_date,
				'description' => $data_array['description']

			)
		);
		$gallery_dir = WP_CONTENT_DIR . '/' . $get_gallery_path[1] . '/' . $gallery_name;
		$image_id = $wpdb->insert_id;
		$storage  = \C_Gallery_Storage::get_instance();
		$params = array('watermark' => false, 'reflection' => false);
		$storage->generate_thumbnail($image_id, $params);
	
		$url = $storage->get_full_url($image_id);
		$image = $storage->_image_mapper->find($image_id);
		$target_path =WP_CONTENT_DIR .'/gallery/'.$gallery_name;
		$thumbnail_path = WP_CONTENT_DIR .'/gallery/'.$gallery_name.'/thumbs';
		if(!is_dir($target_path)) {
			wp_mkdir_p($target_path);
			wp_mkdir_p($thumbnail_path);
			chmod($target_path, 0777);
			chmod($thumbnail_path, 0777);
		}
		if(!file_exists(ABSPATH . 'wp-content/gallery/' . $gallery_name.$fImg_name)){
				$zipname= get_option('smack_zip_name');
				$src=WP_CONTENT_DIR .'/gallery/'.$fImg_name_zip;
				$dest[]=ABSPATH . 'wp-content/gallery/' . $gallery_name.$fImg_name;
			
				foreach($dest as $destination){
					copy($src, $destination);	
				}
		}
		
	
		$media_handle = get_option('smack_image_options');	
		if($media_handle['media_settings']['media_handle_option'] == 'true'){
			if($media_handle['media_settings']['use_ExistingImage'] == 'true'){
				$image = file_get_contents($data_array['featured_image']);
				$dir_name = $path_parts['dirname'];
				$year = explode('/wp-content/uploads/', $dir_name);
				@copy(ABSPATH.'/wp-content/uploads/'.$year[1].'/'.$fImg_name, ABSPATH.'/wp-content/gallery/'.$gallery_name.$fImg_name);
				@copy(ABSPATH.'/wp-content/uploads/'.$year[1].'/'.$fImg_name, ABSPATH.'/wp-content/gallery/'.$gallery_name.'/thumbs/'. 'thumbs_' .$fImg_name);
			}
			elseif($media_handle['media_settings']['newImage'] == 'true'){
				$image = file_get_contents($data_array['featured_image']);
			
				if(empty($image)){
					$this->create_ngg_image($data_array, $gallery_name, $fImg_name); 
				}
				else{
					file_put_contents(ABSPATH . 'wp-content/gallery/' . $gallery_name . '/' . $fImg_name, $image);
					file_put_contents(ABSPATH . 'wp-content/gallery/' . $gallery_name . '/thumbs/' . 'thumbs_' . $fImg_name, $image); 
				}
			}
		}
		else{
			$image = file_get_contents($data_array['featured_image']);
			
			if(empty($image)){
				$this->create_ngg_image($data_array, $gallery_name, $fImg_name); 
			}
			else{
				file_put_contents(ABSPATH . 'wp-content/gallery/' . $gallery_name . '/' . $fImg_name, $image);
				file_put_contents(ABSPATH . 'wp-content/gallery/' . $gallery_name . '/thumbs/' . 'thumbs_' . $fImg_name, $image); 
			}
		}
		$max_count = 100;
		$count = 0;
		while (@file_exists($target_path) && $count <= $max_count) {
			$count++;
			$pathinfo = \M_I18n::mb_pathinfo($target_path);
			$dirname = $pathinfo['dirname'];
			$filename = $pathinfo['filename'];
			$extension = $pathinfo['extension'];
			$rand = mt_rand(1, 9999);
			$basename = $filename . '_' . sprintf('%04d', $rand) . '.' . $extension;
			$target_path = path_join($dirname, $basename);
		}
	}

	public function create_ngg_image($data_array, $gallery_name, $fImg_name){
		$response = wp_remote_get($data_array['featured_image'], array( 'timeout' => 30));		
		$rawdata =  wp_remote_retrieve_body($response);
		$http_code = wp_remote_retrieve_response_code($response);
		$dest=ABSPATH . 'wp-content/gallery/' . $gallery_name.$fImg_name;
		$thumb=ABSPATH . 'wp-content/gallery/' . $gallery_name.'/thumbs/'. 'thumbs_' .$fImg_name;

		$fp = fopen($dest, 'x');
		fwrite($fp, $rawdata);
		fclose($fp);
		$dirname = date('Y') . '/' . date('m');
		$name[]=$fImg_name;
		
		foreach($name as $fname){
			$thumbs='thumbs_'.$fname;
			@copy(ABSPATH.'wp-content/uploads'.'/'.$dirname.'/'.$fname,ABSPATH . 'wp-content/gallery/' . $gallery_name.$fname);
			@copy(ABSPATH . 'wp-content/gallery/' . $gallery_name.$fname,ABSPATH . 'wp-content/gallery/' . $gallery_name . '/thumbs/' . $thumbs);
		}
			 
	}
}