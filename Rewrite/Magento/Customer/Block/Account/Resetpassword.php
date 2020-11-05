<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
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
