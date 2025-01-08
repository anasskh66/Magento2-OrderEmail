<?php
namespace Anass\OrderEmail\Model;

use Magento\Framework\Mail\Template\TransportBuilder;
use Magento\Framework\Translate\Inline\StateInterface;
use Magento\Store\Model\StoreManagerInterface;

class EmailSender
{
    protected $transportBuilder;
    protected $inlineTranslation;
    protected $storeManager;

    public function __construct(
        TransportBuilder $transportBuilder,
        StateInterface $inlineTranslation,
        StoreManagerInterface $storeManager
    ) {
        $this->transportBuilder = $transportBuilder;
        $this->inlineTranslation = $inlineTranslation;
        $this->storeManager = $storeManager;
    }

    public function sendOrderNotification($order)
    {
        try {
            $this->inlineTranslation->suspend();

            $transport = $this->transportBuilder
                ->setTemplateIdentifier('order_notification_template')
                ->setTemplateOptions([
                    'area' => 'frontend',
                    'store' => $this->storeManager->getStore()->getId()
                ])
                ->setTemplateVars([
                    'order' => $order,
                    'order_id' => $order->getIncrementId(),
                    'customer_name' => $order->getCustomerName()
                ])
                ->setFromByScope([
                    'email' => 'sales@example.com',
                    'name' => 'Sales Team'
                ])
                ->addTo($order->getCustomerEmail())
                ->getTransport();

            $transport->sendMessage();

            $this->inlineTranslation->resume();
        } catch (\Exception $e) {
            // Handle error
        }
    }
}