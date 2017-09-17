<?php
namespace Manoj\Inquiry\Controller\Index;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use \Magento\Framework\Message\ManagerInterface;
class Insert extends \Magento\Framework\App\Action\Action
{
    protected $resultPageFactory;
    protected $_messageManager;
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) 
    {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }
    public function execute()
    {
            $post = $this->getRequest()->getPostValue();
            if (!$post) {
            $this->_redirect('*/*/');
            return;
        }
            try{
                $data = $this->getRequest()->getPostValue();
                $objectManager = \Magento\Framework\App\ObjectManager::getInstance();       
                $model = $objectManager->create('Manoj\Inquiry\Model\Inquiry');

                /****** set your data *********/
                $model->setData($data);
                $model->save();
                $this->messageManager->addSuccess(
                            __('Thanks for Submission'));
    }catch (\Exception $e) {
        $this->messageManager->addError(
                    __('We can\'t process your request right now. Sorry, that\'s all we know.'));   
    }
    $this->_redirect('*/*/');
    return;
    }
}
