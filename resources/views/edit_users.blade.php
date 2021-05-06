@extends('layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <!-- <header class="panel-heading">
                           Thêm user
                        </header> -->
                         <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-users/'.$user->admin_id)}}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên users</label>
                                    <input type="text" name="admin_name" class="form-control" id="exampleInputEmail1" value="{{$user->admin_name}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="text" name="admin_email" class="form-control" id="exampleInputEmail1" value="{{$user->admin_email}}">
                                </div>
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Password</label>
                                    <input type="text" name="admin_password" class="form-control" id="exampleInputEmail1" value="{{$user->admin_password}}">
                                </div>
                             
                                <button type="submit" name="update_user" class="btn btn-info">Sửa users</button>
                                </form>
                            </div>

                        </div>
                    </section>
            </div>



@endsection