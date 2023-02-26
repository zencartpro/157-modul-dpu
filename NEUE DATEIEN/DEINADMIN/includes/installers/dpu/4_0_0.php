<?php
$db->Execute("DELETE FROM " . TABLE_CONFIGURATION . " WHERE configuration_key = 'DPU_SHOW_SIDEBOX_CURRENCY_SYMBOLS';");
$db->Execute("DELETE FROM " . TABLE_CONFIGURATION_LANGUAGE . " WHERE configuration_key = 'DPU_SHOW_SIDEBOX_CURRENCY_SYMBOLS';");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = '4.0.0' WHERE configuration_key = 'DPU_MODUL_VERSION';");