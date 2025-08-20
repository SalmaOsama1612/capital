    <public function boot(): void
{
    parent::boot();

    $this->routes(function () {
        Route::middleware('web')
            ->group(base_path('routes/web.php'));

        Route::middleware('api')
            ->prefix('api')
            ->group(base_path('routes/api.php'));

        // ملف الادمن
        Route::middleware('web')
            ->group(base_path('routes/admin.php'));
    });
}
