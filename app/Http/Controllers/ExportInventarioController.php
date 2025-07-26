<?php

namespace App\Http\Controllers;

use App\Models\Artefact;
use Illuminate\Http\Response;

class ExportInventarioController extends Controller
{
    public function export()
    {
        $fileName = 'inventario.csv';

        $headers = [
            "Content-Type" => "text/csv; charset=UTF-8",
            "Content-Disposition" => "attachment; filename=\"$fileName\"",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0",
        ];

        $artefacts = Artefact::with([
            'incorporationMode',
            'superCategories',
            'authors',
            'workshops',
            'materials',
            'techniques'
        ])->get();

        $callback = function () use ($artefacts) {
            $handle = fopen('php://output', 'w');

            // Escreve BOM UTF-8 para garantir compatibilidade com Excel
            fprintf($handle, chr(0xEF).chr(0xBB).chr(0xBF));

            // Cabeçalho do CSV (cada coluna)
            fputcsv($handle, [
                'Referência',
                'Denominação',
                'Datação',
                'Descrição',
                'Origem',
                'Bibliografia',
                'Data Incorporação',
                'Modo de Incorporação',
                'Super Categorias',
                'Autores',
                'Oficinas',
                'Materiais',
                'Técnicas',
                'Criado em',
            ]);

            // Dados linha a linha
            foreach ($artefacts as $artefact) {
                fputcsv($handle, [
                    $artefact->reference,
                    $artefact->denomination,
                    $artefact->dating,
                    $artefact->description,
                    $artefact->origin,
                    $artefact->bibliography,
                    optional($artefact->incorporation_date)->format('Y-m-d'),
                    optional($artefact->incorporationMode)->name,
                    $artefact->superCategories->pluck('name')->implode(', '),
                    $artefact->authors->pluck('name')->implode(', '),
                    $artefact->workshops->pluck('name')->implode(', '),
                    $artefact->materials->pluck('name')->implode(', '),
                    $artefact->techniques->pluck('name')->implode(', '),
                    optional($artefact->created_at)->format('Y-m-d H:i:s'),
                ]);
            }

            fclose($handle);
        };

        return response()->streamDownload($callback, $fileName, $headers);
    }
}
