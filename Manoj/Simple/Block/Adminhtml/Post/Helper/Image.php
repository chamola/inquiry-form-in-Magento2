<?php

namespace Manoj\Simple\Block\Adminhtml\Post\Helper;

/**
 * @method string getValue()
 */
class Image extends \Magento\Framework\Data\Form\Element\Image
{
   
    protected $_imageModel;

   
    public function __construct(
        \Manoj\Simple\Model\Post\Image $imageModel,
        \Magento\Framework\Data\Form\Element\Factory $factoryElement,
        \Magento\Framework\Data\Form\Element\CollectionFactory $factoryCollection,
        \Magento\Framework\Escaper $escaper,
        \Magento\Framework\UrlInterface $urlBuilder,
        array $data
    )
    {
        $this->_imageModel = $imageModel;
        parent::__construct($factoryElement, $factoryCollection, $escaper, $urlBuilder, $data);
    }

    /**
     * Get image preview url
     *
     * @return string
     */
    protected function _getUrl()
    {
        $url = false;
        if ($this->getValue()) {
            $url = $this->_imageModel->getBaseUrl().$this->getValue();
        }
        return $url;
    }
}
