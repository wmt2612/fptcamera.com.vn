<?php

namespace Modules\Rating\Jobs;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;
use Modules\Comment\Services\GoogleSheetComment;
use Modules\Rating\Entities\Rating;
use Modules\Rating\Services\GoogleSheetReview;

class SendReviewDataToSheet implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $rating;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Rating $rating)
    {
        $this->rating = $rating;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            $googleSheet = new GoogleSheetReview();
            $createdAt = Carbon::parse($this->rating->updated_at)->format('d/m/Y H:i:s');
            $customerName = $this->rating->customer_name;
            $gender = $this->rating->customer_gender;
            $phone = $this->rating->customer_phone;
            $email = $this->rating->customer_email;
            $content = $this->rating->review;
            $rating = $this->rating->rating;
            $url = $this->rating->link();
            $googleSheet->saveDataToSheet([
                [$createdAt, $rating, $customerName, $gender, $phone, $email, $content, $url]
            ]);
        }catch (\Exception $e) {
            $this->fail($e);
        }
    }

    public function fail($exception = null)
    {
        Log::error($exception->getMessage());
    }
}
