<?php

declare(strict_types=1);

namespace Shkoliar\Ngrok\Plugin\App\Config;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Session\Config;
use Shkoliar\Ngrok\Helper\Ngrok;

class CookieDomain
{
    /**
     * @var Ngrok
     */
    private $ngrok;

    /**
     * @param Ngrok $ngrok
     */
    public function __construct(Ngrok $ngrok)
    {
        $this->ngrok = $ngrok;
    }
    
    /**
     * @inheritdoc
     */
    public function afterGetValue(
        ScopeConfigInterface $subject,
                             $result,
                             $path,
                             $scopeType = ScopeConfigInterface::SCOPE_TYPE_DEFAULT,
                             $scopeCode = null
    ) {
        if ($path === Config::XML_PATH_COOKIE_DOMAIN && $ngrokDomain = $this->ngrok->getDomain()) {
            $result = $ngrokDomain;
        }
        return $result;
    }
}
