<?php

namespace App\Jobs;

use App\Mail\ReunionMail;
use App\Models\Evenement;
use App\Models\Membre;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected array $membres;
    protected Evenement $evenement;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $membres, Evenement $evenement)
    {
        $this->membres = $membres;
        $this->evenement = $evenement;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $membres = Membre::whereIn('id', $this->membres)->get();
        $membres->each(function ($m) {
            Mail::to($m->user->email)->send(new ReunionMail($m->user, $this->evenement));
        });
    }
}
