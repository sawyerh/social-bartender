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
		
		<div id="poststuff" class="metabox-holder has-right-sidebar">
		
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
											<input type="text" value="<?php echo $icon; ?>" name="sh_sb_icon[]" />
										</td>
										<td><input type="text" value="<?php echo $link; ?>" name="sh_sb_link[]" class="sh_sb_link" /></td>
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
										
										<td colspan="2"><input type="submit" id="sh_sb_update" class="button button-highlighted" name="sh_sb_update" value="Update" /></td>
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
			
			<!-- ######  Sidebar ###### -->
			
			<div id="side-info-column" class="inner-sidebar">
				<div id="side-sortables">
					
					<div class="postbox">
						<h3><?php _e( 'Create New Item', 'shaken' ); ?></h3>
						
						<div class="inside">
							
							<form action="" method="post" id="create-form">
								
								<p><label for="sh_sb_link"><?php _e( 'Link', 'shaken' ); ?><span class="required">*</span></label>
								<input type="text" value="http://" name="sh_sb_link" id="sh_sb_link" /></p>
								
								<p><label for="sh_sb_title"><?php _e( 'Title', 'shaken' ); ?></label>
								<input type="text" value="" name="sh_sb_title" id="sh_sb_title" /></p>
								
								<p class="sh_sb-border-bottom"><label for="sh_sb_icon_new"><?php _e( 'Image URL', 'shaken' ); ?></label>
								<input type="text" value="" name="sh_sb_icon" id="sh_sb_icon_new" />
								
								<a href="#" id="upload_image_button" class="button-secondary"><?php _e( 'Upload Image', 'shaken' ); ?></a></p>
								
								<p><input type="submit" name="sh_sb_new_item" id="sh_sb_new_item" value="<?php _e( 'Create Item', 'shaken' ); ?>" class="button-primary" /></p>
																
							</form>
							
						</div><!-- #inside -->
						
					</div><!-- #postbox -->
					
				</div><!-- #side-sortables -->
			</div><!-- #side-info-column -->
			
		</div><!-- #poststuff -->				
		
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
		
		<div id="message" class="updated fade">
			<p><?php _e( 'Item added', 'shaken' ); ?></p>
		</div>
		
	<?php endif;
	
	
}

function sh_sb_check_update(){

	if( array_key_exists( 'sh_sb_update', $_POST ) ):
		
		//print_r($_POST);
		
		$items = '';
		
		$length = count( $_POST['sh_sb_title'] );
		
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
	
		<div id="message" class="updated fade">
			<p><?php _e( 'Items updated', 'shaken' ); ?></p>
		</div>
		
	<?php endif;
	
}