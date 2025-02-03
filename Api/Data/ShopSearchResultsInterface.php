<?php

declare(strict_types=1);

namespace Saddemlabidi\Shopfinder\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface ShopSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get blocks list.
     *
     * @return \Saddemlabidi\Shopfinder\Api\Data\ShopInterface[]
     */
    public function getItems();

    /**
     * Set blocks list.
     *
     * @param \Saddemlabidi\Shopfinder\Api\Data\ShopInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
