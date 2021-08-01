<?php

use App\Models\Campaign;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoneeController;
use App\Http\Livewire\CreateDonee;
use App\Http\Livewire\EditDonee;
use App\Http\Livewire\FamilyCreate;
use App\Http\Livewire\FamilyEdit;
use App\Http\Livewire\CampaignCreate;
use App\Http\Livewire\CampaignEdit;
use App\Http\Livewire\CampaignShow;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $current = Campaign::whereDate('started_at', '<=', now())->whereDate('ended_at', '>=', now())->first();
    if(is_null($current))
    {
        $current = (object) [
            'name' => config('app.name'),
            'description' => 'There is no active campaign at this time.',
            'design' => (object) [
                'logo' => '',
                'background' => '',
                'icon' => '',
            ]
        ];
    }
    
    if(Storage::url($current->design->background) != '')
    {
        $background = Storage::url($current->design->background);
    }

    return view('welcome', compact('current'));
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//Route::resource('donee', DoneeController::class);

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/donee', [DoneeController::class, 'index'])->name('donee.index');
    Route::get('/donee/create', CreateDonee::class)->name('donee.create');
    Route::get('/donee/{donee}/edit', EditDonee::class)->name('donee.edit');

    Route::get('/family/create', FamilyCreate::class)->name('family.create');
    Route::get('/family/{family}/edit', FamilyEdit::class)->name('family.edit');

    Route::get('/campaign/create', CampaignCreate::class)->name('campaign.create');
    Route::get('/campaign/{campaign}/edit', CampaignEdit::class)->name('campaign.edit');
    Route::get('/campaign/{campaign}', CampaignShow::class)->name('campaign.show');

    Route::resource('admin', AdminController::class);
});

Route::get('/mailable', function () {
    $campaign = App\Models\Campaign::find(1);

    return new App\Mail\DoneeSelected($campaign);
});