<?php
define('BOX_HEADING_DYNAMIC_PRICE_UPDATER_SIDEBOX', 'Preisberechnung'); // the heading that shows in the Updater sidebox
define('DPU_BASE_PRICE', 'Grundpreis');
define('UPDATER_PREFIX_TEXT', '');
define('UPDATER_PREFIX_TEXT_STARTING_AT', 'ab: ');
define('UPDATER_PREFIX_TEXT_AT_LEAST', 'mindestens: ');
define('DPU_SHOW_QUANTITY_FRAME', '&nbsp;(%s)');
define('DPU_SIDEBOX_QUANTITY_FRAME', '&nbsp;x&nbsp;%s'); // how the weight is displayed in the sidebox.  Default is ' x 1'... set to '' for no display... %s is the quantity itself
define('DPU_SIDEBOX_PRICE_FRAME', '&nbsp;(%s)'); // how the attribute price is displayed
define('DPU_SIDEBOX_TOTAL_FRAME', '<span class="DPUSideboxTotalText">Gesamt: </span><span class="DPUSideboxTotalDisplay">%s</span>'); // this is how the total should be displayed.  %s is the price itself as displayed in the
define('DPU_SIDEBOX_FRAME', '<span class="DPUSideBoxName">%1$s</span>%3$s%2$s<br />'); // the template for the sidebox display.  Instructions below
/*
 *DPU_SIDEBOX_FRAME has 3 variables you can use... They are:
 * %1$s - The attribute name
 * %2$s - The quantity display
 * %3$s - The individual price display
 * You can position these anywhere around the DPU_SIDEBOX_FRAME string or even remove them to prevent them from displaying
 */