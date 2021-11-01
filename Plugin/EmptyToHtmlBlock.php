<?php
/**
 * @package     HitarthPattani\DisableProductCompare
 * @author      Hitarth Pattani <hitarthpattani@gmail.com>
 * @copyright   Copyright © 2021. All rights reserved.
 */
declare(strict_types=1);

namespace HitarthPattani\DisableProductCompare\Plugin;

use Magento\Framework\View\Element\BlockInterface;
use HitarthPattani\DisableProductCompare\Model\Helper\ConfigProvider;

class EmptyToHtmlBlock
{
    /**
     * @var ConfigProvider
     */
    private $configProvider;

    /**
     * @param ConfigProvider $configProvider
     */
    public function __construct(
        ConfigProvider $configProvider
    ) {
        $this->configProvider = $configProvider;
    }

    /**
     * @param BlockInterface $subject
     * @param string $result
     * @return string
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function afterToHtml(
        BlockInterface $subject,
        $result
    ) {
        if (!$this->configProvider->isEnabled()) {
            return '';
        }

        return $result;
    }
}
