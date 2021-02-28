<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class ToBase64Extension extends AbstractExtension
{

    public function getFunctions()
    {
        return [
            new TwigFunction('to_base_64', [$this, 'toBase64'])
        ];
    }

    public function toBase64(string $url): string
    {
        $type = pathinfo($url, PATHINFO_EXTENSION);
        $data = file_get_contents($url);
        return 'data:image/' . $type . ';base64,' . base64_encode($data);
    }
}
