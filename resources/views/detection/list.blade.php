@extends('template')

@section('main')
<?php
$no = 1;
?>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
          <div class="card-header ">
            <h5 class="card-title">Log Detection</h5>

          </div>
          <div class="card-body ">
            <table class="table">
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Tweet</th>
                    <th>class</th>
                    <th>Classification</th>
                    <th>Detected at<tth>
                </tr>
            @foreach($account as $a)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$a->username}}</td>
                    <td>{{substr($a->tweet, 0, 50)}} ...</td>
                    <td>{{$a->class}}</td>
                    <td>{{sprintf("%.2f", $a->classification*100)}} %</td>
                    <td>{{$a->created_at}}</td>
                </tr>
            @endforeach
            </table>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="stats">
              {{$account->links()}}
            </div>
          </div>
        </div>
    </div>
</div>
@stop