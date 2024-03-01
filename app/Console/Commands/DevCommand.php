<?php

namespace App\Console\Commands;

use App\Models\Position;
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

//        $position = Position::find(1);
        $worker = Worker::find(1);
        $position = Position::find(1);

        dd($position->workers->toArray());

        return 0;
    }

    private function prepareData()
    {
        $position1 = Position::create([
            'title' => 'Developer',
        ]);

        $position2 = Position::create([
            'title' => 'Manager',
        ]);

        $workerData1 = [
            'name' => 'Ivan',
            'surname' => 'Sidorov',
            'email' => 'ivasid@mail.ru',
            'position_id' => $position1->id,
            'age' => '32',
            'description' => 'jhd djfij jdkjf',
            'is_married' => 'true',
        ];

        $workerData2 = [
            'name' => 'Carl',
            'surname' => 'Hidorov',
            'email' => 'fgasid@mail.ru',
            'position_id' => $position2->id,
            'age' => '33',
            'description' => 'jfgfhd djfij jdkjf',
            'is_married' => 'true',
        ];

        $workerData3 = [
            'name' => 'Meverik',
            'surname' => 'Grov',
            'email' => 'fgagsid@mail.ru',
            'position_id' => $position1->id,
            'age' => '38',
            'description' => 'hd djfij jdkjf',
            'is_married' => 'true',
        ];

        $worker1 = Worker::create($workerData1);
        $worker2 = Worker::create($workerData2);
        $worker3 = Worker::create($workerData3);

        $profileData1 = [
            'worker_id' => $worker1->id,
            'city' => 'Yeakaterinburg',
            'skill' => 'Coder',
            'experience' => 3,
            'finished_study_ate' => '2020-07-01',
        ];
        $profileData2 = [
            'worker_id' => $worker2->id,
            'city' => 'Moscow',
            'skill' => 'Coder',
            'experience' => 5,
            'finished_study_ate' => '2020-07-01',
        ];
        $profileData3 = [
            'worker_id' => $worker3->id,
            'city' => 'Moscow',
            'skill' => 'Coder',
            'experience' => 5,
            'finished_study_ate' => '2020-07-01',
        ];

        Profile::create($profileData1);
        Profile::create($profileData2);
        Profile::create($profileData3);
    }
}
