<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php generic_schema_type(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
<!-- 	<meta name="viewport" content="width=device-width" />	-->
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="HandheldFriendly" content="true">
		<?php wp_head(); ?>
		<script src="https://kit.fontawesome.com/33e27af28f.js" crossorigin="anonymous"></script>
		<link rel="preload" href="https://img6.wsimg.com/ux/fonts/depot/1.0/DepotNew.woff2" as="font" type="font/woff2" crossorigin=""/>
		<link rel="preload" href="https://img6.wsimg.com/ux/fonts/depot/1.0/DepotNewBold.woff2" as="font" type="font/woff2" crossorigin="">
<!-- If Frontpage or 'Advanced Search' page -->
		<?php if ( is_front_page() || is_page('Advanced Search') ) { echo '
			<link href="https://fonts.googleapis.com/css?family=Lato:400,600,700" rel="stylesheet" />
			<link href="/wp-content/themes/kurdishdb_one/css/advancedsearch.css" rel="stylesheet" />
			<script src="/wp-content/themes/kurdishdb_one/js/advancedsearch/extention/choices.js"></script>
		'; } ?>
<!-- If Frontpage or 'Advanced Search' page -->
<!-- If 'Recently Added' page -->
<?php if ( is_page('Recently Added') ) { echo '<link href="/wp-content/themes/kurdishdb_one/css/displayposts.css" rel="stylesheet" />'; } ?>
<!-- If 'Recently Added' page -->
<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=G-B94MER8NSG"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());

			gtag('config', 'G-B94MER8NSG');
		</script>
<!-- Global site tag (gtag.js) - Google Analytics -->		

	</head>
	<body <?php body_class(); ?>>
		<nav>
			<div class="topnav-left"><?php ubermenu( 'main' , array( 'theme_location' => 'main-menu' ) ); ?>
			</div>
			<div class="topnav-right"><?php ubermenu( 'main' , array( 'theme_location' => 'login-menu' ) ); ?>
			</div>
		</nav>
		<div class="submenuspacing"></div>
		<?php wp_body_open(); ?>
