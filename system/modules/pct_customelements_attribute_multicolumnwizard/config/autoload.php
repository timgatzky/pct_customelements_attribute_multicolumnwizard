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
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'PCT\CustomElements',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	'PCT\CustomElements\Attributes\MultiColumnWizard'								=> 'system/modules/pct_customelements_attribute_multicolumnwizard/PCT/CustomElements/Attributes/MultiColumnWizard/MultiColumnWizard.php',	
	'PCT\CustomElements\Attributes\MultiColumnWizard\TableCustomElementAttribute'	=> 'system/modules/pct_customelements_attribute_multicolumnwizard/PCT/CustomElements/Attributes/MultiColumnWizard/TableCustomElementAttribute.php',	

));


/**
 * Register templates
 */
TemplateLoader::addFiles(array
(
	'customelement_attr_multicolumnwizard'	=> 'system/modules/pct_customelements_attribute_multicolumnwizard/templates'
));