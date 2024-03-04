<?php

namespace App\Console\Commands;

use App\Models\Position;
use App\Models\Profile;
use App\Models\Project;
use App\Models\ProjectWorker;
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
          $worker = Worker::find(1);
          dd($worker->projects->toArray());

//        $project = Project::find(1);
//
//        dd($project->workers->toArray());

//        $projectWorkers = ProjectWorker::where('project_id', $project->id)->get();
//
//        $workerIds = $projectWorkers->pluck('worker_id')->toArray();
//
//        $workers = Worker::whereIn('id', $workerIds)->get();
//
//        dd($workers->toArray());

//        $this->prepareData();
//        $this->prepareManyToMany();

//      $worker = Worker::find(1);
//      $position = Position::find(1);
//      dd($position->workers->toArray());

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

        $position3 = Position::create([
            'title' => 'Designer',
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
        $profileData4 = [
            'worker_id' => $worker4->id,
            'city' => 'Yeakaterinburg',
            'skill' => 'Designer',
            'experience' => 3,
            'finished_study_ate' => '2020-07-01',
        ];
        $profileData5 = [
            'worker_id' => $worker5->id,
            'city' => 'Moscow',
            'skill' => 'Coder',
            'experience' => 5,
            'finished_study_ate' => '2020-07-01',
        ];
        $profileData6 = [
            'worker_id' => $worker6->id,
            'city' => 'Moscow',
            'skill' => 'Designer',
            'experience' => 5,
            'finished_study_ate' => '2020-07-01',
        ];

        Profile::create($profileData1);
        Profile::create($profileData2);
        Profile::create($profileData3);
        Profile::create($profileData4);
        Profile::create($profileData5);
        Profile::create($profileData6);
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

        ProjectWorker::create([
            'project_id' => $project1->id,
            'worker_id' => $workerManager->id,
        ]);
        ProjectWorker::create([
            'project_id' => $project1->id,
            'worker_id' => $workerBackend->id,
        ]);
        ProjectWorker::create([
            'project_id' => $project1->id,
            'worker_id' => $workerDesigner->id,
        ]);
        ProjectWorker::create([
            'project_id' => $project1->id,
            'worker_id' => $workerFrontend->id,
        ]);

        ProjectWorker::create([
            'project_id' => $project2->id,
            'worker_id' => $workerManager2->id,
        ]);
        ProjectWorker::create([
            'project_id' => $project2->id,
            'worker_id' => $workerBackend->id,
        ]);
        ProjectWorker::create([
            'project_id' => $project2->id,
            'worker_id' => $workerDesigner2->id,
        ]);
        ProjectWorker::create([
            'project_id' => $project2->id,
            'worker_id' => $workerFrontend->id,
        ]);
    }
}
