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
defined('_JEXEC') or die('Restricted access'); ?>
<?php
global $mainframe;
require_once (JPATH_SITE.DS.'templates'.DS.$mainframe->getTemplate().DS.'ja_templatetools_1.5.php');
$image = JA_Tools::extractImage ($this->item, true, $this->imageWidth, $this->imageHeight);
?>

<?php if ($this->user->authorize('com_content', 'edit', 'content', 'all') || $this->user->authorize('com_content', 'edit', 'content', 'own')) : ?>
	<div class="contentpaneopen_edit<?php echo $this->escape($this->item->params->get( 'pageclass_sfx' )); ?>" style="float: left;">
		<?php echo JHTML::_('icon.edit', $this->item, $this->item->params, $this->access); ?>
	</div>
<?php endif; ?>

<div class="contentpaneopen<?php echo $this->escape($this->item->params->get( 'pageclass_sfx' )); ?> clearfix">

<?php  if (!$this->item->params->get('show_intro')) :
	echo $this->item->event->afterDisplayTitle;
endif; ?>

<?php echo $this->item->event->beforeDisplayContent; ?>

<div class="article-content">

	<?php if (isset ($this->item->toc)) : ?>
		<?php echo $this->item->toc; ?>
	<?php endif; ?>

	<?php if ($image) : ?>
	<div class="article-img">
	  <?php echo $image; ?>
	</div>
	<?php endif; ?>
	
	<div class="article-main">
		<?php if ($this->item->params->get('show_title')) : ?>
		<h2 class="contentheading<?php echo $this->escape($this->item->params->get( 'pageclass_sfx' )); ?>"><?php if ($this->item->params->get('link_titles') && $this->item->readmore_link != '') : ?><a href="<?php echo $this->item->readmore_link; ?>" class="contentpagetitle<?php echo $this->escape($this->item->params->get( 'pageclass_sfx' )); ?>"><?php echo $this->item->title; ?></a><?php else : ?><?php echo $this->item->title; ?><?php endif; ?></h2>
		<?php endif; ?>

		<?php
		if (
		($this->item->params->get('show_create_date'))
		|| (($this->item->params->get('show_author')) && ($this->item->author != ""))
		|| (($this->item->params->get('show_section') && $this->item->sectionid) || ($this->item->params->get('show_category') && $this->item->catid))
		|| ($this->item->params->get('show_pdf_icon') || $this->item->params->get('show_print_icon') || $this->item->params->get('show_email_icon'))
		|| ($this->item->params->get('show_url') && $this->item->urls)
		) :
		?>
		<div class="article-toolswrap">
		<div class="article-tools clearfix">
			<div class="article-meta">

			<?php if ($this->item->params->get('show_create_date')) : ?>
			<span class="createdate">
				<?php echo JHTML::_('date', $this->item->created, '%a - %d <span class="month">%b</span>'); ?>
			</span>
			<?php endif; ?>

			<?php if (($this->item->params->get('show_author')) && ($this->item->author != "")) : ?>
			<span class="createdby">
				<?php JText::printf('Written by', ($this->item->created_by_alias ? $this->item->created_by_alias : $this->item->author)); ?>
			</span>
			<?php endif; ?>
			
			<?php if (($this->item->params->get('show_section') && $this->item->sectionid) || ($this->item->params->get('show_category') && $this->item->catid)) : ?>
			<?php if ($this->item->params->get('show_section') && $this->item->sectionid && isset($this->item->section)) : ?>
			<span class="article-section">
				<?php if ($this->item->params->get('link_section')) : ?>
					<?php echo '<a href="'.JRoute::_(ContentHelperRoute::getSectionRoute($this->item->sectionid)).'">'; ?>
				<?php endif; ?>
				<?php echo $this->escape($this->item->section); ?>
				<?php if ($this->item->params->get('link_section')) : ?>
					<?php echo '</a>'; ?>
				<?php endif; ?>
					<?php if ($this->item->params->get('show_category')) : ?>
					<?php echo ' - '; ?>
				<?php endif; ?>
			</span>
			<?php endif; ?>
			<?php if ($this->item->params->get('show_category') && $this->item->catid) : ?>
			<span class="article-section">
				<?php if ($this->item->params->get('link_category')) : ?>
					<?php echo '<a href="'.JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->catslug, $this->item->sectionid)).'">'; ?>
				<?php endif; ?>
				<?php echo $this->escape($this->item->category); ?>
				<?php if ($this->item->params->get('link_category')) : ?>
					<?php echo '</a>'; ?>
				<?php endif; ?>
			</span>
			<?php endif; ?>
			<?php endif; ?>

			</div>

			<?php if ($this->item->params->get('show_url') && $this->item->urls) : ?>
			<span class="article-url">
				<a href="http://<?php echo $this->escape($this->item->urls) ; ?>" target="_blank">
					<?php echo $this->escape($this->item->urls); ?></a>
			</span>
			<?php endif; ?>
		</div>
		</div>
		<?php endif; ?>

		<?php echo $this->item->text; ?>

		<?php if ($this->item->params->get('show_readmore') && $this->item->readmore) : ?>
		<a href="<?php echo $this->item->readmore_link; ?>" title="<?php echo $this->item->title; ?>" class="readon<?php echo $this->escape($this->item->params->get('pageclass_sfx')); ?>">		
			<?php if ($this->item->readmore_register) : ?>
				<?php echo JText::_('Register to read more...'); ?>
			<?php else : ?>
				<span><?php echo JText::_('Read more...'); ?></span>
			<?php endif; ?>
		</a>
		<?php endif; ?>
	</div>

</div>

</div>

<?php echo $this->item->event->afterDisplayContent; ?>