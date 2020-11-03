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
            console.log("MIXIN"+password);
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
                return;
            }

            $(self.options.hibpCountSelector).show();
            $(self.options.hibpCountLabelSelector).text(count);
        },
    };

    return function (targetWidget) {
        $.widget('mage.passwordStrengthIndicator', targetWidget, passwordStrengthIndicatorMixin);
        return $.mage.passwordStrengthIndicator;
    };
});
