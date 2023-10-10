<?php

namespace App\Console\Commands;

use App\Models\Message;
use App\Models\Token;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SendPaymentNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'payment:remind';

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
     * @return int
     */
    public function handle()
    {
        
        $start_date = Carbon::now()->format('Y-m-d');
        $tokens = Token::where('date', $start_date)->get();

        foreach ($tokens as $key => $token) {
            if ($token->status != "Paid") {
                Message::create(
                    [
                        'message' => "Please settle your payment!",
                        'user_id' => $token->customer->user->id
                    ]
                );
            }
        }
    }
}
