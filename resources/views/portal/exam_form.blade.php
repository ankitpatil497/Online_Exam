@extends('layouts.portal')
@section('title','Exam Form')
@section('content')
     <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item active">Exam Form</li>
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
                    
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3>{{$exam->title}}</h3>
                                </div>
                                <div class="col-sm-6">
                                    <h3><span class="float-right">{{date('d M,Y',strtotime($exam->exam_date))}}</span></h3>
                                </div>
                            </div>
                            <form action="{{route('portal.form.submit')}}"  class="database_operation"  >
                                @csrf
                                <input type="hidden" name="id" value="{{$exam->id}}">
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


@endsection