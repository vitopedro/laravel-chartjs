<?php

namespace vitopedro\chartjs;

class ColumnChart extends LineChart
{
    protected function getType()
    {
        return 'bar';
    }

    protected function getFill()
    {
        return 'false';
    }
}
