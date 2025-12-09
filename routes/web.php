<?php

use App\Exports\EmployeesExport;
use App\Livewire\EconomicGroups\Index as EconomicGroupsIndex;
use App\Livewire\Flags\Index as FlagsIndex;
use App\Livewire\Units\Index as UnitsIndex;
use App\Livewire\Employees\Index as EmployeesIndex;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\Settings\TwoFactor;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Maatwebsite\Excel\Facades\Excel;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('profile.edit');
    Route::get('settings/password', Password::class)->name('user-password.edit');
    Route::get('settings/appearance', Appearance::class)->name('appearance.edit');

    Route::get('settings/two-factor', TwoFactor::class)
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});

Route::middleware(['auth'])->prefix('system')->name('system.')->group(function () {
    Route::get('/economic-groups', EconomicGroupsIndex::class)->name('economic-groups.index');
    Route::get('/flags', FlagsIndex::class)->name('flags.index');
    Route::get('/units', UnitsIndex::class)->name('units.index');
    Route::get('/employees', EmployeesIndex::class)->name('employees.index');

    Route::get('/export-employees', function () {
        $search = request('search');
        $unitId = request('unit_id');

        return Excel::download(new EmployeesExport($search, $unitId), 'colaboradores.xlsx');
    });
});
