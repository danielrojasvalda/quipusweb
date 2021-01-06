<?php
/**
 * @version   2.0
 * @author    emkt.mx - Fernando Arturo Martínez Aguilar @fernandomtza
 * @copyright Copyright (C) 2009 - 2015 emkt.mx
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */
 
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

class plgContentWhatsappshare extends JPlugin
{
        /**
         * Load the language file on instantiation. Note this is only available in Joomla 3.1 and higher.
         * If you want to support 3.0 series you must override the constructor
         *
         * @var    boolean
         * @since  3.1
         */
        protected $autoloadLanguage = true;
		
		/**
         * Plugin method with the same name as the event will be called automatically.
         */
         public function onContentPrepare($context, &$article, &$params, $limitstart)
		{
                /*
                 * Plugin code below
                 */	
				 
					require_once("assets/Mobile_Detect.php");
					$detect = new Mobile_Detect;
					$services = $this->params->get('services');
					
					if ( $detect->isMobile() ) {
						$this->currentView = JRequest::getCmd("view");
						if (strcmp("article", $this->currentView) == 0) {
							$doc =& JFactory::getDocument();
							$doc->addStyleSheet( JUri::base() ."plugins/content/whatsappshare/assets/css/ws-style.css" );
							$doc->addStyleDeclaration($this->params->get('sitecss', ''));
							$articletitle = $article->title;
							$path = JURI::current();
							
							$shared = $articletitle.': '.$path;
							
							
							$code = '<div class="ws-wrap">';
							switch ($services) {
								case all:
									$code .= '<a class="ws-f" href="http://www.facebook.com/sharer.php?u='.$path.'"> <i class="wsi-facebook-ws"></i> </a>';
									$code .= '<a class="ws-t" href="https://twitter.com/share?url='.$path.'&text='.$articletitle.'"> <i class="wsi-twitter-ws"></i> </a>';
									$code .= '<a class="ws-e" href="mailto:?subject='.$articletitle.'&body='.$shared.'"> <i class="wsi-mail-ws"></i> </a>';
									$code .= '<a class="ws-w" href="whatsapp://send?text='.$shared.'" data-action="share/whatsapp/share"> <i class="wsi-whatsapp-ws"></i> </a>';
								break;
								
								case only:
									$code .= '<a class="ws-w-only" href="whatsapp://send?text='.$shared.'" data-action="share/whatsapp/share"> <i class="wsi-whatsapp-ws"></i> </a>';
								break;								
							}
							$code .= '</div>';
							
							$doc->addCustomTag($code);
						}
					}
			
        }
}
?>