<?php
/*
* Pixel Point Creative "Zoom In" Plugin for Joomla
* License: GNU General Public License version 3 
* License URL: http://www.gnu.org/copyleft/gpl.html
* Copyright (c) 2011 Pixel Point Creative LLC.
* More info at http://www.pixelpointcreative.com
*/


defined( '_JEXEC' ) or die();
jimport( 'joomla.plugin.plugin' );
jimport('joomla.application.module.helper');


class plgContentPlg_zoomin extends JPlugin
{
  	var $style_default = '';
  
	function plgContentPlg_zoomin( &$subject, $params=null )
	{
		if (!$subject) return;
		parent::__construct( $subject, $params );
	}

	function onContentPrepare( $context, &$article, &$params, $page = 0 )
	{
		global $mainframe;
		
		$plugin	=& JPluginHelper::getPlugin('content', 'plg_zoomin');
		$pluginParams	= $this->params;

		if (JString::strpos( $article->text, '{zoomin' ) === false){
			$methodDIRECTPASS = false;
		}else{
			$methodDIRECTPASS = true;
		}
		
		if(!defined("ZOOMIN_PLUGIN_HEADTAG")) $this->ZoomIn_PrepareSettings($pluginParams);
		
		/*@var globol style */	  		
		if (!$this->style_default) {  
	      $this->style_default = $pluginParams->get('style') ? $pluginParams->get('style'):'default';
		}
				
		if($methodDIRECTPASS){
			require_once('plugins/content/plg_zoomin/plg_zoomin/parser.php');
			$parser = new ReplaceCallbackParser_('zoomin');
			$article->text =  $parser->parse ($article->text, array(&$this, 'ZoomIn_DIRECT_FUNC'));
			
		}
		
	}

	function ZoomIn_PrepareSettings($pluginParams){
		global $mainframe;
		$hs_base    = JURI::base().'plugins/content/plg_zoomin/plg_zoomin/';
		$jquery	= $this->params->get('include_jquery');
		$headtag    = array();	
		$doc =& JFactory::getDocument();
		if( !defined('SMART_JQUERY') && $jquery ){			
		$doc->addScript($hs_base.'jquery-1.8.2.min.js');
		$doc->addScript($hs_base.'jquery-noconflict.js');
		define('SMART_JQUERY', 1);
	} 
		
		$doc->addScript($hs_base.'jquery.zoomy1.2.js');
		$doc->addStyleSheet($hs_base.'zoomy1.2.css');		
		
	
	}
	
	function ZoomIn_DIRECT_FUNC($plgAttr, $plgContent)
	{		
		$params = '';		
		$params = $this->parseParams($plgAttr);		
		return $this->parseTabCustomization($plgContent, $params);
	}	
	
	
	function parseTabCustomization($matches, $params){
		$rd = rand(0,9999);
		$type	= $this->params->get('type');
		$html = '<div class="zoomin"><a id="zoom'.$rd.'" class="zoom" href="'. JURI::base() . $params['src'].'" rel="'. JURI::base() . $params['src'].'"><img src="'.$matches.'" /></a></div>';
		if (isset($params['type'])) {
			if ($params['type'] == 'hover') {
			$html .= '<script type="text/javascript">
						jQuery(function(){	
							jQuery(\'#zoom'.$rd.'\').zoomy(\'mouseover\',
							{
								clickable: false,
								attr: \'rel\'   
							});
							
						});
					</script>';
			} else {
				$html .= '<script type="text/javascript">
					jQuery(function(){	
						jQuery(\'#zoom'.$rd.'\').zoomy();
						
					});
				</script>';
			}
		} else {
			if ($type == 'hover') {
			$html .= '<script type="text/javascript">
						jQuery(function(){	
							jQuery(\'#zoom'.$rd.'\').zoomy(\'mouseover\',
							{
								clickable: false,
								attr: \'rel\'   
							});
							
						});
					</script>';
			} else {
				$html .= '<script type="text/javascript">
					jQuery(function(){	
						jQuery(\'#zoom'.$rd.'\').zoomy();
						
					});
				</script>';
			}
		
		}
		return $html;
	}
	
	
		
	
	function getPattern ($tag) {
	 $regex = '#{'.$tag.' ([^}]*)}([^{]*){/'.$tag.'}#m';

	  return $regex;
	}

	function getSubPattern ($tag) {
	  $regex = '#\['.$tag.' ([^\]]*)\]([^\[]*)\[/'.$tag.'\]#m';
	  return $regex;
	}
	
	function parseParams($params) {
		$params = html_entity_decode($params, ENT_QUOTES);
		$regex = "/\s*([^=\s]+)\s*=\s*('([^']*)'|\"([^\"]*)\"|([^\s]*))/";
		preg_match_all($regex, $params, $matches);
		
		 $paramarray = null;
		 if(count($matches)){
			$paramarray = array();
				for ($i=0;$i<count($matches[1]);$i++){ 
				  $key = $matches[1][$i];
				  $val = $matches[3][$i]?$matches[3][$i]:($matches[4][$i]?$matches[4][$i]:$matches[5][$i]);
				  $paramarray[$key] = $val;
				}
		  }
		  return $paramarray;
	}
	
}
?>