<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package asu-wordpress-web-standards
 */
?>
	</div><!-- /.row -->

	</div><!-- #content -->

	</div><!-- #page -->	
</div><!-- #page-wrapper -->

<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @author Global Insititue of Sustainability
 * @author Ivan Montiel
 * 
 * @package asu-wordpress-web-standards
 */
?>

	<div class="footer">
	  <div class="big-foot">
	    <div class="container">
	      <div class="row">
	        <div class="col-md-4 col-sm-12 space-bot-md">
	          <h1><?php bloginfo( 'description' ); ?></h1>
	          <address>
	          	<?php
                if ( is_array( get_option( 'wordpress_asu_theme_options' ) ) ) {
                  $cOptions = get_option( 'wordpress_asu_theme_options' );
                }

		          	//  =============================
							  //  = Address                   =
							  //  =============================
	              // Do we have an address?
	              if (isset($cOptions) && 
	                  array_key_exists('address', $cOptions) &&
	                  $cOptions['address'] !== '') {

	              	echo nl2br($cOptions['address']);
	              }
              ?><br/>
              <?php
              	//  =============================
							  //  = Phone                     =
							  //  =============================
              	$phone = 'Phone: <a class="phone-link" href="tel:%1$s">%1$s</a><br>';

              	// Do we have a phone number?
              	if (isset($cOptions) && 
	                  array_key_exists('phone', $cOptions) &&
	                  $cOptions['phone'] !== '') {

	              	echo sprintf($phone, $cOptions['phone']);
	              }
              ?>
              <?php
              	//  =============================
							  //  = Fax                       =
							  //  =============================
              	$fax = 'Fax: <a class="phone-link" href="tel:%1$s">%1$s</a><br>';

              	// Do we have a fax number?
              	if (isset($cOptions) && 
	                  array_key_exists('fax', $cOptions) &&
	                  $cOptions['fax'] !== '') {

	              	echo sprintf($fax, $cOptions['fax']);
	              }
              ?>
	          </address>
	          <?php
	            //  =============================
						  //  = Contact Us Email or URL   =
						  //  =============================
	          	$contactURL = '<p><a class="contact-link" href="%1$s%2$s%3$s">Contact Us</a></p>';

	          	// Do we have a contact?
            	if (isset($cOptions) && 
                  array_key_exists('contact', $cOptions) &&
                  $cOptions['contact'] !== '') {

            		$type = '';
            		$contact = $cOptions['contact'];
            		$additional = '';

            		if ( filter_var( $contact, FILTER_VALIDATE_EMAIL ) ) {
            			$type = 'mailto:';

            			//  =============================
								  //  = Contact Us Email Subject  =
								  //  =============================

            			// Do we have a subject line?
            			if (array_key_exists('contact_subject', $cOptions) &&
		                  $cOptions['contact_subject'] !== '') {

            				$additional .= '&subject=' . rawurlencode($cOptions['contact_subject']);
            			}

            			//  =============================
								  //  = Contact Us Email Body     =
								  //  =============================

            			// Do we have a body?
            			if (array_key_exists('contact_body', $cOptions) &&
		                  $cOptions['contact_body'] !== '') {

            				$additional .= '&body=' . rawurlencode($cOptions['contact_body']);
            			}

            			// Fix the additional part
            			if ( strlen( $additional ) > 0 ) {
            				$additional = substr_replace( $additional, '?', 0, 1 );
            			}
            		}

              	echo sprintf($contactURL, $type, $contact, $additional);
              }
	          
	          ?>
	          <ul class="social-media">
	          	<?php
              	//  =============================
							  //  = Facebook                  =
							  //  =============================
              	$fb = '<li><a href="%1$s" title="Facebook"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>';

              	// Do we have a facebook?
              	if (isset($cOptions) && 
	                  array_key_exists('facebook', $cOptions) &&
	                  $cOptions['facebook'] !== '') {

	              	echo sprintf($fb, $cOptions['facebook']);
	              }
              ?>
	            <?php
              	//  =============================
							  //  = Twitter                   =
							  //  =============================
              	$twitter = '<li><a href="%1$s" title="Twitter"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>';

              	// Do we have a twitter?
              	if (isset($cOptions) && 
	                  array_key_exists('twitter', $cOptions) &&
	                  $cOptions['twitter'] !== '') {

	              	echo sprintf($twitter, $cOptions['twitter']);
	              }
              ?>
	            <?php
              	//  =============================
							  //  = Google+                   =
							  //  =============================
              	$googlePlus = '<li><a href="%1$s" title="Google+"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a></li>';

              	// Do we have a google+?
              	if (isset($cOptions) && 
	                  array_key_exists('google_plus', $cOptions) &&
	                  $cOptions['google_plus'] !== '') {

	              	echo sprintf($googlePlus, $cOptions['google_plus']);
	              }

              	//  =============================
							  //  = LinkedIn                  =
							  //  =============================
              	$linkedIn = '<li><a href="%1$s" title="LinkedIn"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>';

              	// Do we have a linkedin?
              	if (isset($cOptions) && 
	                  array_key_exists('linkedin', $cOptions) &&
	                  $cOptions['linkedin'] !== '') {

	              	echo sprintf($linkedIn, $cOptions['linkedin']);
	              }

              	//  =============================
							  //  = Youtube                   =
							  //  =============================
              	$youtube = '<li><a href="%1$s" title="Youtube"><i class="fa fa-youtube-square" aria-hidden="true"></i></a></li>';

              	// Do we have a youtube?
              	if (isset($cOptions) && 
	                  array_key_exists('youtube', $cOptions) &&
	                  $cOptions['youtube'] !== '') {

	              	echo sprintf($youtube, $cOptions['youtube']);
	              }
              ?>
	          </ul>
            <?php
              //  =============================
              //  = Contribute URL            =
              //  =============================
              $contribute = '<a type="button" class="btn btn-primary" href="%s">Contribute</a>';

              // Do we have a contribute?
              if (isset($cOptions) && 
                  array_key_exists('contribute', $cOptions) &&
                  $cOptions['contribute'] !== '') {

                echo sprintf($contribute, $cOptions['contribute']);
              }
            ?>
	          
	        </div>

	        <?php
	        wp_nav_menu( array(
              'menu'              => 'secondary',
              'theme_location'    => 'secondary',
              'depth'             => 2,
              'container'         => '',
              'walker'            => new wp_bootstrap_footer_navwalker(),
              'items_wrap'        => '%3$s')
            );
	        ?>
        </div><!-- /.row -->

        <?php 
          get_sidebar( 'sidebar' ); 
        ?>

	    </div><!-- /.container -->
	  </div><!-- /.big-foot -->

	  <div class="little-foot">
	    <div class="container">
	      <div class="row">
	        <div class="col-md-12">
	          <ul class="little-foot-nav">
	            <li><a class="" href="http://www.asu.edu/copyright/">Copyright &amp; Trademark</a></li>
	            <li><a class="" href="http://www.asu.edu/accessibility/">Accessibility</a></li>
	            <li><a class="" href="http://www.asu.edu/privacy/">Privacy</a></li>
	            <li><a class="" href="https://cfo.asu.edu/emergency">Emergency</a></li>
	            <li><a class="" href="https://contact.asu.edu/">Contact ASU</a></li>
	          </ul>
	        </div>
	      </div><!-- /.row -->
	    </div><!-- /.container -->
	  </div><!-- /.little-foot -->

	</div><!-- /.footer -->
	<!-- End Footer -->

	<?php wp_footer(); ?>
</body>
</html>
