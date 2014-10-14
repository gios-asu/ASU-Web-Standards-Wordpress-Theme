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
		          	$cOptions = get_option( 'wordpress_asu_theme_options' );

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
	          <p><a class="contact-link" href="#">Contact Us</a></p>
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
	          <button type="button" class="btn btn-primary">Contribute</button>
	        </div>
	        <div class="col-md-2 col-sm-3 space-bot-md">
	          <h2 data-toggle="collapse" data-target="#academics-menu">Academics</h2>
	          <ul class="big-foot-nav collapse" id="academics-menu">
	            <li><a class="" href="#">Departments</a></li>
	            <li><a class="" href="#">Executive Education</a></li>
	            <li><a class="" href="#">MBA Degrees</a></li>
	            <li><a class="" href="#">Master's Degrees</a></li>
	            <li><a class="" href="#">Ph.D. Programs</a></li>
	          </ul>
	        </div>
	        <div class="col-md-2 col-sm-3 space-bot-md">
	          <h2 data-toggle="collapse" data-target="#connect-menu">Connect</h2>
	          <ul class="big-foot-nav collapse" id="connect-menu">
	            <li><a class="" href="#">Calendar of Events</a></li>
	            <li><a class="" href="#">Contact Us</a></li>
	            <li><a class="" href="#">Employment</a></li>
	            <li><a class="" href="#">School Directory</a></li>
	            <li><a class="" href="#">School Store</a></li>
	          </ul>
	        </div>
	        <div class="col-md-2 col-sm-3 space-bot-md">
	          <h2 data-toggle="collapse" data-target="#impact-menu">Impact</h2>
	          <ul class="big-foot-nav collapse" id="impact-menu">
	            <li><a class="" href="#">China Programs</a></li>
	            <li><a class="" href="#">Invest</a></li>
	            <li><a class="" href="#">KnowWPC</a></li>
	            <li><a class="" href="#">News Releases</a></li>
	            <li><a class="" href="#">Research Centers</a></li>
	          </ul>
	        </div>
	        <div class="col-md-2 col-sm-3 space-bot-md">
	          <h2 data-toggle="collapse" data-target="#people-menu">People</h2>
	          <ul class="big-foot-nav collapse" id="people-menu">
	            <li><a class="" href="#">Alumni</a></li>
	            <li><a class="" href="#">Current Students</a></li>
	            <li><a class="" href="#">Faculty &amp; Staff</a></li>
	            <li><a class="" href="#">International Students</a></li>
	            <li><a class="" href="#">Media</a></li>
	          </ul>
	        </div>
	      </div><!-- /.row -->
	    </div><!-- /.container -->
	  </div><!-- /.big-foot -->

	  <div class="little-foot">
	    <div class="container">
	      <div class="row">
	        <div class="col-md-12">
	          <ul class="little-foot-nav">
	            <li><a class="" href="#">Copyright &amp; Trademark</a></li>
	            <li><a class="" href="#">Accessibility</a></li>
	            <li><a class="" href="#">Privacy</a></li>
	            <li><a class="" href="#">Emergency</a></li>
	            <li><a class="" href="#">Contact ASU</a></li>
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






	<footer id="colophon" class="site-footer" role="contentinfo">
 		<div class="container">
 		
      <div class="row row-padding-cancel">
		
			<div class="col-md-4">
			<?php if ( dynamic_sidebar('left-footer') ) : else : endif; ?>
			</div>
			<div class="col-md-4">
			<?php if ( dynamic_sidebar('center-footer') ) : else : endif; ?>
			</div>
			<div class="col-md-4">			
			<?php if ( dynamic_sidebar('right-footer') ) : else : endif; ?>
			</div>
			
      </div>		
 		</div><!-- .container -->
	</footer><!-- #colophon -->
	
	
	
	
</div><!-- #page -->





 

</body>
</html>
