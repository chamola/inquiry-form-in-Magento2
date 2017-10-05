<?php

namespace Manoj\Simple\Controller\Adminhtml\Post;

class Save extends \Manoj\Simple\Controller\Adminhtml\Post
{
   
    protected $_uploadModel;

    
    protected $_fileModel;

    
    protected $_imageModel;

    
    protected $_backendSession;

    
    public function __construct(
        \Manoj\Simple\Model\Upload $uploadModel,
        \Manoj\Simple\Model\Post\File $fileModel,
        \Manoj\Simple\Model\Post\Image $imageModel,
        \Magento\Backend\Model\Session $backendSession,
        \Manoj\Simple\Model\PostFactory $postFactory,
        \Magento\Framework\Registry $registry,
        \Magento\Backend\Model\View\Result\RedirectFactory $resultRedirectFactory,
        \Magento\Backend\App\Action\Context $context
    )
    {
        $this->_uploadModel    = $uploadModel;
        $this->_fileModel      = $fileModel;
        $this->_imageModel     = $imageModel;
        $this->_backendSession = $backendSession;
        parent::__construct($postFactory, $registry, $resultRedirectFactory, $context);
    }

    /**
     * run the action
     *
     * @return \Magento\Backend\Model\View\Result\Redirect
     */
    public function execute()
    {
        $data = $this->getRequest()->getPost('post');
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($data) {
            $data = $this->_filterData($data);
            $post = $this->_initPost();
            $post->setData($data);
            $featuredImage = $this->_uploadModel->uploadFileAndGetName('featured_image', $this->_imageModel->getBaseDir(), $data);
            $post->setFeaturedImage($featuredImage);
            $sampleUploadFile = $this->_uploadModel->uploadFileAndGetName('sample_upload_file', $this->_fileModel->getBaseDir(), $data);
            $post->setSampleUploadFile($sampleUploadFile);
            $this->_eventManager->dispatch(
                'manoj_simple_post_prepare_save',
                [
                    'post' => $post,
                    'request' => $this->getRequest()
                ]
            );
            try {
                $post->save();
                $this->messageManager->addSuccess(__('The Post has been saved.'));
                $this->_backendSession->setManojSimplePostData(false);
                if ($this->getRequest()->getParam('back')) {
                    $resultRedirect->setPath(
                        'manoj_simple/*/edit',
                        [
                            'post_id' => $post->getId(),
                            '_current' => true
                        ]
                    );
                    return $resultRedirect;
                }
                $resultRedirect->setPath('manoj_simple/*/');
                return $resultRedirect;
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\RuntimeException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while saving the Post.'));
            }
            $this->_getSession()->setManojSimplePostData($data);
            $resultRedirect->setPath(
                'manoj_simple/*/edit',
                [
                    'post_id' => $post->getId(),
                    '_current' => true
                ]
            );
            return $resultRedirect;
        }
        $resultRedirect->setPath('manoj_simple/*/');
        return $resultRedirect;
    }

    /**
     * filter values
     *
     * @param array $data
     * @return array
     */
    protected function _filterData($data)
    {
        if (isset($data['sample_multiselect'])) {
            if (is_array($data['sample_multiselect'])) {
                $data['sample_multiselect'] = implode(',', $data['sample_multiselect']);
            }
        }
        return $data;
    }
}
