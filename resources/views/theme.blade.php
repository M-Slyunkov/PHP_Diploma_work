@extends('master')

@section('title', ' Netology')

@section('content')
    <div class="center">
        <header class="header">
            <div class="log">
                Здравствуйте,<br>
                {{ session('user_name') }}!<br>
                <a href="index.php">Выйти</a>
            </div>
            <h1 class="title">FAQ</h1>
        </header>

        <nav class="nav">
            <h3 class="h3">Действия</h3>
            <ul>
                <li><a href="admins">Работа с другими администраторами</a></li>
                <li><a href="themes">Работа с темами</a></li>
            </ul>
        </nav>

        <div class="content">
            <form action="update_question" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <table style="text-align: center; vertical-align: top">
                    <tr style="background-color: #eeeeee">
                        <td>Категория</td>
                        <td>Вопрос</td>
                        <td>Дата обращения</td>
                        <td>Статус</td>
                        <td>Ответ</td>
                        <td>Имя пользователя</td>
                        <td>E-mail пользователя</td>
                    </tr>

                    @foreach($table as $row)
                        <tr>
                            <td>{{ $row->category }}<br>
                                <select name="category[{{$row->id}}]">
                                    <option></option>
                                    @foreach($themes as $theme)
                                        <option value="{{ $theme->id }}">{{ $theme->category }}</option>
                                    @endforeach
                                </select>
                                <button type="submit" name="isNewCategory" value="{{ $row->id }}">Изменить категорию</button>
                            </td>
                            <td>{{ $row->question }}<br>
                                <input type="text" name="question[{{$row->id}}]"><br>
                                <button type="submit" name="isNewQuestion" value="{{ $row->id }}">Изменить вопрос</button>
                            </td>
                            <td>{{ $row->date }}</td>
                            <td>{{ $row->status }}<br>
                                <select name="status[{{$row->id}}]">
                                    <option></option>
                                    @foreach($statuses as $status)
                                        <option value="{{ $status->id }}">{{ $status->status }}</option>
                                    @endforeach
                                </select><br>
                                <button type="submit" name="isNewStatus" value="{{ $row->id }}">Изменить статус</button>
                            </td>
                            <td>{{ $row->answer }}<br>
                                <input type="text" name="answer[{{$row->id}}]"><br>
                                <button type="submit" name="isNewAnswer" value="{{ $row->id }}">Изменить ответ</button>
                            </td>
                            <td>{{ $row->user_name }}<br>
                                <input type="text" name="user_name[{{$row->id}}]"><br>
                                <button type="submit" name="isNewAuthor" value="{{ $row->id }}">Изменить автора</button>
                            </td>
                            <td>{{ $row->user_email }}</td>
                            <td><a href="{{ 'delete_quest'.$row->id }}">Удалить вопрос</a></td>
                        </tr>
                        <input type="hidden" name="currentCategory" value="{{ $row->themesId }}">
                    @endforeach
                </table>
            </form>
        </div>
    </div>
@endsection