<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\Event;
use GuzzleHttp\Client;
use InstagramAPI\Instagram;
use GuzzleHttp\Psr7\Request;
use InstagramAPI\Signatures;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class InstagramHashtag extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'instagram:hashtag';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    const BASE_URL_INSTAGRAM = 'https://api.instagram.com';

    const ENPOINT_MEDIA = '/v1/users/self/media/recent';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $events = Event::latest()->isIgFetchable()->get();
        if ($events->isEmpty()) {
            // $this->info('There is no pending events photo to fetch...');
            return;
        }

        $events->each(function ($item) {
            $this->getIgPhotosFromHashtag($item);
        });
    }

    /**
     * fetch data from instagram api
     * @return array
     */
    private function fetchFeedFromIg(): array
    {
        $user = User::where('email', 'surabayadev@gmail.com')->first();

        if ($user === null || $user->instagram_token === null) {
            exit(1);
        }
        $token = $user->instagram_token;
        $baseUrl = InstagramHashtag::BASE_URL_INSTAGRAM;
        $endpoint = InstagramHashtag::ENPOINT_MEDIA;
        $url = $baseUrl . $endpoint . '/?access_token=' . $token;

        $client = new Client();
        $request = new Request('GET', $url);

        $response = $client->send($request);
        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * filter instagram data by hashtag
     *
     * @param string $hashtag
     * @return array
     */
    private function searchFeedIgByHastag(string $hashtag): array
    {
        $datas = $this->fetchFeedFromIg();
        $response = [];

        foreach ($datas['data'] as $data) {
            if (in_array(strtolower($hashtag), $data['tags'])) {
                foreach ($data['carousel_media'] as $media) {
                    $response[] = [
                        'source_link' => $data['link'],
                        'provider' => 'instagram',
                        'thumbnail' => $media['images']['thumbnail']['url'],
                        'original' => $media['images']['standard_resolution']['url']
                    ];
                }
            }
        }
        return $response;
    }

    public function getIgPhotosFromHashtag(Event $event): void
    {
        try {
            $images = $this->searchFeedIgByHastag($event->ig_hashtag);
            $this->saveToDatabase($event, $images);
            $event->ig_hashtag_status = 'success';
            $event->save();
            $this->info('success');
        } catch (\Exception $e) {
            $this->info('error');
            Log::error(__CLASS__, [$e->getMessage()]);
        }
    }

    public function saveToDatabase(Event $event, $images = null)
    {
        // Insert to database
        $event->photos()->createMany($images);
    }
}
