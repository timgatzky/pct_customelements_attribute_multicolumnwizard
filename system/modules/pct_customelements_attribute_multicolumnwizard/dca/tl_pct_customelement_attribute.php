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
 * Table tl_pct_customelement_attribute
 */
$objDcaHelper = \PCT\CustomElements\Helper\DcaHelper::getInstance()->setTable('tl_pct_customelement_attribute');
$strType = 'multiColumnWizard';

/**
 * Palettes
 */
$arrPalettes = $objDcaHelper->getPalettesAsArray('default');
$arrPalettes = $objDcaHelper->removeField('eval_tl_class_w50');
$arrPalettes = $objDcaHelper->removeField('eval_tl_class_clr');
$arrPalettes = $objDcaHelper->removeField('be_filter');
$arrPalettes = $objDcaHelper->removeField('be_search');
$arrPalettes = $objDcaHelper->removeField('be_sorting');
$arrPalettes['settings_legend'] = array('options');
$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['palettes'][$strType] = $objDcaHelper->generatePalettes($arrPalettes);

/**
 * Fields
 */
if($objDcaHelper->getActiveRecord()->type == $strType)
{
	if(\Input::get('act') == 'edit' && \Input::get('table') == $objDcaHelper->getTable())
	{
		// Show template info
		\Message::addInfo(sprintf($GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['MSC']['templateInfo_attribute'] ?: 'This attribute works best with the %s template', 'customelement_attr_multicolumnwizard'));
	}
	
	$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['fields']['options'] = array
	(
		'label' 			=> &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['options_'.$strType],
		'exclude' 			=> true,
		'inputType' 		=> 'multiColumnWizard',	
		
		'eval'				=> array
		(
			'columnsCallback' 	=> array('PCT\CustomElements\Attributes\MultiColumnWizard\TableCustomElementAttribute','getInputTypes'),
		),
	);	
}