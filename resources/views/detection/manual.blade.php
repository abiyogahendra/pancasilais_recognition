@extends('template')

@section('main')
<?php
$no = 1;
?>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
          <div class="card-header ">
            <h5 class="card-title">Manual Detection</h5>

          </div>
          <div class="card-body ">
          <form action="{{url('detection/manual')}}" method="post">
          @csrf
            <div class="form-group">

                <label>Username</label>
                <input type="text" name="username" class="form-control" placeholder="Input username"/>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Analysis"/>
            </div>
            </form>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="stats">
              
            </div>
          </div>
        </div>
    </div>
</div>
@stop