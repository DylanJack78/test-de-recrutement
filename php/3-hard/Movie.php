<?php

declare(strict_types=1);


namespace App;


class Movie
{
    public const PRICE_CODE_CHILDREN = 2;
    public const PRICE_CODE_REGULAR = 0;
    public const PRICE_CODE_NEW_RELEASE = 1;

    private $title;
    private $priceCode;

    public function __construct(string $title, int $priceCode)
    {
        $this->title = $title;
        $this->priceCode = $priceCode;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getPriceCode(): int
    {
        return $this->priceCode;
    }

    public function setPriceCode(int $pricecode)
    {
        return $this->priceCode = $pricecode;
    }
}
