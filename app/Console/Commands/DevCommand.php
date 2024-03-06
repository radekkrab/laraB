<?php

namespace App\Console\Commands;

use App\Models\Avatar;
use App\Models\Client;
use App\Models\Department;
use App\Models\Position;
use App\Models\Profile;
use App\Models\Project;
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

//
//        $this->prepareData();
//        $this->prepareManyToMany();

        $position = Position::first();
        dd($position->queryWorker->toArray());
////
//        $worker = Worker::find(1);
//        $client = Client::find(2);
//
//        $worker->tags()->attach([1, 3]);
//        $client->tags()->attach([2, 3]);

//        dd($worker->reviews->toArray());

//        $client->avatar()->create([
//            'path' => 'somer poth',
//        ]);
//
//        $worker->avatar()->create([
//            'path' => 'some path',
//        ]);

//        $avatar = Avatar::find(2);
//        dd($avatar->avatarable->toArray());
//
//        dd($worker->projects->toArray());

        return 0;
    }

    private function prepareData()
    {
        Client::create([
            'name' => 'Bob'
        ]);
        Client::create([
            'name' => 'John'
        ]);
        Client::create([
            'name' => 'Elena'
        ]);
        $department1 = Department::create([
            'title' => 'IT',
        ]);

        $department2 = Department::create([
            'title' => 'Analytics',
        ]);

        $position1 = Position::create([
            'title' => 'Developer',
            'department_id' => $department1->id
        ]);

        $position2 = Position::create([
            'title' => 'Manager',
            'department_id' => $department1->id
        ]);

        $position3 = Position::create([
            'title' => 'Designer',
            'department_id' => $department1->id
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

        $workerData4 = [
            'name' => 'Egor',
            'surname' => 'Sidorov',
            'email' => 'egorsid@mail.ru',
            'position_id' => $position3->id,
            'age' => '32',
            'description' => 'jhd djfij jdkjf',
            'is_married' => 'true',
        ];

        $workerData5 = [
            'name' => 'Carolina',
            'surname' => 'Rov',
            'email' => 'ddsid@mail.ru',
            'position_id' => $position2->id,
            'age' => '33',
            'description' => 'jfgfhd djfij jdkjf',
            'is_married' => 'true',
        ];

        $workerData6 = [
            'name' => 'Mvena',
            'surname' => 'Grery',
            'email' => 'mvgsid@mail.ru',
            'position_id' => $position3->id,
            'age' => '31',
            'description' => 'hd dffgjfij jdkjf',
            'is_married' => 'true',
        ];

        $worker1 = Worker::create($workerData1);
        $worker2 = Worker::create($workerData2);
        $worker3 = Worker::create($workerData3);
        $worker4 = Worker::create($workerData4);
        $worker5 = Worker::create($workerData5);
        $worker6 = Worker::create($workerData6);

        $profileData1 = [
            'city' => 'Yeakaterinburg',
            'skill' => 'Coder',
            'experience' => 3,
            'finished_study_ate' => '2020-07-01',
        ];
        $profileData2 = [
            'city' => 'Moscow',
            'skill' => 'Coder',
            'experience' => 5,
            'finished_study_ate' => '2020-07-01',
        ];
        $profileData3 = [
            'city' => 'Moscow',
            'skill' => 'Coder',
            'experience' => 5,
            'finished_study_ate' => '2020-07-01',
        ];
        $profileData4 = [
            'city' => 'Yeakaterinburg',
            'skill' => 'Designer',
            'experience' => 3,
            'finished_study_ate' => '2020-07-01',
        ];
        $profileData5 = [
            'city' => 'Moscow',
            'skill' => 'Coder',
            'experience' => 5,
            'finished_study_ate' => '2020-07-01',
        ];
        $profileData6 = [
            'city' => 'Moscow',
            'skill' => 'Designer',
            'experience' => 5,
            'finished_study_ate' => '2020-07-01',
        ];
        $worker1->profile()->create($profileData1);
        $worker2->profile()->create($profileData2);
        $worker3->profile()->create($profileData3);
        $worker4->profile()->create($profileData4);
        $worker5->profile()->create($profileData5);
        $worker6->profile()->create($profileData6);
    }

    private function prepareManyToMany()
    {
        $workerManager = Worker::find(2);
        $workerBackend = Worker::find(1);
        $workerDesigner = Worker::find(4);
        $workerFrontend = Worker::find(3);
        $workerManager2 = Worker::find(5);
        $workerDesigner2 = Worker::find(6);

        $project1 = Project::create([
           'title' => 'Shop',
        ]);

        $project2 = Project::create([
           'title' => 'Blog',
        ]);

        $project1->workers()->attach([
            $workerManager->id,
            $workerBackend->id,
            $workerDesigner->id,
            $workerFrontend->id,
        ]);

        $project2->workers()->attach([
            $workerManager2->id,
            $workerBackend->id,
            $workerDesigner2->id,
            $workerFrontend->id,
        ]);


    }
}
