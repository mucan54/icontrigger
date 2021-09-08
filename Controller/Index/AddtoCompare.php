<?php
namespace Mucan\IconTrigger\Controller\Index;

class AddtoCompare extends \Magento\Framework\App\Action\Action {

    /**
     * @var \Magento\Framework\Controller\Result\JsonFactory
     */
    protected $jsonFactory;

    /**
     * @var \Magento\Catalog\CustomerData\CompareProducts
     */
    protected $compareProducts;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Catalog\CustomerData\CompareProducts $compareProducts,
        \Magento\Framework\Controller\Result\JsonFactory $jsonFactory
    ) {
        parent::__construct($context);
        $this->compareProducts = $compareProducts;
        $this->jsonFactory = $jsonFactory;
    }

    public function execute() {
        $result = $this->jsonFactory->create();
        $data =  $this->compareProducts->getSectionData();

        return $result->setData(['status' => 200, 'items' => $data]);
    }
}
