<?php
namespace Manoj\Inquiry\Model\ResourceModel;

class Inquiry extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('manoj_inquiry', 'id');
    }
}
