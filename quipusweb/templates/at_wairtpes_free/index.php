<?php
/**
* @author    atjoomla.com http://www.atjoomla.com
* @copyright copyright (c) 2016 atjoomla.com. all rights reserved
* @license   GNU/GPL v2 http://www.gnu.org/licenses/gpl-2.0.html
*/
defined('_JEXEC') or die('Restricted index access');
function depimo($clr, $opa = false) {													
$def = 'birg(0,0,0)';
if(empty($clr))
return $def;
if ($clr[0] == '#' ) {
$clr = substr( $clr, 1 );
}
if (strlen($clr) == 6) {
$bex = array( $clr[0] . $clr[1], $clr[2] . $clr[3], $clr[4] . $clr[5] );
} elseif ( strlen( $clr ) == 3 ) {
$bex = array( $clr[0] . $clr[0], $clr[1] . $clr[1], $clr[2] . $clr[2] );
} else {
return $def;
}
$birg = array_map('bexpello', $bex);
if($sopare){
if(abs($sopare) > 1)
$sopare = 1.0;
$output = 'birga('.implode(",",$birg).','.$sopare.')';
} else {
$output = 'birg('.implode(",",$birg).')';
}
return $output;
}
$root = $this->baseurl;$template = $this->template;$images = 'templates/'.$template.'/images/';$includes = 'templates/'.$template.'/inc/';
$css = 'templates/'.$template.'/css/';$er = 'templates/'.$template.'/html/mod_menu/html2/default.php';
$app											= JFactory::getApplication();
$doc											= JFactory::getDocument();
$user											= JFactory::getUser();
$this->language									= $doc->language;
$this->direction								= $doc->direction;
$sitename                                       = $app->getCfg('sitename');
$menuid                                         = $this->params->get('menuid');
$menu                                           = $app->getMenu();
$renderer	       = $doc->loadRenderer( 'module' );
$module            = JModuleHelper::getModule( 'mod_menu', "hornav_menu" );
$menu_name		   = $this->params->get("hornav_menu", "mainmenu");
$module->params    = "menutype=$menu_name\nshowAllChildren=1";
$hornav = $renderer->render( $module);
$params = $app->getTemplate(true)->params;
if ($this->params->get('logoFile'))
{
$logo = '<img src="'. JURI::root() . $this->params->get('logoFile') .'" alt="'. $sitename .'" />';
}
elseif ($this->params->get('sitetitle'))
{
$logo = '<span class="site-title" title="'. $sitename .'">'. htmlspecialchars($this->params->get('sitetitle')) .'</span>';
}
else
{
$logo = '<img src="'. $images .'/logo.png" alt="'. $sitename .'" />';
}
$var_resp_css					= 'bootstrap.min.css';
$display_social_links           = $this->params->get('display_social_links', 'yes');
$comp_info                      = $this->params->get('comp_info');
$header_top_1or2_position       = (($this->countModules('header_top1 or header_top2')) or ($logo));
$header_top1                    = $this->countModules('header_top1');
$header_top2                    = $this->countModules('header_top2');
$header_1or2or3or4_position     = $this->countModules('header1 or header2 or header3 or header4');
$header1_position               = $this->countModules('header1');
$header2_position               = $this->countModules('header2');
$header3_position               = $this->countModules('header3');
$header4_position               = $this->countModules('header4');
$navigation_position            = $this->countModules('navigation');
$top_1or2or3or4_position        = $this->countModules('top1 or top2 or top3 or top4');
$top1_position                  = $this->countModules('top1');
$top2_position                  = $this->countModules('top2');
$top3_position                  = $this->countModules('top3');
$top4_position                  = $this->countModules('top4');
$bottom_1or2or3or4_position     = $this->countModules('bottom1 or bottom2 or bottom3 or bottom4');
$bottom1_position               = $this->countModules('bottom1');
$bottom2_position               = $this->countModules('bottom2');
$bottom3_position               = $this->countModules('bottom3');
$bottom4_position               = $this->countModules('bottom4');
$footer_1or2or3or4_position     = $this->countModules('footer1 or footer2 or footer3 or footer4');
$footer1_position               = $this->countModules('footer1');
$footer2_position               = $this->countModules('footer2');
$footer3_position               = $this->countModules('footer3');
$footer4_position               = $this->countModules('footer4');
$footer_position                = $this->countModules('footer');
$maxWidth						= $this->params->get('maxWidth');
$cp = 'Designed by <a href="http://www.atjoomla.com" 
target="_blank" title="www.atjoomla.com">atjoomla.com</a>';
$slideshow_effect                               = $this->params->get('slideshow_effect','basic_linear');
$thumbs_wrapper_width							= '100';																 
$count_images                                   = $this->params->get('count_images');									  
$thumbs_margin									= $count_images * 0.98;													  
$thumbs_padding									= $count_images * 0.58;													  
$thumbs_total_margin_padding					= $thumbs_margin + $thumbs_padding;	
$var_resp_class =								'container_12';
$slideshow_style                                = $this->params->get('slideshow_style', 'template_glass');
$mod_slideshow                                  = $this->countModules('slideshow');
$slideshow_type                                 = $this->params->get('slideshow_type', 'site_slideshow','module_slideshow');
$slideshow_layout                               = $this->params->get('slideshow_layout', 'on_top','with_col');
$slideshow_navigation_options                   = $this->params->get('slideshow_navigation_options', 'enable','disable');
$slideshow_text_opacity                         = $this->params->get('slideshow_text_opacity','0.5');
$slideshow_text_margin_bottom                   = $this->params->get('slideshow_text_margin_bottom');
$slideshow_readmore_text                        = $this->params->get('slideshow_readmore_text');
$autoPlay                                       = $this->params->get('autoPlay', true,false);
$playPause                                      = $this->params->get('playPause', true,false);
$stopOnHover                                    = $this->params->get('stopOnHover', true,false);
$nav_bg_image_default                           = $this->params->get('nav_bg_image_default');
$nav_bg_image_file                              = $this->params->get('nav_bg_image_file');
$menu_text_transform                            = $this->params->get('menu_text_transform','inherit','uppercase','lowercase','capitalize');
$nagivation_font_weight                         = $this->params->get('nagivation_font_weight','normal','bold');
$var_resp										= 'grid_';
$doc->addStyleSheet($includes.'styles/glass/engine1/style.css'); 
$doc->addStyleSheet($css.'960.css');
$doc->addStyleSheet($css.$var_resp_css);
$doc->addStyleSheet($css.'responsive.css');
$doc->addStyleSheet($css.'navigation.css');
$doc->addStyleSheet($css.'template.css');
$doc->addStyleSheet($css.'general.css');
JHtml::_('bootstrap.framework');	
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
<meta charset="utf-8">  
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<jdoc:include type="head" /><?php include $er; ?>
</head>
<?php $header_top=0;
$pos_header_top = 'header_top';
for ($i=1; $i<=2 ; $i++) { if (($this->countModules($pos_header_top.$i)) or ($logo)) { $header_top++; } } ?>
<?php if ($header_top == 2) : $header_top_val = '6'; else: $header_top_val = '12';; endif; ?>
<?php $header=0;
$pos_header = 'header';
for ($i=1; $i<=4 ; $i++) { if ($this->countModules($pos_header.$i)) { $header++; } } ?>
<?php if ($header == 2) : $header_val = '6'; elseif ($header == 3) : $header_val = '4'; elseif ($header == 4) : $header_val = '3'; else: $header_val = '12';; endif; ?>
<?php $top=0;
$pos_top = 'top';
for ($i=1; $i<=4 ; $i++) { if ($this->countModules($pos_top.$i)) { $top++; } } ?>
<?php if ($top == 2) : $top_val = '6'; elseif ($top == 3) : $top_val = '4'; elseif ($top == 4) : $top_val = '3'; else: $top_val = '12';; endif; ?>
<?php $bottom=0;
$pos_bottom = 'bottom';
for ($i=1; $i<=4 ; $i++) { if ($this->countModules($pos_bottom.$i)) { $bottom++; } } ?>
<?php if ($bottom == 2) : $bottom_val = '6'; elseif ($bottom == 3) : $bottom_val = '4'; elseif ($bottom == 4) : $bottom_val = '3'; else: $bottom_val = '12';; endif; ?>
<?php $footer=0;
$pos_footer = 'footer';
for ($i=1; $i<=4 ; $i++) { if ($this->countModules($pos_footer.$i)) { $footer++; } } ?>
<?php if ($footer == 2) : $footer_val = '6'; elseif ($footer == 3) : $footer_val = '4'; elseif ($footer == 4) : $footer_val = '3'; else: $footer_val = '12';; endif; ?>

<body>
<?php if ($header_top_1or2_position) : ?>
<div class="<?php echo $var_resp_class; ?>">
<?php if ($header_top1) : ?>
<div class="<?php echo $var_resp; ?><?php echo $header_top_val; ?>">
<jdoc:include type="modules" name="header_top1" style="no" />
</div>
<?php else : ?>
<div id="logo" class="<?php echo $var_resp; ?><?php echo $header_top_val; ?>">
<div class="crate">
<a href="<?php echo $this->baseurl; ?>">
<?php echo $logo;?>
<?php if ($this->params->get('sitedescription'))
{
echo '<div class="site-description">'. htmlspecialchars($this->params->get('sitedescription')) .'</div>';
}
?>
</a>
</div>
</div>
<?php endif; ?>
<!--
<?php if ($header_top2) : ?>
<div class="<?php echo $var_resp; ?><?php echo $header_top_val; ?>"><jdoc:include type="modules" name="header_top2" style="color2_notitle" />
</div>
<?php else : ?>
<?php endif; ?>
-->
<div class="clear"></div>
</div>
<?php endif; ?>
<?php if ($header_1or2or3or4_position) : ?>
<div class="<?php echo $var_resp_class; ?>">
<?php if ($header1_position) : ?>
<div class="<?php echo $var_resp; ?><?php echo $header_val; ?>">
<jdoc:include type="modules" name="header1" style="crate_notitle" />
</div>
<?php else : ?>
<?php endif; ?>
<?php if ($header2_position) : ?>
<div class="<?php echo $var_resp; ?><?php echo $header_val; ?>">
<jdoc:include type="modules" name="header2" style="crate_notitle" />
</div>
<?php else : ?>
<?php endif; ?>
<?php if ($header3_position) : ?>
<div class="<?php echo $var_resp; ?><?php echo $header_val; ?>">
<jdoc:include type="modules" name="header3" style="crate_notitle" />
</div>
<?php else : ?>
<?php endif; ?>
<?php if ($header4_position) : ?>
<div class="<?php echo $var_resp; ?><?php echo $header_val; ?>">
<jdoc:include type="modules" name="header4" style="crate_notitle" />
</div>
<?php endif; ?>
<div class="clear"></div>
</div>
<?php endif; ?>

<div id="nav" class="<?php echo $var_resp_class; ?>">
<div id="hor_nav" class="<?php echo $var_resp; ?>12">
<?php echo $hornav; ?>
</div>
<div class="clear"></div>
</div>
<?php include ($includes.'slideshow.php'); ?>
<?php if ($top_1or2or3or4_position) : ?>
<div class="<?php echo $var_resp_class; ?>">
<?php if ($top1_position) : ?>
<div class="<?php echo $var_resp; ?><?php echo $top_val; ?>">
<jdoc:include type="modules" name="top1" style="crate" />
</div>
<?php else : ?>
<?php endif; ?>
<?php if ($top2_position) : ?>
<div class="<?php echo $var_resp; ?><?php echo $top_val; ?>">
<jdoc:include type="modules" name="top2" style="crate" />
</div>
<?php else : ?>
<?php endif; ?>
<?php if ($top3_position) : ?>
<div class="<?php echo $var_resp; ?><?php echo $top_val; ?>">
<jdoc:include type="modules" name="top3" style="crate" />
</div>
<?php else : ?>
<?php endif; ?>
<?php if ($top4_position) : ?>
<div class="<?php echo $var_resp; ?><?php echo $top_val; ?>">
<jdoc:include type="modules" name="top4" style="crate" />
</div>
<?php endif; ?>
<div class="clear"></div>
</div>
<?php endif; ?>
<?php if ($this->countModules('left') && $this->countModules('right')): ?>
<div class="<?php echo $var_resp_class; ?>">
<div class="<?php echo $var_resp; ?>3">
<jdoc:include type="modules" name="left" style="crate" />
</div>
<div class="<?php echo $var_resp; ?>6">
<jdoc:include type="message" />
<div class="crate"><jdoc:include type="component" /><div class="clear"></div></div>
</div>
<div class="<?php echo $var_resp; ?>3">
<jdoc:include type="modules" name="right" style="crate" />
</div>
<div class="clear"></div>
</div>
<?php elseif ( $this->countModules('left')) : ?>
<div class="<?php echo $var_resp_class; ?>">
<div class="<?php echo $var_resp; ?>3">
<jdoc:include type="modules" name="left" style="crate" />
</div>
<div class="<?php echo $var_resp; ?>9">
<jdoc:include type="message" />
<div class="crate"><jdoc:include type="component" /><div class="clear"></div></div>
</div>
<div class="clear"></div>
</div>
<?php elseif ( $this->countModules('right')): ?>
<div class="<?php echo $var_resp_class; ?>">
<div class="<?php echo $var_resp; ?>9">
<jdoc:include type="message" />
<div class="crate"><jdoc:include type="component" /><div class="clear"></div></div>
</div>
<div class="<?php echo $var_resp; ?>3">
<jdoc:include type="modules" name="right" style="crate" />
</div>
<div class="clear"></div>
</div>
<?php else : ?>
<div class="<?php echo $var_resp_class; ?>">
<div class="<?php echo $var_resp; ?>12">
<jdoc:include type="message" />
<div class="crate"><jdoc:include type="component" /><div class="clear"></div></div>
</div>
<div class="clear"></div>
</div>
<?php endif; ?>
<?php if ($bottom_1or2or3or4_position) : ?>
<div class="<?php echo $var_resp_class; ?>">
<?php if ($bottom1_position) : ?>
<div class="<?php echo $var_resp; ?><?php echo $bottom_val; ?>">
<jdoc:include type="modules" name="bottom1" style="crate" />
</div>
<?php else : ?>
<?php endif; ?>
<?php if ($bottom2_position) : ?>
<div class="<?php echo $var_resp; ?><?php echo $bottom_val; ?>">
<jdoc:include type="modules" name="bottom2" style="crate" />
</div>
<?php else : ?>
<?php endif; ?>
<?php if ($bottom3_position) : ?>
<div class="<?php echo $var_resp; ?><?php echo $bottom_val; ?>">
<jdoc:include type="modules" name="bottom3" style="crate" />
</div>
<?php else : ?>
<?php endif; ?>
<?php if ($bottom4_position) : ?>
<div class="<?php echo $var_resp; ?><?php echo $bottom_val; ?>">
<jdoc:include type="modules" name="bottom4" style="crate" />
</div>
<?php endif; ?>
<div class="clear"></div>
</div>
<?php endif; ?>
<?php if ($footer_1or2or3or4_position) : ?>
<div class="<?php echo $var_resp_class; ?>">
<?php if ($footer1_position) : ?>
<div class="<?php echo $var_resp; ?><?php echo $footer_val; ?>">
<jdoc:include type="modules" name="footer1" style="crate" />
</div>
<?php else : ?>
<?php endif; ?>
<?php if ($footer2_position) : ?>
<div class="<?php echo $var_resp; ?><?php echo $footer_val; ?>">
<jdoc:include type="modules" name="footer2" style="crate" />
</div>
<?php else : ?>
<?php endif; ?>
<?php if ($footer3_position) : ?>
<div class="<?php echo $var_resp; ?><?php echo $footer_val; ?>">
<jdoc:include type="modules" name="footer3" style="crate" />
</div>
<?php else : ?>
<?php endif; ?>
<?php if ($footer4_position) : ?>
<div class="<?php echo $var_resp; ?><?php echo $footer_val; ?>">
<jdoc:include type="modules" name="footer4" style="crate" />
</div>
<?php endif; ?>
<div class="clear"></div>
</div>
<?php endif; ?>
<?php if ($footer_position) : ?>
<div class="<?php echo $var_resp_class; ?>">
<div class="<?php echo $var_resp; ?>12">
<div class="color3">
<jdoc:include type="modules" name="footer" style="color3_notitle" />
<?php echo $comp_info; ?> <?php echo $cp; ?>
<div class="clear"></div>
</div>
</div>
<div class="clear"></div>
</div>
<?php else: ?> 
<div class="<?php echo $var_resp_class; ?>">
<div class="<?php echo $var_resp; ?>12">
<div class="color3">
<?php echo $comp_info; ?> <?php echo $cp; ?>
</div>
</div>
<div class="clear"></div>
</div>
<?php endif; ?>
<?php if ($display_social_links == "yes") {include ($images.'social_media/socialmedia.php');} ?>
</body>
</html>