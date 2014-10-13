<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package wptemplate-gios-v1
 */
?>
	</div><!-- /.row -->

	</div><!-- #content -->

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

<?php wp_footer(); ?>



 

</body>
</html>
