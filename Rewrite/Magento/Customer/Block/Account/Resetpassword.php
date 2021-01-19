<?php
/**
 * Wagento Have I Been Pwned?
 *
 * Adds test to built-in password strength indicator to check if password has
 * been used on other sites.
 *
 * @package Wagento\HIBP\Controller\Index
 * @author Joseph Leedy <joseph@wagento.com>, Chirag Dodia <chirag.dodia@wagento.com>
 * @copyright Copyright (c) Wagento Creative LLC. (https://www.wagento.com/)
 * @license https://opensource.org/licenses/OSL-3.0.php Open Software License 3.0
 */
declare(strict_types=1);

namespace Wagento\HIBP\Rewrite\Magento\Customer\Block\Account;

class Resetpassword extends \Magento\Customer\Block\Account\Resetpassword
{
    public function getConfig($path)
    {
        return $this->_scopeConfig->getValue($path, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
}
