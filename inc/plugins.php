<?php
/**
 * Plugin recommendation notice for ReikiFlow.
 */

add_action('admin_notices', 'reikiflow_plugin_notice');

function reikiflow_plugin_notice()
{
    if (! current_user_can('install_plugins')) {
        return;
    }

    $required_plugins = array(
        array(
            'name'     => 'CSS Class Manager',
            'slug'     => 'css-class-manager/css-class-manager.php',
            'search'   => 'CSS Class Manager',
            'repo_url' => 'https://wordpress.org/plugins/css-class-manager/',
        ),
        array(
            'name'     => 'WS Form Lite',
            'slug'     => 'ws-form/ws-form.php', // verify the exact main plugin file in your install
            'search'   => 'WS Form Lite',
            'repo_url' => 'https://wordpress.org/plugins/ws-form/',
        ),
    );

    $missing = array();

    foreach ($required_plugins as $plugin) {
        if (! in_array($plugin['slug'], get_option('active_plugins', array()), true)) {
            $missing[] = $plugin;
        }
    }

    if (empty($missing)) {
        return;
    }

    ?>
<div class="notice notice-warning">
  <p><strong>ReikiFlow:</strong> The following plugins are recommended for full theme functionality:</p>
  <ul style="list-style: disc; padding-left: 20px;">
    <?php foreach ($missing as $plugin) : ?>
    <li>
      <?php echo esc_html($plugin['name']); ?>
      —
      <a href="<?php echo esc_url($plugin['repo_url']); ?>"
        target="_blank" rel="noopener noreferrer">
        View plugin
      </a>
    </li>
    <?php endforeach; ?>
  </ul>
</div>
<?php
}
?>