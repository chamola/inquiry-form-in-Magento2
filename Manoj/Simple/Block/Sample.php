<?php
namespace Manoj\Simple\Block;
class Sample extends \Magento\Framework\View\Element\Template {
public function getSelectCountSql()
{

    $collections = $this->_manojsimplepost->create()->getCollection();

        print_r($collections->getdata());
} 
public function getMediaUrl(){
  return $this->_filesystem->getDirectoryRead(DirectoryList::MEDIA)->getAbsolutePath();
}
}
?>
