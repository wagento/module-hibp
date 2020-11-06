<?php

namespace Wagento\HIBP\Block\Adminhtml;

use Magento\Backend\Block\Template;

class User extends Template
{
    public function getConfig($path)
    {
        return $this->_scopeConfig->getValue($path, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

    public function getBaseUrl()
    {
        return parent::getBaseUrl();
    }
}
