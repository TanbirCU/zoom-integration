<?php

namespace App\Http\Controllers;

use Log;
use Illuminate\Http\Request;
use App\Services\ZoomService;

class ZoomController extends Controller
{
    protected $zoomService;

    public function __construct(ZoomService $zoomService)
    {
        $this->zoomService = $zoomService;
    }

    public function createMeetingForm()
    {
        return view('zoom.create-meeting');
    }

    public function createMeeting(Request $request)
    {
        $accessToken = session('zoom_access_token');
        
        if (!$accessToken) {
            return redirect()->route('zoom.auth');
        }

        $data = [
            'topic' => $request->input('topic'),
            'type' => 1,
            'start_time' => $request->input('start_time'),
        ];

        $meeting = $this->zoomService->createMeeting($accessToken, $data);
        return view('meeting-created', ['meeting' => $meeting]);
    }

    public function auth()
    {
        $zoomService = new ZoomService();
        return redirect($zoomService->getAuthorizationUrl());
    }

    // public function callback(Request $request)
    // {
    //     $code = $request->query('code');
    //     $zoomService = new ZoomService();
    //     $accessToken = $zoomService->getAccessToken($code);
    //     session(['zoom_access_token' => $accessToken]);
    //     return redirect()->route('zoom.create-meeting-form');
    // }
    public function callback(Request $request)
    {
        $code = $request->query('code');

        if (!$code) {
            Log::error('Zoom callback error: Missing authorization code.');
            return redirect()->route('zoom.auth')->withErrors(['error' => 'Authorization failed.']);
        }

        $zoomService = new ZoomService();
        $accessToken = $zoomService->getAccessToken($code);

        if (!$accessToken) {
            \Log::error('Zoom callback error: Access token not retrieved.');
            return redirect()->route('zoom.auth')->withErrors(['error' => 'Authorization failed.']);
        }

        session(['zoom_access_token' => $accessToken]);
        return redirect()->route('zoom.create-meeting-form');
    }


}
