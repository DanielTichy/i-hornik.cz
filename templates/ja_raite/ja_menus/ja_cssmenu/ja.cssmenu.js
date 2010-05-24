/*------------------------------------------------------------------------
# JA Raite for Joomla 1.5.x - Version 1.0 - Licence Owner jSharing
# ------------------------------------------------------------------------
# Copyright (C) 2004-2008 J.O.O.M Solutions Co., Ltd. All Rights Reserved.
# @license - Copyrighted Commercial Software
# Author: J.O.O.M Solutions Co., Ltd
# Websites:  http://jsharing.com -  http://jsharing.net
# This file may not be redistributed in whole or significant part.
-------------------------------------------------------------------------*/

sfHover = function() {
	var sfEls = document.getElementById("ja-cssmenu").getElementsByTagName("li");
	for (var i=0; i<sfEls.length; ++i) {
		sfEls[i].onmouseover=function() {
			clearTimeout(this.timer);
			if(this.className.indexOf("sfhover") == -1)
				this.className+="sfhover";
			
			var a = this.getElementsByTagName("a")[0];
			if(a.className.indexOf("sfhover") == -1)
				a.className+=" sfhover";
			
		}
		sfEls[i].onmouseout=function() {
			this.timer = setTimeout(sfHoverOut.bind(this), 20);
		}
	}
}

function sfHoverOut() {
	clearTimeout(this.timer);
	this.className=this.className.replace(new RegExp("sfhover\\b"), "");
	var a = this.getElementsByTagName("a")[0];
	a.className=a.className.replace(new RegExp("sfhover\\b"), "");
}

if (window.attachEvent) window.attachEvent("onload", sfHover);
