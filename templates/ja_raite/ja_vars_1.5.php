<?php
/*------------------------------------------------------------------------
# JA Raite for Joomla 1.5.x - Version 1.0 - Licence Owner jSharing
# ------------------------------------------------------------------------
# Copyright (C) 2004-2008 J.O.O.M Solutions Co., Ltd. All Rights Reserved.
# @license - Copyrighted Commercial Software
# Author: J.O.O.M Solutions Co., Ltd
# Websites:  http://jsharing.com -  http://jsharing.net
# This file may not be redistributed in whole or significant part.
-------------------------------------------------------------------------*/
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

include_once (dirname(__FILE__).DS.'/ja_templatetools_1.5.php');
$mainframe =& JFactory::getApplication('site');

if (defined('_DEMO_MODE_')) $tmpTools = new JA_Tools($this, array(JA_TOOL_MENU, JA_TOOL_COLOR, 'ja_bgimg', 'ja_bgclr'));	
else $tmpTools = new JA_Tools($this);

$tmpTools->setScreenSizes (array('wide'));
$tmpTools->setColorThemes (array('default','blue','red','red'));

# Auto Collapse Divs Functions ##########
$ja_left = $this->countModules('left');
$ja_right = $this->countModules('right');
if ($tmpTools->isContentEdit()) {
	$ja_right = $ja_left = 0;
}
if ( $ja_left && $ja_right ) {
	$divid = '';
	} else {
	$divid = '-f';
}

//Main navigation
$ja_menutype = $tmpTools->getParam(JA_TOOL_MENU);
$jamenu = null;
if ($ja_menutype != 'none') {
include_once( dirname(__FILE__).DS.'ja_menus/Base.class.php' );
$japarams = JA_Base::createParameterObject('');
$japarams->set( 'menutype', $tmpTools->getParam('menutype', 'mainmenu') );
$japarams->set( 'menu_images_align', 'left' );
$japarams->set( 'menupath', $tmpTools->templateurl() .'/ja_menus');
$japarams->set('menu_title', 0);
switch ($ja_menutype) {
	case 'css':
		$menu = "CSSmenu";
		include_once( dirname(__FILE__).DS.'ja_menus/'.$menu.'.class.php' );
		break;
	case 'moo':
		$menu = "Moomenu";
		include_once( dirname(__FILE__).DS.'ja_menus/'.$menu.'.class.php' );
		break;
	case 'split':
	default:
		$menu = "Splitmenu";
		include_once( dirname(__FILE__).DS.'ja_menus/'.$menu.'.class.php' );
		break;
}
$menuclass = "JA_$menu";
$jamenu = new $menuclass ($japarams);

$hasSubnav = false;
if ($jamenu->hasSubMenu (1) && $jamenu->showSeparatedSub ) 
	$hasSubnav = true;
}	
//End for main navigation
//populate background for body
$bgimg = $tmpTools->getParam('ja_bgimg');
$bgclr = $tmpTools->getParam('ja_bgclr');
$bodybg = '';
$iebgpng = false;
if ($bgimg) {
	$bodybg .= "background-image: url(".$tmpTools->templateurl()."/images/background/$bgimg);";
	if (strpos($bgimg, '.png') !== FALSE) $iebgpng = true;
}

if ($bgclr) {
	$bodybg .= "background-color: $bgclr;";
}
if ($bodybg) $bodybg = " style=\"$bodybg\"";
//echo "[$bgimg][$bgclr][$bodybg]";
