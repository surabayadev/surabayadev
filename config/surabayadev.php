<?php

return [
    /**
     * Website Public theme
     */
    'theme' => 'sbydev-default',

    /**
     * Instagram fetch mechanism
     */
    'ig' => [
        /**
         * How many post's to fetch
         */
        'limit' => 6,

        /**
         * If the post type is Carousel, then how many each item to fetch
         */
        'limit_carousel' => 5,
    ],

    /**
     * Reserved word to prevent user to use.
     */
    'reserved_word' => ['support', 'system', 'noreply', 'no-reply', 'security', 'admin', 'tech', 'dev']
];
