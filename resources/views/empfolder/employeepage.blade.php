<!DOCTYPE html>
<html lang="eng">
<head>
     <meta charset="UTF-8">
     <meta name="viewport"  content="width-divice-width, initial-scala=1.0">
     <meta http-equiv= "X-UA-Compatible"  content ="ie=edge">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <title> Document</title>
</head>
<body>

<div class="container">
<div class="jumbotron">

 @if(\Session::has('sucess'))

 <div class="alert alert-danger">
    <p> {{\Session::get('sucess')}} </p> 
 </div>
 @endif
 
<div class="card">
  
  <div class="card-body">
    <h5 class="card-title">Employee Details</h5>
    <form method="POST" action="{{action('Employeecontroller@store')}}">
        
        {{ csrf_field() }}

      <div class="form-group">
          <label >Employee Name</label>
          <input type="text" class="form-control"  name="name" id="name" aria-describedby="emailHelp" placeholder="Enter Employee Name">
        
          </div>
          <div class="form-group">
          <label >Employee Profile</label>
          <input type="text" class="form-control" name="profile" id="profile" placeholder="Enter Employee profile">
          </div>
          <div class="form-group">
          <label >Employee Address</label>
          <input type="text" class="form-control" name="address" id="address" placeholder="Enter Employee  Address">
          </div>
          <div class="form-group">
          <label >Employee City</label>
          <input type="text" class="form-control" name="city" id="city" placeholder="Enter Employee city">
          </div>
         <button type="submit" name="submit" class="btn btn-primary" style="width:50%;">Insetr Data</button>
         </form>
<br> <br>
    <table class="table table-bordered">
      
      <thead class="thead-dark"> 
            <tr>
                <th>ID </th>
                <th>Name </th>
                <th>Profile</th>
                <th>Address </th>
                <th>City </th>
                <th>Edit </th>
                <th>Delete </th>
            </tr>
      </thead>
      <tbody>
      @foreach($emps as $row)
         <tr> 
           <td> {{ $row->id }} </td>
           <td> {{ $row->name }} </td>
           <td> {{ $row->profile }} </td>
           <td> {{ $row->address }} </td>
           <td> {{ $row->city }} </td>
           <td>
           <a href="{{action('Employeecontroller@edit', $row['id'])}}" class="btn btn-success"> Edit </a>

           </td>
           <td>
           <form action="{{ action('Employeecontroller@destroy', $row['id']) }}" method="POST">
                    {{ csrf_field() }}
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-danger">DELETE</button>
            </form>
             </td>
         
         </tr>
        
      @endforeach

      </tbody>
        
      </table>

  
  </div>
</div>
  
</div>
</div>
</body>
</html>