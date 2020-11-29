<?php

namespace vitopedro\chartjs;

class ColumnChart extends BaseChart
{
    public function render()
    {
        return view('chartjs::column', [
            'id' => $this->id,
            'colorPalette' => $this->colorPalette,
            'title' => $this->title,
            'hasTitle' => $this->hasTitle(),
            'labels' => $this->getLabels(),
            'series' => $this->getSeries(),
        ]);
    }
}
