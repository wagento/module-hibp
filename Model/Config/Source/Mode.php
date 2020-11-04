<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
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
