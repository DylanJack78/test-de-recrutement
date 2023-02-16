<?php

declare(strict_types=1);


namespace App;


class Customer
{
    private $name;
    private $rentals = [];

    public function __construct(String $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setRental(Rental $rental)
    {
        return $this->rentals[] += $rental;
    }

    

    public function statement(): string {
        $totalAmount = 0.0;
        $frequentRenterPoints = 0;
        $result = "Rental Record for " . $this->getName() . "\n";

        foreach ($this->rentals as $rental){
           $thisAmount = 0.0;

            $movie = ($rental->getMovie() ? $rental->getMovie() : null);
            $daysRented = ($rental->getDaysRented() ? $rental->getDaysRented() : 0);
            
            if($movie){
                // determines the amount for each line
                switch($movie->getPriceCode()) {
                    case Movie::PRICE_CODE_REGULAR:
                        $thisAmount += 2;
                        if($daysRented > 2){
                            $thisAmount += ($daysRented - 2) * 1.5;
                        }
                        break;
                    case Movie::PRICE_CODE_NEW_RELEASE:
                        $thisAmount += $daysRented * 3;
                        if ($daysRented > 1){
                            $frequentRenterPoints++;
                        }
                        break;
                    case Movie::PRICE_CODE_CHILDREN:
                        $thisAmount += 1.5;
                        if($daysRented > 3) {
                            $thisAmount += ($daysRented - 3) * 1.5;
                        }
                        break;
                }

                $frequentRenterPoints++;

                $result .= "\t" . $movie->getTitle() . "\t"
                    . $thisAmount . "\n";
                
                $totalAmount += $thisAmount;
            }
        }

        $result .= "You owed " . number_format($totalAmount, 1)  . "\n";
        $result .= "You earned " . $frequentRenterPoints . " frequent renter points\n";

        return $result;
    }
}
