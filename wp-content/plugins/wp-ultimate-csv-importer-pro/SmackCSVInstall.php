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

class SmackCSVInstall {

	protected static $instance = null,$smack_instance,$tables_instance;

	/**
	 * SmackCSVInstall Constructor
	 */
	private function __construct() {
		$this->plugin = Plugin::getInstance();
		self::$tables_instance = new Tables();
	}

	/**
	 * SmackCSVInstall Instance
	 */
	public static function getInstance() {
		if ( null == self::$instance ) {
			self::$instance = new self;
			self::$instance->doHooks();
		}
		return self::$instance;
	}

	/**
	 * SmackCSVInstall constructor.
	 */
	public static function csvOptions(){
		$callbackUrl['callbackurl']=site_url().'/wp-admin/admin.php?action=csv_options&show=settings';
		echo json_encode($callbackUrl);
		wp_die();
	}

	public function doHooks(){
		add_action('wp_ajax_csv_options', array($this,'csvOptions'));
	}

	/** @var array DB updates that need to be run */
	private static $db_updates = array(
			'4.0.0' => 'updates/sm-uci-update-5.0.php',
			'4.1.0' => 'updates/sm-uci-update-5.0.php',
			'4.4.0' => 'updates/sm-uci-update-5.0.php',
			'4.5' => 'updates/sm-uci-update-5.0.php',
			'5.0' => 'updates/sm-uci-update-5.2.php',
			'5.1' => 'updates/sm-uci-update-5.2.php',
			'5.2' => 'updates/sm-uci-update-5.3.php',
			'5.3' => 'updates/sm-uci-update-5.3.php',
			'5.5' => 'updates/sm-uci-update-5.5.php'
			);

	/**
	 * Hook in tabs.
	 */
	public static function init() {
		add_action( 'admin_init', array( __CLASS__, 'check_version' ), 5 );
		add_action( 'admin_init', array( __CLASS__, 'install_actions' ) );
	}

	/**
	 * Check WPUltimateCSVImporterPro version.
	 */
	public static function check_version() {
		if ( get_option( 'ULTIMATE_CSV_IMP_VERSION' ) != SmackUCI()->version )  {
			self::install();
			do_action( 'sm_uci_pro_updated' );
		}
	}

	/**
	 * Install actions when a update button is clicked.
	 */
	public static function install_actions() {
		if ( ! empty( $_GET['do_update_sm_uci_pro'] ) ) {
		}
	}

	/**
	 * Show notice stating update was successful.
	 */
	public static function updated_notice() {
		?>
			<div class='notice updated uci-message wc-connect is-dismissible'>
			<p><?php esc_html__( 'Ultimate CSV Importer PRO data update complete. Thank you for updating to the latest version!', 'wp-ultimate-csv-importer-pro' ); ?></p>
			</div>
			<?php
	}

	/**
	 * Install WUCI.
	 */
	public  function install() {
		$current_uci_version    = get_option( 'ULTIMATE_CSV_IMP_VERSION', null );
		self::$tables_instance->create_tables(); 
		if ( is_null( $current_uci_version )) {
			self::create_options();        
			self::CustomField_controls();
		} else {
			foreach ( self::$db_updates as $version => $updater ) {
				if ( version_compare( $version, $current_uci_version, '>=' ) ) {
					//include_once ( plugin_dir_path(__FILE__) . '/' . $updater );
				}
			}
		}
		self::update_uci_version();
		flush_rewrite_rules();
		do_action( 'sm_uci_installed' );
	}

	/**
	 * Update UCI version to current.
	 */
	private static function update_uci_version() {
		$version = '6.2';
		delete_option( 'ULTIMATE_CSV_IMP_VERSION' );
		add_option( 'ULTIMATE_CSV_IMP_VERSION', $version );
	}

	/**
	 * @param null $version
	 * Update DB version to current.
	 */
	private static function update_db_version( $version = null ) {
		delete_option( 'sm_uci_db_version' );
		add_option( 'sm_uci_db_version', is_null( $version ) ? SmackUCI()->version : $version );
	}

	/**
	 * Handle updates.
	 */
	private static function update() {
		$current_db_version = get_option( 'ULTIMATE_CSV_IMP_VERSION' );
		foreach ( self::$db_updates as $version => $updater ) {
			if ( version_compare( $current_db_version, $version, '<' ) ) {
				include_once ( $updater );
				self::update_db_version( $version );
			}
		}

		self::update_db_version();
	}

	/**
	 * Add more cron schedules.
	 * @param  array $schedules
	 * @return array
	 */
	public static function cron_schedules( $schedules ) {
		return array(
				'wp_ultimate_csv_importer_scheduled_csv_data' => array(
					'interval' => 5, // seconds
					'display' => __('Check scheduled events on every second', 'wp-ultimate-csv-importer-pro')
					),
				'wp_ultimate_csv_importer_scheduled_export_data' => array(
					'interval' => 5, // seconds
					'display' => __('Check scheduled events on every second', 'wp-ultimate-csv-importer-pro')
					),
				'wp_ultimate_csv_importer_scheduled_images' => array(
					'interval' => 10, // seconds
					'display' => __('Schedule images on every second', 'wp-ultimate-csv-importer-pro')
					),
				'wp_ultimate_csv_importer_scheduled_emails' => array(
					'interval' => 5, // seconds
					'display' => __('Schedule emails on every second', 'wp-ultimate-csv-importer-pro')
					),
				'wp_ultimate_csv_importer_replace_inline_images' => array(
					'interval' => 5, // seconds
					'display' => __('Replace all inline images from post content', 'wp-ultimate-csv-importer-pro')
					)
					);
	}
	
	public static function curlArgs($response) {
		$response['sslverify'] = false;
		return $response;
	}


	/**
	 * Default options.
	 *
	 * Sets up the default options used on the settings page.
	 */
	public static function create_options() {
		$settings = array('debug_mode' => 'off',
				'send_log_email' => 'on',
				'drop_table' => 'off',
				'author_editor_access' => 'off',
				'woocomattr' => 'off'
				);

		add_option('sm_uci_pro_settings', $settings);

	}

	


	/**
	 * Set Custom Field Controls
	 */
	private static function CustomField_controls() {
		$acf_controls = array(
				'Basic' => array('Text','Text Area','Number','Email','Url','Password'),
				'Content' => array('Wysiwyg Editor','oEmbed','Image','File','Gallery'),
				'Choice' => array('Select','Checkbox','Radio Button','True/False'),
				'Relational' => array('Post Object','Page Link','Relationship','Taxonomy','User'),
				'jQuery' => array('Google Map','Date Picker','Color picker'),
				'Layout' => array('Message','Tab','Repeater','Flexible Content')
				);
		$pods_controls = array(
				'Text' => array('Plain Text','Website','Phone','Email','Password'),
				'Paragraph' => array('Plain Paragraph Text','WYSIWYG (Visual Editor)','Code (Syntax Highlighting)'),
				'Date/Time' => array('Date/Time','Date','Time'),
				'Number' => array('Plain Number','Currency'),
				'Relationships/Media' => array('File/Image/Video','Relationship'),
				'Other' => array('Yes/No','Color Picker')
				);
		$types_controls = array(
				'Text'=> array('Textfield','Textarea','Numeric','Phone','Email','Url'),
				'Content' => array('Wysiwyg','Embed','Image','File','Video','Skype'),
				'Choice' => array('Select','Checkbox','Checkboxes','Radio'),
				'jQuery' => array('Colorpicker','Date')
				);
		self::insert_CF_controls($acf_controls,'acf-field-type');
		self::insert_CF_controls($pods_controls,'pods-field-type');
		self::insert_CF_controls($types_controls,'types-field-type');
	}

	/**
	 * Insert Custom Field Controls
	 *
	 * @param $cf_controls
	 * @param $cf_type
	 */
	private static function insert_CF_controls($cf_controls,$cf_type) {
		global $wpdb;
		foreach($cf_controls as $cf_group => $cf_fields) {
			$cf_fields = serialize($cf_fields);
			$cf_insert = "insert into smack_field_types(choices,fieldType,groupType)select * from (select '$cf_fields','$cf_group','$cf_type')as tmp where not exists(select groupType from smack_field_types where groupType = '$cf_type' and fieldType = '$cf_group')";
			$wpdb->query($cf_insert);
		}
	}

	/**
	 * Todo: add PHP docs
	 */
	public static function remove_options() {
		delete_option('ULTIMATE_CSV_IMP_VERSION');
		delete_option('ULTIMATE_CSV_IMPORTER_UPGRADE_VERSION');
	}

	/**
	 * Content media url modificaction for DigitalOcean
	 *
	 * @param $content
	 */
	public static function content_media_url_modification($content) {
		$region=self::bucket_region();
		preg_match_all('#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $content, $match);
		$content_urls = $match[0];
		$rewrite_url=get_option('media_rewrite_url');
		$media_bucket=get_option('updated_media_bucket');
        $media_bucket=trim($media_bucket);
		$upload_directory = wp_upload_dir();
		$domain_name=get_option('do_domain_name');
		$copy_year=get_option('copy_year_path');
		$media_path =get_option('media_file_path');
		$media_path = substr_replace($media_path, "", -1);
		if($copy_year =='true'){
			$media_base_url = $upload_directory['baseurl'];
			
		}else{
			$media_base_url = $upload_directory['url'];
		}
		if($rewrite_url=='true'){
			foreach ($content_urls as $content_url) {
				if(!empty($domain_name)){
					if(!empty($media_path)){
						$do_storage_location = $domain_name.'/'.$media_path;
					  }
					  else{
						$do_storage_location=$domain_name;
					  }
				  }
				  else{
					if(!empty($media_path)){
						$do_storage_location = 'https://'.$media_bucket.'.'.$region.'.digitaloceanspaces.com/'.$media_path;
					}
					else{
						$do_storage_location = 'https://'.$media_bucket.'.'.$region.'.digitaloceanspaces.com';
					}
				  }
				
				if (strpos($content_url, $do_storage_location) !== false) {
					$content = str_replace($media_base_url, $do_storage_location, $content);
				}
				else {
					$content = str_replace($media_base_url, $do_storage_location, $content);
				}
			}
		}
		return $content;
	}
	
	/**
	 *  media url modificaction for DigitalOcean
	 *
	 * @param $attachment_url
	 */
	public static function do_media_url_modification($attachment_url){
		$rewrite_url=get_option('media_rewrite_url');
        $media_bucket=get_option('updated_media_bucket');
        $media_bucket=trim($media_bucket);
		$id = $this->get_attachment_id_from_url($attachment_url);
		$mime_type = get_post_mime_type($id);
		$copy_year=get_option('copy_year_path');
		$domain_name=get_option('do_domain_name');
		$origin=get_option('media_bucket_origin');
		$mime_type_explode = explode('/', $mime_type);
		$extension = $mime_type_explode[0];
		$region=self::bucket_region();
		if ($extension == 'image') {
		  $upload_directory = wp_upload_dir();
		  if($copy_year =='true'){
			$media_base_url = $upload_directory['baseurl'];
		  }
		  else{
			$media_base_url = $upload_directory['url'];
		  }
		  $media_path =get_option('media_file_path');
		  $media_path = substr_replace($media_path, "", -1);
		  if($rewrite_url=='true'){
              if(!empty($domain_name)){
				if(!empty($media_path)){
					$do_storage_location = $domain_name.'/'.$media_path;
				  }
				  else{
					$do_storage_location=$domain_name;
				  }
			  }
			  else{
				if(!empty($media_path)){
					$do_storage_location = $origin.'/'.$media_path;
				  }
				  else{
					$do_storage_location = $origin;
				  }
			  }
			  
			  $attachment_url = str_replace($media_base_url, $do_storage_location, $attachment_url);
		  }
		global $wpdb;
	   	$sql = $wpdb->get_results(
		"UPDATE {$wpdb->prefix}posts SET guid = '$attachment_url' WHERE ID = $id"	
		);
		$wpdb->query( $sql );
		// $wpdb->get_results("DELETE FROM {$wpdb->prefix}postmeta WHERE meta_key='_wp_attachment_metadata' and post_id= $id");
		return $attachment_url;
	  }
	}
	

	/**
	 *  media  source modificaction for DigitalOcean
	 *
	 * @param $attr
	 */
	public static function do_media_src_modification($attr){
		$region=self::bucket_region();
		$rewrite_url=get_option('media_rewrite_url');
		 $upload_directory = wp_upload_dir();
		 $copy_year=get_option('copy_year_path');
		 $media_path =get_option('media_file_path');
		 $media_path = substr_replace($media_path, "", -1);
		 $media_bucket=get_option('updated_media_bucket');
		 $domain_name=get_option('do_domain_name');
		 $media_bucket=trim($media_bucket);
		 if($copy_year =='true'){
			$media_base_url = $upload_directory['baseurl'];
			
		}else{
			$media_base_url = $upload_directory['url'];
		}
		 if($rewrite_url=='true'){
			if(!empty($domain_name)){
				if(!empty($media_path)){
					$do_storage_location = $domain_name.'/'.$media_path;
				  }
				  else{
					$do_storage_location=$domain_name;
				  }
			  }
			  else{
				if(!empty($media_path)){
					$do_storage_location = 'https://'.$media_bucket.'.'.$region.'.digitaloceanspaces.com/'.$media_path;
				  }
				  else{
					$do_storage_location = 'https://'.$media_bucket.'.'.$region.'.digitaloceanspaces.com';
				  }
			  }
		 
	  $main_url = str_replace($do_storage_location, $media_base_url, $attr['src']);
	  $id = $this->get_attachment_id_from_url($main_url);
				 $mime_type = get_post_mime_type($id);
				 $mime_type_explode = explode('/', $mime_type);
				 $extension = $mime_type_explode[0];
  
				 if ($extension == 'image') {
				   $attr['srcset'] = str_replace($media_base_url, $do_storage_location, $attr['srcset']);
				 }
			  }
		  return $attr;
	  }


	/**
	 *  upload media to DigitalOcean
	 *
	 * @param $id
	 */
	public static function upload_to_digitalocean($id){
		$region=self::bucket_region();
		$provider=get_option('media_service_provider');
        $access_key=get_option($provider.'_access_key');
		$secret_key=get_option($provider.'_secret_key');
		$copy_status=get_option('copy_media_files');
		$media_bucket=get_option('updated_media_bucket');
		$media_bucket=trim($media_bucket);
		$copy_year=get_option('copy_year_path');
        $host = "digitaloceanspaces.com";
        $endpoint = "https://".$media_bucket.".".$region.".".$host;
  
        try {
				$s3Client = \Aws\S3\S3Client::factory([
                    'version'     => 'latest',
                    'region'      =>$region,
                	'endpoint'    => $endpoint,
                    'credentials' => [
                        'key'     => $access_key,
                        'secret'  => $secret_key,
                    ],
                	'bucket_endpoint' => true,
                ]);
                    
				//===Media Transfer===//
				if($copy_status == 'true'){
                    $file_path = get_attached_file($id);
					$upload_directory = wp_upload_dir();
					if($copy_year =='true'){
						$base_directory = $upload_directory['basedir'].'/';
					}else{
						$base_directory = $upload_directory['path'].'/';
					}
					$data_info = wp_get_attachment_metadata( $id );
                    $include_path = str_replace($base_directory, '', $file_path);
                    $copy_status=get_option('copy_media_files');
                    $copy_year=get_option('copy_year_path');
                    $media_path =get_option('media_file_path');
					if(!empty($media_path)){
						$include_path=$media_path.$include_path;
					 }           
					$filename_only = basename( get_attached_file( $id ) );
					$size_path = str_replace($filename_only, '', $file_path);
					$date_directory = str_replace($base_directory, '', $size_path);
					$result = $s3Client->putObject([
						'Bucket' => $media_bucket,
						'Key' => $include_path,
						'SourceFile' => $file_path,
						'ACL'    => 'public-read'
					]);
                    if (isset($data_info['sizes'])) {
                	foreach ($data_info['sizes'] as $sizedata) {
						$path = $size_path.$sizedata['file'];
						$name = $include_path.'/'.$date_directory.$sizedata['file'];
                        $result = $s3Client->putObject([
                            'Bucket' =>$media_bucket,
                            'Key' => $name,
                            'SourceFile' => $path,
                            'ACL'    => 'public-read'
                    	]);
                   }
                }
  				if (isset($data_info['original_image'])) {
					$orig_path = $include_path.'/'.$size_path.$data_info['original_image'];
					$orig_name = $date_directory.$data_info['original_image'];
					$result = $s3Client->putObject([
						'Bucket' => $media_bucket,
						'Key' => $orig_name,
						'SourceFile' => $orig_path,
						'ACL'    => 'public-read'
					]);
				}
		    }
       
          
                    //===Media Transfer End===//
    } catch (S3Exception $e) {
         return 'error';
    }
    return $id;
	}


    /**
	 *  getting attachment_id from url
	 *
	 * @param $attachment_url
	 */
	public static function get_attachment_id_from_url($attachment_url) {
        global $wpdb;
        $attachment_id = false;
		 if ( '' == $attachment_url )
          return;
		$upload_dir_paths = wp_upload_dir();
		if ( false !== strpos( $attachment_url, $upload_dir_paths['baseurl'] ) ) {
          $attachment_url = preg_replace( '/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $attachment_url );
          $attachment_url = str_replace( $upload_dir_paths['baseurl'] . '/', '', $attachment_url );
          $attachment_id = $wpdb->get_var( $wpdb->prepare( "SELECT wposts.ID FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta WHERE wposts.ID = wpostmeta.post_id AND wpostmeta.meta_key = '_wp_attached_file' AND wpostmeta.meta_value = '%s' AND wposts.post_type = 'attachment'", $attachment_url ) );
        }
        return $attachment_id;
      }

      /**
	 *  getting bucket region
	 *
	 * 
	 */
	  public static function bucket_region(){
       
        $region = get_option('media_bucket_region');
        switch($region){
            case 'New York':
                $reg = 'nyc3';
                break;
            case 'Amsterdam':
                $reg = 'ams3';
                break;
            case 'Singapore':
                 $reg = 'sgp1';
                 break;
            case 'San Francisco':
                $reg = 'sfo2';
                break;
            case 'Frankfurt':
                $reg = 'fra1';
                break;
            default:
                $reg = 'nyc3';
                break;
        }      
        return $reg; 

    }
	  
	/**
	 * @param $links
	 *
	 * @return array
	 */
	public function smack_uci_action_links( $links ) {
		$links[] = '<a href="'. esc_url( get_admin_url(null, 'admin.php?page=sm-uci-settings') ) .'">Settings</a>';
		$links[] = '<a href="http://wp-buddy.com" target="_blank">More plugins by WP-Buddy</a>';
		return $links;
	}

	/**
	 * Show row meta on the plugin screen.
	 *
	 * @param       mixed $links Plugin Row Meta
	 * @param       mixed $file  Plugin Base file
	 * @return      array
	 */
	public static function plugin_row_meta( $links, $file ) {
			$row_meta = array(
					'settings' => '<a href="' . esc_url( apply_filters( 'sm_uci_settings_url', admin_url() . 'admin.php?page=com.smackcoders.csvimporternewpro.menu&settings' ) ) . '" title="' . esc_attr( __( 'Visit Plugin Settings', 'wp-ultimate-csv-importer-pro' ) ) . '" target="_blank">' . __( 'Settings', 'wp-ultimate-csv-importer-pro' ) . '</a>',
					'docs'     => '<a href="' . esc_url( apply_filters( 'sm_uci_docs_url', 'https://www.smackcoders.com/wp-ultimate-csv-importer-pro.html' ) ) . '" title="' . esc_attr( __( 'View WP Ultimate CSV Importer Pro Documentation', 'wp-ultimate-csv-importer-pro' ) ) . '" target="_blank">' . __( 'Docs', 'wp-ultimate-csv-importer-pro' ) . '</a>',
					'videos'   => '<a href="' . esc_url( apply_filters( 'sm_uci_videos_url', 'https://www.youtube.com/watch?v=48soc8Wu4zs&feature=youtu.be' ) ) . '" title="' . esc_attr( __( 'View Videos for WP Ultimate CSV Importer Pro', 'wp-ultimate-csv-importer-pro' ) ) . '" target="_blank">' . __( 'Videos', 'wp-ultimate-csv-importer-pro' ) . '</a>',
					'support'  => '<a href="' . esc_url( apply_filters( 'sm_uci_support_url', admin_url() . 'admin.php?page=com.smackcoders.csvimporternewpro.menu&support' ) ) . '" title="' . esc_attr( __( 'Contact Support', 'wp-ultimate-csv-importer-pro' ) ) . '" target="_blank">' . __( 'Support', 'wp-ultimate-csv-importer-pro' ) . '</a>',
					);

			return array_merge( $row_meta, $links );
		}

	public static function after_plugin_row_meta() {
		$response = wp_safe_remote_get('https://www.smackcoders.com/wp-versions/wp-ultimate-csv-importer.json');
		if ( is_wp_error( $response ) ) {
			return false;
		}
		$response = json_decode($response['body']);
		$current_plugin_version = '6.2';
		if($current_plugin_version < $response->version[0]) {
			echo '<tr class="active"><td colspan="3">';
			echo '<div class="update-message notice inline notice-warning notice-alt"><p>There is a new version of WP Ultimate CSV Importer Pro <b>[ version '. $response->version[0] .' ]</b> available. <a href="https://smackcoders.com/my-account.html" class="update-link" aria-label="Upgrade WP Ultimate CSV Importer Pro now"> Upgrade now</a>.</p></div>';
			echo '</td></tr>';
		}
	}


	public static function important_cron_notice() {
		$get_notice = get_option('smack_uci_cron_notice');
		if($get_notice != 'off' && isset($_REQUEST['page']) && $_REQUEST['page'] == 'sm-uci-import') {
			?>
				<div class="notice notice-error wc-connect is-dismissible" onclick="dismiss_notices('cron_notice');" >
				<p style="margin-top: 10px">
				<strong><?php echo esc_html__( 'Notice:', 'wp-ultimate-csv-importer-pro' ); ?> </strong> <?php echo esc_html__( 'To populate Featured images, Please make sure that CRON is enabled in your server. ', 'wp-ultimate-csv-importer-pro' ); ?></p>
				</div>
				<?php
				if(function_exists( 'curl_version' ) == null || function_exists( 'curl_version' ) == '' && isset($_REQUEST['page']) && $_REQUEST['page'] == 'sm-uci-import') { ?>
					<div class="notice notice-error">
						<p style="margin-top: 10px;">
						<strong><?php echo esc_html__( 'Notice:', 'wp-ultimate-csv-importer-pro' ); ?> </strong> <?php echo esc_html__( 'Please install CURL & enable it in your server. ', 'wp-ultimate-csv-importer-pro' ); ?>
						</p>
						</div>
						<?php }
		}
	}

	public static function wp_ultimate_csv_importer_notice() {
		$get_notice = get_option('smack_uci_upgrade_notice');
		$smack_uci_pages = array('sm-uci-import', 'sm-uci-dashboard', 'sm-uci-managers', 'sm-uci-export', 'sm-uci-settings', 'sm-uci-support');
		if($get_notice != 'off' && isset($_REQUEST['page']) && in_array($_REQUEST['page'], $smack_uci_pages)) {
			?>
				<div class='notice updated uci-message wc-connect is-dismissible' onclick="dismiss_notices('upgrade_notice');">
				<?php
				if ( get_option( 'ULTIMATE_CSV_IMP_VERSION' ) == 5.0 ) {
					?>
						<p><?php echo esc_html__( 'Ultimate CSV Importer PRO data update complete. Thank you for updating to the latest version!', 'wp_ultimate_csv_importer_pro' ); ?></p>
						<?php } ?>
						<p><?php echo esc_html__("If you love WP Ultimate CSV Importer show us you care with a 5-star review on","wp-ultimate-csv-importer-pro");?> <a href='https://wordpress.org/support/plugin/wp-ultimate-csv-importer/reviews/?rate=5#new-post' target='_blank'><?php echo esc_html__("wordpress.org!","wp-ultimate-csv-importer-pro");?></a>
						</p></div>
						<?php
		}
	}
}
