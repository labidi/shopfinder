<?php
declare(strict_types=1);

namespace Saddemlabidi\Shopfinder\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Saddemlabidi\Shopfinder\Api\Data\ShopInterface;
use Saddemlabidi\Shopfinder\Api\Data\ShopSearchResultsInterface;

interface ShopRepositoryInterface
{
    /**
     * Save shop entity.
     *
     * @param ShopInterface $shop
     * @return ShopInterface
     */
    public function save(ShopInterface $shop): ShopInterface;

    /**
     * Retrieve shop by ID.
     *
     * @param int $id
     * @return ShopInterface
     */
    public function getById(int $id): ShopInterface;

    /**
     * Retrieve shop by Identifier.
     *
     * @param string $identifier
     * @return ShopInterface
     */
    public function getByIdentifier(string $identifier): ShopInterface;

    /**
     * Delete shop.
     *
     * @param ShopInterface $shop
     * @return bool
     */
    public function delete(ShopInterface $shop): bool;

    /**
     * Delete shop by ID.
     *
     * @param int $id
     * @return bool
     */
    public function deleteById(int $id): bool;

    /**
     * Retrieve a list of shops matching the specified criteria.
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return ShopSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria): ShopSearchResultsInterface;
}
