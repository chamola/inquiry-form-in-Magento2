<?php
namespace Manoj\Inquiry\Model;

use Magento\Framework\Model\AbstractModel;

class Inquiry extends AbstractModel
{
    /**
     * Define resource model
     */
    protected function _construct()
    {
        $this->_init('Manoj\Inquiry\Model\ResourceModel\Inquiry');
    }
}
