<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <div class="text-center">
    <h1>Daily Tasks</h1>
    <div class="row">
         <div class="col-md-12">

            @foreach($errors->all() as $error)

            <div class="alert alert-danger" role="alert">
                {{$error}}

                </div>
            @endforeach
            

             <form method="post" action="/saveTask">
             {{csrf_field()}}

             <input type="text" class="form-control" name="task" placeholder="Enter your task">
             <br>
             <input type="submit" class="btn btn-primary" value="Save">
             <input type="button" class="btn btn-warning" value="Clear">
            </form>
                <br><br>
             <table class="table table-dark">
                 <th>ID</th>
                 <th>Tasks</th>
                 <th>Completed</th>
                 <th>Action</th>
                 <th>Edit</th>
                 <th>Delete</th>
                 
                     @foreach($tasks as $task)
                     <tr>
                        <td>{{$task->id}}</td>
                        <td>{{$task->task}}</td>
                        <td>
                        @if($task->iscompleted)
                        <button class="btn btn-success">Completed</button></td>
                        @else
                        <button class="btn btn-warning">Not Completed</button></td>
                        
                        @endif
                        </td>
                        <td>
                            @if(!$task->iscompleted)
                            <a href="/markascompleted/{{$task->id}}" class="btn btn-primary">Mark as Completed</a>
                            @else
                            <a href="/markasnotcompleted/{{$task->id}}" class="btn btn-danger">Mark as Not Completed</a>
                            @endif
                        </td>
                        <td>
                            
                            <a href="/updatetask/{{$task->id}}" class="btn btn-warning">Update</a>
                            
                            
                            
                        </td>
                        <td>
                            
                            <a href="/deletetask/{{$task->id}}" class="btn btn-danger">Delete</a>
                            
                            
                            
                        </td>
                 </tr>
                 @endforeach
             </table>
        </div>

    </div>
    </div>
    </div>
    
</body>
</html>