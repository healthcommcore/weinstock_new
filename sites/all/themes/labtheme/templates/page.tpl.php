<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
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
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['hero']: Items for the hero content region.
 * - $page['content']: The main content of the current page.
 * - $page['left_column']: Items for the first sidebar.
 * - $page['right_column']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see bootstrap_preprocess_page()
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see bootstrap_process_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup templates
 */
?>
<?php
  $switch_css = $is_front ? 'home' : 'inside';
  $logo_width = 'col-sm-7';
  if (!empty($page['header_center'])) {
    $logo_width = 'col-sm-4';
  }
?>

<header role="banner" class="">
  <div class="header-logo-blue-left absolute">
    <div class="header-logo-gray-right absolute"></div>
    <div class="container">
      <div class="header-logo row">
        <?php if ($logo): ?>
        <div class="<?php print $logo_width; ?>">
            <a class="logo" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
              <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
            </a>
          </div>
        <?php endif; ?>
      <?php if (!empty($page['header_center'])): ?>
        <div class="col-sm-3">
          <?php print render($page['header_center']); ?>
        </div>
      <?php endif; ?>
      <?php if (!empty($page['header_right'])): ?>
        <div class="col-sm-5">
          <?php print render($page['header_right']); ?>
        </div>
      <?php endif; ?>
      </div>
    </div>
    <?php if (!empty($page['header_search'])): ?>
      <div class="header-search">
        <div class="container">
          <div class="absolute">
            <div class="container">
              <div class="col-sm-4 col-sm-offset-8">
                <div class="search-styles">
                  <?php print render($page['header_search']); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>
</header>

<div class="nav-color-<?php echo $switch_css; ?>">
  <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only"><?php print t('Toggle navigation'); ?></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
  </div>
  <?php if (!empty($primary_nav) || !empty($secondary_nav) || !empty($page['navigation'])): ?>
    <div class="navbar-collapse collapse">
      <nav role="navigation" class="container">
        <?php if (!empty($primary_nav)): ?>
          <?php print render($primary_nav); ?>
        <?php endif; ?>
        <?php if (!empty($secondary_nav)): ?>
          <?php print render($secondary_nav); ?>
        <?php endif; ?>
        <?php if (!empty($page['navigation'])): ?>
          <?php print render($page['navigation']); ?>
        <?php endif; ?>
      </nav>
    </div>
  <?php endif; ?>
</div><!-- switch css -->
<?php if (!empty($page['hero'])): ?>
  <div class="hero">
    <?php print render($page['hero']); ?>
  </div>
<?php endif; ?>
<?php if (!empty($page['hero_text'])): ?>
  <div class="container">
    <div class="absolute">
      <div class="container">
        <div class="hero-text">
          <?php print render($page['hero_text']); ?>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>
<div class="main-container content-area-color">
  <div class="container">
    <div class="row">
    <div class="main-container-margin">
    <?php if (!empty($page['left_column'])): ?>
      <aside class="col-sm-3 hidden-xs" role="complementary">
        <?php print render($page['left_column']); ?>
      </aside>  <!-- /#sidebar-first -->
    <?php endif; ?>

    <section<?php print $content_column_class; ?>>
      <?php if (!empty($breadcrumb)): print $breadcrumb; endif;?>
      <a id="main-content"></a>
      <div class="main-content-margin">
        <?php print render($title_prefix); ?>
        <?php if (!empty($title) && !$is_front) : ?>
          <h1><?php print $title; ?></h1>
        <?php endif; ?>
        <?php print render($title_suffix); ?>
        <?php print $messages; ?>
        <?php if (!empty($tabs)): ?>
          <?php print render($tabs); ?>
        <?php endif; ?>
        <?php if (!empty($page['help'])): ?>
          <?php print render($page['help']); ?>
        <?php endif; ?>
        <?php if (!empty($action_links)): ?>
          <ul class="action-links"><?php print render($action_links); ?></ul>
        <?php endif; ?>
        <div class="page-content">
          <?php print render($page['content']); ?>
        </div>
      </div>
    </section>

    <?php if (!empty($page['right_column'])): ?>
      <aside class="col-sm-3" role="complementary">
        <?php print render($page['right_column']); ?>
      </aside>  <!-- /#sidebar-second -->
    <?php endif; ?>

      </div><!-- /main-container-margin -->
    </div><!-- /row -->
  </div><!-- /container -->
</div><!-- /main-container -->

<footer>
<div class="footer container">
	<?php if (!empty($page['footer_logos']) || !empty($page['footer_legal'])): ?>
		<div class="row">
			<?php if (!empty($page['footer_logos'])): ?>
				<div class="col-md-8 footer-logos">
					<?php print render($page['footer_logos']); ?>
				</div>
			<?php endif; ?>
			<?php if (!empty($page['footer_legal'])): ?>
				<div class="col-md-4 footer-legal">
					<?php print render($page['footer_legal']); ?>
				</div>
			<?php endif; ?>
		</div>
	<?php endif; ?>
	<?php print render($page['footer']); ?>
  </div>
</footer>

