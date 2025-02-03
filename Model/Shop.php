<?php

declare(strict_types=1);

namespace Saddemlabidi\Shopfinder\Model;

use Magento\Framework\Model\AbstractModel;
use Saddemlabidi\Shopfinder\Model\ResourceModel\Shop as ShopResource;
use Saddemlabidi\Shopfinder\Api\Data\ShopInterface;

class Shop extends AbstractModel implements ShopInterface
{
    protected function _construct(): void
    {
        $this->_init(ShopResource::class);
    }

    public function getId(): ?int
    {
        $id = $this->getData(self::ENTITY_ID);
        return $id !== null ? (int)$id : null;
    }

    public function setId($id): ShopInterface
    {
        $this->setData(self::ENTITY_ID, $id);
        return $this;
    }

    public function getIdentifier(): string
    {
        return (string)$this->getData(self::IDENTIFIER);
    }

    public function setIdentifier(string $identifier): ShopInterface
    {
        $this->setData(self::IDENTIFIER, $identifier);
        return $this;
    }

    public function getName(): string
    {
        return (string)$this->getData(self::NAME);
    }

    public function setName(string $name): ShopInterface
    {
        $this->setData(self::NAME, $name);
        return $this;
    }

    public function getDescription(): string
    {
        return (string)$this->getData(self::DESCRIPTION);
    }

    public function setDescription(string $description): ShopInterface
    {
        $this->setData(self::DESCRIPTION, $description);
        return $this;
    }

    public function getCountry(): string
    {
        return (string)$this->getData(self::COUNTRY);
    }

    public function setCountry(string $country): ShopInterface
    {
        $this->setData(self::COUNTRY, $country);
        return $this;
    }

    public function getImage(): string
    {
        return (string)$this->getData(self::IMAGE);
    }

    public function setImage(string $image): ShopInterface
    {
        $this->setData(self::IMAGE, $image);
        return $this;
    }

    public function getLongitudeLatitude(): string
    {
        return (string)$this->getData(self::LONGITUDE_LATITUDE);
    }

    public function setLongitudeLatitude(string $longitudeLatitude): ShopInterface
    {
        $this->setData(self::LONGITUDE_LATITUDE, $longitudeLatitude);
        return $this;
    }

    public function getCreatedAt(): ?string
    {
        $createdAt = $this->getData(self::CREATED_AT);
        return $createdAt !== null ? (string)$createdAt : null;
    }

    public function setCreatedAt(string $createdAt): ShopInterface
    {
        $this->setData(self::CREATED_AT, $createdAt);
        return $this;
    }

    public function getUpdatedAt(): ?string
    {
        $updatedAt = $this->getData(self::UPDATED_AT);
        return $updatedAt !== null ? (string)$updatedAt : null;
    }

    public function setUpdatedAt(string $updatedAt): ShopInterface
    {
        $this->setData(self::UPDATED_AT, $updatedAt);
        return $this;
    }
}
