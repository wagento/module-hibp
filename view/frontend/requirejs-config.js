/**
 * Wagento Have I Been Pwned?
 *
 * Adds test to built-in password strength indicator to check if password has
 * been used on other sites.
 *
 * @author Joseph Leedy <joseph@wagento.com>
 * @copyright Copyright (c) Wagento Creative LLC. (https://www.wagento.com/)
 * @license https://opensource.org/licenses/OSL-3.0.php Open Software License 3.0
 */

var config = {
    config: {
        mixins: {
            'Magento_Customer/js/password-strength-indicator': {
                'Wagento_HIBP/js/password-strength-indicator-mixin': true
            }
        }
    }
};
