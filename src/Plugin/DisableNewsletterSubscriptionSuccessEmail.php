<?php
declare(strict_types=1);

namespace WeProvide\ExtendedNewsletterSubscriptionOptions\Plugin;

use Magento\Newsletter\Model\Subscriber;
use WeProvide\ExtendedNewsletterSubscriptionOptions\Config\Reader as ConfigReader;

/**
 * Responsible for preventing the newsletter subscription e-mail from being sent, if configured to do so
 */
class DisableNewsletterSubscriptionSuccessEmail
{
    /** @var ConfigReader */
    protected $configReader;

    /**
     * DisableNewsletterSubscriptionSuccessEmail constructor.
     * @param ConfigReader $configReader
     */
    public function __construct(ConfigReader $configReader)
    {
        $this->configReader = $configReader;
    }

    public function aroundSendConfirmationSuccessEmail(Subscriber $subject, callable $proceed)
    {
        if ($this->configReader->isNewsletterSubscriptionEmailEnabled()) {
            return $proceed();
        }

        return $subject;
    }
}
