<?php

namespace Manoj\Inquiry\Block;
class Sample extends \Magento\Framework\View\Element\Template {

    public function getSquare($a) {
        return ($a*$a);
    }
    public function getAnotherFuntion() {
        $html = '<p>Make this world a beautiful place to live.</p>';
        return $html;
    }
}