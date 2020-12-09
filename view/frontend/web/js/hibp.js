/**
 * Wagento Have I Been Pwned?
 *
 * Adds test to built-in password strength indicator to check if password has
 * been used on other sites.
 *
 * @author Joseph Leedy <joseph@wagento.com>, Chirag Dodia <chirag.dodia@wagento.com>
 * @copyright Copyright (c) Wagento Creative LLC. (https://www.wagento.com/)
 * @license https://opensource.org/licenses/OSL-3.0.php Open Software License 3.0
 */
define([
    'jquery',
    'mage/url'
], function ($, urlBuilder) {
    'use strict';

    return function hibp(password, doneCallback) {
        const ajaxPostUrl = urlBuilder.build('hibp/index/ajaxPost');

        $.ajax({
            url: ajaxPostUrl,
            data: {password: password},
            type: 'POST'
        }).done(doneCallback);
    };
});
