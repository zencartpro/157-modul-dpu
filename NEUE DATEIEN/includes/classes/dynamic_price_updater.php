<?php
/**
 * @package Dynamic Price Updater for Zen Cart German 1.5.7
 * Zen Cart German Specific
 * @copyright Dan Parry (Chrome) / Erik Kerkhoven (Design75) / mc12345678 / Zen4All / torvista
 * @copyright Copyright 2003-2023 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * Zen Cart German Version - www.zen-cart-pro.at
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: dynamic_price_updater.php 2023-02-25 20:34:51Z webchills $
 */
if (!defined('IS_ADMIN_FLAG')) {
  die('Illegal Access');
}

// set to true to enable a DPU debugging log
define('DPU_DEBUG', 'false');

/**
 * Class DPU
 */
class DPU extends base {
/**
 *
 * @global object $db
 * @param int $products_id
 * @return array
 */
    public function getOptionPricedIds(int $products_id): array
  {
    global $db;
    // Identify the attribute information associated with the $products_id.
    $attribute_price_query = "SELECT *
                              FROM " . TABLE_PRODUCTS_ATTRIBUTES . "
                              WHERE products_id = " . $products_id . "
                              ORDER BY options_id, options_values_price";

    $attribute_price = $db->Execute($attribute_price_query);

    $last_id = 'X';
    $options_id = [];

    // Populate $options_id to contain the options_ids that potentially affect price.
    while (!$attribute_price->EOF) {
      // If this options_id has already been captured, don't try to process again.
      if ($last_id === $attribute_price->fields['options_id']) {
        $attribute_price->MoveNext();
        continue;
      }

      /* Capture the options_id of option names that could affect price

        Identify an option name that could affect price by:
        having a price that is not zero,
        having quantity prices (though this is not (yet) deconstruct the prices and existing quantity),
        having a price factor that could affect the price,
        is a text field that has a word or letter price.
       */
      if (!(
              $attribute_price->fields['options_values_price'] === '0' &&
              !zen_not_null($attribute_price->fields['attributes_qty_prices']) &&
              !zen_not_null($attribute_price->fields['attributes_qty_prices_onetime']) &&
              $attribute_price->fields['attributes_price_onetime'] === '0' &&
              (
              $attribute_price->fields['attributes_price_factor'] ===
              $attribute_price->fields['attributes_price_factor_offset']
              ) &&
              (
              $attribute_price->fields['attributes_price_factor_onetime'] ===
              $attribute_price->fields['attributes_price_factor_onetime_offset']
              )
              ) ||
              (
              !($attribute_price->fields['attributes_price_words'] === '0' && $attribute_price->fields['attributes_price_letters'] === '0') &&
              zen_get_attributes_type($attribute_price->fields['products_attributes_id']) === PRODUCTS_OPTIONS_TYPE_TEXT
              )
      ) {

        $prefix_format = 'id[:option_id:]';

        $attribute_type = zen_get_attributes_type($attribute_price->fields['products_attributes_id']);

        switch ($attribute_type) {
          case (PRODUCTS_OPTIONS_TYPE_FILE):
          case (PRODUCTS_OPTIONS_TYPE_TEXT):
            $prefix_format = $db->bindVars($prefix_format, ':option_id:', TEXT_PREFIX . ':option_id:', 'noquotestring');
            break;
          default:
            $GLOBALS['zco_notifier']->notify('NOTIFY_DYNAMIC_PRICE_UPDATER_ATTRIBUTE_ID_TEXT', $attribute_price->fields, $prefix_format, $options_id, $last_id);
        }

        $result = $db->bindVars($prefix_format, ':option_id:', $attribute_price->fields['options_id'], 'integer');
        $options_id[$attribute_price->fields['options_id']] = $result;
        $last_id = $attribute_price->fields['options_id'];

        $attribute_price->MoveNext();
        continue;
      }

      $attribute_price->MoveNext();
    }

    return $options_id;
/* $options_id example:
 Array
      (
       [3] => id[3]
       [4] => id[4]
       )
 */
  }

}
