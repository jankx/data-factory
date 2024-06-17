<?php
use Jankx\DataFactory\Registry\CustomPostTypesRegistry;
use Jankx\DataFactory\Registry\TaxonomiesRegistry;
use Jankx\GlobalConfigs;

// Register custom post types
$customPostTypesRegistry = new CustomPostTypesRegistry();
add_action('init', [$customPostTypesRegistry, 'registerPostTypes']);

// Register taxonomies
$taxonomiesRegistry = new TaxonomiesRegistry();
add_action('init', [$taxonomiesRegistry, 'registerTaxonomies']);

add_action('jankx/configs/parse', function($themeConfigurations) {
    GlobalConfigs::set('post_types', array_get($themeConfigurations->getCustoms(), 'post_types', []));
    GlobalConfigs::set('taxonomies', array_get($themeConfigurations->getCustoms(), 'taxonomies', []));
});
