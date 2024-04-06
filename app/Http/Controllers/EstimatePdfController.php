<?php

namespace App\Http\Controllers;

use App\Models\Estimate;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Response;
use NumberFormatter;

class EstimatePdfController extends Controller
{
    /** @var array<string> */
    private array $priceTypes = ['once', 'monthly', 'yearly'];

    public function streamPdf(Estimate $estimate): Response
    {
        $formattedData = $this->formatEstimateData($estimate);
        $pdf = Pdf::loadView('pdf.estimate', $formattedData);

        return $pdf->stream('estimate.pdf');
    }

    /**
     * Format the estimate data for PDF generation.
     *
     * @param  Estimate  $estimate  The estimate to format.
     * @return array<mixed>
     */
    private function formatEstimateData(Estimate $estimate): array
    {
        $totals = $this->initializeTotals($estimate->sections);
        $totals = $this->calculateTotals($totals, (float) $estimate->hourly_rate);
        $estimate->hourly_rate = (float) $this->formatPrice((float) $estimate->hourly_rate); // Adjusted to ensure type compatibility

        foreach ($estimate->sections as $section) {
            foreach ($section->rows as $row) {
                /** @var App\Models\EstimateSectionRow|object $row */
                $row->formatted_hours = $this->formatValue((float) $row->hours, $row->type);
            }
        }

        return [
            'estimate' => $estimate,
            'sections' => $estimate->sections,
            'totals' => $totals,
        ];
    }

    /**
     * @return array<mixed>
     */
    private function initializeTotals(object $sections): array
    {
        $totals = [];
        foreach ($sections as $section) {
            foreach ($section->rows as $row) {
                $totals[$row->type]['value'] = ($totals[$row->type]['value'] ?? 0) + $row->hours;
            }
        }

        return $totals;
    }

    /**
     * @param  array<mixed>  $totals
     * @return array<mixed>
     */
    private function calculateTotals(array $totals, float $hourlyRate): array
    {
        foreach ($totals as $type => &$total) {
            $total['sum'] = $total['value'] * $hourlyRate;
            $total['sum'] = $this->formatPrice($total['sum']);
            $total['value'] = $this->formatValue($total['value'], $type);
        }

        return $totals;
    }

    private function formatValue(float $value, string $type): string
    {
        if (in_array($type, $this->priceTypes)) {
            return $this->formatPrice($value);
        }

        return $this->formatNumber($value);
    }

    private function formatPrice(float $price): string
    {
        $formatter = new NumberFormatter('nl_NL', NumberFormatter::CURRENCY);

        return $formatter->formatCurrency($price, 'EUR');
    }

    private function formatNumber(float $number): string
    {
        return number_format($number, 2, ',', '');
    }
}
