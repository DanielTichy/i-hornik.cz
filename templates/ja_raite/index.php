<?php
/*------------------------------------------------------------------------
# JA Raite for Joomla 1.5.x - Version 1.0 - Licence Owner jSharing
# ------------------------------------------------------------------------
# Copyright (C) 2004-2008 J.O.O.M Solutions Co., Ltd. All Rights Reserved.
# @license - Copyrighted Commercial Software
# Author: J.O.O.M Solutions Co., Ltd
# # Websites:  http://www.joomlart.com -  http://www.joomlancers.com
# This file may not be redistributed in whole or significant part.
-------------------------------------------------------------------------*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

include_once (dirname(__FILE__).DS.'ja_vars_1.5.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>"><head>
<!-- Mimic Internet Explorer 7 -->
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" >
<jdoc:include type="head" />
<?php JHTML::_('behavior.mootools'); ?>
<link rel="stylesheet" href="<?php echo $tmpTools->baseurl(); ?>templates/system/css/system.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $tmpTools->baseurl(); ?>templates/system/css/general.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $tmpTools->templateurl(); ?>/css/typo.css" type="text/css" />

<script language="javascript" type="text/javascript" src="<?php echo $tmpTools->templateurl(); ?>/js/ja.script.js"></script>

<?php if ($tmpTools->getParam('usertool_modfunc')) : ?>
<script language="javascript" type="text/javascript">
	var siteurl = '<?php echo $tmpTools->baseurl();?>';
	var tmplurl = '<?php echo $tmpTools->templateurl();?>';
</script>

<?php endif; ?>

<!-- Menu head --> 

<?php if ($jamenu) { $jamenu->genMenuHead(); } ?>
<link rel="stylesheet" href="<?php echo $tmpTools->templateurl(); ?>/css/addons.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $tmpTools->templateurl(); ?>/css/template.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $tmpTools->templateurl(); ?>/css/ja.bulletin.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $tmpTools->templateurl(); ?>/css/ja.newsflash.css" type="text/css" />
<link href="<?php echo $tmpTools->templateurl(); ?>/css/colors/<?php echo strtolower ($tmpTools->getParam(JA_TOOL_COLOR)); ?>.css" rel="stylesheet" type="text/css" />
<!-- http://www.ihornik.cz website customization by DWP Studio -->
<link rel="stylesheet" href="<?php echo $tmpTools->templateurl(); ?>/css/i_hornik_cz.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $tmpTools->templateurl(); ?>/css/i_hornik_cz_print.css" type="text/css" media="print" />

<?php if ($tmpTools->isIE()) { ?>
	<link href="<?php echo $tmpTools->templateurl(); ?>/css/ie.php" rel="stylesheet" type="text/css" />
    <link href="<?php echo $tmpTools->templateurl(); ?>/css/colors/<?php echo strtolower ($tmpTools->getParam(JA_TOOL_COLOR)); ?>-ie.php" rel="stylesheet" type="text/css" />
    <script type="text/javascript">
		window.addEvent ('load', makeTransBG);
		function makeTransBG() {
			makeTransBg($$('img'));
		}
	</script>
	<script type="text/javascript">
		var siteurl = '<?php echo $tmpTools->baseurl();?>';
	</script>
<?php }?>

<?php if ($tmpTools->isOP()) { ?>
<link href="<?php echo $tmpTools->templateurl(); ?>/css/op.css" rel="stylesheet" type="text/css" />
<?php } ?>

<!--[if IE]>
	<style type="text/css">
	.article_separator, .leading_separator  {
		line-height: 20px;
		height: 20px;
		background-position: bottom;
	}
	</style>
<![endif]-->

</head>

<body id="bd" class="<?php echo $tmpTools->getParam(JA_TOOL_LAYOUT);?> <?php echo $tmpTools->getParam(JA_TOOL_SCREEN);?> fs<?php echo $tmpTools->getParam(JA_TOOL_FONT);?>">
<a name="Top" id="Top"></a>
<!-- HEADER -->
<div id="ja-header" class="wrap">
<div class="main clearfix">
  
	<?php 
	$siteName = $tmpTools->sitename();
	if ($tmpTools->getParam('logoType')=='image') { ?>
	<h1 class="logo"><a href="index.php" title="<?php echo $siteName; ?>"><?php echo $siteName; ?></a></h1>
	<?php } else { 
	$logoText = (trim($tmpTools->getParam('logoText'))=='') ? $config->sitename : $tmpTools->getParam('logoText');
	$sloganText = (trim($tmpTools->getParam('sloganText'))=='') ? JText::_('SITE SLOGAN') : $tmpTools->getParam('sloganText');	?>
	<div class="logo-text">
		<h1><a href="index.php" title="<?php echo $siteName; ?>"><span><?php echo $logoText; ?></span></a></h1>
		<p class="site-slogan"><?php echo $sloganText;?></p>
	</div>
	<?php } ?>
	
	<?php if($this->countModules('user4')) : ?>
	<div id="ja-search">
		<jdoc:include type="modules" name="user4" />
	</div>
	<?php endif; ?>
	
</div>
</div>
<!-- //HEADER -->

<?php
	$slide = $this->countModules('ja-newsflash');
?>

<!-- MAIN NAVIGATION -->
<div id="ja-mainnav" class="wrap <?php if($slide) { echo ' hasslide'; } else { echo ' noslide'; } ?>">  	
<div class="main clearfix">
	<?php if ($jamenu) $jamenu->genMenu (0); ?>
  	<ul class="no-display">
  		<li><a href="<?php echo $tmpTools->getCurrentURL();?>#ja-content" title="<?php echo JText::_("Skip to content");?>"><?php echo JText::_("Skip to content");?></a></li>
  	</ul>
</div>
</div>
<!-- //MAIN NAVIGATION -->

<!-- //JA SLIDESHOW -->
<?php if($slide) { ?>
<div id="ja-newsflash" class="wrap">
	<div class="main">
		<jdoc:include type="modules" name="ja-newsflash" style="xhtml"/>
	</div>
</div>
<?php } ?>
<!-- //JA SLIDESHOW -->

<div id="ja-container<?php echo $divid; ?>" class="wrap">
<div class="main clearfix">

  	<!-- CONTENT -->  
  	<div id="ja-content">

		<jdoc:include type="message" />

		<?php
		  $spotlight = array ('user1','user2','user5');
		  $sl = $tmpTools->calSpotlight ($spotlight,$tmpTools->isOP()?100:99.9);
		  if ($sl) {
		?>
		<div id="ja-topsl" class="clearfix">
			<?php if ( $this->countModules('user1') ) { ?>
			<div class="ja-box<?php echo $sl['user1']['class']; ?>" style="width: <?php echo $sl['user1']['width']; ?>;">
			  <jdoc:include type="modules" name="user1" style="xhtml" />
			</div>
			<?php } ?>
			
			<?php if ( $this->countModules('user2') ) { ?>
			<div class="ja-box<?php echo $sl['user2']['class']; ?>" style="width: <?php echo $sl['user2']['width']; ?>;">
			  <jdoc:include type="modules" name="user2" style="xhtml" />
			</div>
			<?php } ?>
			
			<?php if ( $this->countModules('user5') ) { ?>
			<div class="ja-box<?php echo $sl['user5']['class']; ?>" style="width: <?php echo $sl['user5']['width']; ?>;">
			  <jdoc:include type="modules" name="user5" style="xhtml" />
			</div>
			<?php } ?>
		</div>
		<?php } ?>
		
		<div id="ja-current-content" class="clearfix">
			<jdoc:include type="component" />
		</div>

	</div>
  	<!-- //CONTENT -->
	
	 <!-- COLUMN --> 
	<?php if ( $ja_left || $ja_right || $hasSubnav ): ?>
	<div id="ja-col">
	<div class="ja-innerpad clearfix">
		<?php if ($hasSubnav) : ?>
		<div id="ja-subnav" class="moduletable">
			<h3><span>On this page</span></h3>
			<?php if ($jamenu) $jamenu->genMenu (1,1);	?>
		</div>
		<?php endif; ?>
		<jdoc:include type="modules" name="left" style="jamodule" />
		<jdoc:include type="modules" name="right" style="jamodule" />
	</div>
	</div>
	<?php endif; ?>
	<!-- //COLUMN --> 

</div>
</div>
<div id="ja-pathway" class="wrap">
	<div class="main clearfix">
		<strong>You are here:</strong> <jdoc:include type="module" name="breadcrumbs" />
	</div>
</div>

<?php
  $spotlight = array ('user6','user7','user8');
  $sl = $tmpTools->calSpotlight ($spotlight,$tmpTools->isOP()?100:99.9);
  if ($sl) {
 ?>
<!-- BOTTOM SPOTLIGHT -->
<div id="ja-botsl" class="wrap">
<div class="main clearfix">
	<?php if ( $this->countModules('user6') ) { ?>
	<div class="ja-box<?php echo $sl['user6']['class']; ?>" style="width: <?php echo $sl['user6']['width']; ?>;">
	  <jdoc:include type="modules" name="user6" style="xhtml" />
	</div>
	<?php } ?>
	
	<?php if ( $this->countModules('user7') ) { ?>
	<div class="ja-box<?php echo $sl['user7']['class']; ?>" style="width: <?php echo $sl['user7']['width']; ?>;">
	  <jdoc:include type="modules" name="user7" style="xhtml" />
	</div>
	<?php } ?>
	
	<?php if ( $this->countModules('user8') ) { ?>
	<div class="ja-box<?php echo $sl['user8']['class']; ?>" style="width: <?php echo $sl['user8']['width']; ?>;">
	  <jdoc:include type="modules" name="user8" style="xhtml" />
	</div>
	<?php } ?>
</div>
</div>
<!-- //BOTTOM SPOTLIGHT -->
<?php } ?>

<!-- FOOTER -->
<div id="ja-footer" class="wrap">
<div class="main">
	<jdoc:include type="modules" name="user3" />
	<jdoc:include type="modules" name="footer" />
</div>
</div>
<!-- //FOOTER -->

<jdoc:include type="modules" name="debug" />
<script type="text/javascript">
	addSpanToTitle();
	jaAddFirstItemToTopmenu();
	jaRemoveLastContentSeparator();
	//jaRemoveLastTrBg();
	//moveReadmore();
	//addIEHover();
	//slideshowOnWalk ();
	//apply png ie6 main background
</script>
</body>

</html>