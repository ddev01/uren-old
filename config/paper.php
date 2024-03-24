<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Paper layout
    |--------------------------------------------------------------------------
    |
    |   A4:
    |     21 x 29,7cm
    |     595.28 x 841.89 pt
    |     1cm = 28,346 pt
    |
    |   Paper background requirements:
    |     Format: .jpg
    |     DPI: 600 dpi
    |     Bit depth: 24 bit
    |     Size: 4961 x 7016 px
    |
    */

    'A4' => [
        'background' => env('PAPER_A4_BACKGROUND_IMG', null),
        'font-size' => env('PAPER_A4_FONT_SIZE', 10.5),
        'margin' => [
            'top' => env('PAPER_A4_MARGIN_TOP', 95),
            'bottom' => env('PAPER_A4_MARGIN_BOTTOM', 100),
            'left' => env('PAPER_A4_MARGIN_RIGHT', 30),
            'right' => env('PAPER_A4_MARGIN_LEFT', 30),
        ],
        'page-number' => [
            'text' => env('PAPER_A4_PAGENUM_TEXT', '{PAGE_NUM} / {PAGE_COUNT}'),
            'y-pos' => env('PAPER_A4_PAGENUM_Y_POS', 730),
            'font-size' => env('PAPER_A4_PAGENUM_FONT_SIZE', 10),
            'color' => [0, 0, 0], // RYB (https://encycolorpedia.com/)
        ],
    ],
];
