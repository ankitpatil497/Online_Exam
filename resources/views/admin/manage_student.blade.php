@extends('layouts.app')
@section('title','Student')
@section('content')
     <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Manage Students</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item active">manage students</li>
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <section class="content">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-12">
                      <!-- Default box -->
                      <div class="card">
                        <div class="card-header">
                        
                          <div class="card-tools">
                            <a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#add">Add</a>
                          </div>
                        </div>
                        <div class="card-body">
                         <table class="table table-striped table-bordered datatable">
                             <thead>
                                 <th>#</th>
                                 <th>Name</th>
                                 <th>DOB</th>
                                 <th>Exam</th>
                                 <th>Exam Date</th>
                                 <th>Result</th>
                                 <th>Status</th>
                                 <th>Action</th>
                             </thead>
                             <tbody>
                                <?php $count=1 ?>
                                @foreach ($student as $s)
                                    <tr>
                                        <td>{{$count++}}</td>
                                        <td>{{$s->name}}</td>
                                        <td>{{$s->dob}}</td>
                                        <td>{{$s->oex_exam_master->title}}</td>
                                        <td>{{$s->oex_exam_master->exam_date}}</td>
                                        <td>N/A</td>
                                        <td><input type="checkbox" class="student_status" data-id={{$s->id}} <?php if($s->status==1){ {echo('Checked');} }?> name="status" id="status"></td>
                                        <td>
                                            <a href="{{route('admin.edit.student',$s->id)}}" class="btn btn-success btn-sm">Edit</a>
                                            <a href="{{route('admin.delete.student',$s->id)}}" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                             </tbody>
                         </table>
                        </div>
                        <!-- /.card-body -->
                        
                        <!-- /.card-footer-->
                      </div>
                      <!-- /.card -->
                    </div>
                  </div>
                </div>
              </section>
        </div>
  <!-- /.content-wrapper -->

  <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ADD">Add New Student</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{route('admin.store.student')}}"  class="database_operation"  >
              @csrf
              
              <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">Exam Name</label>
                        <input type="text" required="required" id="name" class="form-control" name="name" placeholder="Enter Name">
                    </div>
                </div>                
              </div>

              <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="email">Exam E-mail</label>
                        <input type="text" required="required" id="email" class="form-control" name="email" placeholder="Enter Email">
                    </div>
                </div>                
              </div>

              <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="mobile_no">Exam Mobile-no</label>
                        <input type="number" required="required" id="mobile_no" class="form-control" name="mobile_no" placeholder="Enter Mobile_no">
                    </div>
                </div>                
              </div>

              <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="dob">Select Birth date</label>
                        <input type="date" required="required" id="dob" class="form-control" name="dob">
                    </div>
                </div>                
              </div>

              <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="category">Select Exam</label>
                        <select class="form-control" required name="exam">
                            <option value="">Select</option>
                            @foreach ($exam as $e)
                                <option value="{{$e->id}}">{{$e->title}}</option>
                            @endforeach
                          </select>
                    </div>
                </div>                
              </div>

              
              <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="password">Exam Password</label>
                        <input type="password" required="required" id="password" class="form-control" name="password" placeholder="Enter password">
                    </div>
                </div>                
              </div>

              <div class="row">
                <div class="col-md-12">
                    <div class="form-group" >
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection