<?php
/**
 * Wagento Have I Been Pwned?
 *
 * Adds test to built-in password strength indicator to check if password has
 * been used on other sites.
 *
 * @package Wagento\HIBP\Controller\Index
 * @author Joseph Leedy <joseph@wagento.com>
 * @copyright Copyright (c) Wagento Creative LLC. (https://www.wagento.com/)
 * @license https://opensource.org/licenses/OSL-3.0.php Open Software License 3.0
 */
declare(strict_types=1);

namespace Wagento\HIBP\Controller\Index;

use Dragonbe\Hibp\HibpFactory;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Exception\NotFoundException;

/**
 * Ajax POST Controller
 *
 * @package Wagento\HIBP\Controller\Index
 * @author Joseph Leedy <joseph@wagento.com>
 */
class AjaxPost implements HttpPostActionInterface
{
    /**
     * @var RequestInterface
     */
    protected RequestInterface $request;
    /**
     * @var ResultFactory
     */
    protected ResultFactory $resultFactory;
    /**
     * @var HibpFactory
     */
    private $hibpFactory;

    /**
     * AjaxPost constructor.
     * @param HibpFactory $hibpFactory
     * @param RequestInterface $request
     * @param ResultFactory $resultFactory
     */
    public function __construct(
        HibpFactory $hibpFactory,
        RequestInterface $request,
        ResultFactory $resultFactory
    ) {
        $this->hibpFactory = $hibpFactory;
        $this->request = $request;
        $this->resultFactory = $resultFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        if (!$this->request->isAjax() || !$this->request->isPost()) {
            throw new NotFoundException(__('Action is not available.'));
        }

        $hibp = $this->hibpFactory::create();
        $password = $this->request->getPost('password');
        $resultJson = $this->resultFactory->create(ResultFactory::TYPE_JSON);

        $resultJson->setData([
            'pwned' => $hibp->isPwnedPassword($password),
            'count' => count($hibp)
        ]);

        return $resultJson;
    }
}
