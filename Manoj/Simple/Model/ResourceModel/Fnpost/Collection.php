<?php
namespace Manoj\Simple\Model\ResourceModel\Fnpost;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	
	protected function _construct()
	{
        $this->_init('Manoj\Simple\Model\Fnpost', 'Manoj\Simple\Model\ResourceModel\Fnpost');
    }
}
?>
