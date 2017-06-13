<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2017
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements, pct_customelements_plugin_customcatalog
 * @attribute	MultiColumnWizard
 * @link		http://contao.org
 */

/**
 * Register attribute
 */
$GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['multiColumnWizard'] = array
(
	'label'					=> &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['multiColumnWizard'],
	'class'					=> 'PCT\CustomElements\Attributes\MultiColumnWizard',
	'icon'					=> 'fa fa-list',
);

if(!isset($GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['multiColumnWizard']['inputTypes']))
{
	$GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['multiColumnWizard']['inputTypes'] = array
	(
		'text',
		'textarea',
		'checkbox',
		'checkboxWizard',
		'select',
		'listWizard',
		'tableWizard'
	);
}

/**
 * Hooks
 */
$GLOBALS['CUSTOMELEMENTS_HOOKS']['processWildcardValue'][] 	= array('PCT\CustomElements\Attributes\MultiColumnWizard','processWildcardValue');
