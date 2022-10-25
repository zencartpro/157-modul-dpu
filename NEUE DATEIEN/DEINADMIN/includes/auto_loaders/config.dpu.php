<?php
/**
 * @package Dynamic Price Updater for Zen Cart German 1.5.7
 * Zen Cart German Specific
 * @copyright Dan Parry (Chrome) / Erik Kerkhoven (Design75) / mc12345678
 * @copyright Copyright 2003-2022 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: config_dpu.php 2022-10-25 16:13:51Z webchills $
 */

if (!defined('IS_ADMIN_FLAG')) {
  die('Illegal Access');
} 


  $autoLoadConfig[999][] = array(
    'autoType' => 'init_script',
    'loadFile' => 'init_dpu_config.php'
  );
