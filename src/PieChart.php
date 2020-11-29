<?php

namespace vitopedro\chartjs;

class PieChart extends BaseChart
{
    public function render()
    {
        return view('chartjs::pie', [
            'id' => $this->id,
            'colorPalette' => $this->colorPalette,
            'title' => $this->title,
            'hasTitle' => $this->hasTitle(),
            'labels' => $this->getLabels(),
            'series' => $this->getSeries(),
        ]);
    }
}