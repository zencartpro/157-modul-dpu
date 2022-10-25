########################################################################
# Dynamic Price Updater 3.3.0 UNINSTALL - 2022-10-25 - webchills
# Nur ausführen, wenn Sie das Modul aus der Datenbank entfernen wollen!
########################################################################

DELETE FROM configuration_group WHERE configuration_group_title = 'Dynamic Price Updater';
DELETE FROM configuration WHERE configuration_key = 'DPU_MODUL_VERSION';
DELETE FROM configuration WHERE configuration_key = 'DPU_STATUS';
DELETE FROM configuration WHERE configuration_key = 'DPU_SHOW_QUANTITY';
DELETE FROM configuration WHERE configuration_key = 'DPU_SHOW_LOADING_IMAGE';
DELETE FROM configuration WHERE configuration_key = 'DPU_SHOW_CURRENCY_SYMBOLS';
DELETE FROM configuration WHERE configuration_key = 'DPU_WEIGHT_ELEMENT_ID';
DELETE FROM configuration WHERE configuration_key = 'DPU_PRODUCT_FORM';
DELETE FROM configuration WHERE configuration_key = 'DPU_SECOND_PRICE';
DELETE FROM configuration WHERE configuration_key = 'DPU_PRICE_ELEMENT_ID';
DELETE FROM configuration WHERE configuration_key = 'DPU_SHOW_SIDEBOX_CURRENCY_SYMBOLS';
DELETE FROM configuration WHERE configuration_key = 'DPU_ATTRIBUTES_MULTI_PRICE_TEXT';
DELETE FROM configuration WHERE configuration_key = 'DPU_SHOW_OUT_OF_STOCK_IMAGE';
DELETE FROM configuration WHERE configuration_key = 'DPU_PROCESS_ATTRIBUTES';
DELETE FROM configuration WHERE configuration_key = 'DPU_PRODUCTDETAILSLIST_PRODUCT_INFO_QUANTITY';
DELETE FROM configuration_language WHERE configuration_key = 'DPU_MODUL_VERSION';
DELETE FROM configuration_language WHERE configuration_key = 'DPU_STATUS';
DELETE FROM configuration_language WHERE configuration_key = 'DPU_SHOW_QUANTITY';
DELETE FROM configuration_language WHERE configuration_key = 'DPU_SHOW_LOADING_IMAGE';
DELETE FROM configuration_language WHERE configuration_key = 'DPU_SHOW_CURRENCY_SYMBOLS';
DELETE FROM configuration_language WHERE configuration_key = 'DPU_WEIGHT_ELEMENT_ID';
DELETE FROM configuration_language WHERE configuration_key = 'DPU_PRODUCT_FORM';
DELETE FROM configuration_language WHERE configuration_key = 'DPU_SECOND_PRICE';
DELETE FROM configuration_language WHERE configuration_key = 'DPU_PRICE_ELEMENT_ID';
DELETE FROM configuration_language WHERE configuration_key = 'DPU_SHOW_SIDEBOX_CURRENCY_SYMBOLS';
DELETE FROM configuration_language WHERE configuration_key = 'DPU_ATTRIBUTES_MULTI_PRICE_TEXT';
DELETE FROM configuration_language WHERE configuration_key = 'DPU_SHOW_OUT_OF_STOCK_IMAGE';
DELETE FROM configuration_language WHERE configuration_key = 'DPU_PROCESS_ATTRIBUTES';
DELETE FROM configuration_language WHERE configuration_key = 'DPU_PRODUCTDETAILSLIST_PRODUCT_INFO_QUANTITY';
DELETE FROM admin_pages WHERE page_key='configDPU';