<?php

/**
 * @file
 * Bartik's theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template normally located in the
 * modules/system directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 * - $hide_site_name: TRUE if the site name has been toggled off on the theme
 *   settings page. If hidden, the "element-invisible" class is added to make
 *   the site name visually hidden, but still accessible.
 * - $hide_site_slogan: TRUE if the site slogan has been toggled off on the
 *   theme settings page. If hidden, the "element-invisible" class is added to
 *   make the site slogan visually hidden, but still accessible.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['header']: Items for the header region.
 * - $page['featured']: Items for the featured region.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['triptych_first']: Items for the first triptych.
 * - $page['triptych_middle']: Items for the middle triptych.
 * - $page['triptych_last']: Items for the last triptych.
 * - $page['footer_firstcolumn']: Items for the first footer column.
 * - $page['footer_secondcolumn']: Items for the second footer column.
 * - $page['footer_thirdcolumn']: Items for the third footer column.
 * - $page['footer_fourthcolumn']: Items for the fourth footer column.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see bartik_process_page()
 * @see html.tpl.php
 */
 
 //echo "base_path => ".$base_path;
?>
<section class="site-wraper">
<ul class="right-floated fade-in-right">
	<li>
    	<span><img src="images/info-icon.png" alt="Info"/></span>
        <div class="floated-content">
        	<span class="be1st"><img src="images/be-1st.png" alt=""/></span>
            <ul>
                <li><a href="#">Lorem ipsum dolor sit amet, consectetur adipi</a></li>
                <li><a href="#">In maximus orci aliquam mattis vulputate.</a></li>
                <li><a href="#">Lorem sapien, laoreet maximus elit malesuada</a></li>
            </ul>
        </div>
    </li>
    <li>
    	<span><img src="images/edit-icon.png" alt="Info"/></span>
        <div class="floated-content">
            <ul class="flt-link">
                <li><a href="#" class="fb">facebook</a></li>
                <li><a href="#" class="twt">Twitter</a></li>
                <li><a href="#" class="insta">Instagram</a></li>
            </ul>
        </div>
    </li>
    <li>
    	<span><img src="images/hands-icon.png" alt="Info"/></span>
        <div class="floated-content">
            <ul class="flt-link">
                <li><a href="#" class="atr">ATR</a></li>
                <li><a href="#" class="ques">Question</a></li>
            </ul>
        </div>
    </li>
</ul>
<header>
    <section class="top-header">
        <div class="clearfix">
            <div class="logo-sec left">
                <span class="logo">
					<!--<a href="#"title="Logo"><img src="<?php //echo drupal_get_path('theme', 'ceat');?>/images/logo.png" alt="Logo"/></a>-->
					<?php if ($logo): ?>
					  <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
						<img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
					  </a>
					<?php endif; ?>					
				</span>
                <span class="enterprise"><img src="<?php echo drupal_get_path('theme', 'ceat');?>/images/rpg.png" alt="RPG"/></span>
            </div>
            <div class="right">
            	<span class="slidersOpenBtn"><i class="fa fa-sliders" aria-hidden="true"></i></span>
                <div class="top-block">
                    <ul class="top-content clearfix">
                        <li class="select-country"><span class="country-flag"><img src="<?php echo drupal_get_path('theme', 'ceat');?>/images/country-flag.png" alt="country-flag"/></span><a href="#" class="country">Select Country</a>
                            <div class="top-menu-drop">
                                <ul>
                                    <li><a href="#">Afghanistan</a></li>
                                    <li><a href="#">Albania</a></li>
                                    <li><a href="#">Algeria</a></li>
                                    <li><a href="#">Andorra</a></li>
                                    <li><a href="#">Angola</a></li>
                                    <li><a href="#">Anguilla</a></li>
                                    <li><a href="#">Antigua & Barbuda</a></li>
                                    <li><a href="#">Argentina</a></li>
                                    <li><a href="#">Armenia</a></li>
                                    <li><a href="#">Australia</a></li>
                                    <li><a href="#">Austria</a></li>
                                    <li><a href="#">Azerbaijan</a></li>
                                    <li><a href="#">Bahamas</a></li>
                                    <li><a href="#">Bahrain</a></li>
                                    <li><a href="#">Bangladesh</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="select-lang"><span class="lang-icon"><img src="<?php echo drupal_get_path('theme', 'ceat');?>/images/language-icon.png" alt="language"/></span><a href="#" class="language">Select Langauge</a>
                            <div class="top-menu-drop">
                                <ul>
                                    <li><a href="#">Albanian</a></li>
                                    <li><a href="#">French</a></li>
                                    <li><a href="#">Portuguese</a></li>
                                    <li><a href="#">Armenian</a></li>
                                    <li><a href="#">Greek</a></li>
                                    <li><a href="#">Romanian</a></li>
                                    <li><a href="#">Bengali</a></li>
                                    <li><a href="#">Haitian</a></li>
                                    <li><a href="#">Creole</a></li>
                                    <li><a href="#">Russian</a></li>
                                    <li><a href="#">Burmese</a></li>
                                    <li><a href="#">Hebrew</a></li>
                                    <li><a href="#">Somali</a></li>
                                    <li><a href="#">Cantonese</a></li>
                                    <li><a href="#">Hindi</a></li>
                                    <li><a href="#">Spanish</a></li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="#" class="notification"><img src="<?php echo drupal_get_path('theme', 'ceat');?>/images/notif-icon.png" alt="notification"/><div class="count">4</div></a>
                            <a href="#" class="wishlist"><img src="<?php echo drupal_get_path('theme', 'ceat');?>/images/wish-icon.png" alt="wishlist"/><div class="count">3</div></a>
                        </li>
                        <li>
                            <span class="profile-pic">
                                <img src="<?php echo drupal_get_path('theme', 'ceat');?>/images/profile-icon.png" alt="profile-picture"/>
                            </span>
                            <div class="pl-name-part"><span class="profile-name">Hello, Adelberto</span><span class="drop-arrow"></span></div>
                            <div class="top-menu-drop">
                                <ul>                                        
                                    <li><a href="#">My Profile</a></li>
                                    <li><a href="#">Help</a></li>
                                    <li><a href="#">Logout</a></li>
                                 </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="site-header">
    	<span class="menuOpenBtn"><i class="fa fa-bars" aria-hidden="true"></i></span>
        <div class="main-header">
            <div class="header-right">
                <nav class="nav">
                    <ul class="menu">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Our Products</a>
                          <ul class="menu">
                                <li><a href="#">Tire Range</a></li>
                                <li><a href="#">Tire Care</a>
                          </ul>
                        </li>
                      <li><a href="#">Power of C-T-R</a></li>
                      <li><a href="#">Tech Novelties</a>
                      	<ul class="menu">
                                <li><a href="#">Tech Novelties 1</a></li>
                                <li><a href="#">Tech Novelties 2</a>
                          </ul>
                      </li>
                      <li><a href="#">Newsroom</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        
        <div class="fullwidth xs-hide banner-slider">
        	<div class="slider">
                <div class="jquery-reslider">
                    <div class="slider-block" data-url="<?php echo drupal_get_path('theme', 'ceat');?>/images/banner-1.jpg" style=" background-attachment:fixed" ></div>
                    <div class="slider-block" data-url="<?php echo drupal_get_path('theme', 'ceat');?>/images/banner-2.jpg" style=" background-attachment:fixed" ></div>
                    <div class="slider-block" data-url="<?php echo drupal_get_path('theme', 'ceat');?>/images/banner-3.jpg" style=" background-attachment:fixed" ></div>

                    <div class="slider-dots">
                      <ul>
                      </ul>
                    </div>
                </div>
            </div>
            <div class="banner-content">
                <div class="banner-text fade-in-down">
                    <h2>Tires for Farm Vehicles and Trailers</h2>
                    <h5>Tires that are never tired to Perform</h5>
                </div>
                <div class="top-search fade-in-up">
                    <h4>Find your perfect <span>CEAT</span> tyre in seconds</h4>
                    <div class="search-wrap">
                    	<input class="search" type="text" name="" placeholder="Whats Your Vechile?"/>
                        <input type="submit" value="Search"/>
                    </div>
                </div>
            </div>
            <div class="sec-next"><img src="<?php echo drupal_get_path('theme', 'ceat');?>/images/arrw-direction.png" alt="NEXT"/></div>
            <div class="devider"></div>
        </div>
    </section>
	</header>
	
	
	<section class="hp-sec welcome-sec">
	<div class="container">
    	<div class="sceTitle-box clearfix">
        	<div class="title-part fade-in-left">
            	<div class="title">
                    <h2>welcome to <span>CEAT</span></h2>
                    <p>Lorem ipsum dolor sit amet</p>
                </div>
            </div>
            <div class="info-part fade-in-right">
            	<p>Lorem ipsum dolor sit amet, libero turpis non cras ligula, id commodo, aenean est in volutpat amet sodales, porttitor bibendum facilisi suspendisse</p>
                <a href="#" class="readmoreBtn">Read More</a>
            </div>
        </div>
        <div class="main-content">
        	<div class="row">
        	<div class="fourBox clearfix">
            	<article class="fade-in-left">
                	<figure>
                    	<span class="img-hold"><span class="inner">History</span></span>
                        <figcaption>
                   	    <h4>History</h4>
                        <h3>Establish in 1958s</h3>
                        </figcaption>
                    </figure>
                </article>
                <article class="fade-in-right">
                	<figure>
                    	<span class="img-hold"><span class="inner">Awards</span></span>
                        <figcaption>
                   	    <h4>Awards</h4>
                        <h3>12+</h3>
                        </figcaption>
                    </figure>
                </article>
                <article class="fade-in-left">
                	<figure>
                    	<span class="img-hold"><span class="inner">Worldwide</span></span>
                        <figcaption>
                   	    <h4>Worldwide</h4>
                        <h3>80+ Countries</h3>
                        </figcaption>
                    </figure>
                </article>
                <article class="fade-in-right">
                	<figure>
                    	<span class="img-hold"><span class="inner">Library</span></span>
                        <figcaption>
                   	    <h4>Library</h4>
                        <h3>Brochure & Catalogs</h3>
                        </figcaption>
                    </figure>
                </article>
            </div>
            </div>
        </div>
    </div>
</section>

<!--====== STAY UPDATE SECTION ======-->

<section class="hp-sec stay-update parallax-window" data-parallax="scroll" data-image-src="<?php echo drupal_get_path('theme', 'ceat');?>/images/soil-bg.jpg">
	<div class="container">
    	<div class="main-content">
            <h2 class="title text-center fade-in-up">Stay Updated with us</h2>
            <p class="title-sub text-center fade-in-up">Lorem ipsum dolor sit amet, libero turpis non cras ligula, id commodo, aenean est in volutpat amet sodales, porttitor bibendum facilisi suspendisse</p>
            <div class="twoBox clearfix">
            	<div class="left left-box fade-in-left"><img src="<?php echo drupal_get_path('theme', 'ceat');?>/images/tyreofthemonth-pic.jpg" alt="Tyre Of The Month"/></div>
                <div class="right right-box fade-in-right" id="scrollholder">
                	<div id="scroll" class="scroll">
                        <article>
                            <figure>
                                <span class="date-box"><span class="date">Jan 5</span><span class="year">2017</span></span>
                                <figcaption>
                                    <p>Lorem ipsum dolor sit amet, libero turpis non cras ligula, id commodo, aenean est
				
					</p>
                                </figcaption>
                            </figure>
                        </article>
                        <article>
                            <figure>
                                <span class="date-box"><span class="date">Jan 5</span><span class="year">2017</span></span>
                                <figcaption>
                                    <p>Lorem ipsum dolor sit amet, libero turpis non cras ligula, id commodo, aenean est</p>
                                </figcaption>
                            </figure>
                        </article>
                        <article>
                            <figure>
                                <span class="date-box"><span class="date">Jan 5</span><span class="year">2017</span></span>
                                <figcaption>
                                    <p>Lorem ipsum dolor sit amet, libero turpis non cras ligula, id commodo, aenean est</p>
                                </figcaption>
                            </figure>
                        </article>
                        <article>
                            <figure>
                                <span class="date-box"><span class="date">Jan 5</span><span class="year">2017</span></span>
                                <figcaption>
                                    <p>Lorem ipsum dolor sit amet, libero turpis non cras ligula, id commodo, aenean est</p>
                                </figcaption>
                            </figure>
                        </article>
                        <article>
                            <figure>
                                <span class="date-box"><span class="date">Jan 5</span><span class="year">2017</span></span>
                                <figcaption>
                                    <p>Lorem ipsum dolor sit amet, libero turpis non cras ligula, id commodo, aenean est</p>
                                </figcaption>
                            </figure>
                        </article>
                        <article>
                            <figure>
                                <span class="date-box"><span class="date">Jan 5</span><span class="year">2017</span></span>
                                <figcaption>
                                    <p>Lorem ipsum dolor sit amet, libero turpis non cras ligula, id commodo, aenean est</p>
                                </figcaption>
                            </figure>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="devider"></div>
</section>

<!--====== TIRE RANGE SECTION ======-->
 
<section class="hp-sec tirerange-sec">
	<div class="container">
    	<div class="sceTitle-box clearfix">
        	<div class="title-part">
            	<div class="title fade-in-left">
                    <h2>TiRE <span>RANGE</span></h2>
                    <p>Lorem ipsum dolor sit amet</p>
                </div>
            </div>
            <div class="info-part fade-in-right">
            	<p>Lorem ipsum dolor sit amet, libero turpis non cras ligula, id commodo, aenean est in volutpat amet sodales, porttitor bibendum facilisi suspendisse</p>
            </div>
        </div>
    </div>
    <div class="main-content">
        <div class="row">
            <div class="tireRangeBox clearfix">
                <article>
                    <figure>
                        <div class="img-box fade-in-left"><img src="<?php echo drupal_get_path('theme', 'ceat');?>/images/tirerange-pic1.jpg" alt="tire range"/></div>
                        <div class="content-box fade-in-right">
                        	<span class="icon-box"><img src="<?php echo drupal_get_path('theme', 'ceat');?>/images/agriculture-icon.png" alt="Agriculture"/></span>
                      <div class="content clearfix">
                            	<h4>Agriculture</h4>
                                <p>Lorem ipsum dolor sit amet, libero turpis non cras ligula, id commodo, aenean est in volutpat amet sodales, porttitor bibendum facilisi suspendisse</p>
                            <p>Lorem ipsum dolor sit amet, libero turpis non cras ligula, id commodo, aenean est in volutpat amet sodales, porttitor bibendum facilisi suspendisse</p>
                                <a href="#" class="readmoreBtn">Read More</a>
                            </div>
                        </div>
                    </figure>
                </article>
                <article>
                    <figure>
                        <div class="img-box fade-in-right"><img src="<?php echo drupal_get_path('theme', 'ceat');?>/images/tirerange-pic2.jpg" alt="tire range"/></div>
                        <div class="content-box fade-in-left">
                        	<span class="icon-box"><img src="<?php echo drupal_get_path('theme', 'ceat');?>/images/industrial-icon.png" alt="Industrial"/></span>
                      <div class="content clearfix">
                            	<h4>Industrial</h4>
                                <p>Lorem ipsum dolor sit amet, libero turpis non cras ligula, id commodo, aenean est in volutpat amet sodales, porttitor bibendum facilisi suspendisse</p>
                            <p>Lorem ipsum dolor sit amet, libero turpis non cras ligula, id commodo, aenean est in volutpat amet sodales, porttitor bibendum facilisi suspendisse</p>
                                <a href="#" class="readmoreBtn">Read More</a>
                            </div>
                        </div>
                    </figure>
                </article>
                <article>
                    <figure>
                        <div class="img-box fade-in-left"><img src="<?php echo drupal_get_path('theme', 'ceat');?>/images/tirerange-pic3.jpg" alt="tire range"/></div>
                        <div class="content-box fade-in-right">
                        	<span class="icon-box"><img src="<?php echo drupal_get_path('theme', 'ceat');?>/images/otr-icon.png" alt="Mining / OTR"/></span>
                      <div class="content clearfix">
                            	<h4>Mining / OTR</h4>
                                <p>Lorem ipsum dolor sit amet, libero turpis non cras ligula, id commodo, aenean est in volutpat amet sodales, porttitor bibendum facilisi suspendisse</p>
                            <p>Lorem ipsum dolor sit amet, libero turpis non cras ligula, id commodo, aenean est in volutpat amet sodales, porttitor bibendum facilisi suspendisse</p>
                                <a href="#" class="readmoreBtn">Read More</a>
                            </div>
                        </div>
                    </figure>
                </article>
            </div>
        </div>
    </div>
    <div class="container">
    	<div class="botm-block fade-in-up clearfix">
        	<article>
                <figure>
                    <span class="icon-box"><img src="<?php echo drupal_get_path('theme', 'ceat');?>/images/tire-with-hand.png" alt="Mining / OTR"/></span>
                    <div class="content clearfix">
                        <h2>Let's Learn to <span>DOCTOR</span> your tires</h2>
                        <p>Lorem ipsum dolor sit amet, libero turpis non cras ligula, id commodo, aenean est in volutpat amet sodales, porttitor bibendum facilisi suspendisse</p>
                        <a href="#" class="readmoreBtn">Read More</a>
                    </div>
                </figure>
            </article>
        </div>
    </div>
</section>

<!--====== GREY STRIPE SECTION ======-->
<section class="hp-sec grey-stripe-box">
	<div class="container">
    	<div class="sceTitle-box clearfix">
        	<div class="title-part fade-in-left">
            	<div class="title">
                    <h2>Tech <span>Novelties</span></h2>
                    <p>Lorem ipsum dolor sit amet</p>
                </div>
            </div>
            <div class="info-part fade-in-right">
            	<p>Lorem ipsum dolor sit amet, libero turpis non cras ligula, id commodo, aenean est in volutpat amet sodales, porttitor bibendum facilisi suspendisse</p>
            </div>
        </div>
    </div>
</section>

<!--====== FULL WIDTH SECTION ======-->
<section class="hp-sec full-width">
	<ul class="list-box clearfix">
    	<li class="oneThree-box box">
        	<figure>
            	<span class="img-box"><a href="#"><img src="<?php echo drupal_get_path('theme', 'ceat');?>/images/dpic-1.jpg" alt="pic"/></a></span>
                <figcaption>
                	<h2>EHS Principles</h2>
                    <p>View Case Study</p>
                </figcaption>
            </figure>
    	</li>
        <li class="oneThree-box box">
        	<figure>
            	<span class="img-box"><a href="#"><img src="<?php echo drupal_get_path('theme', 'ceat');?>/images/dpic-2.jpg" alt="pic"/></a></span>
                <figcaption>
                	<h2>Plan & Machinery</h2>
                    <p>Lorem ipsum dolor sit amet, libero turpis </p>
                </figcaption>
            </figure>
    	</li>
        <li class="oneThree-box box">
        	<figure>
            	<span class="img-box"><a href="#"><img src="<?php echo drupal_get_path('theme', 'ceat');?>/images/dpic-3.jpg" alt="pic"/></a></span>
                <figcaption>
                	<a href="#"><span class="vd-play right-top-pos">play</span></a>
                	<h2>Process Design</h2>
                    <p>Lorem ipsum dolor sit amet, libero turpis </p>
                </figcaption>
            </figure>
    	</li>
        <li class="one-box box">
        	<figure>
            	<a href="#" class="share"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
            	<span class="img-box"><a href="#"><span class="vd-play center-pos">play</span><img src="<?php echo drupal_get_path('theme', 'ceat');?>/images/dpic-4.jpg" alt="pic"/></a></span>
                <figcaption>
                	<h2>Quality Principles & Deming Journey</h2>
                    <p>Lorem ipsum dolor sit amet, libero turpis </p>
                </figcaption>
            </figure>
    	</li>
        <li class="oneThree-box box">
        	<figure>
            	<span class="img-box"><a href="#"><img src="<?php echo drupal_get_path('theme', 'ceat');?>/images/dpic-5.jpg" alt="pic"/></a></span>
                <figcaption>
                	<h2>Simulation</h2>
                    <p>Lorem ipsum dolor sit amet, libero turpis </p>
                </figcaption>
            </figure>
        </li>
    </ul>
</section>
	
	
<!--====== GREY STRIPE SECTION ======-->
<section class="hp-sec white-stripe-box">
	<div class="container">
    	<div class="sceTitle-box clearfix">
        	<div class="title-part fade-in-left">
            	<div class="title">
                    <h2>Find <span>Your distributor</span></h2>
                    <p>Lorem ipsum dolor sit amet</p>
                </div>
            </div>
            <div class="info-part fade-in-right">
            	<p>Lorem ipsum dolor sit amet, libero turpis non cras ligula, id commodo, aenean est in volutpat amet sodales, porttitor bibendum facilisi suspendisse</p>
            </div>
        </div>
    </div>
</section>

<section class="find-distributor clearfix">
	<div class="map">
    	<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7098.94326104394!2d78.0430654485247!3d27.172909818538997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1385710909804" width="600" height="450" frameborder="0" style="border:0"></iframe>
    </div>
    <div class="distributors">
    	<div class="box-header">
        	<h2>distributor names</h2>
        </div>
        <div class="box-body">
        	<ul>
            	<li class="mail">
                	<span class="icon-holder"></span>
                    <div class="content">
                    	<h3>Email</h3>
                        <h5>www.website.com</h5>
						<h5>support@website.com</h5>
                    </div>
                </li>
                <li class="phone">
                	<span class="icon-holder"></span>
                    <div class="content">
                    	<h3>Phone</h3>
                        <h5>+ 000 888 888 888</h5>
						<h5>+ 000 888 888 888</h5>
                    </div>
                </li>
                <li class="addrs">
                	<span class="icon-holder"></span>
                    <div class="content">
                    	<h3>Address</h3>
                        <h5>Schwanenteichallee 31, 99974 </h5>
						<h5>Mühlhausen/Thüringen, Germany</h5>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</section>

<footer class="main-footer">
	<div class="container">
    	<div class="row">
        	<div class="ft-top clearfix">
            	<div class="ft-link">
					<?php print render($page['footer_firstcolumn']); ?>
                	<h3>Quick Links</h3>
                    <ul>
                    	<li><a href="#">Product Listing</a></li> 
                        <li><a href="#">Tire Care</a></li>
                        <li><a href="#">Newsroom</a></li>
                        <li><a href="#">Store Locator</a></li>
                    </ul>
                </div>
                <div class="ft-link">
                	<h3>About Us</h3>
                    <ul>
                    	<li><a href="#">History</a></li>
                        <li><a href="#">Awards</a></li>
                        <li><a href="#">Worldwide</a></li>
                        <li><a href="#">Media Library</a></li>
                    </ul>
                </div>
                <div class="ft-link">
                	<h3>Tech & Innovations</h3>
                    <ul>
                    	<li><a href="#">Quality Principles & Deming Journey</a></li>
                        <li><a href="#">Process Design</a></li>
                        <li><a href="#">Plan & Machinery</a></li>
                        <li><a href="#">EHS Principles</a></li>
                    </ul>
                </div>
                <div class="ft-link">
                	<h3>Stay Connected</h3>
                    <ul>
                    	<li><a href="#">Contact us</a></li>
                        <li><a href="#">Find a Distributor</a></li>
                        <li><a href="#">Power of C-T-R</a></li>
                        <li><a href="#">Have a Question?</a></li>
                    </ul>
                </div>
                <div class="ft-link">
                	<h3>Follow Us</h3>
                    <ul class="social">
                    	<li class="fb"><a href="#">facebook</a></li> 
                        <li class="twt"><a href="#">twitter</a></li>
                        <li class="instagrm"><a href="#">Instagram</a></li>
                    </ul>
                    <h3>NEWSLETTER</h3>
                    <form class="newsletter">
                    	<div class="form-item">
                        	<input class="email" type="email" name="" placeholder="Enter Your Email ID"/>
                            <input type="submit" value="Go"/>
                        </div>
                    </form>
                </div>
            </div>            
        </div>
    </div>
    <div class="copyright">
    	<div class="container">
        	<div class="row clearfix">
                <div class="left"><img src="images/rpg.png" alt="RPG"/></div>
                <div class="right"><p>Copyright © 2017 CEAT Ltd. All rights reserved.</p></div>
            </div>
        </div>
    </div>
</footer>
</section>


	
	
	
<div id="page-wrapper"><div id="page">

  <div id="header" class="<?php print $secondary_menu ? 'with-secondary-menu': 'without-secondary-menu'; ?>"><div class="section clearfix">

    <?php if ($logo): ?>
      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
        <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
      </a>
    <?php endif; ?>

    <?php if ($site_name || $site_slogan): ?>
      <div id="name-and-slogan">

        <?php if ($site_name): ?>
          <?php if ($title): ?>
            <div id="site-name">
              <strong>
                <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
              </strong>
            </div>
          <?php else: /* Use h1 when the content title is empty */ ?>
            <h1 id="site-name">
              <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
            </h1>
          <?php endif; ?>
        <?php endif; ?>

        <?php if ($site_slogan): ?>
          <div id="site-slogan"<?php if ($hide_site_slogan) { print ' class="element-invisible"'; } ?>>
            <?php print $site_slogan; ?>
          </div>
        <?php endif; ?>

      </div> <!-- /#name-and-slogan -->
    <?php endif; ?>

    <?php print render($page['header']); ?>

    <?php if ($main_menu): ?>
      <div id="main-menu" class="navigation">
        <?php print theme('links__system_main_menu', array(
          'links' => $main_menu,
          'attributes' => array(
            'id' => 'main-menu-links',
            'class' => array('links', 'clearfix'),
          ),
          'heading' => array(
            'text' => t('Main menu'),
            'level' => 'h2',
            'class' => array('element-invisible'),
          ),
        )); ?>
      </div> <!-- /#main-menu -->
    <?php endif; ?>

    <?php if ($secondary_menu): ?>
      <div id="secondary-menu" class="navigation">
        <?php print theme('links__system_secondary_menu', array(
          'links' => $secondary_menu,
          'attributes' => array(
            'id' => 'secondary-menu-links',
            'class' => array('links', 'inline', 'clearfix'),
          ),
          'heading' => array(
            'text' => t('Secondary menu'),
            'level' => 'h2',
            'class' => array('element-invisible'),
          ),
        )); ?>
      </div> <!-- /#secondary-menu -->
    <?php endif; ?>

  </div></div> <!-- /.section, /#header -->

  <?php if ($messages): ?>
    <div id="messages"><div class="section clearfix">
      <?php print $messages; ?>
    </div></div> <!-- /.section, /#messages -->
  <?php endif; ?>

  <?php if ($page['featured']): ?>
    <div id="featured"><div class="section clearfix">
      <?php print render($page['featured']); ?>
    </div></div> <!-- /.section, /#featured -->
  <?php endif; ?>

  <div id="main-wrapper" class="clearfix"><div id="main" class="clearfix">

    <?php if ($breadcrumb): ?>
      <div id="breadcrumb"><?php print $breadcrumb; ?></div>
    <?php endif; ?>

    <?php /*if ($page['sidebar_first']): ?>
      <div id="sidebar-first" class="column sidebar"><div class="section">
        <?php print render($page['sidebar_first']); ?>
      </div></div> <!-- /.section, /#sidebar-first -->
    <?php endif;*/ ?>

    <div id="content" class="column"><div class="section">
      <?php if ($page['highlighted']): ?><div id="highlighted"><?php print render($page['highlighted']); ?></div><?php endif; ?>
      <a id="main-content"></a>
      <?php print render($title_prefix); ?>
      <?php /*if ($title): ?>
        <h1 class="title" id="page-title">
          <?php //print $title; ?>
        </h1>
      <?php endif;*/ ?>
      <?php print render($title_suffix); ?>
      <?php if ($tabs): ?>
        <div class="tabs">
          <?php print render($tabs); ?>
        </div>
      <?php endif; ?>
      <?php print render($page['help']); ?>
      <?php if ($action_links): ?>
        <ul class="action-links">
          <?php print render($action_links); ?>
        </ul>
      <?php endif; ?>
      <?php print render($page['content']); ?>
      <?php print $feed_icons; ?>
      
    </div></div> <!-- /.section, /#content -->

    <?php /*if ($page['sidebar_second']): ?>
      <div id="sidebar-second" class="column sidebar"><div class="section">
        <?php print render($page['sidebar_second']); ?>
      </div></div> <!-- /.section, /#sidebar-second -->
    <?php endif;*/ ?>

  </div></div> <!-- /#main, /#main-wrapper -->

  <?php if ($page['triptych_first'] || $page['triptych_middle'] || $page['triptych_last']): ?>
    <div id="triptych-wrapper"><div id="triptych" class="clearfix">
      <?php print render($page['triptych_first']); ?>
      <?php print render($page['triptych_middle']); ?>
      <?php print render($page['triptych_last']); ?>
    </div></div> <!-- /#triptych, /#triptych-wrapper -->
  <?php endif; ?>

  <div id="footer-wrapper"><div class="section">

    <?php if ($page['footer_firstcolumn'] || $page['footer_secondcolumn'] || $page['footer_thirdcolumn'] || $page['footer_fourthcolumn']): ?>
      <div id="footer-columns" class="clearfix">
        <?php print render($page['footer_firstcolumn']); ?>
        <?php print render($page['footer_secondcolumn']); ?>
        <?php print render($page['footer_thirdcolumn']); ?>
        <?php print render($page['footer_fourthcolumn']); ?>
      </div> <!-- /#footer-columns -->
    <?php endif; ?>

    <?php if ($page['footer']): ?>
      <div id="footer" class="clearfix">
        <?php print render($page['footer']); ?>
      </div> <!-- /#footer -->
    <?php endif; ?>

  </div></div> <!-- /.section, /#footer-wrapper -->

</div></div> <!-- /#page, /#page-wrapper -->
