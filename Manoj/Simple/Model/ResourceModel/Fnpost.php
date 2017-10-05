<?php
namespace Manoj\Simple\Model\ResourceModel;

/**
* 
*/
class Fnpost extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

	
	protected function _construct()
	{
		$this->_init('manoj_simple_post', 'post_id');
	}
}

?>
