<?php

/*
 * This file is part of the eluceo/iCal package.
 *
 * (c) 2019 Markus Poerschke <markus@poerschke.nrw>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Eluceo\iCal\Domain\ValueObject;

final class Location
{
    private string $location;
    private ?GeographicPosition $geographicPosition = null;

    private function __construct(string $location)
    {
        $this->location = $location;
    }

    public static function fromString(string $location): self
    {
        return new static($location);
    }

    public function withGeographicPosition(GeographicPosition $geographicPosition): self
    {
        $new = clone $this;
        $new->geographicPosition = $geographicPosition;

        return $new;
    }

    public function hasGeographicalPosition(): bool
    {
        return $this->geographicPosition !== null;
    }

    /**
     * @psalm-suppress InvalidNullableReturnType
     * @psalm-suppress NullableReturnStatement
     */
    public function getGeographicPosition(): GeographicPosition
    {
        return $this->geographicPosition;
    }

    public function __toString(): string
    {
        return $this->location;
    }
}