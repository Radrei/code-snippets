<!--Basic navigation with mobile nav for WordPress. Put in header.php or nav.php.-->

<header class="main-header" role="banner" itemscope itemtype="http://schema.org/WPHeader">

	<div id="inner-header" class="wrapper">
		<a href="<?php echo home_url(); ?>" rel="nofollow" class="logo"><img src="<?php echo get_template_directory_uri(); ?>/library/images/logo.png" alt="logo" /></a>

		<nav id="desktop-nav" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
			<?php wp_nav_menu(array(
					 'container' => false,                           // remove nav container
					 'container_class' => 'menu cf',                 // class of container (should you choose to use it)
					 'menu' => __( 'The Main Menu', 'bonestheme' ),  // nav name
					 'menu_class' => 'nav top-nav cf',               // adding custom nav class
					 'theme_location' => 'main-nav',                 // where it's located in the theme
					 'before' => '',                                 // before the menu
					   'after' => '',                                  // after the menu
					   'link_before' => '',                            // before each link
					   'link_after' => '',                             // after each link
					   'depth' => 0,                                   // limit the depth of the nav
					 'fallback_cb' => ''                             // fallback function (if there is one)
			)); ?>
		</nav>
		<nav id="mobile-nav">
			<label for="menu-toggle" class="menu-btn"><i class="fa fa-bars"></i></label> 
			<input type="checkbox" id="menu-toggle"/>
				<?php wp_nav_menu(array(
					 'container' => false,                           // remove nav container
					 'container_class' => 'menu cf',                 // class of container (should you choose to use it)
					 'menu' => __( 'The Main Menu', 'bonestheme' ),  // nav name
					 'menu_class' => 'nav top-nav cf',               // adding custom nav class
					 'menu_id' => 'menu',
					 'theme_location' => 'main-nav',                 // where it's located in the theme
					 'before' => '',                                 // before the menu
					   'after' => '',                                  // after the menu
					   'link_before' => '',                            // before each link
					   'link_after' => '',                             // after each link
					   'depth' => 0,                                   // limit the depth of the nav
					 'fallback_cb' => ''                             // fallback function (if there is one)
				)); ?>
		</nav>
		<br class="clear">
	</div>
</header>

<!--Basic nav styles, put in custom.scss-->


/* Mobile Nav */
#mobile-nav{
	display: none;
    position: absolute;
    z-index: 1001;
	right: 0;
	top: 0;
    padding-top: 10px;
	text-align: right; /* Prevents menu button from moving on click */
	width: 100%;
}
#mobile-menu{
	display: none;
}
.menu-btn{
	text-align: right;
	margin-right: 30px;
	
	.fa{
		font-size: 40px;
		color: white;
	}
}
.nav-btn{
	display: none !important;
}
label {  
  cursor: pointer;
}
#menu-toggle {
	display: none; /* hide the checkbox */
}
#menu { /* ul */
	display: none;
	text-align: center;
	
	.sub-menu{
		margin: 0;
		li{
			border-top: 1px solid white;
			border-bottom: 0;
			background-color: #0379a7;
		}
	}
}
#menu-toggle:checked + #menu {
	display: block;	
	margin-top: 35px;
}
/* End Mobile Nav */

@media screen and (max-width: 1000px){
	#mobile-nav{
		display: block;
	}
	#desktop-nav{
		display: none;
	}
	.nav li{
		float: none !important;
		border-top: 1px solid white;
		
		&:first-of-type{
			border-top: 0;
		}
		&.current-menu-item{
			a{
				text-decoration: none;
			}
		}
	}
	/* Add an arrow after menu items that have sub menus */
	.menu-item-has-children > a:after{
		font-family: FontAwesome;
		content: '\f078'; /* fa-chevron-down */
		color: white;
		margin-left: 5px;
		margin-right: -5px;
		font-size: 14px;
	}
	/* Change the arrow by changing the link's class */
	.menu-item-has-children a.active-arrow:after{
		font-family: FontAwesome;
		content: '\f077'; /* fa-chevron-up */
	}
	.sub-menu{
		display: none;
	}
	nav{
		margin-top: 10px;
	}
	#menu-toggle:checked + #menu {
		margin-top: 15px;
	}
}

<!--Basic nav jQuery, add to scripts.js-->
/* Toggle sub menu items on mobile */
	if (screen.width < 1100) {
		jQuery(".menu-item-has-children").click(function(){
			jQuery(".sub-menu", this).toggle();
			jQuery(this).toggleClass('active'); 
			jQuery("> a", this).toggleClass('active-arrow');
		});
	}
