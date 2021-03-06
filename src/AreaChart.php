<?php

namespace vitopedro\chartjs;

class AreaChart extends BaseChart
{
    public function render()
    {
        return view('chartjs::area', [
            'id' => $this->id,
            'colorPalette' => $this->colorPalette,
            'title' => $this->title,
            'hasTitle' => $this->hasTitle(),
            'labels' => $this->getLabels(),
            'series' => $this->getSeries(),
        ]);
    }
}
