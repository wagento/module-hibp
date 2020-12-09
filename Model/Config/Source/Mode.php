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

namespace Wagento\HIBP\Model\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;

class Mode implements OptionSourceInterface
{
    public function toOptionArray()
    {
        return [
                [
                    'value' => 'report',
                    'label' => __('Report Only')
                ],
                [
                    'value' => 'restrict',
                    'label' => __('Restrict')
                ]
            ];
    }
}
