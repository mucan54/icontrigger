<?php
namespace Mucan\IconTrigger\Controller\Index;

class Wishlist extends \Magento\Framework\App\Action\Action {

    /**
     * @var \Magento\Framework\Controller\Result\JsonFactory
     */
    protected $jsonFactory;

    /**
     * @var \Magento\Wishlist\Helper\Data
     */
    protected $wishlistHelper;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Wishlist\Helper\Data $wishlistHelper,
        \Magento\Framework\Controller\Result\JsonFactory $jsonFactory
    ) {
        parent::__construct($context);
        $this->wishlistHelper = $wishlistHelper;
        $this->jsonFactory = $jsonFactory;
    }

    public function execute() {
        $result = $this->jsonFactory->create();
        $data = $this->wishlistHelper->getWishlistItemCollection()->getData();

        return $result->setData(['status' => 200, 'items' => $data]);
    }
}
