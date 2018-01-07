<?php

/**
 * @file
 * Preprocess hook for nodes.
 */

/**
 * Implements hook_preprocess_node().
 */
function nepstandards_preprocess_node(&$variables) {
  // For now, give every node the usa-content class so nothing will be too
  // wide.
  $variables['attributes']['class'][] = 'usa-content';
}
