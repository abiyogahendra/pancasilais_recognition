@extends('template')

@section('main')


<div class="content">
  <div class="row">
@foreach($account as $a)
  <?php
    $infoUser = $getInfo($a->username);
  ?>
  @if($infoUser != 'error')
    <?php
      $classification = sprintf("%.2f", $a->classification*100);
      $class = $a->class;
    ?>
    <div class="col-md-3">
          
      <div class="card card-user">
        <div class="image">
          <img src="{{isset($infoUser['profile_banner_url']) ? $infoUser['profile_banner_url'] : $infoUser['profile_background_image_url']}}" alt="...">
        </div>
        <div class="card-body">
          <div class="author">
            <a href="{{url('https://www.twitter.com/'.$infoUser['screen_name'])}}">
              <img class="avatar border-gray" style="width:90px; height:90px; object-fit:cover;" src="{{$infoUser['profile_image_url']}}" alt="...">
              <h5 class="title">{{$infoUser['name']}}</h5>
            </a>
            <p class="description" >
            {{$infoUser['screen_name']}}
            </p>
          </div>
          <p class="description text-center" style="font-size: 10px;">
            {{substr($infoUser['description'], 0, 100)}}
          </p>
        </div>
        <div class="card-footer text-center">
          <p style="font-size: 20px; color: red;">
          {{$classification.'%'.' '.$class}}
          <p>
        </div>
      </div>
      </div>
      @endif

@endforeach


</div>

<div class="text-center">
  {{$account->links()}}
</div>
</div>
@stop