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
                    <th>Tweet</th>
                    <th>Created at<tth>
                </tr>
            @foreach($dataset as $a)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$a->text}}</td>
                    <td>{{$a->created_at}}</td>
                </tr>
            @endforeach
            </table>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="stats">
              {{$dataset->links()}}
            </div>
          </div>
        </div>
    </div>
</div>
@stop