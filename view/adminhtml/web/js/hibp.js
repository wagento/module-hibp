define([
    'jquery',
    'mage/url'
], function ($, urlBuilder) {
    'use strict';

    return function hibp(password, doneCallback) {
        const ajaxPostUrl = urlBuilder.buil('hibp/index/ajaxPost');

        $.ajax({
            url: ajaxPostUrl,
            data: {password: password},
            type: 'POST'
        }).done(doneCallback);
    };
});
