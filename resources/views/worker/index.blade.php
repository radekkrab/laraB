<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
Index Page
<div>
    <hr>
    <div>
        <div><a href="{{ route('worker.create') }}">Добавить</a></div>
    </div>
    <hr>
    <div>
        <form action="{{ route('worker.index') }}">
            <input type="text" name="name" placeholder="name" value="{{ request()->get('name')  }}">
            <input type="text" name="surname" placeholder="surname">
            <input type="text" name="email" placeholder="email">
            <input type="text" name="email" placeholder="email">
            <input type="number" name="from" placeholder="from">
            <input type="number" name="to" placeholder="to">
            <input type="text" name="description" placeholder="description">
            <input id="isMarried" type="checkbox" name="is_married"
                {{ request()->get('is_married') == 'on' ? 'checked' : '' }}>
            <lavel for="isMarried">Is married</lavel>
            <input type="submit" value="Отправить">
            <a href="{{ route('worker.index') }}">Сбросить</a>
        </form>
    </div>
    <hr>
    @foreach($workers as $worker)
        <div>
            <div>Name: {{ $worker->name }}</div>
            <div>Surname: {{ $worker->surname }}</div>
            <div>Email: {{ $worker->email }}</div>
            <div>Age: {{ $worker->age }}</div>
            <div>Description: {{ $worker->description }}</div>
            <div>Is married: {{ $worker->is_married }}</div>
            <div><a href="{{ route('worker.show', $worker->id) }}">Просмотреть</a></div>
            <div><a href="{{ route('worker.edit', $worker->id) }}">Редактировать</a></div>
            <div>
                <form action="{{ route('worker.delete', $worker->id) }}" method="post">
                    @csrf
                    @method('Delete')
                    <input type="submit" value="Удалить">
                </form>
            </div>
        </div>
        <hr>
    @endforeach
    <div class="my-nav">
        {{ $workers->links() }}
    </div>
</div>
<style>
    .my-nav svg {
        width: 20px;
    }
</style>
</body>
</html>
