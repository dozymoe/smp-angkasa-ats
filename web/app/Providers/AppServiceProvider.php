<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Log;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Blade Directives

        \Blade::directive('stylesheets', function($expression)
        {
            eval("\$params = [$expression];");
            $name = $params[0] ?? 'main';
            $inject = $params[1] ?? 'external';

            $metafile = base_path('resources/generated/webpack-css.meta.json');
            if (! file_exists($metafile)) return '';
            $webpack = json_decode(file_get_contents($metafile));

            $html = [];
            foreach ($webpack as $key => $value)
            {
                if (preg_match("/(^|~){$name}(~|\\.|-)/", $key, $match))
                {
                    if ($inject === 'local')
                    {
                        $value = public_path($value);
                    }
                    $html[] = "<link href=\"{$value}\" rel=\"stylesheet\"/>";
                }
            }
            return implode("\n", $html);
        });

        \Blade::directive('javascripts', function($expression)
        {
            eval("\$params = [$expression];");
            $name = $params[0] ?? 'main';

            $name = trim($name, "'\"");
            $metafile = base_path('resources/generated/webpack-js.meta.json');
            if (! file_exists($metafile)) return '';
            $webpack = json_decode(file_get_contents($metafile));

            $html = [];
            foreach ($webpack as $key => $value)
            {
                if (preg_match("/.*\\.map$/", $key, $match))
                {
                    continue;
                }
                $html[] = "<script src=\"{$value}\"></script>";
            }
            return implode("\n", $html);
        });
    }
}
