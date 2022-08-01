<?php

namespace Services;

use Entities\Visitor;

class VisitorService
{
    private int $visitorsCount;
    /**
     * @var array|mixed
     */
    private mixed $availableGenres;
    private mixed $genresMax;

    public function __construct($config)
    {
        $this->visitorsCount = $config['visitors_count'];
        $this->availableGenres = $config['available_genres'];
        $this->genresMax = $config['visitor_genres_max'];
    }

    /**
     * @return int
     */
    public function getVisitorsCount(): int
    {
        return $this->visitorsCount;
    }

    public function createVisitors(): array
    {
        return array_map(fn($key) => $this->generateVisitor($key), range(0, $this->getVisitorsCount()));
    }

    public function generateVisitor($inc): Visitor
    {
        $countGenres = rand(1, $this->getGenresMax());
        $availableCountGenres = $this->getAvailableGenresCount();

        if ($countGenres > $availableCountGenres) {
            $countGenres = $availableCountGenres;
        }

        return new Visitor($inc, $this->generateGenres($countGenres));
    }

    public function generateGenres($count): array
    {
        if($count > 1)
            return array_map(
                fn($item) => $this->availableGenres[$item],
                array_rand($this->availableGenres, $count)
            );

        return [$this->availableGenres[array_rand($this->availableGenres)]];
    }

    public function getAvailableGenres(): mixed
    {
        return $this->availableGenres;
    }

    public function getAvailableGenresCount(): array
    {
        return array_count_values($this->availableGenres);
    }

    public function getGenresMax(): int
    {
        return $this->genresMax;
    }

}