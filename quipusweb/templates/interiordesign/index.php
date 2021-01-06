<?php require(dirname(__FILE__)."/modules/req_parameters.php");?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
	<head>
		<?php require(dirname(__FILE__)."/functions.php");?>
		<?php require(dirname(__FILE__)."/modules/req_css.php");?>
	</head>

<body>
 <div class="container-fluid" id="relative">
<div id="wrapper">
<div id="wrapper-w"><?php include 'html/template.php';?>
		<div id="header-w">
			<div id="header">
			<div class="logo-container">
			<?php if ($logotype == 'image' ) : ?><?php if ($logo != null ) : ?>
			<div class="logo"><a href="<?php echo $this->baseurl ?>"><img src="<?php echo $this->baseurl ?>/<?php echo htmlspecialchars($logo); ?>" alt="logo" /></a></div><?php else : ?>
			<div class="logo"><a href="<?php echo $this->baseurl ?>/"><img src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/images/logo.png" alt="logo" ></a></div><?php endif; ?><?php endif; ?> 
			<?php if ($logotype == 'text' ) : ?><div class="logo"><a href="<?php echo $this->baseurl ?>"><?php echo htmlspecialchars($sitetitle);?></a></div><?php endif; ?> 
			</div>
			
			<?php if ($this->params->get( 'socialdisable' )) : ?><div id="social"><?php include "modules/socialbuttons.php"; ?></div><?php endif; ?>
			<?php if ($this->params->get( 'slogandisable' )) : ?><div class="slogan"><?php echo ($slogan); ?></div><?php endif; ?>    
			
			</div> <!-- end header -->
		</div><!-- end header-w -->


			<nav class="clearfix">
					<div id="nav"><jdoc:include type="modules" name="mainmenu" style="none" /></div>
					<a href="#" id="pull"></a>
			</nav>			

<div id="main-content">	

<!-- Slideshow -->
	<div id="slideshow"><?php if ($this->params->get( 'slidehome' )) : ?>	
		<?php $app = JFactory::getApplication(); $menu = $app->getMenu(); $lang = JFactory::getLanguage();
			if ($menu->getActive() == $menu->getDefault($lang->getTag())) : ?>
			<?php include "slideshow/slideshow.php"; ?><?php endif; ?>
		<?php else : ?>
			<?php include "slideshow/slideshow.php"; ?><?php endif; ?>
	</div>
<!-- END Slideshow -->		
	
	<div id="topwide">
			<div class="top1"><jdoc:include type="modules" name="top1" style="xhtml" /></div>
			<div class="top2"><jdoc:include type="modules" name="top2" style="xhtml" /></div>
			<div class="top3"><jdoc:include type="modules" name="top3" style="xhtml" /></div>		
	</div>
	
    <?php if($this->countModules('left') xor $this->countModules('right')) $maincol_sufix = '_one';
	  elseif(!$this->countModules('left') and !$this->countModules('right'))$maincol_sufix = '_none';
	  else $maincol_sufix = '_both'; ?>
	
<!-- Left Sidebar -->		  
    <?php if($this->countModules('left') and JRequest::getCmd('layout') != 'form') : ?>
			<div id="leftbar-w">
			<div id="sidebar"><jdoc:include type="modules" name="left" style="hq" /></div>
			</div>
    <?php endif; ?>	  

<!-- Center -->	
	<div id="centercontent<?php echo $maincol_sufix; ?>"> 	
	<div class="clearpad"><jdoc:include type="component" /></div>	
		<?php if ($this->countModules('breadcrumb')) : ?>
        <jdoc:include type="modules" name="breadcrumb"  style="none"/>
        <?php endif; ?>
	</div>		
	
<!-- Right Sidebar -->	
    <?php if($this->countModules('right') and JRequest::getCmd('layout') != 'form') : ?>
			<div id="rightbar-w">
			<div id="sidebar"><jdoc:include type="modules" name="right" style="hq" /></div>
			</div>
    <?php endif; ?>	
	
	<div class="clr"></div>
    </div>   		

		
	<div id="bottomwide">
		<div id="bottom" class="clearfix">
			<div class="user1"><jdoc:include type="modules" name="user1" style="xhtml" /></div>
			<div class="user2"><jdoc:include type="modules" name="user2" style="xhtml" /></div>
			<div class="user2"><jdoc:include type="modules" name="user3" style="xhtml" /></div>
		</div>
			<div class="tgwide" ><div id="tg"></div></div>
			<div style="display:none;" class="nav_up" id="nav_up"></div>			
	</div>
</div><!-- wrapper end -->	
	
	</div><!--/.relative -->
	</div><!--/.fluid-container -->
</body>
</html>