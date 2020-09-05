@extends('layouts.app')
@section('title','Category')
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
                    <li class="breadcrumb-item active">edit category</li>
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
                            <form action="{{route('admin.update.category',$cat->id)}}"  class="database_operation"  >
                                @csrf
                                <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label for="name">Category Name</label>
                                          <input type="text" required="required" id="name" value="{{$cat->name}}" class="form-control" name="name" placeholder="Enter the name">
                                      </div>
                                  </div>                
                                </div>
                                <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group" >
                                          <button type="submit" class="btn btn-primary">Edit</button>
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