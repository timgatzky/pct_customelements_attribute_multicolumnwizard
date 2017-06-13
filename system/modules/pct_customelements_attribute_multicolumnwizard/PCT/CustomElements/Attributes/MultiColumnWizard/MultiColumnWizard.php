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
namespace PCT\CustomElements\Attributes;

/**
 * Class file
 * MultiColumnWizard
 */
class MultiColumnWizard extends \PCT\CustomElements\Core\Attribute
{
	/**
	 * Tell the vault to store how to save the data (binary,blob)
	 * Leave empty to varchar
	 * @var boolean
	 */
	protected $saveDataAs = 'blob';
	
	/**
	 * Return the field definition
	 * @return array
	 */
	public function getFieldDefinition()
	{
		$arrEval = $this->getEval();
		
		$arrOptions = deserialize($this->get('options'));
		
		$arrColumnFields = array();
		if(is_array($arrOptions) && count($arrOptions) > 0)
		{
			foreach($arrOptions as $i => $fieldDef)
			{
				$tmp = array
				(
					'label' 		=> array_map('trim',explode(',', $fieldDef['label'])),
					'default'		=> $fieldDef['default'],
					'inputType'		=> $fieldDef['inputType'],
					'eval'			=> json_decode('{'.$fieldDef['eval'].'}',TRUE),
				);
				
				if($fieldDef['inputType'] == 'select')
				{
					$tmp['eval']['chosen'] = true;
				}
				
				if(strlen($fieldDef['options']) > 0)
				{
					$options = json_decode('{'.$fieldDef['options'].'}',TRUE);
					// options_callback
					if(strlen(strpos($fieldDef['options'], 'options_callback')) > 0 || array_key_exists('options_callback', $options))
					{
						$tmp['options_callback'] = $options['options_callback'];
					}
					else
					{
						$tmp['options'] = $options;
					}
				}
				
				$arrColumnFields[ $fieldDef['fieldName'] ] = $tmp;
			}
		}
		
		$arrEval['columnFields'] = $arrColumnFields;
		
		$arrReturn = array
		(
			'label'			=> array( $this->get('title'),$this->get('description') ),
			'exclude'		=> true,
			'inputType'		=> 'multiColumnWizard',
			'eval'			=> $arrEval,
			'sql'			=> "text NULL",
		);
		
		return $arrReturn;
	}
	

	/**
	 * Generate the attribute in the frontend
	 * @param string
	 * @param mixed
	 * @param array
	 * @param string
	 * @param object
	 * @param object
	 * @return string
	 * called renderCallback method
	 */
	public function renderCallback($strField,$varValue,$objTemplate,$objAttribute)
	{
		$varValue = deserialize($varValue);
		
		if(!is_array($varValue))
		{
			$varValue = array_filter( explode(',', $varValue) );
		}
		
		$varValue = array_filter($varValue);
		
		if(empty($varValue))
		{
			$objTemplate->parse();
		}
		
		$arrFields = array();
		foreach($varValue as $i => $fields)
		{
			$arrClass = array('row','row_'.$i);
			($i%2 == 0 ? $arrClass[] = 'even' : $arrClass[] = 'odd');
			($i == 0 ? $arrClass[] = 'first' : '');
			($i == count($varValue) - 1 ? $arrClass[] = 'last' : '');
			
			$arrRows[$i] = array('class'=>implode(' ',$arrClass),'fields'=>$fields);
			$arrFields[$i] = $fields;
		}
		
		if(empty($arrFields))
		{
			$objTemplate->value = null;
		}
		
		$objTemplate->value = $varValue;
		$objTemplate->rows = $arrRows;
		$objTemplate->fields = $arrFields;
		
		return $objTemplate->parse();
	}
	
	
	/**
	 * Generate wildcard value
	 * @param mixed
	 * @param object	DatabaseResult
	 * @param integer	Id of the Element ( >= CE 1.2.9)
	 * @param string	Name of the table ( >= CE 1.2.9)
	 * @return string
	 */
	 public function processWildcardValue($varValue,$objAttribute,$intElement=0,$strTable='')
	 {
		if($objAttribute->get('type') != 'multiColumnWizard')
	 	{
	 		return $varValue;
	 	}
	 	return $objAttribute->renderCallback($strField,$varValue,new \FrontendTemplate($objAttribute->get('template')),$objAttribute);
	 }
}