<?php

declare(strict_types=1);

namespace App;

class Rover
{
    private $direction;
    private $y;
    private $x;

    public function __construct(int $x, int $y, string $direction)
    {
        $this->direction = $direction;
        $this->y = $y;
        $this->x = $x;
    }

    public function receive(string $commandsSequence): void
    {
        for ($i = 0; $i < strlen($commandsSequence); ++$i) {
            $command = substr($commandsSequence, $i, 1);
            switch ($command){
                case "l":
                    switch ($this->direction){
                        case "N":
                            $this->direction = "W";
                        break;
                        case "S":
                            $this->direction = "E";
                        break;
                        case "W":
                            $this->direction = "S";
                        break;
                        default:
                            $this->direction = "N";
                    }
                break;
                case "r":
                    switch ($this->direction){
                        case "N":
                            $this->direction = "E";
                        break;
                        case "S":
                            $this->direction = "W";
                        break;
                        case "W":
                            $this->direction = "N";
                        break;
                        default:
                            $this->direction = "S";
                    }
                break;
                default:
                    // Displace Rover
                    if ($command === "f") {
                        $displacement = 1;
                    }else{
                        $displacement = -1;
                    }

                    switch ($this->direction){
                        case "N":
                            $this->y += $displacement;
                        break;
                        case "S":
                            $this->y -= $displacement;
                        break;
                        case "W":
                            $this->x -= $displacement;
                        break;
                        default:
                            $this->x += $displacement;
                    }
            }
        }
    }
}
