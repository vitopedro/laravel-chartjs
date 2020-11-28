<?php

namespace vitopedro\chartjs;

class AreaChart extends LineChart
{
    protected function getFill()
    {
        return 'true';
    }
}
