<?php

$skip_modules = array(
  'devel',
);
$command_specific['config-export']['skip-modules'] = $skip_modules;
$command_specific['config-import']['skip-modules'] = $skip_modules;
$command_specific['rsync'] = array('verbose' => TRUE);