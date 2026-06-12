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
        'slug'     => 'ws-form/ws-form.php',
        'search'   => 'WS Form Lite',
        'repo_url' => 'https://wordpress.org/plugins/ws-form/',
    ),
    array(
        'name'     => 'Advanced Custom Fields',
        'slug'     => 'advanced-custom-fields/acf.php',
        'search'   => 'ACF',
        'repo_url' => 'https://wordpress.org/plugins/advanced-custom-fields/',
    ),
    array(
        'name'     => 'Polylang',
        'slug'     => 'polylang/polylang.php',
        'search'   => 'Polylang',
        'repo_url' => 'https://wordpress.org/plugins/polylang/',
    ),
    array(
        'name'     => 'KC Single Testimonial',
        'slug'     => 'kc-single-testimonial/kc-single-testimonial.php',
        'search'   => 'KC Single Testimonial',
        'repo_url' => 'https://github.com/g-i-kala/wp-custom-block-kc-single-testimonial',
    ),
    array(
        'name'     => 'KC Testimonials Grid',
        'slug'     => 'kc-testimonials-grid/kc-testimonials-grid.php',
        'search'   => 'KC Testimonials Grid',
        'repo_url' => 'https://github.com/g-i-kala/wp-custom-block-kc-testimonials-grid',
    ),
    array(
    'name'     => 'K::C ACF Testimonials',
    'slug'     => 'kc-acf-testimonials/kc-acf-testimonials.php',
    'search'   => 'K::C ACF Testimonials',
    'repo_url' => 'https://github.com/g-i-kala/wp-cpt-kc-acf-testimonials',
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