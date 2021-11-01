<?php
/**
 * @package     HitarthPattani\DisableProductCompare
 * @author      Hitarth Pattani <hitarthpattani@gmail.com>
 * @copyright   Copyright © 2021. All rights reserved.
 */
declare(strict_types=1);

namespace HitarthPattani\DisableProductCompare\Model\Helper;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

class ConfigProvider
{
    /**
     * @var string
     */
    const XML_PATH_GENERAL_ENABLED = 'catalog/product_compare/enabled';

    /**
     * @var ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * @param string $path
     * @param number $storeId
     * @return mixed
     */
    private function execute($path, $storeId = null)
    {
        return $this->scopeConfig->getValue(
            $path,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }

    /**
     * @param number $storeId
     * @return bool
     */
    public function isEnabled($storeId = null)
    {
        return (bool) $this->execute(self::XML_PATH_GENERAL_ENABLED, $storeId);
    }
}
