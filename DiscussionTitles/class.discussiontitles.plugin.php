<?php
/**
 * @copyright 2009-2019 Vanilla Forums Inc.
 * @license http://www.opensource.org/licenses/gpl-2.0.php GNU GPL v2
 * @package DiscussionTitles
 */

/**
 * Class DiscussionTitlesPlugin
 */
class DiscussionTitlesPlugin extends Gdn_Plugin {

    function stripTrailingPeriods($str) {
        return preg_replace('/[[:punct:]]+$/', '', $str);
    }

    public function discussionModel_beforeSaveDiscussion_handler($sender, $args) {
        try {
            $args['FormPostValues']['Name'] = $this->stripTrailingPeriods($args['FormPostValues']['Name']);
        } catch (Exception $e) {
            Logger.error($e->getMessage());
        }
    }
}
