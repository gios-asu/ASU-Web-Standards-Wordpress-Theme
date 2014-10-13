<?php
/**
 * The Sidebar containing ONLY BOOTSTRAP EXAMPLES FOR THE STYLES (OR STYLE) PAGE.
 *
 * @package wptemplate-gios-v1
 */
?>
  
<style >



 
	 
#sidebar-test-fixed.affix-top {
    position: static; 
   }
#sidebar-test-fixed.affix {
    position: static;
   }
 


@media screen and (min-width: 768px) {
	 
  #sidebar-test-fixed.affix {
    position: fixed;
    top:70px;
   }

}

 
  
</style>

	<div id="secondary" class="widget-area row col-sm-3" role="complementary">
		
		
		<div id="sidebar-test-fixed" class="bs-docs-sidebar hidden-print affix-top" role="complementary" data-spy="affix" data-offset-top="380" >
 		 
                
              	<ul class="nav nav-stacked" id="sidebar">
                  <li>
                    <a href="#sec0">Theme 1</a>
                  	<ul class="nav">
                      <li class=""><a href="#sec0a">- Sub 1</a></li>
                      <li class=""><a href="#sec0b">- Sub 2</a></li>
                    </ul>
                  </li>
                  <li>
                    <a href="#sec1">Theme 2</a>
                    <ul class="nav">
                      <li class=""><a href="#sec1a">- Sub 1</a></li>
                      <li class=""><a href="#sec1b">- Sub 2</a></li>
                      <li class=""><a href="#sec1c">- Sub 3</a></li>
                    </ul>
                  </li>
                   <li><a href="#sec3">Theme 3</a>
                   	 <ul class="nav">
                      <li class=""><a href="#sec1a">- Sub 1</a></li>
                      <li class=""><a href="#sec1b">- Sub 2</a></li>
                      <li class=""><a href="#sec1c">- Sub 3</a></li>
                    </ul>
                   </li>
                  <li><a href="#sec4">Theme 4</a></li>
              	</ul>
              
      		</div>  
		
	 
	</div><!-- #secondary -->
