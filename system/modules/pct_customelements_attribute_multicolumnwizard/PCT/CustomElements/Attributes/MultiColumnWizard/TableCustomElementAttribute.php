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
 * Namespace
 */
namespace PCT\CustomElements\Attributes\MultiColumnWizard;


/**
 * Class file
 * TableCustomElementAttribute
 */
class TableCustomElementAttribute extends \Backend
{
	/**
	 * Return the allowed input types
	 * @return array
	 */
	public function getInputTypes()
	{
		$arrReturn = array();
		
		$arrReturn['fieldName'] = array
		(
			'label'                 => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['options_multiColumnWizard_fieldName'],
			'exclude'               => true,
			'inputType'             => 'text',
			'eval' 					=> array('style' => 'width:80px',)
		);
		
		$arrReturn['inputType'] = array
		(
			'label'                 => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['options_multiColumnWizard_inputType'],
			'exclude'               => true,
			'inputType'             => 'select',
			'options'      			=> $GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['multiColumnWizard']['inputTypes'] ?: array(), 
			'eval' 					=> array('style' => 'width:100px', 'includeBlankOption'=>true, 'chosen'=>true)
		);
		
		$arrReturn['label'] = array
		(
			'label'                 => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['options_multiColumnWizard_label'],
			'exclude'               => true,
			'inputType'             => 'textarea',
			'eval' 					=> array('style' => 'width:160px')
		);
		
		$arrReturn['options'] = array
		(
			'label'                 => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['options_multiColumnWizard_options'],
			'exclude'               => true,
			'inputType'             => 'text',
			'eval' 					=> array('style' => 'width:120px')
		);
		
		$arrReturn['default'] = array
		(
			'label'                 => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['options_multiColumnWizard_default'],
			'exclude'               => true,
			'inputType'             => 'text',
			'eval' 					=> array('style' => 'width:60px')
		);

		$arrReturn['eval'] = array
		(
			'label'                 => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['options_multiColumnWizard_eval'],
			'exclude'               => true,
			'inputType'             => 'text',
			'eval' 					=> array('style' => 'width:100px')
		);
		
		return $arrReturn;
	}
}