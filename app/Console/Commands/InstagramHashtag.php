<?php

namespace App\Console\Commands;

use App\Models\Event;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use InstagramAPI\Instagram;
use InstagramAPI\Signatures;

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

    public function getIgPhotosFromHashtag(Event $event)
    {
        try {
            $ig = new Instagram($debug = true, $truncatedDebug = false);
            $ig->login(config('services.instagram.username'), config('services.instagram.password'));
        } catch (\Exception $e) {
            Log::error(__CLASS__, [$e->getMessage()]);
            $this->error('Something went wrong prend: ' . $e->getMessage());
            return;
        }

        try {
            // Generate a random rank token.
            $rankToken = \InstagramAPI\Signatures::generateUUID();
            // Starting at "null" means starting at the first page.
            $maxId = null;
            $target = 'surabayadev';
            $page = 0;

            do {
                // Request the page corresponding to maxId.
                // Note that we are using the same rank token for all pages.
                $response = $ig->hashtag->getFeed($event->ig_hashtag, $rankToken, $maxId);

                if ($response->getNumResults() == 0) {
                    // Return success but give log information
                    Log::info('There is no photo in hashtag: ' . $event->ig_hashtag);
                    $this->saveToDatabase($event, null);
                    return;
                }

                // \Log::info('numresults: ', [$response->getNumResults()]);
                dd($response->getItems());
                foreach ($response->getItems() as $key => $item) {
                    if ($item->getUser()->getUsername() == 'surabayadev') {

                        if ($page >= config('surabayadev.ig.limit')) {
                            break;
                        }
                        Log::info('[' . $page . ']', ['https://instagram.com/p/' . $item->getCode()]);

                        // Single post
                        if ($item->getImageVersions2()) {
                            $data = [
                                'provider' => 'instagram',
                                'source_link' => 'https://instagram.com/p/' . $item->getCode(),
                                'original' => $item->getImageVersions2()->getCandidates()[0]->getUrl(),
                                'thumbnail' => $item->getImageVersions2()->getCandidates()[1]->getUrl(),
                            ];
                            $this->saveToDatabase($event, $data);
                        } elseif (count($item->getCarouselMedia()) > 0) {
                            $data = [];
                            foreach ($item->getCarouselMedia() as $key => $carousel) {

                                if ($key >= config('surabayadev.ig.limit_carousel')) {
                                    break;
                                }

                                array_push($data, [
                                    'provider' => 'instagram',
                                    'source_link' => 'https://instagram.com/p/' . $item->getCode(),
                                    'original' => $carousel->getImageVersions2()->getCandidates()[0]->getUrl(),
                                    'thumbnail' => $carousel->getImageVersions2()->getCandidates()[1]->getUrl(),
                                ]);
                            }
                            $this->saveToDatabase($event, $data);
                        }
                        $page++;
                    }
                }

                // Now we must update the maxId variable to the "next page".
                // This will be a null value again when we've reached the last page!
                // And we will stop looping through pages as soon as maxId becomes null.
                $maxId = $response->getNextMaxId();
                echo "Sleeping for 7s..." . $maxId . PHP_EOL;
                sleep(7);
            } while ($maxId !== null);

            // update status events as success
            $event->ig_hashtag_status = 'success';
            $isSuccess = $event->save();
            if ($isSuccess) {
                Log::info(__CLASS__ . ' - Fetch photo success', [$event->id, $event->name]);
            }
        } catch (\Exception $e) {
            Log::error(__CLASS__, [$e->getMessage()]);
        }
    }

    public function saveToDatabase(Event $event, $images = null)
    {
        // Insert to database
        if (!empty($images[0])) {
            foreach ($images as $carouselImg) {
                $event->photos()->create($carouselImg);
            }
        } elseif (!empty($images)) {
            $event->photos()->create($images);
        }
    }
}
