<?php

namespace Manoj\Simple\Controller\Adminhtml\Post;

class MassDelete extends \Magento\Backend\App\Action
{
    /**
     * Mass Action Filter
     * 
     * @var \Magento\Ui\Component\MassAction\Filter
     */
    protected $_filter;

   
    protected $_collectionFactory;

   
    public function __construct(
        \Magento\Ui\Component\MassAction\Filter $filter,
        \Manoj\Simple\Model\ResourceModel\Post\CollectionFactory $collectionFactory,
        \Magento\Backend\App\Action\Context $context
    )
    {
        $this->_filter            = $filter;
        $this->_collectionFactory = $collectionFactory;
        parent::__construct($context);
    }


    /**
     * execute action
     *
     * @return \Magento\Backend\Model\View\Result\Redirect
     */
    public function execute()
    {
        $collection = $this->_filter->getCollection($this->_collectionFactory->create());

        $delete = 0;
        foreach ($collection as $item) {
           
            $item->delete();
            $delete++;
        }
        $this->messageManager->addSuccess(__('A total of %1 record(s) have been deleted.', $delete));
       
        $resultRedirect = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_REDIRECT);
        return $resultRedirect->setPath('*/*/');
    }
}
