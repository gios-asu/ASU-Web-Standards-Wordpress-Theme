<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package asu-wordpress-web-standards
 */
?>
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

if ( is_array( get_option( 'wordpress_asu_theme_options' ) ) ) {
  $cOptions = get_option( 'wordpress_asu_theme_options' );
}
?>
  <div class="footer">
    <div class="big-foot">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-12 space-bot-md">
            <?php
            //  =============================
            //  = Logo                      =
            //  =============================
            // Do we have a logo?
            $logo = '<a class="footer-logo-link" href="%3$s"><img class="footer-logo" src="%1$s" alt="%2$s"/></a><br>';
            if ( isset( $cOptions ) &&
              array_key_exists( 'logo', $cOptions ) &&
              $cOptions['logo'] !== '' ) {
              echo wp_kses( sprintf( $logo, $cOptions['logo'], get_bloginfo( 'name' ) . ' Logo', home_url( '/' ) ), wp_kses_allowed_html( 'post' ) );
            } else {
              echo '<h2>' .wp_kses( get_bloginfo( 'description' ), wp_kses_allowed_html( 'post' ) ) . '</h2>';
            }
            ?>
            <span>
              <?php
              //  =============================
              //  = Text Below Logo in Footer =
              //  =============================
              // Do we want Text Below Logo in Footer?
              if ( isset( $cOptions ) &&
                     array_key_exists( 'campus_address', $cOptions ) &&
                     $cOptions['campus_address'] !== '' ) {
                echo wp_kses( nl2br( $cOptions['campus_address'] ), wp_kses_allowed_html( 'post' ) );
              }
              ?><br/>
              <?php
              //  =============================
              //  = Phone                     =
              //  =============================
              $phone = 'Phone: <a class="phone-link" href="tel:%1$s" id="phone-link-in-footer">%1$s</a><br>';

              // Do we have a phone number?
              if ( isset( $cOptions ) &&
                     array_key_exists( 'phone', $cOptions ) &&
                     $cOptions['phone'] !== '' ) {
                echo wp_kses( sprintf( $phone, $cOptions['phone'] ), wp_kses_allowed_html( 'post' ) );
              }
              ?>
              <?php
              //  =============================
              //  = Fax                       =
              //  =============================
              //$fax = 'Fax: <a class="phone-link" href="fax:%1$s">%1$s</a><br>';
              $fax = 'Fax: %1$s<br>';

              // Do we have a fax number?
              if ( isset( $cOptions ) &&
                     array_key_exists( 'fax', $cOptions ) &&
                     $cOptions['fax'] !== '' ) {
                echo wp_kses( sprintf( $fax, $cOptions['fax'] ), wp_kses_allowed_html( 'post' ) );
              }
              ?>
            </span>
            <?php
            //  =============================
            //  = Contact Us Email or URL   =
            //  =============================
            $contactURL = '<p><a class="contact-link" href="%1$s%2$s%3$s" id="contact-us-link-in-footer">Contact Us</a></p>';

              // Do we have a contact?
            if ( isset( $cOptions ) &&
                  array_key_exists( 'contact', $cOptions ) &&
                  $cOptions['contact'] !== '' ) {
              $type       = '';
              $contact    = $cOptions['contact'];
              $additional = '';

              if ( filter_var( $contact, FILTER_VALIDATE_EMAIL ) ) {
                $type = 'mailto:';

                //  =============================
                //  = Contact Us Email Subject  =
                //  =============================

                // Do we have a subject line?
                if ( array_key_exists( 'contact_subject', $cOptions ) &&
                     $cOptions['contact_subject'] !== '' ) {
                  $additional .= '&subject=' . rawurlencode( $cOptions['contact_subject'] );
                }

                //  =============================
                //  = Contact Us Email Body     =
                //  =============================

                // Do we have a body?
                if ( array_key_exists( 'contact_body', $cOptions ) &&
                     $cOptions['contact_body'] !== '' ) {
                  $additional .= '&body=' . rawurlencode( $cOptions['contact_body'] );
                }

                // Fix the additional part
                if ( strlen( $additional ) > 0 ) {
                  $additional = substr_replace( $additional, '?', 0, 1 );
                }
              }

              echo wp_kses( sprintf( $contactURL, $type, $contact, $additional ), wp_kses_allowed_html( 'post' ) );
            }

            ?>
            <ul class="social-media">
              <?php
              //  =============================
              //  = Facebook                  =
              //  =============================
              $fb = '<li><a href="%1$s" title="Facebook" id="facebook-link-in-footer" target="_blank"><span class="fa fa-facebook-square" aria-hidden="true"></span><span class="sr-only">Facebook</span></a></li>';

              // Do we have a facebook?
              if ( isset( $cOptions ) &&
                     array_key_exists( 'facebook', $cOptions ) &&
                     $cOptions['facebook'] !== '' ) {
                echo wp_kses( sprintf( $fb, $cOptions['facebook'] ), wp_kses_allowed_html( 'post' ) );
              }
              ?>
              <?php
              //  =============================
              //  = Twitter                   =
              //  =============================
              $twitter = '<li><a href="%1$s" title="Twitter" id="twitter-link-in-footer" target="_blank"><span class="fa fa-twitter-square" aria-hidden="true"></span><span class="sr-only">Twitter</span></a></li>';

              // Do we have a twitter?
              if ( isset( $cOptions ) &&
                     array_key_exists( 'twitter', $cOptions ) &&
                     $cOptions['twitter'] !== '' ) {
                echo wp_kses( sprintf( $twitter, $cOptions['twitter'] ), wp_kses_allowed_html( 'post' ) );
              }
              ?>
              <?php
              //  =============================
              //  = Google+                   =
              //  =============================
              $googlePlus = '<li><a href="%1$s" title="Google+" id="google_plus-link-in-footer" target="_blank"><span class="fa fa-google-plus-square" aria-hidden="true"></span><span class="sr-only">Google Plus</span></a></li>';

              // Do we have a google+?
              if ( isset( $cOptions ) &&
                     array_key_exists( 'google_plus', $cOptions ) &&
                     $cOptions['google_plus'] !== '' ) {
                echo wp_kses( sprintf( $googlePlus, $cOptions['google_plus'] ), wp_kses_allowed_html( 'post' ) );
              }

              //  =============================
              //  = LinkedIn                  =
              //  =============================
              $linkedIn = '<li><a href="%1$s" title="LinkedIn" id="linkedin-link-in-footer" target="_blank"><span class="fa fa-linkedin-square" aria-hidden="true"></span><span class="sr-only">LinkedIn</span></a></li>';

              // Do we have a linkedin?
              if ( isset( $cOptions ) &&
                     array_key_exists( 'linkedin', $cOptions ) &&
                     $cOptions['linkedin'] !== '' ) {
                echo wp_kses( sprintf( $linkedIn, $cOptions['linkedin'] ), wp_kses_allowed_html( 'post' ) );
              }



              //  =============================
              //  = Medium                  =  This is a temporary fix until Bootstrap 5
              //  =============================
              $medium = '<li><a href="%1$s" title="Medium" id="medium-link-in-footer" target="_blank">
              <img src="/wp-content/themes/ASU-Web-Standards-Wordpress-Theme/assets/asu-web-standards/img/footer/icon-medium.png" width="34px" style="margin-top:-7px;" />  </a></li>';

              // Do we have a Medium?
              if ( isset( $cOptions ) &&
                     array_key_exists( 'medium', $cOptions ) &&
                     $cOptions['medium'] !== '' ) {
                echo wp_kses( sprintf( $medium, $cOptions['medium'] ), wp_kses_allowed_html( 'post' ) );
              }

              //  =============================
              //  = Youtube                   =
              //  =============================
              $youtube = '<li><a href="%1$s" title="Youtube" id="youtube-link-in-footer" target="_blank"><span class="fa fa-youtube-square" aria-hidden="true"></span><span class="sr-only">Youtube</span></a></li>';

              // Do we have a youtube?
              if ( isset( $cOptions ) &&
                     array_key_exists( 'youtube', $cOptions ) &&
                     $cOptions['youtube'] !== '' ) {
                echo wp_kses( sprintf( $youtube, $cOptions['youtube'] ), wp_kses_allowed_html( 'post' ) );
              }

              //  =============================
              //  = Vimeo                     =
              //  =============================
              $vimeo = '<li><a href="%1$s" title="Vimeo" id="vimeo-link-in-footer" target="_blank"><span class="fa fa-vimeo-square" aria-hidden="true"></span><span class="sr-only">Vimeo</span></a></li>';

              // Do we have a vimeo?
              if ( isset( $cOptions ) &&
                     array_key_exists( 'vimeo', $cOptions ) &&
                     $cOptions['vimeo'] !== '' ) {
                echo wp_kses( sprintf( $vimeo, $cOptions['vimeo'] ), wp_kses_allowed_html( 'post' ) );
              }

              //  =============================
              //  = Instagram                 =
              //  =============================
              $instagram = '<li><a href="%1$s" title="Instagram" id="instagram-link-in-footer" target="_blank"><span class="fa fa-instagram" aria-hidden="true"></span><span class="sr-only">Instagram</span></a></li>';

              // Do we have a instagram?
              if ( isset( $cOptions ) &&
                     array_key_exists( 'instagram', $cOptions ) &&
                     $cOptions['instagram'] !== '' ) {
                echo wp_kses( sprintf( $instagram, $cOptions['instagram'] ), wp_kses_allowed_html( 'post' ) );
              }

              //  =============================
              //  = Flickr                    =
              //  =============================
              $flickr = '<li><a href="%1$s" title="Flickr" id="flickr-link-in-footer" target="_blank"><span class="fa fa-flickr" aria-hidden="true"></span><span class="sr-only">Flickr</span></a></li>';

              // Do we have a flickr?
              if ( isset( $cOptions ) &&
                     array_key_exists( 'flickr', $cOptions ) &&
                     $cOptions['flickr'] !== '' ) {
                echo wp_kses( sprintf( $flickr, $cOptions['flickr'] ), wp_kses_allowed_html( 'post' ) );
              }

              //  =============================
              //  = Pinterest                 =
              //  =============================
              $pinterest = '<li><a href="%1$s" title="Pinterest" id="pinterest-link-in-footer" target="_blank"><span class="fa fa-pinterest-square" aria-hidden="true"></span><span class="sr-only">Pinterest</span></a></li>';

              // Do we have a pinterest?
              if ( isset( $cOptions ) &&
                     array_key_exists( 'pinterest', $cOptions ) &&
                     $cOptions['pinterest'] !== '' ) {
                echo wp_kses( sprintf( $pinterest, $cOptions['pinterest'] ), wp_kses_allowed_html( 'post' ) );
              }

              //  =============================
              //  = RSS                       =
              //  =============================
              $rss = '<li><a href="%1$s" title="RSS"  id="rss-link-in-footer" target="_blank"><span class="fa fa-rss" aria-hidden="true"></span><span class="sr-only">RSS</span></a></li>';

              // Do we have a instagram?
              if ( isset( $cOptions ) &&
                     array_key_exists( 'rss', $cOptions ) &&
                     $cOptions['rss'] !== '' ) {
                echo wp_kses( sprintf( $rss, $cOptions['rss'] ), wp_kses_allowed_html( 'post' ) );
              }
              ?>
            </ul>
            <?php
            //  =============================
            //  = Contribute URL            =
            //  =============================
            $contribute = '<a type="button" class="btn btn-primary" href="%s"  id="contribute-button-in-footer">Contribute</a>';

            // Do we have a contribute?
            if ( isset( $cOptions ) &&
                   array_key_exists( 'contribute', $cOptions ) &&
                   $cOptions['contribute'] !== '' ) {
              echo wp_kses( sprintf( $contribute, $cOptions['contribute'] ), wp_kses_allowed_html( 'post' ) );
            }
            ?>

          </div>


          <?php
          wp_nav_menu(
              array(
                'menu'              => 'secondary',
                'theme_location'    => 'secondary',
                'depth'             => 2,
                'container'         => '',
                'walker'            => new WP_Bootstrap_Footer_Navwalker( 'secondary' ),
              )
          );
          ?>
        </div><!-- /.row -->
      </div><!-- /.container -->
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <?php dynamic_sidebar( 'footer' ); ?>
          </div>
        </div>
      </div>
    </div><!-- /.big-foot -->
    <div id="innovation-bar">
      <div class="container">
        <div class="row">
          <div class="col-md-10 space-top-sm space-bot-sm innovation-footer-text-wrapper">
            <a href="https://www.asu.edu/rankings" target="_blank" id="asu-is-number-1-for-innovation">ASU is #1 in the U.S. for Innovation</a>
          </div>
          <div class="hidden-sm hidden-xs col-md-2 innovation-footer-image-wrapper">
              <a href="https://www.asu.edu/rankings" target="_blank" id="best-colleges-us-news-badge-icon">
              <img src="<?php echo get_template_directory_uri() ?>/assets/asu-web-standards/img/footer/2020-best-colleges-us-news-badge.png" alt="Best Colleges U.S. News Most Innovative 2020">
            </a>
          </div>
        </div>
      </div>
    </div><!-- /#innovation-bar -->
    <div class="little-foot">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="little-foot__right">
              <ul class="little-foot-nav">
                <li><a href="http://www.asu.edu/copyright/" id="copyright-trademark-legal-footer">Copyright &amp; Trademark</a></li>
                <li><a href="http://www.asu.edu/accessibility/" id="accessibility-legal-footer">Accessibility</a></li>
                <li><a href="http://www.asu.edu/privacy/" id="privacy-legal-footer">Privacy</a></li>
                <li><a href="https://www.asu.edu/tou/" id="tou-legal-footer">Terms of Use</a></li>
                <li><a href="http://www.asu.edu/asujobs" id="jobs-legal-footer">Jobs</a></li>
                <li><a href="https://cfo.asu.edu/emergency" id="emergency-legal-footer">Emergency</a></li>
                <li><a href="https://contact.asu.edu/" id="contact-asu-legal-footer">Contact ASU</a></li>
              </ul>
            </div>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container -->
    </div><!-- /.little-foot -->

  </div><!-- /.footer -->
  <!-- End Footer -->

  <?php wp_footer(); ?>
</body>
</html>
