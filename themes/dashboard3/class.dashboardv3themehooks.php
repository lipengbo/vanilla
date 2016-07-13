<?php

class DashboardV3ThemeHooks implements Gdn_IPlugin {

    /**
     * No setup required.
     */
    public function setup()
    {

    }

    /**
     * @param Gdn_Controller $sender
     */
    public function base_render_before($sender) {
        $sender->addJsFile('custom.js', 'themes/dashboard3');
        $sender->addJsFile('jquery.expander.js');
        $sender->addJsFile('settings.js', 'dashboard');
        $sender->addJsFile('vendors/tether.min.js', 'themes/dashboard3');
        $sender->addJsFile('vendors/util.js', 'themes/dashboard3');
        $sender->addJsFile('vendors/drop.min.js', 'themes/dashboard3');
        $sender->addJsFile('vendors/tooltip.js', 'themes/dashboard3');
        $sender->addJsFile('vendors/clipboard.min.js', 'themes/dashboard3');
        $sender->addJsFile('vendors/dropdown.js', 'themes/dashboard3');
        $sender->addJsFile('vendors/collapse.js', 'themes/dashboard3');
        $sender->addJsFile('vendors/modal.js', 'themes/dashboard3');
        $sender->addJsFile('vendors/icheck.min.js', 'themes/dashboard3');
        $sender->addJsFile('vendors/jquery-scrolltofixed-min.js', 'themes/dashboard3');
        $sender->addJsFile('vendors/prettify/prettify.js', 'themes/dashboard3');
        $sender->addJsFile('vendors/ace/ace.js', 'themes/dashboard3');
        $sender->addCssFile('vendors/tomorrow.css', 'themes/dashboard3');
    }
}
