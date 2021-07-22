<?php

use App\Http\Controllers\WallController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Models\Campaign;
use App\Models\Event;
use Illuminate\Http\Request;
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

Route::get('/', function () {
    return view('welcome');
});

// ROUTE TO DISPLAY LOGS
Route::get('logs',
    '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index'
)->middleware(['auth', 'admin'])->name('logs');

Route::get(
    '/dashboard',
    [DashboardController::class, 'index']
)->middleware(['auth'])->name('dashboard');

Route::get(
    '/parametres',
    [UserController::class, 'index']
)->middleware(['auth'])->name('settings');

Route::post(
    '/parametres/informations',
    [UserController::class, 'saveSettings']
)->middleware(['auth'])->name('save_settings');

Route::post(
    '/parametres/password',
    [UserController::class, 'savePassword']
)->middleware(['auth'])->name('save_password');

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

    // CAMPAIGNS
    Route::get(
        '/campagnes/modifier/{campaign_id}',
        [CampaignController::class, 'updateCampaign']
    )->middleware(['auth'])->name('update_campaign');

    Route::get(
        '/campagnes/supprimer/{campaign_id}',
        [CampaignController::class, 'deleteCampaign']
    )->middleware(['auth'])->name('delete_campaign');


    // INVITATIONS
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


    // CHARACTERS
    Route::get(
        '/campagnes/supprimer-personnage/{character_id}/{campaign_id}',
        [CampaignController::class, 'removeCharacter']
    )->middleware(['auth'])->name('remove_character');


    // EVENTS
    Route::get(
        'campaigns/{campaign_id}/sessions/{event_id?}/',
        [EventController::class, 'display']
    )->middleware(['auth'])->name('display_event');

    Route::get('/campaigns/{campaign_id}/sessions/{event_id}/supprimer', function (Request $request) {
        Event::Find($request->event_id)->delete();
        return redirect()->back()->with('success', 'La session a bien été supprimée');
    })->middleware(['auth'])->name('delete_event');

    Route::post(
        'campaigns/{campaign_id}/sessions/{event_id?}/',
        [EventController::class, 'saveEvent']
    )->middleware(['auth'])->name('save_event');
});
