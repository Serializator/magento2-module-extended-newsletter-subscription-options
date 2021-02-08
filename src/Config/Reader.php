<?php
declare(strict_types=1);

namespace WeProvide\ExtendedNewsletterSubscriptionOptions\Config;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

/**
 * Responsible for reading the system configuration
 */
class Reader
{
    /** @var string */
    private const NEWSLETTER_SUBSCRIPTION_EMAIL_ENABLED_XML_PATH = 'newsletter/subscription/success_email_enabled';

    /** @var string */
    private const NEWSLETTER_UNSUBSCRIBE_EMAIL_ENABLED_XML_PATH = 'newsletter/subscription/un_email_enabled';

    /** @var ScopeConfigInterface */
    private $scopeConfig;

    /**
     * Reader constructor.
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * Check if sending of the newsletter subscription e-mail is enabled or not
     *
     * @return bool true if the sending of the newsletter subscription e-mail is enabled, false otherwise
     */
    public function isNewsletterSubscriptionEmailEnabled(): bool
    {
        return (bool) $this->scopeConfig->getValue(static::NEWSLETTER_SUBSCRIPTION_EMAIL_ENABLED_XML_PATH, ScopeInterface::SCOPE_STORE);
    }

    /**
     * Check if the sending of the newsletter unsubscribe e-mail is enabled or not
     *
     * @return bool true if the sending of the newsletter unsubscribe e-mail is enabled, false otherwise
     */
    public function isNewsletterUnsubscribeEmailEnabled(): bool
    {
        return (bool) $this->scopeConfig->getValue(static::NEWSLETTER_UNSUBSCRIBE_EMAIL_ENABLED_XML_PATH, ScopeInterface::SCOPE_STORE);
    }
}
