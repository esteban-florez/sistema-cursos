<?php

namespace App\Services;

use PhpOffice\PhpWord\TemplateProcessor;

class Document
{
    /**
     * Generates a Word document based on a template located in "resources/templates".
     * 
     * @param string $template  The name of the template.
     * @param string $name      The name of the generated document.
     * @param array $data       An associative array of template values.
     * @return string           The path of the generated document.
     */
    public static function generateWord($template, $name, $data)
    {
        $tp = new TemplateProcessor(resource_path("templates/{$template}.docx"));
        $path = public_path("{$name}.docx");

        $tp->setValues($data);

        $tp->saveAs($path);
        return $path;
    }

}