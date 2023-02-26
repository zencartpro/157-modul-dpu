<?php
/**
 * @package Dynamic Price Updater for Zen Cart German 1.5.7
 * @copyright Copyright 2003-2022 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: 3_2_1.php 2023-02-26 09:49:51Z webchills $
 */
 
$db->Execute(" SELECT @gid:=configuration_group_id
FROM ".TABLE_CONFIGURATION_GROUP."
WHERE configuration_group_title= 'Dynamic Price Updater'
LIMIT 1;");

$db->Execute("INSERT IGNORE INTO ".TABLE_CONFIGURATION." (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added, last_modified, use_function, set_function) VALUES
('DPU - Dynamic Price Updater Status', 'DPU_STATUS', 'true', 'Enable Dynamic Price Updater?', @gid, 1, now(), now(), NULL, 'zen_cfg_select_option(array(\'true\', \'false\'),'),
('DPU - Show product quantity', 'DPU_SHOW_QUANTITY', 'false', '', @gid, 2, NULL, now(), NULL, 'zen_cfg_select_option(array(\'true\', \'false\'),'),
('DPU - Show a small loading graphic', 'DPU_SHOW_LOADING_IMAGE', 'false', 'true to show a small loading graphic so the user knows something is happening', @gid, 3, now(), now(), NULL, 'zen_cfg_select_option(array(\'true\', \'false\'),'),
('DPU - Show currency symbols', 'DPU_SHOW_CURRENCY_SYMBOLS', 'true', '', @gid, 4, NULL, now(), NULL, 'zen_cfg_select_option(array(\'true\', \'false\'),'),
('DPU - Where to display the weight', 'DPU_WEIGHT_ELEMENT_ID', 'productWeight', 'This is the ID where your weight is displayed.<br /><strong>default => productWeight</strong>', @gid, 5, now(), now(), NULL, NULL),
('DPU - Define used to set a variable for this script', 'DPU_PRODUCT_FORM', 'cart_quantity', 'This should never change<br /><strong>default => cart_quantity</strong>', @gid, 6, now(), now(), NULL, NULL),
('DPU - Where to display the second price', 'DPU_SECOND_PRICE', '', 'Leave blank to not display<br/><strong>default => cartAdd</strong>', @gid, 7, now(), now(), NULL, NULL),
('DPU - Where to display the price', 'DPU_PRICE_ELEMENT_ID', 'dpu', 'This is the ID of the element where your price is displayed.<br /><strong>default => productPrices</strong>', @gid, 8, now(), now(), NULL, NULL),
('DPU - Show alternate text for partial selection', 'DPU_ATTRIBUTES_MULTI_PRICE_TEXT', 'none', 'When selections are being made that affect the price of the product, what alternate text if any should be shown to the customer.  For example if when no selections have been made, the ZC starting at text may be displayed.  When one selection of many has been made, then the text may be changed to at least this amount indicating that there are selections to be made that could increase the price.  Then once all selections have been made as expected/required the text is or should change to something like Your Price:.<br /><br /><b>Default: start_at_least</b><br /><br />start_at_least: display applicable start at or at least text<br />start_at: display start_at text until all selections have been made<br />at_least: once a selection has been made that does not complete selection display the at_least text.', @gid, 10, now(), now(), NULL, 'zen_cfg_select_option(array(\'none\', \'start_at_least\', \'start_at\', \'at_least\'),'),
('DPU - Show or update the display of out-of-stock', 'DPU_SHOW_OUT_OF_STOCK_IMAGE', 'quantity_replace', 'Allows display of the current stock status of a product while the customer remains on the product information page and offers control about the ajax update when the product is identified as out-of-stock.<br /><br /><b>default: quantity_replace</b><br /><br />quantity_replace: if incorporated, instead of showing the quantity of product, display DPU_OUT_OF_STOCK_IMAGE.<br />after: display DPU_OUT_OF_STOCK_IMAGE after the quantity display.<br />before: display DPU_OUT_OF_STOCK_IMAGE before the quantity display.<br />price_replace_only: update the price of the product to display DPU_OUT_OF_STOCK_IMAGE', @gid, 11, now(), now(), NULL, 'zen_cfg_select_option(array(\'quantity_replace\', \'after\', \'before\', \'price_replace_only\'),'),
('DPU - Modify minimum attribute display price', 'DPU_PROCESS_ATTRIBUTES', 'all', 'On what should the minimum display price be based for product with attributes? <br /><br />Only product that are priced by attribute or for all product that have attributes?<br /><br /><b>Default: all</b>', @gid, 12, now(), now(), NULL, 'zen_cfg_select_option(array(\'all\', \'priced_by\'),'),
('DPU - Where to display the product_quantity', 'DPU_PRODUCTDETAILSLIST_PRODUCT_INFO_QUANTITY', 'productDetailsList_product_info_quantity', 'This is the ID where your product quantity is displayed.<br /><br /><b>default => productDetailsList_product_info_quantity</b>', @gid, 13, now(), now(), NULL, NULL)");

$db->Execute("REPLACE INTO ".TABLE_CONFIGURATION_LANGUAGE." (configuration_title, configuration_key, configuration_description, configuration_language_id) VALUES
('DPU - Aktivieren?', 'DPU_STATUS', '<br />Wollen Sie die Dynamische Preisaktualisierung aktivieren?<br />', 43),
('DPU - Version', 'DPU_MODUL_VERSION', '<br />Derzeit installierte Version dieses Moduls<br />', 43),
('DPU - Artikelanzahl anzeigen?', 'DPU_SHOW_QUANTITY', '<br />Soll die Artikelanzahl angezeigt werden?<br />', 43),
('DPU - Grafik beim Laden', 'DPU_SHOW_LOADING_IMAGE', '<br />Soll beim Laden ein kleines Ladesymbol angezeigt werden, um dem Besucher zu signalisieren, dass etwas passiert?<br />', 43),
('DPU - Währungssymbole anzeigen?', 'DPU_SHOW_CURRENCY_SYMBOLS', '<br />Sollen die Währungssymbole angezeigt werden?<br />', 43),
('DPU - Wo soll das Gewicht angezeigt werden?', 'DPU_WEIGHT_ELEMENT_ID', '<br />ID des Elements bei dem das Gewicht angezeigt wird.<br />', 43),
('DPU - Product Form - NICHT ändern!', 'DPU_PRODUCT_FORM', '<br />Diesen Wert NIE ändern und auf cart_quantity lassen!<br />', 43),
('DPU - Zusätzlichen zweiten Preis anzeigen?', 'DPU_SECOND_PRICE', '<br />Voreinstellung: leer. Wenn Sie den zweiten Preis zusätzlich in einem anderen Bereich anzeigen wollen, dann geben Sie die ID des Elements für die Anzeige eines zweiten Preises ein. Wenn Sie hier z.B. cartAdd eintragen, dann wird bei der Schaltfläche in den Warenkorb der aktualisierte Preis zusätzlich nochmals angezeigt.<br />', 43),
('DPU - Wo soll der Preis angezeigt werden?', 'DPU_PRICE_ELEMENT_ID', '<br />ID des Elements, bei dem der Preis angezeigt wird. Voreinstellung: dpu. Sie müssen im Template tpl_product_info_display.php die nötige Änderung vorgenommen haben!<br />', 43),
('DPU - Alternativtext für die teilweise Auswahl', 'DPU_ATTRIBUTES_MULTI_PRICE_TEXT', '<br />Wenn eine Auswahl getroffen wird, die sich auf den Preis des Produkts auswirkt, sollte der alternative Text, falls vorhanden, dem Kunden angezeigt werden. Wenn beispielsweise keine Auswahl getroffen wurde, kann der ZC ab dem Text angezeigt werden. Wenn eine Auswahl von vielen vorgenommen wurde, kann der Text auf mindestens diesen Betrag geändert werden, was anzeigt, dass Auswahlen getroffen werden müssen, die den Preis erhöhen könnten. Dann, wenn alle Auswahlen wie erwartet / erforderlich gemacht wurden, sollte der Text zu etwas wie Ihrem Preis: oder ändern. <br /> <br /> <b> Voreinstellung: start_at_least</b><br /><br />start_at_least: Zeige den geeigneten Text ab oder wenigstens an<br />start_at: Zeige den Text ab an bis alle Auswahlmöglichkeiten getroffen wurden<br />at_least: Solange eine noch nicht vollständige Auswahl getroffen wurde, zeige den Text wenigstens an.<br />', 43),
('DPU - Nicht lagernd Anzeige', 'DPU_SHOW_OUT_OF_STOCK_IMAGE', '<br />Ermöglicht die Anzeige des aktuellen Bestandsstatus eines Artikels, während der Kunde auf der Produktinformationsseite bleibt, und bietet Kontrolle über das Ajax-Update, wenn der Artikel als nicht verfügbar identifiziert wird.<br /><br /><b>Voreinstellung: quantity_replace</b><br /><br />quantity_replace: Falls aktiviert wird anstelle der Lagerbestandsmenge der aktualisierte Lagerbestand je nach gewählter Menge angezeigt.<br />after: Zeige den aktualisierten Bestand unterhalb der Lagerbestandsanzeige.<br />before: Zeige den aktualisierten Bestand vor der Lagerbestandsanzeige.<br />price_replace_only: Aktualisiere lediglich den Artikelpreis<br />', 43),
('DPU - Mindestattributsanzeigepreis ändern', 'DPU_PROCESS_ATTRIBUTES', '<br />Worauf soll der minimale Preis bei Artikeln mit Attributen basieren? <br /><br />Nur für Artikel, deren Preis durch Attribute festegelegt ist oder für alle Artikel mit Attributen?<br /><br /><b>Voreinstellung: all</b><br />', 43),
('DPU - Wo soll die Artikelanzahl angezeigt werden', 'DPU_PRODUCTDETAILSLIST_PRODUCT_INFO_QUANTITY','<br />Geben Sie hier die ID des Elements an, wo die Artikelanzahl (falls oben aktiviert) angezeigt werden soll.<br /><br /><b>Voreinstellung => productDetailsList_product_info_quantity</b><br />', 43)");

// delete old configuration/ menu
$admin_page = 'configDPU';
$db->Execute("DELETE FROM " . TABLE_ADMIN_PAGES . " WHERE page_key = '" . $admin_page . "' LIMIT 1;");
// add configuration menu
if (!zen_page_key_exists($admin_page)) {
$db->Execute(" SELECT @gid:=configuration_group_id
FROM ".TABLE_CONFIGURATION_GROUP."
WHERE configuration_group_title= 'Dynamic Price Updater'
LIMIT 1;");
$db->Execute("INSERT IGNORE INTO " . TABLE_ADMIN_PAGES . " (page_key,language_key,main_page,page_params,menu_key,display_on_menu,sort_order) VALUES 
('configDPU','BOX_CONFIGURATION_DYNAMIC_PRICE_UPDATER','FILENAME_CONFIGURATION',CONCAT('gID=',@gid),'configuration','Y',@gid)");
$messageStack->add('Dynamic Price Updater erfolgreich installiert.', 'success');  
}