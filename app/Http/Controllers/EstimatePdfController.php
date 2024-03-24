<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use NumberFormatter;

class EstimatePdfController extends Controller
{
    private $priceTypes = ['once', 'monthly', 'yearly'];

    public function streamPdf($estimate)
    {
        $formattedData = $this->formatEstimateData($estimate);
        // dd($formattedData);
        $pdf = PDF::loadView('pdf.estimate', $formattedData);

        return $pdf->stream('estimate.pdf');
    }

    private function formatEstimateData($estimate)
    {
        $totals = $this->initializeTotals($estimate->sections);
        $totals = $this->calculateTotals($totals, $estimate->hourly_rate);
        $estimate->hourly_rate = $this->formatPrice($estimate->hourly_rate);

        // Format each row's hours
        foreach ($estimate->sections as $section) {
            foreach ($section->rows as $row) {
                $row->formatted_hours = $this->formatValue($row->hours, $row->type);
            }
        }

        return [
            'estimate' => $estimate,
            'sections' => $estimate->sections,
            'totals' => $totals,
        ];
    }

    private function initializeTotals($sections)
    {
        $totals = [];
        foreach ($sections as $section) {
            foreach ($section->rows as $row) {
                $totals[$row->type]['value'] = ($totals[$row->type]['value'] ?? 0) + $row->hours;
            }
        }

        return $totals;
    }

    private function calculateTotals($totals, $hourlyRate)
    {
        foreach ($totals as $type => &$total) {
            $total['sum'] = $total['value'] * $hourlyRate;
            // Always format the sum as a price
            $total['sum'] = $this->formatPrice($total['sum']);
            // Format the value based on its type
            $total['value'] = $this->formatValue($total['value'], $type);
        }

        return $totals;
    }

    private function formatValue($value, $type)
    {
        if (in_array($type, $this->priceTypes)) {
            return $this->formatPrice($value);
        }

        return $this->formatNumber($value);
    }

    private function formatPrice($price)
    {
        // $formattedPrice = number_format($price, 2, ',', '');
        // if (substr($formattedPrice, -3) == ',00') {
        //     $formattedPrice = substr($formattedPrice, 0, -3);
        // }
        // return '$ ' . $formattedPrice . ',-';

        $formatter = new NumberFormatter('nl_NL', NumberFormatter::CURRENCY);
        $formattedPrice = $formatter->formatCurrency($price, 'EUR');

        return $formattedPrice;
    }

    private function formatNumber($number)
    {
        if (floor($number) == $number) {
            return (string) $number;
        }

        return number_format($number, 2, ',', '');
    }
}
