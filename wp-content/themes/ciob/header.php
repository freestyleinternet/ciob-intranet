<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title><?php wp_title(''); ?></title>
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
    <script type="text/javascript" src="//use.typekit.net/boi5zyt.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<!--[if lt IE 8]>
	    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
	<![endif]-->
	<div class="topbar">
        <div class="wrapper">
            <a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_directory'); ?>/assets/images/cibo-logo.svg" alt="CIOB"/></a>	
            <div class="styled-select">
            <select>
            	  <option>Qucik Links</option>
                <option>Option 1</option>
                <option>Option 2</option>
                <option>Option 3</option>
            </select>
            </div>
            <?php get_search_form(); ?> 
        </div>
    </div>

    <header>
        <div class="wrapper">
            <h1><a class="logo" href="<?php echo home_url( '/' ); ?>">INTRANET</a></h1>
            <p class="date">16 June 2014 12:10:45</p>
            <button>LOG OUT</button>
			 <p>Saul Townsend is logged in</p>   
        </div>
    </header>
    
    <nav>
    	<div class="wrapper">
			<?php 
			wp_nav_menu(array(
					
					'container'      => false,
					'menu_class'     => 'inline',
					'walker'         => new main_menu_walker()
					)
			);
			?>
		</div>
	</nav>

		
