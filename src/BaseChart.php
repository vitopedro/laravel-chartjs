<?php

namespace vitopedro\chartjs;

use TypeError;

abstract class BaseChart
{
    protected $id;
    protected $colorPalette = [
        [
            'backgroundColor' => 'rgba(255, 99, 132, 0.5)',
            'borderColor' => 'rgba(255, 99, 132, 1)',
        ],
        [
            'backgroundColor' => 'rgba(54, 162, 235, 0.5)',
            'borderColor' => 'rgba(54, 162, 235, 1)',
        ],
        [
            'backgroundColor' => 'rgba(255, 206, 86, 0.5)',
            'borderColor' => 'rgba(255, 206, 86, 1)',
        ],
        [
            'backgroundColor' => 'rgba(75, 192, 192, 0.5)',
            'borderColor' => 'rgba(75, 192, 192, 1)',
        ],
        [
            'backgroundColor' => 'rgba(153, 102, 255, 0.5)',
            'borderColor' => 'rgba(153, 102, 255, 1)',
        ],
        [
            'backgroundColor' => 'rgba(255, 159, 64, 0.5)',
            'borderColor' => 'rgba(255, 159, 64, 1)',
        ],
        [
            'backgroundColor' => 'rgba(67, 67, 67, 0.5)',
            'borderColor' => 'rgba(67, 67, 67, 1)',
        ],
        [
            'backgroundColor' => 'rgba(144, 237, 125, 0.5)',
            'borderColor' => 'rgba(144, 237, 125, 1)',
        ],
        [
            'backgroundColor' => 'rgba(145, 232, 225, 0.5)',
            'borderColor' => 'rgba(145, 232, 225, 1)',
        ],
        [
            'backgroundColor' => 'rgba(204, 204, 255, 0.5)',
            'borderColor' => 'rgba(204, 204, 255, 1)',
        ],
        [
            'backgroundColor' => 'rgba(128, 0, 0, 0.5)',
            'borderColor' => 'rgba(128, 0, 0, 1)',
        ],
        [
            'backgroundColor' => 'rgba(128, 128, 0, 0.5)',
            'borderColor' => 'rgba(128, 128, 0, 1)',
        ],
        [
            'backgroundColor' => 'rgba(0, 0, 128, 0.5)',
            'borderColor' => 'rgba(0, 0, 128, 1)',
        ],
        [
            'backgroundColor' => 'rgba(128, 0, 128, 0.5)',
            'borderColor' => 'rgba(128, 0, 128, 1)',
        ],
        [
            'backgroundColor' => 'rgba(192, 192, 192, 0.5)',
            'borderColor' => 'rgba(192, 192, 192, 1)',
        ],
    ];

    protected $title;

    protected $labels = [];

    protected $series = [];

    public function __construct()
    {
        $this->id = "chart" . uniqid();
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    protected function hasTitle()
    {
        return $this->title !== null && $this->title !== '';
    }

    public function setLabels($labels)
    {
        $this->labels = $labels;
    }

    protected function getLabels()
    {
        return $this->labels;
    }

    public function addSerie($label, $data)
    {
        $this->series[] = [
            'label' => $label,
            'data' => $data,
        ];
    }

    public function clearSeries()
    {
        $this->series = [];
    }

    public function setSeries($series) {
        $this->clearSeries();

        if (!is_array($series)) {
            throw new TypeError("Series should be an array");
        }

        foreach ($series as $serie) {
            if (!isset($serie['label']) || !is_string($serie['label'])) {
                throw new TypeError("Label in each serie must be defined and must be a string");
            }

            if (!isset($serie['data']) || !is_array($serie['data'])) {
                throw new TypeError("Data in each serie must be defined and should be an array");
            }

            $this->addSerie($serie['label'], $serie['data']);
        }
    }

    public function getSeries()
    {
        return $this->series;
    }
}