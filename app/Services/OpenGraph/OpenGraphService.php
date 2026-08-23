<?php

namespace App\Services\OpenGraph;

use App\Models\InvitationLink;
use Spatie\Browsershot\Browsershot;

class OpenGraphService
{
    public function generate(InvitationLink $invitation): string
    {
        $directory = storage_path('app/public/og');

        if (! is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        $file = $directory . '/' . $invitation->token . '.png';

        // استخدم الكاش لو الصورة موجودة
        if (file_exists($file)) {
            return $file;
        }

        Browsershot::url(route('og.view', $invitation->token))
            ->setNodeBinary('/usr/bin/node')
            ->setNpmBinary('/usr/bin/npm')
            ->setChromePath('/bin/google-chrome')
            ->noSandbox()
            ->newHeadless()
            ->windowSize(1200, 630)
            ->deviceScaleFactor(2)
            ->showBackground()
            ->setOption('args', [
                '--disable-dev-shm-usage',
                '--disable-gpu',
                '--disable-setuid-sandbox',
                '--font-render-hinting=none',
            ])
            ->timeout(120)
            ->save($file);

        return $file;
    }

    public function clear(InvitationLink $invitation): void
    {
        $file = storage_path('app/public/og/' . $invitation->token . '.png');

        if (file_exists($file)) {
            unlink($file);
        }
    }
}
