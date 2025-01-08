<?php
namespace Anass\OrderEmail\Observer;

use Magento\Framework\Event\ObserverInterface;
use Anass\OrderEmail\Model\EmailSender;

class SendOrderEmail implements ObserverInterface
{
    protected $emailSender;

    public function __construct(EmailSender $emailSender)
    {
        $this->emailSender = $emailSender;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $order = $observer->getEvent()->getOrder();
        $this->emailSender->sendOrderNotification($order);
        return $this;
    }
}