define([
    'jquery',
    'Magento_Customer/js/zxcvbn',
    'Wagento_HIBP/js/hibp',
    'mage/translate',
    'mage/validation'
], function ($, zxcvbn, hibp, $t) {
    'use strict';

    var passwordStrengthIndicatorMixin = {
        options: {
            passwordFieldSelector: "input[name=password]",
            hibpCountSelector: '[data-role=hibp-count]',
            hibpCountLabelSelector: '[data-role=hibp-count-label]',
            submitButtonSelector: ":input[type=submit]",
            hibpstrictMessageSelector: '[data-role=hibp-strict-message]',
            hibpMode: ''
        },

        _bind: function () {
            var self = this;
            $(self.options.passwordFieldSelector).on('change', function () {
                self._checkHibp();

            });
            return this._super();
        },

        _checkHibp: function () {
            var self = this;
            var password = $(self.options.passwordFieldSelector).val();
            hibp(password, function (result) {
                self._displayHibpCount(result.count, self);
            });
        },

        /**
         * Display number of times password has been used
         * @param {Number} count
         * @private
         */
        _displayHibpCount: function (count, self) {
            if (count === 0) {
                $(self.options.hibpCountSelector).hide();
                $(self.options.submitButtonSelector).prop('disabled', false);
                return;
            }
            $(self.options.hibpCountSelector).show();
            $(self.options.hibpCountLabelSelector).text(count);
            if(self.options.hibpMode == 'restrict') {
                $(self.options.hibpstrictMessageSelector).show();
                $(self.options.submitButtonSelector).prop('disabled', true);
            } else {
                $(self.options.hibpstrictMessageSelector).hide();
                $(self.options.submitButtonSelector).prop('disabled', false);
            }
        },
    };

    return function (targetWidget) {
        $.widget('mage.passwordStrengthIndicator', targetWidget, passwordStrengthIndicatorMixin);
        return $.mage.passwordStrengthIndicator;
    };
});
