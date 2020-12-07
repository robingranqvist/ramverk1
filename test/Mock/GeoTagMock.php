<?php

namespace Robin\Models;

class GeoTagMock extends GeoTag {
    public function getCurrentTempMock()
    {
        return "Fint";
    }

    public function getCurrentFeelsLike()
    {
        return "Kallt";
    }

    public function getCurrentWindSpeed()
    {
        return 2.5;
    }
}