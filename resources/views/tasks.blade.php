@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Task
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
{{--                @include('common.errors')--}}

                <!-- New Task Form -->
                    <form action="{{ url('task')}}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}

                    <!-- Task Name -->
                        <div class="row form-group">

                            <label for="task-name" class="col-sm-2 control-label">Task</label>
                            <div class="col-sm-5">

                                <input type="text" name="title" id="task-name" class="form-control" value="{{ old('task') }}">
                            </div>
                            <div class="col-sm-5">
                                <input type="text" name="description" id="task-name" class="form-control" value="{{ old('description') }}">
                            </div>
                        </div>

                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="m-3">
                                <button type="submit" class="btn btn-default btn-block">
                                    <i class="fa fa-btn fa-plus"></i>Add Task
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Current Tasks -->
            @if (count($tasks) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Current Tasks
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                            <th>title</th>
                            <th>description</th>
                            <th>options</th>
                            </thead>
                            <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td class="table-text"><div>{{ $task->title }}</div></td>

                                    <!-- Task Delete Button -->


                                <td class="table-text"><div>{{ $task->description }}</div></td>
                                    <td>
                                        <form action="{{ url('task/'.$task->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-btn fa-trash"></i>Delete
                                            </button>
                                        </form>

                                        <a href="{{ url('task/'.$task->id).'/edit' }}" >
                                            {{ csrf_field() }}


                                            <button type="submit" class="btn btn-primary">
                                                <i class="fa fa-btn fa-edit"></i>Edit
                                            </button>
                                        </a>

                                    </td>
                                </tr>



                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection