<?php
/**
 * @package     HitarthPattani\DisableProductCompare
 * @author      Hitarth Pattani <hitarthpattani@gmail.com>
 * @copyright   Copyright © 2021. All rights reserved.
 */
declare(strict_types=1);

namespace HitarthPattani\DisableProductCompare\Plugin;

use Magento\Framework\Exception\NotFoundException;
use Magento\Catalog\Controller\Product\Compare;
use HitarthPattani\DisableProductCompare\Model\Helper\ConfigProvider;

class DisableCompareControllers
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
     * 404 if product compare is disabled
     *
     * @param Compare $subject
     * @return array
     * @throws NotFoundException
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function beforeExecute(
        Compare $subject
    ) {
        if (!$this->configProvider->isEnabled()) {
            throw new NotFoundException(__('Product Compare Not Found!'));
        }

        return [];
    }
}
