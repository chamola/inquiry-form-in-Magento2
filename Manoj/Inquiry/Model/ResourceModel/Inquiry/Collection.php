<?php
namespace Manoj\Inquiry\Model\ResourceModel\Inquiry;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init('Manoj\Inquiry\Model\Inquiry', 'Manoj\Inquiry\Model\ResourceModel\Inquiry');
    }
}
