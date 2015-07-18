<!--<form action="" enctype="multipart/form-data" method="post" id="usp_form">
		<div class="usp-callout-failure usp-hidden" id="usp-error-message"></div>
		<div class="usp-callout-success usp-hidden" id="usp-success-message"></div>
				
		<fieldset class="usp-name">
			<input type="text" class="usp-input" required="" data-required="true" placeholder="Enter Your Name" value="" name="user-submitted-name">
		</fieldset>
				
		<fieldset class="usp-title">
			<input type="text" class="usp-input" required="" data-required="true" placeholder="Enter Image Title" value="" name="user-submitted-title">
		</fieldset>
				
		<fieldset class="usp-tags">
			<input type="text" class="usp-input" required="" data-required="true" placeholder="Enter Image Tags: Ex. Choke, Armbar, Open Mat" value="" name="user-submitted-tags">
		</fieldset>
				
		<fieldset class="usp-captcha">
			<input type="text" class="usp-input exclude user-submitted-captcha" required="" data-required="true" placeholder="Type Nemesis here to prove you aren't spam!" value="" name="user-submitted-captcha">
		</fieldset>
						
		<fieldset class="usp-images">
			
			<div id="usp-upload-message"><p>Image Upload</p></div>
			<div id="user-submitted-image">
								
				<input type="file" class="usp-input usp-clone exclude" size="25" name="user-submitted-image[]">
				<a class="usp-js" id="usp_add-another" href="#" style="display: none;">Add another image</a>							
			</div>
			<input type="hidden" value="0" id="usp-min-images" name="usp-min-images" class="usp-hidden exclude">
			<input type="hidden" value="1" id="usp-max-images" name="usp-max-images" class="usp-hidden exclude">
		</fieldset>
						
		
		<div id="usp-submit">
															
			<input type="hidden" value="team-submit" name="user-submitted-category" class="usp-hidden exclude">
						
			<input type="submit" value="Submit Post" id="user-submitted-post" name="user-submitted-post" class="exclude">
			<input type="hidden" value="abdbf39952" name="usp-nonce" id="usp-nonce">		</div>
		
	</form>
-->
<?php // User Submitted Posts - HTML5 Submission Form

if (!function_exists('add_action')) die();

global $usp_options, $current_user; 
if ($usp_options['disable_required']) {
	$required = ''; 
	$captcha = '';
	$files = '';
} else {
	$required = ' data-required="true" required';
	$captcha = ' user-submitted-captcha'; 
	$files = ' usp-required-file';
} ?>

<!-- User Submitted Posts @ http://perishablepress.com/user-submitted-posts/ -->
<div id="user-submitted-posts">
	<?php if ($usp_options['usp_form_content'] !== '') echo $usp_options['usp_form_content']; ?>
	
	<form id="usp_form" method="post" enctype="multipart/form-data" action="">
		<div id="usp-error-message" class="usp-callout-failure usp-hidden"></div>
		<div id="usp-success-message" class="usp-callout-success usp-hidden"></div>
		<?php echo usp_error_message();
		
		if (isset($_GET['success']) && $_GET['success'] == '1') :
			echo '<div id="usp-success-message">'. $usp_options['success-message'] .'</div>';
		else :
			
		if (($usp_options['usp_name'] == 'show') && ($usp_options['usp_use_author'] == false)) { ?>
		
		<fieldset class="usp-name">
			<input name="user-submitted-name" type="text" value="" placeholder="<?php _e('Your Name', 'usp'); ?>"<?php echo $required; ?> class="usp-input">
		</fieldset>
		<?php } if (($usp_options['usp_url'] == 'show') && ($usp_options['usp_use_url'] == false)) { ?>
		
		<fieldset class="usp-url">
			<input name="user-submitted-url" type="text" value="" placeholder="<?php _e('Image URL', 'usp'); ?>"<?php echo $required; ?> class="usp-input">
		</fieldset>
		<?php } if ($usp_options['usp_email'] == 'show') { ?>
		
		<fieldset class="usp-email">
			<input name="user-submitted-email" type="text" value="" placeholder="<?php _e('Email', 'usp'); ?>"<?php echo $required; ?> class="usp-input">
		</fieldset>
		<?php } if ($usp_options['usp_title'] == 'show') { ?>
		
		<fieldset class="usp-title">
			<input name="user-submitted-title" type="text" value="" placeholder="<?php _e('Image Title', 'usp'); ?>"<?php echo $required; ?> class="usp-input">
		</fieldset>
		<?php } if ($usp_options['usp_tags'] == 'show') { ?>
		
		<fieldset class="usp-tags">
			<input name="user-submitted-tags" type="text" value="" placeholder="<?php _e('Image Tags: ex. armbar, open mat, promotion', 'usp'); ?>"<?php echo $required; ?> class="usp-input">
		</fieldset>
		<?php } if ($usp_options['usp_captcha'] == 'show') { ?>
		
		<fieldset class="usp-captcha">
			<input name="user-submitted-captcha" type="text" value="" placeholder="<?php _e('Type &quot;Nemesis&quot; to prove you are human.', 'usp'); ?>"<?php echo $required; ?> class="usp-input exclude<?php echo $captcha; ?>">
		</fieldset>
		<?php } if (($usp_options['usp_category'] == 'show') && ($usp_options['usp_use_cat'] == false)) { ?>
		
		<fieldset class="usp-category">
			<label for="user-submitted-category"><?php _e('Post Category', 'usp'); ?></label>
			<select name="user-submitted-category"<?php echo $required; ?> class="usp-select">
				<option value=""><?php _e('Select a category..', 'usp'); ?></option>
				<?php foreach($usp_options['categories'] as $categoryId) { $category = get_category($categoryId); if (!$category) { continue; } ?>
				
				<option value="<?php echo $categoryId; ?>"><?php $category = get_category($categoryId); echo sanitize_text_field($category->name); ?></option>
				<?php } ?>
				
			</select>
		</fieldset>
		<?php } if ($usp_options['usp_content'] == 'show') { ?>
		
		<fieldset class="usp-content">
			<?php if ($usp_options['usp_richtext_editor'] == true) { ?>
			
			<div class="usp_text-editor">
			<?php $settings = array(
				    'wpautop'          => true,  // enable rich text editor
				    'media_buttons'    => true,  // enable add media button
				    'textarea_name'    => 'user-submitted-content', // name
				    'textarea_rows'    => '10',  // number of textarea rows
				    'tabindex'         => '',    // tabindex
				    'editor_css'       => '',    // extra CSS
				    'editor_class'     => 'usp-rich-textarea', // class
				    'teeny'            => false, // output minimal editor config
				    'dfw'              => false, // replace fullscreen with DFW
				    'tinymce'          => true,  // enable TinyMCE
				    'quicktags'        => true,  // enable quicktags
				    'drag_drop_upload' => true, // enable drag-drop
				);
				wp_editor('', 'uspcontent', apply_filters('usp_editor_settings', $settings)); ?>
				
			</div>
			<?php } else { ?>
				
			<label for="user-submitted-content"><?php _e('Post Content', 'usp'); ?></label>
			<textarea name="user-submitted-content" rows="5" placeholder="<?php _e('Post Content', 'usp'); ?>"<?php echo $required; ?> class="usp-textarea"></textarea>
			<?php } ?>
			
		</fieldset>
		<?php } if ($usp_options['usp_images'] == 'show') { ?>
		<?php if ($usp_options['max-images'] !== 0) { ?>
		
		<fieldset class="usp-images">
			<div id="usp-upload-message"><p><?php echo $usp_options['upload-message']; ?></p></div>
			<div id="user-submitted-image">
			<?php // upload files
			$minImages = intval($usp_options['min-images']);
			$maxImages = intval($usp_options['max-images']);
			$addAnother = $usp_options['usp_add_another'];
			
			if ($addAnother == '') $addAnother = '<a href="#" id="usp_add-another" class="usp-no-js">' . __('Add another image', 'usp') . '</a>';
			if ($minImages > 0) : ?>
				<?php for ($i = 0; $i < $minImages; $i++) : ?>
						
				<input name="user-submitted-image[]" type="file" size="25"<?php echo $required; ?> class="usp-input usp-clone<?php echo $files; ?> exclude">
				<?php endfor; ?>
				<?php if ($minImages < $maxImages) : echo $addAnother; endif; ?>
			<?php else : ?>
					
				<input name="user-submitted-image[]" type="file" size="25" class="usp-input usp-clone exclude">
				<?php echo $addAnother; ?>
			<?php endif; ?>
				
			</div>
			<input class="usp-hidden exclude" type="hidden" name="usp-min-images" id="usp-min-images" value="<?php echo $usp_options['min-images']; ?>">
			<input class="usp-hidden exclude" type="hidden" name="usp-max-images" id="usp-max-images" value="<?php echo $usp_options['max-images']; ?>">
		</fieldset>
		<?php } ?>
		<?php } ?>
		
		<fieldset id="coldform_verify" style="display:none;">
			<label for="user-submitted-verify"><?php _e('Human verification: leave this field empty.', 'usp'); ?></label>
			<input class="exclude" name="user-submitted-verify" type="text" value="">
		</fieldset>
		<div id="usp-submit">
			<?php if (!empty($usp_options['redirect-url'])) { ?>
			
			<input class="usp-hidden exclude" type="hidden" name="redirect-override" value="<?php echo $usp_options['redirect-url']; ?>">
			<?php } ?>
			<?php if ($usp_options['usp_use_author'] == true) { ?>
			
			<input class="usp-hidden exclude" type="hidden" name="user-submitted-name" value="<?php echo $current_user->user_login; ?>">
			<?php } ?>
			<?php if ($usp_options['usp_use_url'] == true) { ?>
			
			<input class="usp-hidden exclude" type="hidden" name="user-submitted-url" value="<?php echo $current_user->user_url; ?>">
			<?php } ?>
			<?php if ($usp_options['usp_use_cat'] == true) { ?>
			
			<input class="usp-hidden exclude" type="hidden" name="user-submitted-category" value="<?php echo $usp_options['usp_use_cat_id']; ?>">
			<?php } ?>
			
			<input class="exclude" name="user-submitted-post" id="user-submitted-post" type="submit" value="<?php _e('Submit Image', 'usp'); ?>">
			<?php wp_nonce_field('usp-nonce', 'usp-nonce', false); ?>
		</div>
		
		<?php endif; ?>

	</form>
</div>
<script>(function(){var e = document.getElementById('coldform_verify'); if(e) e.parentNode.removeChild(e);})();</script>
<!-- User Submitted Posts @ http://perishablepress.com/user-submitted-posts/ -->
