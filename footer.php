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

            <?php
            //  =============================
            //  = Campus Address            =
            //  =============================
            // Do we have an address?
            if ( isset( $cOptions ) &&
                 array_key_exists( 'campus_address', $cOptions ) &&
                 $cOptions['campus_address'] !== '' ) {
              $campus_address_option = $cOptions['campus_address'];

              echo '<address>';
              switch ( $campus_address_option ) {
                case 'Tempe':
                  echo 'Arizona State University - Tempe campus<br/>1151 S. Forest Ave.<br/>Tempe, AZ 85287 USA';
                  break;
                case 'Polytechnic':
                  echo 'Arizona State University - Polytechnic campus<br/>Power Road and Williams Field Road<br/>7001 E. Williams Field Road<br/>Mesa, AZ 85212';
                  break;
                case 'Downtown Phoenix':
                  echo 'Arizona State University - Downtown Phoenix<br/>411 N. Central, Suite 520<br/>Phoenix, AZ 85004';
                  break;
                case 'West':
                  echo 'Arizona State University - West campus<br/>4701 West Thunderbird Road<br/>PO Box 37100<br/>Phoenix, AZ 85069-7100';
                  break;
                case 'Research Park':
                  echo 'Arizona State University - Research Park<br/>8750 S Science Dr<br/>Tempe, AZ 85284';
                  break;
                case 'Skysong':
                  echo 'Arizona State University - SkySong<br/>1475 N. Scottsdale Rd, Suite 200<br/>Scottsdale, Arizona 85257-3538';
                  break;
                case 'Lake Havasu':
                  echo 'Arizona State University - Lake Havasu<br/>100 University Way<br/>Lake Havasu City, AZ 86403';
                  break;
              }

              echo '</address><br/>';
            }
            ?>
            <address>
              <?php
              //  =============================
              //  = School Address            =
              //  =============================
              // Do we have an address?
              if ( isset( $cOptions ) &&
                     array_key_exists( 'address', $cOptions ) &&
                     $cOptions['address'] !== '' ) {
                echo wp_kses( nl2br( $cOptions['address'] ), wp_kses_allowed_html( 'post' ) );
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
            </address>
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
              $fb = '<li><a href="%1$s" title="Facebook" id="facebook-link-in-footer"><i class="fa fa-facebook-square" aria-hidden="true"></i><span class="sr-only">Facebook</span></a></li>';

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
              $twitter = '<li><a href="%1$s" title="Twitter" id="twitter-link-in-footer"><i class="fa fa-twitter-square" aria-hidden="true"></i><span class="sr-only">Twitter</span></a></li>';

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
              $googlePlus = '<li><a href="%1$s" title="Google+" id="google_plus-link-in-footer"><i class="fa fa-google-plus-square" aria-hidden="true"></i><span class="sr-only">Google Plus</span></a></li>';

              // Do we have a google+?
              if ( isset( $cOptions ) &&
                     array_key_exists( 'google_plus', $cOptions ) &&
                     $cOptions['google_plus'] !== '' ) {
                echo wp_kses( sprintf( $googlePlus, $cOptions['google_plus'] ), wp_kses_allowed_html( 'post' ) );
              }

              //  =============================
              //  = LinkedIn                  =
              //  =============================
              $linkedIn = '<li><a href="%1$s" title="LinkedIn" id="linkedin-link-in-footer"><i class="fa fa-linkedin-square" aria-hidden="true"></i><span class="sr-only">LinkedIn</span></a></li>';

              // Do we have a linkedin?
              if ( isset( $cOptions ) &&
                     array_key_exists( 'linkedin', $cOptions ) &&
                     $cOptions['linkedin'] !== '' ) {
                echo wp_kses( sprintf( $linkedIn, $cOptions['linkedin'] ), wp_kses_allowed_html( 'post' ) );
              }

              //  =============================
              //  = Youtube                   =
              //  =============================
              $youtube = '<li><a href="%1$s" title="Youtube" id="youtube-link-in-footer"><i class="fa fa-youtube-square" aria-hidden="true"></i><span class="sr-only">Youtube</span></a></li>';

              // Do we have a youtube?
              if ( isset( $cOptions ) &&
                     array_key_exists( 'youtube', $cOptions ) &&
                     $cOptions['youtube'] !== '' ) {
                echo wp_kses( sprintf( $youtube, $cOptions['youtube'] ), wp_kses_allowed_html( 'post' ) );
              }

              //  =============================
              //  = Vimeo                     =
              //  =============================
              $vimeo = '<li><a href="%1$s" title="Vimeo" id="vimeo-link-in-footer"><i class="fa fa-vimeo-square" aria-hidden="true"></i><span class="sr-only">Vimeo</span></a></li>';

              // Do we have a vimeo?
              if ( isset( $cOptions ) &&
                     array_key_exists( 'vimeo', $cOptions ) &&
                     $cOptions['vimeo'] !== '' ) {
                echo wp_kses( sprintf( $vimeo, $cOptions['vimeo'] ), wp_kses_allowed_html( 'post' ) );
              }

              //  =============================
              //  = Instagram                 =
              //  =============================
              $instagram = '<li><a href="%1$s" title="Instagram" id="instagram-link-in-footer"><i class="fa fa-instagram" aria-hidden="true"></i><span class="sr-only">Instagram</span></a></li>';

              // Do we have a instagram?
              if ( isset( $cOptions ) &&
                     array_key_exists( 'instagram', $cOptions ) &&
                     $cOptions['instagram'] !== '' ) {
                echo wp_kses( sprintf( $instagram, $cOptions['instagram'] ), wp_kses_allowed_html( 'post' ) );
              }

              //  =============================
              //  = Flickr                    =
              //  =============================
              $flickr = '<li><a href="%1$s" title="Flickr" id="flickr-link-in-footer"><i class="fa fa-flickr" aria-hidden="true"></i><span class="sr-only">Flickr</span></a></li>';

              // Do we have a flickr?
              if ( isset( $cOptions ) &&
                     array_key_exists( 'flickr', $cOptions ) &&
                     $cOptions['flickr'] !== '' ) {
                echo wp_kses( sprintf( $flickr, $cOptions['flickr'] ), wp_kses_allowed_html( 'post' ) );
              }

              //  =============================
              //  = RSS                       =
              //  =============================
              $rss = '<li><a href="%1$s" title="RSS"  id="rss-link-in-footer"><i class="fa fa-rss" aria-hidden="true"></i><span class="sr-only">RSS</span></a></li>';

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
                'walker'            => new WP_Bootstrap_Footer_Navwalker(),
                'items_wrap'        => '%3$s',
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
    <div class="little-foot">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="little-foot__innovate-image-wrapper pull-left">
              <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJYAAACUCAYAAABxydDpAAAACXBIWXMAAAsTAAALEwEAmpwYAAA59GlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMwNjcgNzkuMTU3NzQ3LCAyMDE1LzAzLzMwLTIzOjQwOjQyICAgICAgICAiPgogICA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPgogICAgICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgICAgICAgICB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iCiAgICAgICAgICAgIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIKICAgICAgICAgICAgeG1sbnM6cGhvdG9zaG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjAvIgogICAgICAgICAgICB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIKICAgICAgICAgICAgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIKICAgICAgICAgICAgeG1sbnM6dGlmZj0iaHR0cDovL25zLmFkb2JlLmNvbS90aWZmLzEuMC8iCiAgICAgICAgICAgIHhtbG5zOmV4aWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20vZXhpZi8xLjAvIj4KICAgICAgICAgPHhtcDpDcmVhdG9yVG9vbD5BZG9iZSBQaG90b3Nob3AgQ0MgMjAxNSAoTWFjaW50b3NoKTwveG1wOkNyZWF0b3JUb29sPgogICAgICAgICA8eG1wOkNyZWF0ZURhdGU+MjAxNS0xMC0wMVQxMToyNToyNC0wNzowMDwveG1wOkNyZWF0ZURhdGU+CiAgICAgICAgIDx4bXA6TW9kaWZ5RGF0ZT4yMDE1LTEwLTAxVDE0OjI5OjA2LTA3OjAwPC94bXA6TW9kaWZ5RGF0ZT4KICAgICAgICAgPHhtcDpNZXRhZGF0YURhdGU+MjAxNS0xMC0wMVQxNDoyOTowNi0wNzowMDwveG1wOk1ldGFkYXRhRGF0ZT4KICAgICAgICAgPGRjOmZvcm1hdD5pbWFnZS9wbmc8L2RjOmZvcm1hdD4KICAgICAgICAgPHBob3Rvc2hvcDpDb2xvck1vZGU+MzwvcGhvdG9zaG9wOkNvbG9yTW9kZT4KICAgICAgICAgPHhtcE1NOkluc3RhbmNlSUQ+eG1wLmlpZDozMjRhMjhhMi0xMDhiLTQ2NGYtYmJjMC1mZTQyZjdjMmJkYmM8L3htcE1NOkluc3RhbmNlSUQ+CiAgICAgICAgIDx4bXBNTTpEb2N1bWVudElEPmFkb2JlOmRvY2lkOnBob3Rvc2hvcDpkYTU4YjAzYi1hOTExLTExNzgtOWYwNS1lYjI5MzM2MDA4MzQ8L3htcE1NOkRvY3VtZW50SUQ+CiAgICAgICAgIDx4bXBNTTpPcmlnaW5hbERvY3VtZW50SUQ+eG1wLmRpZDo4OTFiMzExOS1hNWFjLTRkMDMtOTFkYy1hZjRhY2U2ZjIxYzg8L3htcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD4KICAgICAgICAgPHhtcE1NOkhpc3Rvcnk+CiAgICAgICAgICAgIDxyZGY6U2VxPgogICAgICAgICAgICAgICA8cmRmOmxpIHJkZjpwYXJzZVR5cGU9IlJlc291cmNlIj4KICAgICAgICAgICAgICAgICAgPHN0RXZ0OmFjdGlvbj5jcmVhdGVkPC9zdEV2dDphY3Rpb24+CiAgICAgICAgICAgICAgICAgIDxzdEV2dDppbnN0YW5jZUlEPnhtcC5paWQ6ODkxYjMxMTktYTVhYy00ZDAzLTkxZGMtYWY0YWNlNmYyMWM4PC9zdEV2dDppbnN0YW5jZUlEPgogICAgICAgICAgICAgICAgICA8c3RFdnQ6d2hlbj4yMDE1LTEwLTAxVDExOjI1OjI0LTA3OjAwPC9zdEV2dDp3aGVuPgogICAgICAgICAgICAgICAgICA8c3RFdnQ6c29mdHdhcmVBZ2VudD5BZG9iZSBQaG90b3Nob3AgQ0MgMjAxNSAoTWFjaW50b3NoKTwvc3RFdnQ6c29mdHdhcmVBZ2VudD4KICAgICAgICAgICAgICAgPC9yZGY6bGk+CiAgICAgICAgICAgICAgIDxyZGY6bGkgcmRmOnBhcnNlVHlwZT0iUmVzb3VyY2UiPgogICAgICAgICAgICAgICAgICA8c3RFdnQ6YWN0aW9uPnNhdmVkPC9zdEV2dDphY3Rpb24+CiAgICAgICAgICAgICAgICAgIDxzdEV2dDppbnN0YW5jZUlEPnhtcC5paWQ6MzI0YTI4YTItMTA4Yi00NjRmLWJiYzAtZmU0MmY3YzJiZGJjPC9zdEV2dDppbnN0YW5jZUlEPgogICAgICAgICAgICAgICAgICA8c3RFdnQ6d2hlbj4yMDE1LTEwLTAxVDE0OjI5OjA2LTA3OjAwPC9zdEV2dDp3aGVuPgogICAgICAgICAgICAgICAgICA8c3RFdnQ6c29mdHdhcmVBZ2VudD5BZG9iZSBQaG90b3Nob3AgQ0MgMjAxNSAoTWFjaW50b3NoKTwvc3RFdnQ6c29mdHdhcmVBZ2VudD4KICAgICAgICAgICAgICAgICAgPHN0RXZ0OmNoYW5nZWQ+Lzwvc3RFdnQ6Y2hhbmdlZD4KICAgICAgICAgICAgICAgPC9yZGY6bGk+CiAgICAgICAgICAgIDwvcmRmOlNlcT4KICAgICAgICAgPC94bXBNTTpIaXN0b3J5PgogICAgICAgICA8dGlmZjpPcmllbnRhdGlvbj4xPC90aWZmOk9yaWVudGF0aW9uPgogICAgICAgICA8dGlmZjpYUmVzb2x1dGlvbj43MjAwMDAvMTAwMDA8L3RpZmY6WFJlc29sdXRpb24+CiAgICAgICAgIDx0aWZmOllSZXNvbHV0aW9uPjcyMDAwMC8xMDAwMDwvdGlmZjpZUmVzb2x1dGlvbj4KICAgICAgICAgPHRpZmY6UmVzb2x1dGlvblVuaXQ+MjwvdGlmZjpSZXNvbHV0aW9uVW5pdD4KICAgICAgICAgPGV4aWY6Q29sb3JTcGFjZT42NTUzNTwvZXhpZjpDb2xvclNwYWNlPgogICAgICAgICA8ZXhpZjpQaXhlbFhEaW1lbnNpb24+MTUwPC9leGlmOlBpeGVsWERpbWVuc2lvbj4KICAgICAgICAgPGV4aWY6UGl4ZWxZRGltZW5zaW9uPjE0ODwvZXhpZjpQaXhlbFlEaW1lbnNpb24+CiAgICAgIDwvcmRmOkRlc2NyaXB0aW9uPgogICA8L3JkZjpSREY+CjwveDp4bXBtZXRhPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgIAo8P3hwYWNrZXQgZW5kPSJ3Ij8+GL913gAAACBjSFJNAAB6JQAAgIMAAPn/AACA6QAAdTAAAOpgAAA6mAAAF2+SX8VGAAA4OElEQVR42uydeXwTdfrH35OkSdo0bXpfHC1XOeRmVUQE1gtEV/fnAR4rKoqIKKLuCuKJIuIquioq6q7rsSrqCqgIqyiIcsl9Qzl6QWnpfebO/P5IOslkJukBWJU+r+bVycx3JpN8P/M8z/fzPN/nK4iiSLu0y6kWTftP0C7twGqXdmC1Szuw2qVd2oHVLu3Aapd2YLVLu7QDq13agdUu7cBql3ZpB1a7/NpF19yGHy3678l8TiJQ2v5zt7kMAba09uTrx1196oF1sjL0nD+QmdmpvWvbSCorq1jxzXftprBdzhBTeKqksLCQ7Tu2IggCAgIIeLcb3wP43ns3BQQBf1vvCb72vraB15HOx3cNQbqGtB14Le9u6VxBCHX9xvfe87yXFpTfI/A7yP6j3jbwOwWfF+KYdI/4v6Pvz/cdkX6/iAg98fHxv39gudwurFarBCY/eATZj+IHUJgOUTkvEEjBIPSDRt5hio4KBlaTnx/4cKiBvbnb4e8t9L4AoAcdF0XPmaGxhMBOUAVWaHBJbVWBFaSVgoEhA1qj1vFf85SASaGFWgGmZgBLqVHVtVgj2M4IYMk7RE0rhdBSgSAIpZVCgSeEBlN0VFjAhAacX1s0fp7cdAfuU26H0ZrhgBVGSwUel0zz7x5YAZ3YCJItW7bg8YjSw9UIAKQHTpC0XUJiApFGI2lpaRiMBqVWE2Ht2rWSfhQCfBzpZ1a9tuSkqJ4zaPAg4uLiVMG0Y+dOcnJyKC0tQxQ9mM1mevXqyaBBgzAajNQ31LP2p3UggFar5ZJLLkZAoKa2hiNHcgNAqASP2v7A+/VrKO+xnj17Yjab/cBqG1y1gSkUQBA0Mq307bff4XK5Wqz1OnXqyIUX/pGe2dkSuERRZOnSL0/5fXfq3Jn4+HgZsLZs2crHixZRXl6haL969Q8YjUZGjhzJsPOG8v4HHwBgNBq49NJLEBDIzc1j3rznTul9/v3vz9GnT58AEJ5RplDytlr9vUVRJD+/gHfffZ/LLx/L+cPOO6nrNduE+2592dfL+fzzxYSbjGKz2VixYgU//PCDzMuUjfROuQ8b7HudKRoLpX+VkZGB2+0GoLi4WKa90tPT0Wq1CAK4XG4qKyuwWm3ScbfbzVdfLaNLlyw6ZGQgCgKdO3eWftDS0jLq6+ul9qmpqRiNxgBTFzisCAQ+HDmSGwQq7/0ePnKEJUuWykBlsVjo1KkTRoOBuvp6CgoKqKurA8BqtSoAGkipNEpCQoIKsVmJx+Md2Wk0GuLj4xT3W1ZWJvsaMuf9zNFYSkf5ttsmSPtffvlV2Q81YcJNxJhjZD5GTk4OX3zxldTO7Xbz/vv/YebMh9AIAvfdd490vffe+4CtW7dK1xs//jq6deumGMGpOeCTJk0OMuHeYwsXviU9CAA33HA9l15yCRqtRjrf7XHz3Xff8/nni6mtrVUCC6U6eevNhXLgAbfeNpHKykoAEhMT+Ofbbyuc97FjL5c9uDLnvY1UlqYNcBXgvGukbY3KE0wQNSFovO169uzJlCmT0el0sic78LqawNFckMbUBA0ggj9DULkXIeCBaOxogPHjrmPM6NE+repvo9PqGH3ppTz55OPExsaGHhWHGdgofw/1e1b4sLJ2nBnAEmRmRQ4uVWAR1Nm+/zExZs4++w8yk3j8+HEZGar2w4YEVNB9CIJ6pxeXlMi01aDBg/0UQtA9Igikp6dz7733hABQmHuDJh40mgCnH4hnnClU462EEPREoM/QeH5wqMLpcCpYdkJ0XnPYcbXz6urkZk2jEeTACg7BCBAfFxdiEKCmFQni7FD3zwIpCVXNeqYBKzg2GMSgq3aoGhMtQHFxiaxdly5ZCkJT5YKqhKgaMfr4449J95iWloogCKSkpChohevHj/dTKCqxvbi4OO68cxICoNXqQmokCVRNaCwFwFQfnEYG7gwBliCgIEgD43zhfKzAgG1DQz2bN2+W2kVGRoYOIIfwleRhIiWznpWVqdBkFosFg8GA3W4H4KuvlmGOjuaiiy/CZDKpAis6OpqLL75YyZAH35sgNAks1bBNCDonlHvx+48VqoRYVH9sjbetiDeIXVdbz8uvvCJrN2rUSLnz6/dkQwO7iVFhqO3OnTqRc/CgdM2PPl7ERx8vokePHlxz9dV0696NqMhItDqderjFt92hQwa33Xqrn+EXBMWIT52ukYdtJt85SdL2jZqVNh4VtpGPpVHG9QRVD4vZs59u8opdu3ZlzOhLZRonVMes+fEn9uzdiyxQJAslQZzFwkUXXxQSWE888Th3Tr5LQSPk5OTwzNy50vvRoy/lumuvxWyOQatVaqPU1FSuuurKsNkK6hocGXCuueZa2T5C+IlniPPePGA1JRdd+Eeu+vNVQZohsGPk19y4cWOT1+zcuTMX++J5obTXyy+/xLRp06mpqQl5nRUr/seKFf9Dp9Nxy4QJjB17mTKFRwVMQhhyMxhY6qZRCDsA+P3zWBr5UL81pMvK775n5sxZ2O0OdRrhZMI3IWgEQRCIjIxi4cLXmXr3FPR6fdhruVwu3v7nP7n9jklBroAKfSDIkwhVxh2KkXXggAbF9c6YkA6yLx6swYJ/iOuvH48pKkrSFEePHmX//gPk5uVJbWpra5n58CzmzZvrC9f4QRGMrA4ZGURGRSrCIoGSmprarNwpjaBlxIgRnD98ODarlWVfL+err76UhZwCpby8nKn33MtrC15tVh6VKr2rmtiIUludaaPCJhPxgqR3717ExsRIHdC/fz/GXj4Wh8PBfz/7nLXr1gFgt9uZM2cuTz89O6wZ+MtfbqJHdo8WJOU1nYin0+kwm81cP34c48ZdR319Pfn5+XzwwQfk5ByUfX5hYSGffPoZ4667TgkOFYCp8noIqj6VGsDO0JCOMryiapI0SlbcaDRy/fXjSU3180plZWWqJjFUOEUeAWjFdvDnCAJarZbYmBj69e3Hc/Pm8c47/2LQoIGye/jiiy+CzCsqZi1A66rQJfIRcJD5DHHu7zukE2D7A0M1MpI0FLcT9NLptFx77bVSW1EUWbt2rTweGILJD//ShD0+4ZZbmTDhFm6ecAsNDQ1BPp1fA2s0GhISEpg1axbR0dHSLdTU1DQDqIT5PVA/j6BjnEEay+9jaYIAowmtscALFBXNERcULtm7Z69Ci4QjSMN16jNz5/LMM3OZ88xcCgoLpXtvaGiQXoR1wr0vg17PFVdcIXsADh85HBQBUHfIQ4Z0gsM2KtqqLbWWri2wLAhhJj+oEoKaED6FoMw8FQgyI+phE+VkCiWlsHPnLum8hvoGVdNaVVWFOTpanTEP0CJRkZEh4ppKXoom6AZV2iEE1dBWOe9tMmE18MnUNDuar57ess7nvDfKoEGD5E9sGB8PARWfJlR2A6r7X3hhPg6nU31eYoAG27V7l4IrU/WpkGu9cCGxprTVGeW8q5kKuYPelE/k13gHcnJYvdqf9qvVajl/2LCmBwNN+VKEcfqD9ufl5fH6628gimLIh+DQocP8/PMm6RyTyUS0OTqsv0QoDkqFp1IMRGh7571Nct414SaIhgAiAogekfKKcsrKytm9ezfff79K1jY7O5sIfURQ1kQIukMlvUWRRRFiNBYsq1atoqSkmClTppCVmSkzS9u2b+eZZ55R1aqhKYLAfUH+aQgTrjrljDMo552gDkUQuP/+B3E6naqtH3poZrOuGhsby/Tp0xA9IrfcdlvIdk899XSrbzvcBIi9e/cxdeo9ZGVlkZWVhQDkHMyhsPCorJ3ZbGbGjIcCJjrIgZSbl8usWY/IfLhGKS0rY9z4cZLv9cILz9O5U2dZnFMZIzyTZukQekJBa/y1vn3P4vaJE9FH6PGcpinljWmIwbc7bNh5rF+/QZrwkJubS25uruo1LBYLf3/uOfQR+pAOu9PppLi4WPV8b5as/5jb5VbRUEFzJs+oeYUajYx1b6lERESQkJBA1y5dGDHyAnr06BGQgSqcTkWruN977rmH4cOH89FHH5Ofn696qlarZei55zJt2r1YLHEhA8m0cBQnqM2+hl/FqLDtEv0CgPXwwzPB5/yGrMTi+31SUlLQaXUhQzBajZbn5j2roA/ks6KbmlWszNNKTk6WHOuHZ86QMicijZFcMHw4Iy64gG3bt7Nh/QaOFx/H5XITGRlJjx49GDVyBOnpGc3wpwQyMjJ46qnZBM7+ls3iDvCtpJimipYSzsx8LDmw0lJTmlUXoXm1ELzzFJtdF4HQiXih6iKcd94w1RjdoIEDGTxokBKYzYrpebdjYsyMuGBEyPSXlv4/g0aFrS+40VxgtajgBi0rCxTyuOq9hsiTCgO60KO7gFpeKsANZQrPHGCFSwU+JdVbQmxDiNJJNLPKSxitE1IT+eyTCDab3ZeXr8KON4NBDwecYFMoK3Zy5uW8K7VUUVERS5d+wfbtO/B4PFgsFq780xWcd955GI1GGVAcDgdrfvyRZcuWUVZWjlarZciQIdx00w0kJSbJOuOJJ57E4XTw2GOPeXO7VIDz97//ndLSMh584AF/3rgKsKZPv189VOT7/8orr0gdW15ezptvvcV333lrfxoMBibcfDPXXHMNBoNeAs/Ue+4JSbcIwN13382gQYMAyM/P57XXXmPNjz8C3mn5V155JTfdeKO3yowgKMI/Z5YpDNJSa378kffee18aRel0Oqqrq3n3vfdZsvQL5s2bS1RUFAICNruNGTNmUl5e4Q3yGgy43W42btzIxo0beeSRWfTt21cC8ZHcXGw2G6LHo66REMjLy6eoqAin0xHWdB7IyWlGuAoKC49yy623en9knQ69PgKbzc6bb73FJ59+ypIli33hLDhw4IA060dNauvqEASBDz74gFcXLAC8s5I0Gg21tbX861//YtGiRaxYvtw/Wwmk2hJtAbC24bE0cl9K9Ih8+OFHAFx33bWMGTPaO+u4uJi5c+dRXV3NksVLufGmGxAQWLx4KeXlFVgsFp6d+wyxllgQ4aV//IONG3/m6afn8OGH/yFCp1M8wUKI6VNCUMgklElslP+tWBHSXxIEgX+8/A8Ahg4dyjPPzEFAoLKygltvm0hVVRUffvghf7npLzLFt2TxYpKSk1R9q+rqal5dsABBEHhk1iyuuOIKb40It5v777+fdevXM3nyZN577z0ZqMQ2okjbLNEvMFC6eMkSXC4Xffr05rIxY6T96Wn+6ekbNm6Q9n/99dcAPPzwDGItFm/CoEbD9OnTMZlMABw5ckQZ21OLxQUlxaknACqDwoJq1UDvq6CgkG3bthMVFcVcH6gEAeITEnjVN21t0aJPFFmzqlkXNAaxdwPQp08f/vSnK6RjOp2ORx97zBu39PFooigiiiIeUYQ2WvO7bYLQsqwGgR9+WAPAZZddpggEd+/eDZ1OR1VVNWWlZRzxsdqJiYl06thJ1laj0XDVVVd6n/4lS9TBELKwRoADHCZPSsHHqQBs3759AAwcOFAR3E5OTgLA4XCgmAKveOj87yvKywM0q5yjivY9TE6nUwJV4OvMAJZKx7rd3pyqtADCT0pd1mhITk72xs2qq6XYmVS2Meg12Ofkbtu2XRE0DpWIp2oug1NPVNqhliCIQHGJN+ySlJioSGkx+vKyXC6X8rMVmZ/+99nZ2QAcPHRIBkrvjKFIVn77Lcu++gpPIKg8bQestnfeEXC7PVKoRo0ymDDhZurq6klNTaGgoADwllxUow4aayu43e4QwBIUjrvMt22KWpCNuNQ5qBJfTYmMjAyl/4WG/61YIaMRgkdxavRCr1696NmzJ/v37+eBBx9kwauvynyp2NhYv4ZqBBacQYl+KhojMKampk369e3LsPOGYom1eL1RwBRlUm2r1WplQVs1bYSaSVTTqDRHsynzoBp1hEajUU3EM5vNEjWg8LGC89cD8ufnPP00er2eDRs28KcrryQ/P19p9lS2zygeC5XZz6rlgBQVXGQXCsmm+30qtc9WY95V/BzVsItXbr1tooLDGjNmDNdff33QCBMqKip559//lrcXBP761wdl3/+uKVNkxeQa5dNPPgEgMzOT/372GXdPnUpBQQHXjRvHH//4R55+6imZP+XdbhwTnmE8VihgqdbOCgBWQ32DIjQUFlghNVZwyUZBprFC0QiNopbJ4K0qCPUNDTIA1dXVsXjxYkX7v/31rzKwFhYWhuTGGiUtLY2PPvyQRYsW8fIrr/DNN9+wZcsW5r8wnx7ZPWRm0IuuM6w+VmhgacJOEDVFm+QMvkrMMZheUAJNma4S7OCHius1ynvvvqsIocTExACCRHk0mty0tDTeeP11ibGfN28eubm5CuJy4Rtv+Ep+K0MygdooQq/npptuYvjwC3jk0Uc4cOAAk+6cxKJFi0hOSpIBSxDORFMYNNyWRkrh4nYqCyvJnWwUPlsQR6AaHFYAP+SUda907twpZOA4+LsajAb69+8vHY/yhZWC23fs2FEaAQfet8LM+UDTsWMHFi5cyMyZM1m/fj333HMPH3/0EaIIIo0+1qnpt9c2lHP9uNPgvN/wcQFvbqo4BTxWaIfb7fGoHn923nNMmnQn+/fvJ9qnserrG0JM8AwAlkarHM4jhKcRCE0jqHNiSpqgsZit1WZTn+QQNFCQAT9IS6m+PP5tvV7PjIceAuD48eMKUImnwM96fWM5P+XVn75R4erDdbyzpfKU0Q2BXBXgi/0pQy+lpaVUVlZijokhPi7eB6x6xYJPgiCwZ88eBTmpNiKFoOnpQQSu2pR1BS0RYspVamqqt6OLimTT0PyaL3SQOBhUjbzUD2vWcPvtt/PPf/4TEVFy0EVRlOrDu1wuOQA5eeb9rU0V/Jhb3+LzWkw3fHuwlve2Vp5SrXXOOecAsGPHDoVGcTidlJSUoNfrSU1JIaNDBuBdaEBtytTKlSsBGDlyRHiKQFCfvxeORlBqG1SnXHXv3h2AgoICFVpDoKq6WsbeB48uZRSBz/TVVFezc9cuDh46JO2jUTPJfl2x8c//v5Xyr80VrDpc98vxWCtyavnPtkqWHXEpXi1h4BtVwPjx1yEIAsuWLZOmrTd28orlK7Db7fTp0xu9Xk9CQgLdunWlvr6eL7/8Ujb6qq+rY+1a7wTWERdcoFJQg4A0ZdR9LISgNoGDRkFxMUVcD4Gz+vTBEhvL7j17OHTokAw1Bw8e5OjRo0FQQuFPBTPonTt7Z+Ps3bvXm6kh+rXWsaPHANDr9UoOq5Ua699bKlh5qK7VoGy1877sQC2YjYr9h6o8TBukbxZBKlUVtsTRvXs3cnIOMu2+6Vx11VVEGo0cyMlhzZo1aDQarrn6Gumcm268kSeenM2/3vk3x4tL6NevLxUVlXz44X8AGHruuRgMBgVb/uy8eeh0EQE8E1gscTz4wANSm1deecXrXAcASaPR8MycObJrzZgxU8ZXNcrf//4cRqORcePHs3DhQqbcfTe33347GenpHDx0iHfeeQedTieVBgjUWE88+aS8iJtPG02YMIGz+vQhKyuL3Nxcbps4kauuuoqkpCSKi4v5wLcA1JAhQwJ8rOb5V89vdrC1xC3f6XKAte6krNIpHxVuPO7mpa0O7gsBLlmmQIApefzxx5kz5xn279/Hu+++K7W3WCzcPvE2+pzlX9Fq0KBBTL37bv797rssW7aMZcuWSQAYMmQIjz32qOpIcfNm5QLuqSkpsjpU23fsULSRRpcB1/IvXaceC7355r+Ql5fHypUrmT9/vnQ8OzubCTffzMOzZil8rFBlLC+//HJEUeSFF15gxowZ5OTk8OKLL8rub8SIEcx+8kmfGfU77uEU1t83Odh2wn16Rv/NpfyFP7+o3GlOCtl+SKqW+wdL4Eoces4fSjMzO1FTU8OJEyUh04WLS0o4fPgwAgKJiYn06tUz5GKQbpeb/Qf2U1lRgUarZUD//sTExCrifPn5BYiIqrniuggdnTp25OixY7icLvWZxYKGLlmZgCDNGQxOa27c17VrVxmNUFpayvbt2wHo0KEDffr0weVyUVBQQJcuXbxa/vBhRI9HohECc6kQRVJSUiSKQhShvLyMrdu2gY/T6t+vP+YYs19LBfzX6rREm0yNq9gPAbYAzPvZzo7SEHMwXQ6wVivN9OLpbQ8sgEEpWh4copcDq7aG0hMnmjnRQX2lhmblpjfJoAdoM7XzaO4U9uB8c0E9qBxi1Nf0NpIGCtREBNIKEiCVbXQ6LdHR0TJgPbPRwe6yMJrqFADrtAaht5a4mfezQ9VUNO+lnroSqoiHoEIPhC24oVogtvkFN9SWE1bTwsH7xICwS6ATrrofMWyg2X+e3/QFAi9Ybzy13h4eVL9S5l0LyBa42VHqZu5GR/y/+zox1dqor7NTaXUhlV5VpP6GmXolW442qB3qaSxNTRAVBHXtIigms8on0AZqKbWwj3IbuUaRaRq/hgrWRJLPJNEHYtB/VLRWoMZyY0NHVZ2d2evtlv0VnmAz4wHKf13AcjlAJ3PSuwIHgpvtKnMz+Nn1tEuby0qVfXlAVuBIVM0M/iI8liTWai+42uX3I3Vlp+QyJ+9jWavBZW/vkN+D1JaeskudGufdWgNOW3vHtIPqNIwKbbXt4DrDzV9rnfeXgWt8Iz91cVi1RBibvFDJq9dI2+sOlfLnl35Qbfffey/g/B7e/KSfck5w9ctrZMcvOSuNl//yB5JjjBgjtGh8oy+by4PV4eKznwuY/p/NuDxKrm7HnLGkxvorGT/2+Q4Wfi9fRSJKryV3/p+l99e+uoY1+0+w99krSIkx0mfmVxRXW9nz7BU8vWQXr996DjMXbeOG87LQaQV6pcdSUF7PrE+38/7kYYgivP3DIe4Y2Y1LnvuOLbnllL9+nfeeHS56PvQlWcnRrJp5MQDf7j5Oaa2NG4Z6fetnvtzNw1echUcUWb69iGNV9Uwa1QOrw8Woud+y4fExABRVNpASG4nW94N0f3AJpbUh3BXR0xFRLGlG/2cDVadDY83ygSo59EtMaM6FkmOM0ivOFDquaInS+9tF+dtFaDWsffRS/ve3C8lOiyHOpCdSr8UQ4X3FRkaQGhvJ1IuzKVlwDdlpsYprJ0YbZPfx7HUDMUbInxlBEGRt9Drv8ZTYSPQ6Db3TYzDotByraOD+y3oRGxnBvZdk4/Z4yEw00XHa55gMOvp1tGBzujl8ooYBneKIjYxA5+v02MgIuj2wBL1OS0K0Aa0gIIoie45VkZloIjJCh9stUlXvQKsRqG5w8PX2Y5zTLZEHxvSm6wNLWL23hAnnd8UYoWHVvmJ6pMbQefpiIrQaBj26jLI6e1MUUXITr8iWgKqlwKoFxv8aNPecawdwXnc5HeN0e9iaV0FxtVW2P95kYMNjlxJtCK+cLVF63pp4bpOfPf7cTFxuD1qNhm9nXIRGgE9/zmdIZgL/WnOYnumx/POHwySZjbx2y9mkWSIprraRV1pHtCGCnw6cAOCvl/XmpRuHADD3ugGYDDpsTi9xeaLGRlW9g8MnvIHgY1UN7CysJMYYQY3Vycvf7GfUM99S1eDk7YnnMrp/OgeKqmlwuDl4vJZDJbXU2ZyASIPdfSqySL8/3TzWKsAGGNsSWLcO7ypt55fVc/YTyzlR4/fvkswG5l43kIkjunlBY9IzPDuZ5TuLwl73urM7M3/5Prblh86U/WxTAcVVVkRRRKPRoNEIvL8ul8Mn6thVWMl/1uXyU84JNh4upUO8iXlf7aGk2saWvHKOVVjplmLmxxwvuDyiyOIt3gkUb/1wiONVVmptTm56Yy37iqo5u0siJ2psJMd4f+7jVVb+u6mAzblePrP3jC/ok2Fh3ld72F5QyeHSOtYfLGXFriIEAS57fhUV9Sc9YvcAE083sAD2AIPbEliJZoO0XdXgkIEKoLTWzu3/3MDAzvHodV6l/IcuiU0CS6/T8NqEsxk6e0XINi63h9X7vS7Js+MG8o+bhtAxIQpLlB63R6S4ysqB4hpmLNrG93uLubBPKp/dc4EfvK+uYf0h+Qhsx9NjMQSY4THPf0+dzcX3e/2FbNc/NlpyG974Pod3fjzCY1f148LeqWTER0ka2eHyUFJtI6e4htveXo/DddLFfitoBTPfGmDdDWxoS2AdKqmlW4oZgLM6WPhoynDmfrmbnYXyzNbBj33drOvlldWTmejNpT+3WyK3j+zG26sPhWyfERfFj49cQlZStNxZ0QhkxEeRER/F+sdH8/zXe3lu2V6y02KkNo//uZ9iENKng0VytAGuHNSRl/63T3o/JCuBc7slSu83Hi5n0xNj6J5qVn04OiZE0TEhivwX/8yIOd+wxmd+WymLfim6YSNQ3ZbAmr9in6wzx5/bmR1zxnJiwTWsmnkxC289h3HnZhJjjGjW9V7/7gCF5Q3S+6evGaBw5ANlw+OjZaAqqmxg+Y5jrM0pxeUrF6DVCDx0eR/G9E9n0Ub/HMSh3eS+4bhzOstABTDloh6y9zcN80dcNhwuo1d6rAxUO30m+B/f7Gf5jmOyc5dMH+ldsKF14gYeOd10g+y3BS5tK2C9ueogWUnR/PWy3rL9SWYjI3sZGdkrhUmjvHnnS7YUcv+HW8ktrQ1N49hd3Pv+JhbfN8I76osx8vot5zD1vZ8Vbe8Y2Y0O8VF+YCz4kc82FeDxURod4qNYct8IBmd6B8gzrziLaR9sZtw5naURcUqMkRKf+X75L39QfEb3FDOdEkwUlHsnMYzqlSod+2RjPr3S/RqwpNrG2Y8vxx5g8v4yrAuP/7mv9N4QocHqaFVGw9GWjgZPFlgzgUtoo2m2bo/I3z7eyscb8rhzVHcuOiuNLkFmqVGuGtyRMf0z6DvzSw6WhAbXkq2FrNhVxOi+6QBcPzSTF5bvVbR7+E/+DtuaV8GJGhsXZCcHXeuoBKw+GbHkldXhcHnQ6zRoNQLPjhvErW+tQ6/TSI55o3/U6BMO7BxPQXk9XVPM9Oto8fp3HpEP1+dyYe806ZyUWCM1b45nc245B4pryC+t50BxDVfMX82+opM2LO//EgRpoGwDSoDUtjSJW/MquPMdbzqv2aBjWHYyg7Pi+UNWAlcM7CCZAINOwws3DOZPL64Oe70HPtzC6Lnp0jlL7hupaJMQwLsNyoyXyMxwkmDSs2DlAaaP7gXAZf29nyEzp1VWjlc2MDjLC8jJF3Zn6dZC2Qj4fzuLKKm2sXznMY5WNEiaU6/TcF73JAUFsy2/gsn//pmfD7eKWbcDz7e2b04mpPPj6QaOQcXPidBqGJKVIL26Jns7p9buYsXOIuYs3c1VL/1A0pTPqLf7Zw1dMbCDREqGkr3Hqnl66W7pfeO1T1Yi9Vo+WOdfBiUh2kC0IYIXrvcPrmd9up2Zn2yX3o/um44lSs/FZ/m108cb8gCorHcw8JFlvLX6IIfCaOGBnePZ+PjosCR0uDHSyfjSJ5OPNQO4+iTByYjsFHQaQRF2iTbq6BHgoDYejzbq2PTkGGn/piPlnP3EcuUYud5Orc2JKYAYNURocdnDT1F7Yfle7r64h4zpD5RqqxNzpHdQsHxHEZfPX+UtyRh0712S5M61Xqeh1neuViPw2J/7MnZAht98bimkqsFBdYODWN9nX9QnlUGZ8ZIf2Mh5WaL0aLUCj/53By73dqqtTnqnx9IzPYZh3ZM5u2sC53ZNlPlsPx9pMWPwr5Pp15MBRYGPLG2xfL65QD6enTqcAZ3iSDIbSDQbGNY9iZ8euZSkgOll8dF6HrmyLzef34VDJ+pk5ujW4V1JifW3jY2MYFj3JBk4rE4300f34pEr+5ISE5rfrWpwcMNrP4U8/uQS/4KWY/qnc+8l2ST5eDWtRiA7LYaPp5zPjjlj2TFnLN/PvEjynx5fvFM6936fWQSosTqpsXrLce87XiPtXzDhbEnLfrIxX9LA7915HsWvXEPxK9ew9tFLQfSC95ON+Uz7YBMXP/sd7oAHtVNiqzTvSVmkk9FYNwFRrTnxrn//zP8N6SS9/78hnWTvFdSvR2RwZgKDMxM4VtnAI5/t4J07hkqd+S/fdlizqtPw1NX9Afhy29Gwbb/dfZzNuRUMyYpXHHt79UGe+HNfMuK8X/3FG4fwoi80oyYLVvoTar/YepT5NwyW7lsC2X+2SFrvqcW7WPbgKGkE2SgfrD3i19K55VwxsAMA2Wkx1L09nv3HfbOrgX4d44J80fKTsUi/uMaa0doTT9TYuOz5VdJTGk6KqqwyLQHw7x8P88q3B3C6mw6COdweZn6yjWOV1haNOsctWBPyePbfvuBwGN+mUUO98u0BHv/cr6UOn6jlWGWDou2HG/z+19c7j1HVIM/KLa21sWpfSQDvlkNBRb3soenfMY7+HeMUoFqypZC80vrWdNPwk9FYrZ3+FYE3KG0I3Nkp0cyn941u/ocLMCQzfELEptxyYqMi6JHi5W6cbg/bCyolk9cjNSbs+TsLq7C73PTvGCcN5fccq6JHagwRWu/7/PJ6RVgIoHd6rMxHO1BcTY3V76MN6BQnXSNY8svqOVGrvGZmoklm4gE255bL5iyflRFLpN7/uSU1VgrK5YDUaQUGdooP+93r7E72FdWEbVNcWc+VL4SMUJzrI8SBX2Ze4T1487Nk0tVWzcbd/6FdfluSOGRKOCJ8aGuA1VpT+FB7d5wR0vOXdN41QEqog2JIsye03crX7eLtG0+LMx0swLXAp78EsOaHOu+IMZY/dB1MYp0yM+DTTz4js3NHnE4ndrujhdPZG8c7hJlgGthGWbdTDJrUqTbRU23KenDlFvVp7YGzjlUmkqpNMlVtF2a78azAJ1elNlawZ6PXR5CSlERlVRXXXjeO6uoq2fFjliYzoOadVmA9dU1/3yjNNsHjEcM4bd2x5v7Mrh+DHEKNBrRaBNGD4NY2oxZCiEUdm7FunzqYfD+6ELg/oEBZcLGygNJSimMINJbnFwVRVuBMRPCDQGg8R/B9rm92tihK+xBBFAQ/0AKmTUvb+M6Vnp3G7yL/vorFxUURBO/vjkaLR/Bm7TXKkMv+wuCkbuHNkyCk3j6y6+kzhZc9eBuAWZOUFNOc9jutDfwjVo3mElqnrVQB1RItFU47qdTtDPk/3HT3oLpUITVXsHYJtd0craRWqqjporZ311gZtOSD5nRlJG9yM/AeOzedNlP4kqe0tFkO/1nAbJudp5ItONXWoGmNtqJ5FVwUWopQwGpZ5ZbQ//02qmlzF+K4iulrEkCiSmk1selyaw+XVpHlcOGpbTa/NRd473QRpFcBN7bk4mkuN8+UVGJxe4J1lnrlFrVCsEHVWgQBpt13H6tWr5b2PTRjBsuWLcPlcjH9/vu59tpruf+BB3C5XFitDUy8/XbGjR/P888/zyeffsr1N1zPDTfcwA033sAbb7whAfKuKVOora1lwi23YLPZsNns3Dn5Thx2B7fcegtulxsRkSlTpmCz29m9azd3TLqDO+64nZ07d7L0i6WsWrVKAumTT87GI3rYtnUrjz72KJWVFUyaNIlJd07izjsncfeUuzmQk8OSJYuZPv0+GqxeEre09ARvv/1P5s9/gbvumsxdd03m0UcfDQKZmiYLDyq9R+TRE15QtVCST6fzvh04hxbmYFncHmaaLBa8EzEUpq+pOlNq5q6oqIgffviBP44aRUNDAytXrqR///4sXbqU3r168eQTT/DKq6+ybt06Pl60iNsn3k7v3r15cvaTjBo5ioULFzJt2jRmPTyLtLQ0CQhFRUW4XS7y8vL49NNPuPrqazh27Bgej4eCggJWrlzJxZdcIu2b/dRsXnrxJTyiyIwZDzFt2jRWr17NiBEjsdlslJWVAgKrf1hNVVUVsbEW5s+fz9qf1lJRWcHll1/BkcOHqampwel0UldXh9FoZP36DfTq1YuvvvqSiRNvp2PHjv41glTBE8r0ibJykTeJmhs6OV37WjmoNNKC2HBLgJXXmrtp6NaN0ql3JXYLph5a9F8JrpycHERRpLjYP+Fg5cqVvPjiS+h0Wu6aPJnZs2djNpux222Yok1MmTKF6Ohook0mNBoNUaYoDAaDVD6ocexlMplYvmIF/3f11VL3CILAy6+8zIUXXih1cHx8PKlpqSBCUlISsTGx5OTkACKHDx+iQ4cOgMiB/QcYNHgQeXm5ZGVmoTcYiIiIwBQVJXX72LFj2bVrF6NGjWLDhvXccccdAMTHx3sXFVBdcEkMXRlZBYDayZNzbC+9vN2Yl3/aqY3TWnitoUd3Cqfepea/qxf/D14AEhSLUUqa0GJBFEX27dvHhRde6N3evx+tTosoipjNMVTX1PDwzJm8umABb775Jhnp6cTHx/s7SKqFHuhwi5jNZnr27El5Wbk0uNJoNGRmZtJg9YZW8vLzyOycKflgEboIPKLHVz2vkkOHDjGg/wCOHj1KTGwsAwcM5KeffkIMpA4CBm8jR45izZofAJHS0lKpVvzOnTtYt24dh48cUdVS6tortEnMv+9erFlZv11gNWRnUzhlsipRqjSBagtAhqYRAM4//3x+3rSJb1eulOrE2+12xcqiUVFRvP/++97V4KdOpaGhQU4jBLVvPHb11Vfz+uuvE7jzb3/7m1R4126zozfog3gx6Nq1K3v37GXXrl3079+fgoIC+vfvR3JKCps3bw5ahkSU4GUwGDhw4AAOh5OkpCQMBm88sa6untraGmw2q1wbiSG0VDMidAXTpmLt2vW3B6z6ntkU3jUpNNeloqWUJlBQL6/oK5XYp08fli1b5l2Fy7e/Z3ZPqY3dbiMhIYHtO3bgcrmYOHEi6enpbN++PWQFPWlUB2R2zmTP3j2yfenp6axYsQKn00n3Ht05ePCgNOLzeNzoDQYGDBjA3n37KCk5QVJyEjt27OD771fxwgsvUFlZKdNScopBxGKxsGrV95x33jAJJEOHDuWSSy6ld+8+YbWRKLZscZOCe6bQ0K3rbwdY9T2zOTp5Utg2akuOqJtAOaA8AXRC506dWbVqFX379pU66Nyh53rNjQgfL1rEqJEjWbBgAUePHkUUITIyEo/HE1SjM5CW8NsnvV7P2LFjFS7NsGHDvEvnit6V5R12O06Xi7KyMpKTk+jbtx9r1/5ERkY6ogi7d+/hzYULmT9/PikpKVitDfLAV8DmsGHns2zZ1/Tu3Vt9xBdSS7VuDn3h1Ck0dO92WoB1SmuQ1mc3DapAPyvYMQ920BVPo+9/YmIi0dEmBg4cyNjLLqOsrAxBI3D52LHcN306y5cvp6amhueee470jAzmz59PREQEOq2Wvn37gghx8XFoNdpAOp2EhAQEQZDWprn88stZt8670kVSUhIiMOWuKezatQsEgSv/dCWzn5qN3W7nphtvQq83ACJpaWn069efivJyUlKSJZAMHz6cvXv3YTAYiIyMBER0ERFSqe2LL76Y775bKX1+bGwsCxe+gU6nIz4+nunT71cZ9Z2cFN59Fx1ffZ2oQ4dOKbCanTazNS2zaUddxafyiVSO2yN6EH0hodbG+UITnq0hQZsoGNvaOF9ThGcz4nxhGfRmmj69Xk9aaoqiznuwdHp1AZGHjoS91qDjeb+sKWzo1jUcqBTkaHP9KbUV2YNXvhJVS1OLASGaJspXhwSfqMK8hwBy8GJJYpAvJIoKf0psyukO44g3z59qmYksmHo31i6nbrR40sCyZmVROHVK81VkM/0pxYtQx5CBKHztcxUgBZ0jPxYaSGJQzE9UBY3a+6aogTB0QXP9qVYugFlw71RsvsWg2hRY1k6dKJg2taXWV9JSTYFKuSI7qqu0KwDWpLZSA5Kko8IASZSZY1kHBtMIYd+H6vwwDHoLtNTJ+F350+/F1qFD2znv9ox0Cu6f1nrnLoQvpb4d+KOL6quINuO/R/RQVVVNcXEJLpcLrVZLSnISsRYLjZkrHlGkpqaGkhOlOB1OdDodqanJmM3RMh/L7XJTVl5ORWUlPXv0kDrTbrdTWlpGXb03wBtnicVisRAREaHg4lrLoJ+Mz9UscD04ncznnsdQdPyXBZYjJZm8vz5wykGlnuIihlh9oYXrygAbNv5MZWU1RqMBjUaD0+kiL7+A1JQU+vfz1vbcs2cvRceLMRi8bTweD/kFBV4q4aw+WK1W9u7dLy1mCZDdowcgUl5ewc5de9DpdETodIhASckJNBoN557zB7QaTcvifM1Eiiie+gXF8/72IFlznkVfWvrLAMsZF0fuzJNPeW95iktLAKb8X3ziBJWV1ZzVpzcdMtIlzbPx580Ul5TQraELdruDouPFdOrUkR7du0ma5EDOQQqPHqO2ttZbyU+rpWuXLI4Xl3gX7vTdQ87Bw0RGRnL2kEFSEl5NTQ3btu+koLCQzGD/JZwv1bxfEfE0LlKfO2sGXZ94Cl1V1en1sdzR0Rx5/JFTB6qQDno4n6spx1yU+U6NxysqKtBqtSQlJsrMaGqKNyOkvr6e8nJvbLBH926yUE1X3/Jv+fmFmKOj6d/vLDp16ojOV+xWFMHhcGCz2ejQIUOW2RkTY+aC4cOCQBXKF2q+jySKpxdUjXL4iUdxm0ynT2MdeOmFU3azHplTHU5LKR3m1ibi9ezRw+cLyakDp9Pli9UZqas/7vWFgjisRv7W7nDIc9ADOtbl8k6+jdBpqaqqpqCwkOrqGuIsFrp164rBoP9NaCk1OTRnNt3/NrPtmPeWaKuw6cItTgdufrpw8ISHo8eOEW0yER1tkqXOBHZgowKqajQJQSAQRZH6em+QeO8+75R6S2ws0SYT5RUVlP9cwYD+fTGbzSfhI4knvXj4ycjB5+Yy5NcOLBQZBc0c8TVLWzXBmgcc275jF3a7gwH9+8mnv4QgN41GY5Mg6NIlkw4Z/ioybreHDRt/5vCRXO/ntEb7nMIR3y8lvziwvCWsNXhEEZfThSh6QoRsWqmVQoZf/PvcbjdbtmyjuqaGIYMHYo6ORgQiI41UVCpz0xvBZDQaQnZ2VJR3lQujwSADjlYjEBdnoa6uvlVgac2IT6PReDVmtDeh8XcNLJtDXm9cIwjo9V5ux+Px4HS5cLtcYbWRKpeFnyGXvDAVcDWeV1JSwt59Oeh0Os4fNtSbQeq7iMlkwuVyYbfZ0EsAEfH4JnrGx8WpahlRFDEajQiCQH29lcREeW6Xw+E87VpKp9OREB+HXq/3pzEHiMvt+l0Cq3Lbtp0X7dt3YLrZbB7bt08vUlKSZU+YQa9HjIhAFEWcTidOlws8LdFW4U1gfX09u/fspaamlu7dutChQwff0+xvY7FYANi+czdDBg9Ao9HgdnvYtt1bMaYxFSYUNxcXZ+HosaPEx8d5fTagvKKC2tpaEhLiT7mWioqKxGw2o4+IUAVTbV0dO3fuoay8YpPVap0P7P2lgNXs7IaPFv33VH2mBehl0OtvNZuj7+jZswcdMtIVqTL4TJbL5cJud+ARPQHOdfCs43Baygu4TZu3ykjNYElPTyO7R3efRjuAIAhotVpv/pYokp3dnZTkZFnnb9u+g9raOi4YPszL8Tkd7Ni5B6vVik6nQxRFXC4X0dEm+vU9qxlmKbw2EwSBaJMJszkanU6ner2iomIOHT5CeUXlNzab7Vm8K94e5xT4/dePu/pXDaxAMQG9tFrt+Lg4y8TOnTpYumRlotPpFE+wx+ORQOZyu8LP51OZw1dXV4fL5Q7RgSIRej2RRiMgYrc7sFqtuFxuNFoNkUYjhgDT2HhufX0DbrebmJjogHRnkfr6ehwOJ4IgoI+IIDIqUvXBaY7p02q1mKOjiYqKJCIiQnEd7wyiY+Tm5Tkrq6o/tNvt7+JNjak51Z31WwJWsAzWaDQXx8VZ7khLTenStUuW5BQHazK3243VZsPpdKrSCC2fIEoTE0Zp8QTR5tIIavUWok0mjMZIyQ+V+UsuF4eP5HLs2PHqisqqN51O55fAZsB6OjunJcD6xUeFTcgWj8ezpby84tny8opeu/fsG2WxxN6anJw0pFuXLGJjY6SnWKvVotfr8YgiTocDu8OBzWanVdPYW/w+vNkSmx/kk0BpNBowmUwYfVPDgqW+oYH8/AKOHjt+qLKy6gOPx/MVsANw8SsUHb9e2Qfsq6qqfq2qqjojJ+fQGJMp6v/S01Iv6tghI6LR+dcIAgaDAYPBQIzZ7Aut2LHb7f4CrydTwaWlE0Sb7cmIREZFYYqKwmg0qDrflVXVFBQUcry4ZF1lZdUS4Gu8i2T96uXXZgqb6/yPMRj0YztkpF+VnpZmSk9PVXVkHQ4Hdrsdm92Oy+UKYq6b1kqnOr1Fo9EQFRVJVGSkRE8ES8mJUo4ePcbx4pJvamvrPgW+wVuhus3lt2wKmyNVwEd2u+Ojw0fyDIeP5I3SarXXduyQMTotNSU9IyNNMiV6vR69Xo/ZbMblctFgteGw23E4Hc0quKGiZFoMqogIHZHGSKKiIgMGAHI5XlxCQeHRmqKi46ttNvunwOdAA79h0fHbFjuwwu12r8jLLxDy8guGAdenJCf9MTOzU8/UlGRpBoxOpyPGHA3maMnxt9lsOOwOPKfQnxIEgYiICCIjjURFRqLX61U0qZPSsjLy8wtP5BcUrgC+8oHJze9EdPx+RAR+An4qOVFKyYnSAcB1CQlxl3Xt0qVvUmK8xmw2S/xUtMlEtMmEKIpYrVZJm7k9Yov9KcHn50UajZhMUar+UoPVSmlpmZhfcPTIsWNFa4A3aeN1H9uB1TrZDmwvL698uLx8Szxwd4w5+vJu3br2S05ONMbGxKLRePPvo6KiJM1ms9mpb6j3Ov8ud0jTp9FqiYjQEW0yERUVpeov1dbWUVZW5jp0JG9PWVn5GuANfkH2ux1Yp18qgKdqauue2rpthxG41WAwjOvWNWtAh4z02FhLLFqf8280GqRgs9PppLa2DrvDgdPpRKvVoNcbMJmiiIpU8msej4f6+nqKjhfbDx48sru2rm4psBA4wRkmv8VR4amWKzUazdTMzp0G9OjeNdFkMqmSkqHE7XZTV1fP0WNFVfv25+Q5nc7XgHcBx+/th/q9jwpPtSz1eDxLj+TmcSQ3byDwdMcO6QN69spOj4mOVnW+XS4X9Q0NHDx4qOLwkfwdHo/ndVpRWbjdFJ45sg0YW3i0iMKjRR2Bh+Lj4q7u27d3ckJ8nKa+wcrefQfKjxYe3STCLGBr+0/WDqyWSiEwtaKycuoPa9Zq8S66/YrPX2uXU+VjtUu7tEQ07T9Bu7QDq13agdUu7cBql3ZpB1a7tAOrXdqB1S7t0g6sdmkHVru0A6td2qUdWO3ya5f/HwBfTqPaa77TtQAAAABJRU5ErkJggg==" alt="mostInnovative">
            </div>
            <div class="little-foot__right">
              <span class="little-foot__right__innovate">
                 <a href="http://yourfuture.asu.edu/rankings" target="_blank">Learn to thrive</a>
                 <br>
                 <span>#1 in the U.S. for innovation</span>
              </span>
              <ul class="little-foot-nav">
                <li><a href="http://www.asu.edu/copyright/" id="copyright-trademark-legal-footer">Copyright &amp; Trademark</a></li>
                <li><a href="http://www.asu.edu/accessibility/" id="accessibility-legal-footer">Accessibility</a></li>
                <li><a href="http://www.asu.edu/privacy/" id="privacy-legal-footer">Privacy</a></li>
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
