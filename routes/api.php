    <?php
    use App\Http\Controllers\Api\LeadApiController;

Route::get('/leads', [LeadApiController::class, 'index']);
Route::post('/leads', [LeadApiController::class, 'store']);