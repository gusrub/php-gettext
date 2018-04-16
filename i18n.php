<?php

namespace Helpers\I18n {
    // I18N support information here
    $language = 'es_MX.utf8';
    putenv("LC_ALL=$language");
    putenv("LC_LANG=$language");
    setlocale(LC_ALL, $language);

    // // Set the text domain as 'messages'
    $domain = 'messages';
    bindtextdomain($domain, "Locale");
    textdomain($domain);

    function translate($str, ...$args)
    {
        return sprintf(_($str), ...$args);
    }
}
