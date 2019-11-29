<?php

namespace App\Listeners;

use App\Events\NewUserRegistered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailRegisteredUser implements ShouldQueue
{
    use InteractsWithQueue;

    public function __construct()
    {
        //
    }

    public function handle(NewUserRegistered $event)
    {
        //job
        echo "kirim email ke : " . $event->email;
//            echo "testing";
        // untuk release proses ketika gagal
        $this->release(10);

        // jika gagal 3x apa yang dilakukan
        if ($this->attempts() > 3) {
            //code
            echo "gagal";
        }
    }

}
