<?php

namespace Manoj\Simple\Model;

/**
 * @method Post setName($name)
 * @method Post setUrlKey($urlKey)
 * @method Post setPostContent($postContent)
 * @method Post setTags($tags)
 * @method Post setStatus($status)
 * @method Post setFeaturedImage($featuredImage)
 * @method Post setSampleCountrySelection($sampleCountrySelection)
 * @method Post setSampleUploadFile($sampleUploadFile)
 * @method Post setSampleMultiselect($sampleMultiselect)
 * @method mixed getName()
 * @method mixed getUrlKey()
 * @method mixed getPostContent()
 * @method mixed getTags()
 * @method mixed getStatus()
 * @method mixed getFeaturedImage()
 * @method mixed getSampleCountrySelection()
 * @method mixed getSampleUploadFile()
 * @method mixed getSampleMultiselect()
 * @method Post setCreatedAt(\string $createdAt)
 * @method string getCreatedAt()
 * @method Post setUpdatedAt(\string $updatedAt)
 * @method string getUpdatedAt()
 */
class Post extends \Magento\Framework\Model\AbstractModel
{
    /**
     * Cache tag
     * 
     * @var string
     */
    const CACHE_TAG = 'manoj_simple_post';

    /**
     * Cache tag
     * 
     * @var string
     */
    protected $_cacheTag = 'manoj_simple_post';

    /**
     * Event prefix
     * 
     * @var string
     */
    protected $_eventPrefix = 'manoj_simple_post';


    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Manoj\Simple\Model\ResourceModel\Post');
    }

    /**
     * Get identities
     *
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * get entity default values
     *
     * @return array
     */
    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }
}
