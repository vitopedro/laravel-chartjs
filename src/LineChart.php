<?php

namespace vitopedro\chartjs;

class LineChart extends BaseChart
{
    public function render()
    {
        return view('chartjs::line', [
            'id' => $this->id,
            'colorPalette' => $this->colorPalette,
            'title' => $this->title,
            'hasTitle' => $this->hasTitle(),
            'labels' => $this->getLabels(),
            'series' => $this->getSeries(),
        ]);
    }
}