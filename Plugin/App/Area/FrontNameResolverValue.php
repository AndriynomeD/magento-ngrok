<?php
/**
 * IdentifierValue
 *
 * @copyright Copyright © 2021 Dmitry Shkoliar. All rights reserved.
 * @author    dmitry@shkoliar.com
 */

namespace Shkoliar\Ngrok\Plugin\App\Area;

use Shkoliar\Ngrok\Helper\Ngrok;
use Magento\Backend\App\Area\FrontNameResolver;

class FrontNameResolverValue
{
    /**
     * @var Ngrok
     */
    protected $ngrok;

    /**
     * @param Ngrok $ngrok
     */
    public function __construct(Ngrok $ngrok)
    {
        $this->ngrok = $ngrok;
    }

    public function afterIsHostBackend(FrontNameResolver $subject, $result)
    {
        if ($this->ngrok->isNgrokDomain()) {
            return $this->ngrok->getDomain();
        }
        return $result;
    }
}
