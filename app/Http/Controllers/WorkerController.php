<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function index()
    {
        $workers = Worker::all();

        return view('worker.index', compact('workers'));
    }

    public function show(Worker $worker)
    {
        return view('worker.show', compact('worker'));
    }

    public function create()
    {
        $worker = [
            'name' => 'Mark',
            'surname' => 'MarIvanov',
            'email' => 'miv@mail.ru',
            'age' => '22',
            'description' => 'i am Mark',
            'is_married' => false,

        ];

        Worker::create($worker);

        return 'Ivan was created';
    }

    public function update()
    {
        $workers = Worker::find(2);

        $workers->update([
            'name' => 'Karl',
            'surname' => 'Sidorov',
        ]);

        return 'Was updated';
    }

    public function delete()
    {
        $workers = Worker::find(2);

        $workers->delete();

        return 'Was deleted';
    }
}
