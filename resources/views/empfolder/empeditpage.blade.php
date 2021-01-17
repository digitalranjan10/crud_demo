<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container">
<div class="jumbotron">

@if(\Session::has('sucess'))

 <div class="alert alert-danger">
    <p> {{\Session::get('sucess')}} </p> 
 </div>
 @endif
 

<form method="POST" action="{{action('Employeecontroller@update', $id)}}">
        
        {{ csrf_field() }}

      <div class="form-group">
          <label >Employee Name</label>
          <input type="text" class="form-control"  name="name" id="name"  value="{{ $emps->name }}" aria-describedby="emailHelp" 
                placeholder="Enter Employee Name">
        
          </div>
          <div class="form-group">
          <label >Employee Profile</label>
          <input type="text" class="form-control" name="profile" id="profile" value="{{ $emps->profile }}"  placeholder="Enter Employee profile">
          </div>
          <div class="form-group">
          <label >Employee Address</label>
          <input type="text" class="form-control" name="address" id="address"  value="{{ $emps->address }}" placeholder="Enter Employee  Address">
          </div>
          <div class="form-group">
          <label >Employee City</label>
          <input type="text" class="form-control" name="city" id="city"  value="{{ $emps->city }}" placeholder="Enter Employee city">
          </div>
          {{ method_field('PUT') }}
         <button type="submit" name="submit" class="btn btn-primary" style="width:50%;">update Data</button>
    </form>
    </div>
    </div>
</body>
</html>