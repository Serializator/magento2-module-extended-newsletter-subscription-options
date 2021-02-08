<?php
declare(strict_types=1);

namespace WeProvide\ExtendedNewsletterSubscriptionOptions\Plugin;

use Magento\Newsletter\Model\Subscriber;
use WeProvide\ExtendedNewsletterSubscriptionOptions\Config\Reader as ConfigReader;

/**
 * Responsible for preventing the newsletter unsubscribe e-mail from being sent, if configured to do so
 */
class DisableNewsletterUnsubscribeEmail
{
    /** @var ConfigReader */
    protected $configReader;

    /**
     * DisableNewsletterUnsubscribeEmail constructor.
     * @param ConfigReader $configReader
     */
    public function __construct(ConfigReader $configReader)
    {
        $this->configReader = $configReader;
    }

    public function aroundSendUnsubscriptionEmail(Subscriber $subject, callable $proceed)
    {
        if ($this->configReader->isNewsletterUnsubscribeEmailEnabled()) {
            return $proceed();
        }

        return $subject;
    }
}
