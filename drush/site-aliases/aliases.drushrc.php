<?php
/**
 * @file
 * Drush aliases for naturalearthpaint.com.
 */

$aliases['nep.local'] = array(
  'root' => '/var/www/drupal/web',
  'uri' => 'http://local.naturalearthpaint.com',
  'remote-host' => 'local.naturalearthpaint.com',
  'remote-user' => 'vagrant',
  'ssh-options' => '-o PasswordAuthentication=no -i ' . drush_server_home() . '/.vagrant.d/insecure_private_key',
  'path-aliases' => array(
    '%drush-script' => '/usr/local/bin/drush',
    '%files' => '/var/www/drupal/web/sites/default/files',
  ),
);

$aliases['nep.prod'] = array(
  'root' => '/var/www/drupal/web',
  'uri' => 'http://brocktest.com',
  'remote-host' => 'brocktest.com',
  'remote-user' => 'nepvm',
  '%files' => '/var/www/drupal/web/sites/default/files',
);
?>
