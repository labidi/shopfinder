<?php

declare(strict_types=1);

namespace Saddemlabidi\Shopfinder\Model;

use Saddemlabidi\ShopfinderApi\Api\ShopRepositoryInterface;
use Saddemlabidi\ShopfinderApi\Api\Data\ShopInterface;
use Saddemlabidi\Shopfinder\Model\ResourceModel\Shop as ShopResource;
use Saddemlabidi\Shopfinder\Model\ResourceModel\Shop\CollectionFactory as ShopCollectionFactory;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\CouldNotDeleteException;
use Saddemlabidi\ShopfinderApi\Api\Data\ShopSearchResultsInterfaceFactory;
use Saddemlabidi\ShopfinderApi\Api\Data\ShopSearchResultsInterface;

class ShopRepository implements ShopRepositoryInterface
{
    public function __construct(
        private ShopResource $shopResource,
        private ShopFactory $shopFactory,
        private ShopCollectionFactory $shopCollectionFactory,
        private ShopSearchResultsInterfaceFactory $searchResultsFactory
    ) {
    }

    /**
     * Save shop entity.
     *
     * @param ShopInterface $shop
     * @return ShopInterface
     * @throws CouldNotSaveException
     */
    public function save(ShopInterface $shop): ShopInterface
    {
        try {
            $this->shopResource->save($shop);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(
                __("Could not save the shop: %1", $exception->getMessage())
            );
        }
        return $shop;
    }

    /**
     * Retrieve shop by ID.
     *
     * @param int $id
     * @return ShopInterface
     * @throws NoSuchEntityException
     */
    public function getById(int $id): ShopInterface
    {
        /** @var ShopInterface $shop */
        $shop = $this->shopFactory->create();
        $this->shopResource->load($shop, $id);
        if (!$shop->getId()) {
            throw new NoSuchEntityException(__('Shop with id "%1" does not exist.', $id));
        }
        return $shop;
    }


    /**
     * @param string $identifier
     * @return ShopInterface
     * @throws NoSuchEntityException
     */
    public function getByIdentifier(string $identifier): ShopInterface
    {
        $shop = $this->shopFactory->create();
        $this->shopResource->load($shop, $identifier, 'identifier');
        if (!$shop->getId()) {
            throw new NoSuchEntityException(__('Shop with id "%1" does not exist.', $identifier));
        }
        return $shop;
    }

    /**
     * Delete shop.
     *
     * @param ShopInterface $shop
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(ShopInterface $shop): bool
    {
        try {
            $this->shopResource->delete($shop);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(
                __('Could not delete the shop: %1', $exception->getMessage())
            );
        }
        return true;
    }

    /**
     * Delete shop by ID.
     *
     * @param int $id
     * @return bool
     * @throws NoSuchEntityException
     * @throws CouldNotDeleteException
     */
    public function deleteById(int $id): bool
    {
        $shop = $this->getById($id);
        return $this->delete($shop);
    }

    /**
     * Retrieve shop list matching the specified criteria.
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return ShopSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria): ShopSearchResultsInterface
    {
        $collection = $this->shopCollectionFactory->create();
        foreach ($searchCriteria->getFilterGroups() as $filterGroup) {
            foreach ($filterGroup->getFilters() as $filter) {
                $condition = $filter->getConditionType() ?: 'eq';
                $collection->addFieldToFilter($filter->getField(), [$condition => $filter->getValue()]);
            }
        }
        if ($searchCriteria->getSortOrders()) {
            foreach ($searchCriteria->getSortOrders() as $sortOrder) {
                $collection->addOrder(
                    $sortOrder->getField(),
                    $sortOrder->getDirection()
                );
            }
        }
        $collection->setCurPage($searchCriteria->getCurrentPage());
        $collection->setPageSize($searchCriteria->getPageSize());
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setTotalCount($collection->getSize());
        $searchResults->setItems($collection->getItems());
        return $searchResults;
    }

}
