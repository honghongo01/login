@extends('layout')
@section('admin_content')
<h3><center>
<?php

foreach ($admin->roles as $role) {
    if($role->name==='stass'){
        echo $role->name;
    }elseif($role->name==='user'){
        echo $role->name;
    }else{
        echo 'Xin chào Admin';
    }
}
  
?>
</center></h3>
@endsection