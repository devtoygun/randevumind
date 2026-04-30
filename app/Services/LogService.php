<?php

namespace App\Services;

use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LogService extends BaseService
{
    /**
     * Her controller çağrısında standart log kaydını oluşturur.
     */
    public function record(Request $request, string $event, ?int $companyId = null, ?int $userId = null): Log
    {
        $userAgent = (string) $request->userAgent();

        return Log::create([
            'company_id' => $companyId,
            'user_id' => $userId,
            'event' => $event,
            'url' => (string) $request->fullUrl(),
            'method' => (string) $request->method(),
            'ip_address' => (string) $request->ip(),
            'device_type' => $this->detectDeviceType($userAgent),
            'browser' => $this->detectBrowser($userAgent),
            'browser_version' => $this->detectBrowserVersion($userAgent),
            'platform' => $this->detectPlatform($userAgent),
            'platform_version' => $this->detectPlatformVersion($userAgent),
        ]);
    }

    /**
     * Cihaz tipini kullanıcı ajanı bilgisinden tahmin eder.
     */
    protected function detectDeviceType(string $userAgent): string
    {
        $agent = Str::lower($userAgent);

        if (Str::contains($agent, ['bot', 'crawl', 'spider'])) {
            return 'bot';
        }

        if (Str::contains($agent, ['tablet', 'ipad'])) {
            return 'tablet';
        }

        if (Str::contains($agent, ['mobile', 'android', 'iphone'])) {
            return 'mobile';
        }

        return 'desktop';
    }

    /**
     * Tarayıcı adını kullanıcı ajanı bilgisinden tahmin eder.
     */
    protected function detectBrowser(string $userAgent): string
    {
        $agent = Str::lower($userAgent);

        return match (true) {
            Str::contains($agent, 'edg') => 'Edge',
            Str::contains($agent, 'opr') => 'Opera',
            Str::contains($agent, 'chrome') => 'Chrome',
            Str::contains($agent, 'firefox') => 'Firefox',
            Str::contains($agent, 'safari') => 'Safari',
            default => 'Unknown',
        };
    }

    /**
     * Tarayıcı sürümünü kullanıcı ajanı bilgisinden ayıklar.
     */
    protected function detectBrowserVersion(string $userAgent): ?string
    {
        $patterns = [
            '/Edg\/([0-9\.]+)/i',
            '/OPR\/([0-9\.]+)/i',
            '/Chrome\/([0-9\.]+)/i',
            '/Firefox\/([0-9\.]+)/i',
            '/Version\/([0-9\.]+).*Safari/i',
        ];

        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $userAgent, $matches) === 1) {
                return $matches[1];
            }
        }

        return null;
    }

    /**
     * İşletim sistemi adını kullanıcı ajanı bilgisinden tahmin eder.
     */
    protected function detectPlatform(string $userAgent): string
    {
        $agent = Str::lower($userAgent);

        return match (true) {
            Str::contains($agent, 'windows') => 'Windows',
            Str::contains($agent, ['iphone', 'ipad', 'ios']) => 'iOS',
            Str::contains($agent, 'android') => 'Android',
            Str::contains($agent, 'mac os x') => 'macOS',
            Str::contains($agent, 'linux') => 'Linux',
            default => 'Unknown',
        };
    }

    /**
     * İşletim sistemi sürümünü kullanıcı ajanı bilgisinden ayıklar.
     */
    protected function detectPlatformVersion(string $userAgent): ?string
    {
        $patterns = [
            '/Windows NT ([0-9\.]+)/i',
            '/Android ([0-9\.]+)/i',
            '/OS ([0-9_]+)/i',
            '/Mac OS X ([0-9_]+)/i',
        ];

        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $userAgent, $matches) === 1) {
                return str_replace('_', '.', $matches[1]);
            }
        }

        return null;
    }
}
