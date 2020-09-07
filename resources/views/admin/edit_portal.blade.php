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
                    <h1 class="m-0 text-dark">Category</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item active">edit Studenet</li>
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
                          <h3 class="card-title">Edit Category</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.update.portal',$portal->id)}}"  class="database_operation"  >
                                @csrf
                                
                                <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label for="name">Enter Name</label>
                                          <input type="text" required="required" id="name" value="{{$portal->name}}" class="form-control" name="name" placeholder="Enter Name">
                                      </div>
                                  </div>                
                                </div>
                  
                                <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label for="email">Enter E-mail</label>
                                          <input type="text" required="required" value="{{$portal->email}}" id="email" class="form-control" name="email" placeholder="Enter Email">
                                      </div>
                                  </div>                
                                </div>
                  
                                <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label for="mobile_no">Enter Mobile-no</label>
                                          <input type="number" required="required" value="{{$portal->mobile_no}}" id="mobile_no" class="form-control" name="mobile_no" placeholder="Enter Mobile No">
                                      </div>
                                  </div>                
                                </div>
                                                  
                                <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group" >
                                          <button type="submit" class="btn btn-primary">Update</button>
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