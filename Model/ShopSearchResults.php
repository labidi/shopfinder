<?php

declare(strict_types=1);

namespace Saddemlabidi\Shopfinder\Model;

use Magento\Framework\Api\SearchResults;
use Saddemlabidi\Shopfinder\Api\Data\ShopSearchResultsInterface;

class ShopSearchResults extends SearchResults implements ShopSearchResultsInterface
{
}
