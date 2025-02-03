<?php

declare(strict_types=1);

namespace Saddemlabidi\Shopfinder\Api\Data;

interface ShopInterface
{
    public const ENTITY_ID = 'entity_id';
    public const IDENTIFIER = 'identifier';
    public const NAME = 'name';
    public const COUNTRY = 'country';
    public const IMAGE = 'image';
    public const LONGITUDE_LATITUDE = 'longitude_latitude';
    public const CREATED_AT = 'created_at';
    public const UPDATED_AT = 'updated_at';


    /**
     * @return int|null
     */
    public function getId(): ?int;

    /**
     * @param int $id
     * @return self
     */
    public function setId(int $id): self;

    /**
     * @return string
     */
    public function getIdentifier(): string;

    /**
     * @param string $identifier
     * @return self
     */
    public function setIdentifier(string $identifier): self;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param string $name
     * @return self
     */
    public function setName(string $name): self;

    /**
     * @return string
     */
    public function getCountry(): string;

    /**
     * @param string $country
     * @return self
     */
    public function setCountry(string $country): self;

    /**
     * @return string
     */
    public function getImage(): string;

    /**
     * @param string $image
     * @return self
     */
    public function setImage(string $image): self;

    /**
     * @return string
     */
    public function getLongitudeLatitude(): string;

    /**
     * @param string $longitudeLatitude
     * @return self
     */
    public function setLongitudeLatitude(string $longitudeLatitude): self;

    /**
     * @return string|null
     */
    public function getCreatedAt(): ?string;

    /**
     * @param string $createdAt
     * @return self
     */
    public function setCreatedAt(string $createdAt): self;

    /**
     * @return string|null
     */
    public function getUpdatedAt(): ?string;

    /**
     * @param string $updatedAt
     * @return self
     */
    public function setUpdatedAt(string $updatedAt): self;
}
