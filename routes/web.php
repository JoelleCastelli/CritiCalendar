<?php

use App\Http\Controllers\WallController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\InvitationController;
use App\Models\Campaign;
use App\Models\Theme;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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

// ROUTE TO DISPLAY LOGS
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    print_r(Campaign::all()->count() * 5);
})->middleware(['auth'])->name('test');


Route::get('/dashboard', function () {
    return view ('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

/* CUSTOM */
Route::get(
    '/plip/{truc?}',
    [WallController::class, 'plip']
)->middleware(['auth'])->name('plip');

Route::get(
    '/plop/{truc?}',
    function ($truc = null) {
        return 'plop';
    }
);

Route::get(
    '/wall',
    [WallController::class, 'index']
)->middleware(['auth'])->name('wall');

Route::post(
    '/wall',
    [WallController::class, 'post']
)->middleware(['auth'])->name('post');

Route::get(
    '/update/{post_id}',
    [WallController::class, 'update']
)->middleware(['auth'])->name('update');

Route::post(
    '/save',
    [WallController::class, 'save']
)->middleware(['auth'])->name('save');

Route::get(
    '/delete/{post_id}',
    [WallController::class, 'delete']
)->middleware(['auth'])->name('delete');


Route::get(
    '/films',
    [FilmController::class, 'index']
)->middleware(['auth'])->name('films');

// SESSION
Route::get(
    '/sessions/nouvelle-session',
    [EventController::class, 'create']
)->middleware(['auth'])->name('new_event');

// CHARACTERS
Route::get(
    '/personnages',
    [CharacterController::class, 'index']
)->middleware(['auth'])->name('characters');

Route::get(
    '/campaign/{campaign_id}/personnage/{player_id}',
    [CharacterController::class, 'details']
)->middleware(['auth'])->name('my-character');

Route::post(
    '/personnages/modifier/{character_id}',
    [CharacterController::class, 'update']
)->middleware(['auth'])->name('update_character');

Route::get(
    '/personnages/supprimer/{character_id}',
    [CharacterController::class, 'delete']
)->middleware(['auth'])->name('delete_character');

// CAMPAIGNS
Route::get(
    '/campagnes',
    [CampaignController::class, 'index']
)->middleware(['auth'])->name('campaigns');

Route::get(
    '/campagnes/nouvelle-campagne',
    [CampaignController::class, 'createNewCampaign']
)->middleware(['auth'])->name('new_campaign');

Route::post(
    '/campagnes/nouvelle-campagne',
    [CampaignController::class, 'saveCampaign']
)->middleware(['auth'])->name('save_campaign');

Route::get(
    '/campagnes/details/{campaign_id}',
    [CampaignController::class, 'details']
)->middleware(['auth'])->name('details_campaign');


// INVITATIONS
Route::get(
    '/invitations',
    [InvitationController::class, 'index']
)->middleware(['auth'])->name('invitations_list');

Route::get(
    '/accepter-invitation/{invitation_id}',
    [InvitationController::class, 'acceptInvitation']
)->middleware(['auth'])->name('accept_invitation');

Route::get(
    '/refuser-invitation/{invitation_id}',
    [InvitationController::class, 'declineInvitation']
)->middleware(['auth'])->name('decline_invitation');


// ONLY ACCESSIBLE TO CAMPAIGN OWNERS
Route::group(['middleware' => ['campaignOwner']], function () {
    Route::get(
        '/campagnes/modifier/{campaign_id}',
        [CampaignController::class, 'updateCampaign']
    )->middleware(['auth'])->name('update_campaign');

    Route::get(
        '/campagnes/supprimer/{campaign_id}',
        [CampaignController::class, 'deleteCampaign']
    )->middleware(['auth'])->name('delete_campaign');

    Route::post(
        '/campagnes/inviter',
        [InvitationController::class, 'sendInvite']
    )->middleware(['auth'])->name('send_invite');

    Route::get(
        '/campagnes/renvoyer-invitation/{campaign_id}/{email}',
        [InvitationController::class, 'sendInviteAgain']
    )->middleware(['auth'])->name('send_invite_again');

    Route::get(
        '/campagnes/supprimer-invitation/{campaign_id}/{email}',
        [InvitationController::class, 'deleteInvite']
    )->middleware(['auth'])->name('delete_invite');

    Route::get(
        '/campagnes/supprimer-personnage/{character_id}/{campaign_id}',
        [CampaignController::class, 'removeCharacter']
    )->middleware(['auth'])->name('remove_character');

});
