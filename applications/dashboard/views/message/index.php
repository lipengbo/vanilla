<?php if (!defined('APPLICATION')) exit();
$Session = Gdn::session();
?>
    <?php Gdn_Theme::assetBegin('Help'); ?>
    <div class="Help Aside">
        <?php echo '<h2>'.sprintf(t('About %s'), t('Messages')).'</h2>';
        echo t('Messages can appear anywhere in your application.', 'Messages can appear anywhere in your application, and can be used to inform your users of news and events. Use this page to re-organize your messages by dragging them up or down.');
        echo '<h2>', t('Need More Help?'), '</h2>';
        echo '<ul>';
        echo wrap(Anchor(t("Video tutorial on managing appearance"), 'settings/tutorials/appearance'), 'li');
        echo '</ul>';
        ?>
    </div>
    <?php Gdn_Theme::assetEnd(); ?>
    <div class="header-block">
        <h1><?php echo t('Manage Messages'); ?></h1>
        <?php echo anchor(t('Add Message'), 'dashboard/message/add', 'js-modal btn btn-primary'); ?>
    </div>
<?php if ($this->MessageData->numRows() > 0) { ?>
<div class="table-wrap">
    <table id="MessageTable" border="0" cellpadding="0" cellspacing="0" class="AltColumns Sortable">
        <thead>
        <tr id="0">
            <th><?php echo t('Location'); ?></th>
            <th class="Alt"><?php echo t('Message'); ?></th>
            <th class="options"><?php echo t('Options'); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php
        $Alt = false;
        foreach ($this->MessageData->result() as $Message) {
            $Message = $this->MessageModel->DefineLocation($Message);
            $Alt = !$Alt;
            ?>
            <tr id="<?php
            echo $Message->MessageID;
            echo $Alt ? '" class="Alt' : '';
            ?>">
                <td class="Info nowrap"><?php
                    printf(
                        t('%1$s on %2$s'),
                        val($Message->AssetTarget, $this->_GetAssetData(), 'Custom Location'),
                        val($Message->Location, $this->_GetLocationData(), 'Custom Page')
                    );

                    if (val('CategoryID', $Message) && $Category = CategoryModel::categories($Message->CategoryID)) {
                        echo '<div>'.
                            anchor($Category['Name'], CategoryUrl($Category));

                        if (val('IncludeSubcategories', $Message)) {
                            echo ' '.t('and subcategories');
                        }

                        echo '</div>';
                    }
                    ?>
                    <div>
                        <strong><?php echo $Message->Enabled == '1' ? t('Enabled') : t('Disabled'); ?></strong>
                    </div>
                </td>
                <td class="Alt">
                    <div
                        class="Message <?php echo $Message->CssClass; ?>"><?php echo Gdn_Format::text($Message->Content); ?></div>
                </td>
                <td>
                    <div class="btn-group">
                        <?php
                        echo anchor(dashboardSymbol('edit'), '/dashboard/message/edit/'.$Message->MessageID, 'js-modal btn btn-icon', ['aria-label' => t('Edit')]);
                        echo anchor(dashboardSymbol('delete'), '/dashboard/message/delete/'.$Message->MessageID.'/'.$Session->TransientKey(), 'js-modal-confirm btn btn-icon', ['aria-label' => t('Delete')]);
                        ?>
                    </div>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<?php } ?>
