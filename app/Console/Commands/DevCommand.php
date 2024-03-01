<?php

namespace App\Console\Commands;

use App\Models\Profile;
use App\Models\Worker;
use Illuminate\Console\Command;

class DevCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'develop';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {

//        $this->prepareData();

        $worker = Worker::find(3);

        $profile = Profile::find(1);

        dd($worker->profile->toArray());

        return 0;
    }

    private function prepareData()
    {
        $workerData = [
            'name' => 'Ivan',
            'surname' => 'Sidorov',
            'email' => 'ivasid@mail.ru',
            'age' => '32',
            'description' => 'jhd djfij jdkjf',
            'is_married' => 'true',
        ];

        $worker = Worker::create($workerData);

        $profileData = [
            'worker_id' => $worker->id,
            'city' => 'Yeakaterinburg',
            'skill' => 'Coder',
            'experience' => 3,
            'finished_study_ate' => '2020-07-01',
        ];

        $profile = Profile::create($profileData);

        dd($profile->id);
    }
}
