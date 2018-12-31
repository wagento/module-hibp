<?php
/**
 * Wagento Have I Been Pwned Password Strength Indicator
 *
 * Adds test to built-in password strength indicator to check if password has
 * been used on other sites.
 *
 * @package Wagento\HIBPPSI\Controller\Index
 * @author Joseph Leedy <joseph@wagento.com>
 * @copyright Copyright (c) Wagento Creative LLC. (https://www.wagento.com/)
 * @license https://opensource.org/licenses/OSL-3.0.php Open Software License 3.0
 */
declare(strict_types=1);

namespace Wagento\HIBPPSI\Controller\Index;

use Dragonbe\Hibp\HibpFactory;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Exception\NotFoundException;

/**
 * Ajax POST Controller
 *
 * @package Wagento\HIBPPSI\Controller\Index
 * @author Joseph Leedy <joseph@wagento.com>
 */
class AjaxPost extends Action
{
    /**
     * @var \Dragonbe\Hibp\HibpFactory
     */
    private $hibpFactory;

    public function __construct(
        Context $context,
        HibpFactory $hibpFactory
    ) {
        parent::__construct($context);

        $this->hibpFactory = $hibpFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        if (!$this->getRequest()->isAjax() || !$this->getRequest()->isPost()) {
            throw new NotFoundException(__('Action is not available.'));
        }

        $hibp = $this->hibpFactory::create();
        $password = $this->getRequest()->getPost('password');
        $resultJson = $this->resultFactory->create(ResultFactory::TYPE_JSON);

        $resultJson->setData([
            'pwned' => $hibp->isPwnedPassword($password),
            'count' => count($hibp)
        ]);

        return $resultJson;
    }
}
