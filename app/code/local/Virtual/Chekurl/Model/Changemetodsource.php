<?php

/**
 * Used in creating options for Yes|No config value selection
 *
 */
class Virtual_Chekurl_Model_Changemetodsource
{
    const UNIQUE_URL_KEY_SUFFIX_HASH = 1;
    const UNIQUE_URL_KEY_SUFFIX_INC = 2;
    const UNIQUE_URL_KEY_SUFFIX_RANDOM = 3;
    
    public function toOptionArray()
    {
        $themes = array(
            array('value' => self::UNIQUE_URL_KEY_SUFFIX_HASH, 'label' => 'hash'),
            array('value' => self::UNIQUE_URL_KEY_SUFFIX_INC, 'label' => 'increment'),
            array('value' => self::UNIQUE_URL_KEY_SUFFIX_RANDOM, 'label' => 'random number'),
        );

        return $themes;
    }
}
