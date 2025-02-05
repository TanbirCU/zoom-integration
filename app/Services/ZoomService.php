<?php

namespace App\Services;

use Log;
use GuzzleHttp\Client;

class ZoomService
{
    private $clientId;
    private $clientSecret;
    private $redirectUri;

    public function __construct()
    {
        $this->clientId = env('ZOOM_CLIENT_ID');
        $this->clientSecret = env('ZOOM_CLIENT_SECRET');
        $this->redirectUri = env('ZOOM_REDIRECT_URI');
    }

    // public function getAuthorizationUrl()
    // {
    //     $baseUrl = 'https://zoom.us/oauth/authorize';
    //     return $baseUrl . '?response_type=code&client_id=' . $this->clientId . '&redirect_uri=' . $this->redirectUri;
    // }
    public function getAuthorizationUrl()
    {
        $baseUrl = 'https://zoom.us/oauth/authorize';
        $redirectUrl = $baseUrl . '?response_type=code&client_id=' . $this->clientId . '&redirect_uri=' . $this->redirectUri;

        Log::info('Zoom Authorization URL: ' . $redirectUrl); // Log the redirect URL for debugging

        return $redirectUrl;
    }


    // public function getAccessToken($code)
    // {
    //     $client = new Client();
    //     $response = $client->post('https://zoom.us/oauth/token', [
    //         'form_params' => [
    //             'client_id' => $this->clientId,
    //             'client_secret' => $this->clientSecret,
    //             'code' => $code,
    //             'grant_type' => 'authorization_code',
    //             'redirect_uri' => $this->redirectUri
    //         ]
    //     ]);

    //     $data = json_decode($response->getBody(), true);
    //     return $data['access_token'];
    // }
    public function getAccessToken($code)
    {
        $client = new Client();

        try {
            $response = $client->post('https://zoom.us/oauth/token', [
                'form_params' => [
                    'client_id' => $this->clientId,
                    'client_secret' => $this->clientSecret,
                    'code' => $code,
                    'grant_type' => 'authorization_code',
                    'redirect_uri' => $this->redirectUri
                ]
            ]);

            $data = json_decode($response->getBody(), true);
            \Log::info('Zoom Access Token Retrieved: ' . json_encode($data));

            return $data['access_token'];
        } catch (\Exception $e) {
            \Log::error('Error retrieving Zoom Access Token: ' . $e->getMessage());
            return null;
        }
    }


    public function createMeeting($accessToken, $data)
    {
        $client = new Client();
        $response = $client->post('https://api.zoom.us/v2/users/me/meetings', [
            'headers' => [
                'Authorization' => 'Bearer ' . $accessToken
            ],
            'json' => $data
        ]);

        return json_decode($response->getBody(), true);
    }
}
