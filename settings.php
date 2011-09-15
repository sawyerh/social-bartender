<?php

// Page content
function sh_sb_settings_page(){
	
	if( !current_user_can( 'manage_options' ) ): 
		wp_die( __( 'Insufficient permissions', 'shaken' ) );
	else:
		sh_sb_check_new();
		sh_sb_check_update();
	endif;
	?>
	
	<div class="wrap">
		<?php screen_icon( 'plugins' ); ?>
		<h2>Social Bartender</h2>
		
		<div id="nav-menus-frame">
		
			<!-- ######  Sidebar ###### -->
			
			<div id="menu-settings-column" class="metabox-holder">
				<div id="side-sortables" class="meta-box-sortables">
					
					<div class="postbox">
						<div class="handlediv" title="Click to toggle"><br></div>
						<h3 class="hndle"><?php _e( 'Create New Item', 'shaken' ); ?></h3>
						
						<div class="inside customlinkdiv">
							<form action="" method="post" id="create-form">
							
								<p><label for="sh_sb_link" class="howto">
									<span><?php _e( 'Link', 'shaken' ); ?><span class="required">*</span></span>
									<input type="text" value="http://" name="sh_sb_link" id="sh_sb_link" class="code" />
								</label></p>
								
								<p><label for="sh_sb_title" class="howto">
									<span><?php _e( 'Title', 'shaken' ); ?></span>
									<input type="text" value="" name="sh_sb_title" id="sh_sb_title" />
								</label></p>
								
								<p class="sh_sb-border-bottom"><label for="sh_sb_icon_new" class="upload-field howto">
									<span><?php _e( 'Icon', 'shaken' ); ?></span>
									<input type="text" value="" name="sh_sb_icon" id="sh_sb_icon_new" class="code" />
									
									<a href="#" id="upload_image_button"><?php _e( 'Upload', 'shaken' ); ?></a>
									
									<span class="sh_sb-clearfix"></span>
								</label></p>
								
								<p><input type="submit" name="sh_sb_new_item" id="sh_sb_new_item" value="<?php _e( 'Create Item', 'shaken' ); ?>" class="button-primary" /></p>
																
							</form>
						</div><!-- #inside -->
					</div><!-- #postbox -->
					
					
					<div class="postbox">
						
						<div class="handlediv" title="Click to toggle"><br></div>
						<h3 class="hndle"><?php _e( 'Icon Bucket', 'shaken' ); ?></h3>
												
						<div id="sh_sb-icon-tabs" class="inside posttypediv">
							
							<?php
								$theme_icons = sh_sb_get_icons( get_theme_root().'/'.get_template().'/', get_template_directory_uri().'/' );
							?>
							
							<ul class="add-menu-item-tabs">
								<?php if( $theme_icons ){ ?>
									<li><a href="#theme-icons" class="nav-tab-link">Theme Icons</a></li>
								<?php } ?>
								<li><a href="#default-icons" class="nav-tab-link">Default Icons</a></li>
							</ul>
							
							<?php if( $theme_icons ){ ?>
								<div id="theme-icons" class="tabs-panel">
									<?php echo $theme_icons; ?>
								</div>
							<?php } ?>
							
							<div id="default-icons" class="tabs-panel">
								<?php echo sh_sb_get_icons( plugin_dir_path( __FILE__ ), SH_SB_DIR ); ?>
							</div>
							
							<p><?php _e( "Select an icon above and its URL will be automatically entered for you.", 'shaken' ); ?></p>
							
						</div><!-- #icon-tabs -->
					</div><!-- #postbox -->
										
				</div><!-- #side-sortables -->
			</div><!-- #side-info-column -->
			
			<div id="post-body">
				
				<div id="post-body-content" class="postbox">
					<?php
						$items = get_option( 'sh_sb_items' );
						if( $items ):
					?>	
						
						<form action="" method="post" class="listings-form">
							<table cellpadding="0" cellspacing="0">
								<thead>
									<tr>
										<th class="icon-col"><?php _e( 'Icon', 'shaken' ); ?></th>
										<th><?php _e( 'Link', 'shaken' ); ?></th>
										<th><?php _e( 'Title', 'shaken' ); ?></th>
										<th class="actions-col"></th>
									</tr>
								</thead>
								
								<tbody class="sortable">
									<?php
										foreach( $items as $item ):										
											$icon = $item['icon'];
											$title = $item['title'];
											$link = $item['link'];
									?>
										
									<tr>
										<td class="icon-col">
											<div class="icon-preview">
											<?php if( $icon && $icon != '' ){ ?>
												<img src="<?php echo $icon; ?>" alt="<?php echo $icon; ?>" />
											<?php } ?>
											</div>
											<input type="text" value="<?php echo $icon; ?>" name="sh_sb_icon[]" class="code" />
										</td>
										<td><input type="text" value="<?php echo $link; ?>" name="sh_sb_link[]" class="sh_sb_link code" /></td>
										<td><input type="text" value="<?php echo $title; ?>" name="sh_sb_title[]" /></td>
										<td class="actions-col">
											<a href="#" class="sh_sb-move"><img src="<?php echo SH_SB_DIR; ?>/images/move.png" alt="Move" /></a>
											<a href="#" class="sh_sb-delete"><img src="<?php echo SH_SB_DIR; ?>/images/delete.png" alt="Delete" /></a>
										</td>
									</tr>
											
									<?php endforeach; ?>
								</tbody>
								
								<tfoot>
									<tr>
										<td colspan="2">
											<input type="checkbox" name="sh_sb_title_only" id="sh_sb_title_only" <?php if( get_option('sh_sb_title_only') == 'yes' ){ echo "checked"; } ?> />
											<label for="sh_sb_title_only"><?php _e( 'Display the titles instead of images' , 'shaken' ); ?></label>
										</td>
										
										<td colspan="2"><input type="submit" id="sh_sb_update" class="button-primary" name="sh_sb_update" value="Update" /></td>
									</tr>
								</tfoot>
							</table>
						</form>

					<?php else: ?>
							
						<div class="empty-message">
							<p><?php _e("You don't have any items in your bar, why not create some?", "shaken"); ?></p>
						</div>
							
					<?php endif; ?>
				</div>
				
			</div><!-- #post-body -->
			
		</div><!-- #nav-menus-frame -->
		
	</div><!-- #wrap -->
	
<?php } // # sh_sb_settings_page

function sh_sb_check_new(){
	
	if( array_key_exists( 'sh_sb_new_item', $_POST ) ):
		
		$title = $_POST['sh_sb_title'];
		$link = $_POST['sh_sb_link'];
		$icon = $_POST['sh_sb_icon'];
		
		$entry = array(
			'title' => esc_html( $title ),
			'link' => esc_url_raw( $link ),
			'icon' => esc_url_raw( $icon )
		);
		
		// Check if this option already exists
		if( $items = get_option( 'sh_sb_items' ) ):
			
			$items[] = $entry;
			update_option( 'sh_sb_items', $items );
		
		else:
		
			$items[] = $entry;
			update_option( 'sh_sb_items', $items );
		
		endif;
		
	?>
		
		<div id="message" class="updated">
			<p><?php _e( 'Item added', 'shaken' ); ?></p>
		</div>
		
	<?php endif;
	
	
}

function sh_sb_check_update(){

	if( array_key_exists( 'sh_sb_update', $_POST ) ):
		
		$items = '';
		
		$length = ( isset( $_POST['sh_sb_title'] ) && $_POST['sh_sb_title'] != 0 ) ? count( $_POST['sh_sb_title'] ) : 0;
		
		for( $i = 0; $i < $length; $i++ ):
			
			$title = $_POST['sh_sb_title'][$i];
			$link = $_POST['sh_sb_link'][$i];
			$icon = $_POST['sh_sb_icon'][$i];
			
			$entry = array(
				'title' => esc_html( $title ),
				'link' => esc_url_raw( $link ),
				'icon' => esc_url_raw( $icon )
			);
			
			$items[] = $entry;
			
		endfor;
		
		update_option( 'sh_sb_items', $items );
		
		// Show titles only?
		
		if( array_key_exists( 'sh_sb_title_only', $_POST ) && $_POST['sh_sb_title_only'] == 'on' ):
			
			// Display titles
			update_option( 'sh_sb_title_only', 'yes' );
			
		else:
			// Display images
			update_option( 'sh_sb_title_only', 'no' );
			
		endif;
	?>
	
		<div id="message" class="updated">
			<p><?php _e( 'Items updated', 'shaken' ); ?></p>
		</div>
		
	<?php endif;
	
}

// Find icon images
// There is likely a better way to do this that I don't know of
function sh_sb_get_icons($local, $url) {
	
	if( is_dir( $local.'images/sb-icons' )):
	
		$images = scandir( $local.'images/sb-icons' );
		$output = '';
		
		if( $images !== false ):
			
			$output .= '<ul class="sh_sb-icons-list">';
			
			// Loop through and display each image
			foreach( $images as $image ):
				
				// Strip out '.' and '..'
				if ( $image != "." && $image != ".." ){
					$output .= '<li class="icon-preview"><img src="'.$url.'images/sb-icons/'.$image.'" /></li>';
				}
			
			endforeach;
			
			$output .= '</ul>';
			
		endif;
		
		return $output;

	else:
		return false;
	endif;
	
}