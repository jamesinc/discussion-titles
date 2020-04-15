<?php

class DiscussionTitlesPlugin extends Gdn_Plugin {
    /**
     * This plugin strips all trailing punctuation from discussion titles to enforce
     * grammar conventions around titles and make your discussion lists look a bit less
     * bleak!
     */

    function stripTrailingPunctuation($str) {
        return preg_replace('/[[:punct:]]+$/', '', $str);
    }

    public function discussionModel_beforeSaveDiscussion_handler($sender, $args) {
        $args['FormPostValues']['Name'] = $this->stripTrailingPunctuation($args['FormPostValues']['Name']);
    }
}
