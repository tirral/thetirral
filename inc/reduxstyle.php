<?php 

global $tirral_global;
 
?>



<style>
	

	
 h1.site-title a { color: <?php echo $tirral_global['opt-settings-color'];?>; }
    
 .site-header { border-top: 3px solid <?php echo $tirral_global['opt-settings-color'];?>;}
    
.jumbotron{ overflow:hidden; height:<?php echo $tirral_global['opt-jumbotron-height'] ?>px}	
	
   
    
#mainnav ul li a:hover { color: <?php echo $tirral_global['opt-settings-color'];?>; }	
#mainnav .page_item_has_children:hover:after{ color: <?php echo $tirral_global['opt-settings-color'];?>; }	 
#mainnav .current_page_item a { color: <?php echo $tirral_global['opt-settings-color'];?>; }
    
    
    
		
	
.telephone-wrapper span.icon { color: <?php echo $tirral_global['opt-settings-color'];?>;}
    
.go-top {background-color: <?php echo $tirral_global['opt-settings-color'];?>; border: 1px solid <?php echo $tirral_global['opt-settings-color'];?>;}	
    
.cart-contents:before{ color: <?php echo $tirral_global['opt-settings-color'];?>; }    
    
.cart-contents-count{border: 1px solid <?php echo $tirral_global['opt-settings-color'];?>; color: <?php echo $tirral_global['opt-settings-color'];?> !important }   
    
    
.go-top:hover { color: <?php echo $tirral_global['opt-settings-color'];?>; }	
.footer-info { color: <?php echo $tirral_global['opt-settings-color'];?>;}
#page-preloader{background-color: <?php echo $tirral_global['opt-preloader-bg-color'];?>;}	
	
	
h1 :not(a), h1.entry-title, h1.entry-title a, h1.page-title { color:<?php echo $tirral_global['opt-typography-h1']['color'];?>; 	font-style: <?php echo $tirral_global['opt-typography-h1']['font-style'];?>; 	font-family: <?php echo $tirral_global['opt-typography-h1']['font-family'];?>; 	font-size:<?php echo $tirral_global['opt-typography-h1']['font-size'];?>; 	text-align:<?php echo $tirral_global['opt-typography-h1']['text-align'];?>; 	line-height:<?php echo $tirral_global['opt-typography-h1']['line-height'];?>; 	}	
	
	


	
	
	
h2 :not(a), h2.entry-title a { color:<?php echo $tirral_global['opt-typography-h2']['color'];?>; 	font-style: <?php echo $tirral_global['opt-typography-h2']['font-style'];?>; 	font-family: <?php echo $tirral_global['opt-typography-h2']['font-family'];?>; 	font-size:<?php echo $tirral_global['opt-typography-h2']['font-size'];?>; 	text-align:<?php echo $tirral_global['opt-typography-h2']['text-align'];?>; 	line-height:<?php echo $tirral_global['opt-typography-h2']['line-height'];?>; 	}
	
h3 :not(a), h3.entry-title a {	color:<?php echo $tirral_global['opt-typography-h3']['color'];?>;	font-style: <?php echo $tirral_global['opt-typography-h3']['font-style'];?>; 	font-family: <?php echo $tirral_global['opt-typography-h3']['font-family'];?>; 	font-size:<?php echo $tirral_global['opt-typography-h3']['font-size'];?>; 	text-align:<?php echo $tirral_global['opt-typography-h3']['text-align'];?>; 	line-height:<?php echo $tirral_global['opt-typography-h3']['line-height'];?>; 	}	
	
h4 :not(a), h4.entry-title a {	color:<?php echo $tirral_global['opt-typography-h4']['color'];?>;	font-style: <?php echo $tirral_global['opt-typography-h4']['font-style'];?>; 	font-family: <?php echo $tirral_global['opt-typography-h4']['font-family'];?>; 	font-size:<?php echo $tirral_global['opt-typography-h4']['font-size'];?>; 	text-align:<?php echo $tirral_global['opt-typography-h4']['text-align'];?>; 	line-height:<?php echo $tirral_global['opt-typography-h4']['line-height'];?>; 	}	
	
h5 :not(a), h5.entry-title a { 	color:<?php echo $tirral_global['opt-typography-h5']['color'];?>;	font-style: <?php echo $tirral_global['opt-typography-h5']['font-style'];?>; 	font-family: <?php echo $tirral_global['opt-typography-h5']['font-family'];?>; 	font-size:<?php echo $tirral_global['opt-typography-h5']['font-size'];?>; 	text-align:<?php echo $tirral_global['opt-typography-h5']['text-align'];?>; 	line-height:<?php echo $tirral_global['opt-typography-h5']['line-height'];?>; 	}	
	
	
h6 :not(a), h6.entry-title a {	color:<?php echo $tirral_global['opt-typography-h6']['color'];?>;	font-style: <?php echo $tirral_global['opt-typography-h6']['font-style'];?>; 	font-family: <?php echo $tirral_global['opt-typography-h6']['font-family'];?>; 	font-size:<?php echo $tirral_global['opt-typography-h6']['font-size'];?>; 	text-align:<?php echo $tirral_global['opt-typography-h6']['text-align'];?>; 	line-height:<?php echo $tirral_global['opt-typography-h6']['line-height'];?>; 	}		
	
	
p {	
	color:<?php echo $tirral_global['opt-typography-p']['color'];?>;	
	font-style: <?php echo $tirral_global['opt-typography-p']['font-style'];?>; 	
	font-family: <?php echo $tirral_global['opt-typography-p']['font-family'];?>; 
	font-size:<?php echo $tirral_global['opt-typography-p']['font-size'];?>; 	
	text-align:<?php echo $tirral_global['opt-typography-p']['text-align'];?>; 
	line-height:<?php echo $tirral_global['opt-typography-p']['line-height'];?>; 
	word-spacing:<?php echo $tirral_global['opt-typography-p']['word-spacing'];?>; 
	letter-spacing:<?php echo $tirral_global['opt-typography-p']['letter-spacing'];?>;	
	
	}		
	
	
	
	.widget-area h2 { color:<?php echo $tirral_global['opt-typography-widget']['color'];?>; 	
		font-style: <?php echo $tirral_global['opt-typography-widget']['font-style'];?>; 	
		font-family: <?php echo $tirral_global['opt-typography-widget']['font-family'];?>; 	
		font-size:<?php echo $tirral_global['opt-typography-widget']['font-size'];?>; 	
		text-align:<?php echo $tirral_global['opt-typography-widget']['text-align'];?>; 	
		line-height:<?php echo $tirral_global['opt-typography-widget']['line-height'];?>; 	
	
	}
	
	.widget-area a, .widget-area .textwidget, #calendar_wrap {	
	color:<?php echo $tirral_global['opt-typography-a']['color'];?>;	
	font-style: <?php echo $tirral_global['opt-typography-a']['font-style'];?>; 	
	font-family: <?php echo $tirral_global['opt-typography-a']['font-family'];?>; 
	font-size:<?php echo $tirral_global['opt-typography-a']['font-size'];?>; 	
	text-align:<?php echo $tirral_global['opt-typography-a']['text-align'];?>; 
	line-height:<?php echo $tirral_global['opt-typography-a']['line-height'];?>; 
	word-spacing:<?php echo $tirral_global['opt-typography-a']['word-spacing'];?>; 
	letter-spacing:<?php echo $tirral_global['opt-typography-a']['letter-spacing'];?>;	
	
	}
	
	
	
	
@media (max-width: 700px) {
	h1 :not(a), h1.entry-title, h1.entry-title a, h1.page-title { 
	font-size: 33px;
	line-height: 52px; } 
	
		.jumbotron{ overflow:hidden; height:auto}
	
	
	
	}	
	
	
	
	
	
<?php echo $tirral_global['opt-ace-editor-css'];?>	
	
	
</style>


