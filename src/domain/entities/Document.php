<?php

namespace App\domain\entities;

use Exception;

class Document
{

    private function __construct(
        private string $title,
        private  string $content,
        private string $path
    ) {}

    public static function create(string $title, string $content, string $path): Document
    {
        self::validate($title, $content, $path);
        return new Document($title, $content, $path);
    }

    private static function validate(string $title, string $content, string $path): void
    {
        if (!$title || empty($title)) throw new Exception("title invalid.");
        if (!$content || empty($content)) throw new Exception("content invalid.");
        if (!$path || empty($path)) throw new Exception("path invalid.");
    }

    public function getNameFilePdf(): string
    {
        $titleFormat = preg_replace('/\s+/', '', $this->title);
        $name = $titleFormat . rand(1, 9999999999) . '.pdf';
        return $name;
    }

    public function getPath(): string
    {
        return rtrim($this->path, '/\\') . '/' . $this->getNameFilePdf();
    }

    public function getHtmlToGeneretePdf(): string
    {
        $title = htmlspecialchars($this->title);
        $content = nl2br(htmlspecialchars($this->content));

        return
            '<!DOCTYPE html>' .
            '<html lang="pt-BR">' .
            '<head>' .
            '<meta charset="UTF-8">' .
            '<style>' .
            'body {' .
            'font-family: DejaVu Sans, sans-serif;' .
            'margin: 40px;' .
            'color: #333;' .
            'background-color: #fdfdfd;' .
            '}' .
            'h1 {' .
            'font-size: 24px;' .
            'color: #2c3e50;' .
            'border-bottom: 2px solid #3498db;' .
            'padding-bottom: 10px;' .
            'margin-bottom: 20px;' .
            '}' .
            'p {' .
            'font-size: 16px;' .
            'line-height: 1.6;' .
            'text-align: justify;' .
            'padding: 5px' .
            '}' .
            '</style>' .
            '</head>' .
            '<body>' .
            '<h1>' . $title . '</h1>' .
            '<p>' . $content . '</p>' .
            '</body>' .
            '</html>';
    }
}
