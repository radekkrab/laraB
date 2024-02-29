@extends('layout.main')

@section('content')


<div>
    <hr>
        <div>
            <form action="{{ route('worker.update', $worker->id) }}" method="Post">
                @csrf
                @method('Patch')
                <div style="margin-bottom: 15px;"><input type="text" name="name" placeholder="name" value="{{old('name') ?? $worker->name}}">
                    @error('name')
                    {{ $message }}
                    @enderror</div>
                <div style="margin-bottom: 15px;"><input type="text" name="surname" placeholder="surname" value="{{old('surname') ?? $worker->surname}}"></div>
                <div style="margin-bottom: 15px;"><input type="email" name="email" placeholder="email" value="{{old('email') ?? $worker->email}}"></div>
                <div style="margin-bottom: 15px;"><input type="number" name="age" placeholder="age" value="{{old('age') ?? $worker->age}}"></div>
                <div style="margin-bottom: 15px;"><textarea name="description" placeholder="description">{{old('description') ?? $worker->description}}</textarea></div>
                <div style="margin-bottom: 15px;"><input type="checkbox" id="isMarried" name="is_married" {{$worker->is_married ? 'checked' : ''}}>
                    <label for="isMarried">Is married</label></div>
                <div style="margin-bottom: 15px;"><input type="submit" value="Сохранить"></div>
            </form>

        </div>
</div>

@endsection
