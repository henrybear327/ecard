@extends('manager.init')

@section('css')
<title>ECARD後台 - 卡片管理</title>
  {!!Html::style('assets/css/manager/upload.css')!!}
  {!!Html::style('assets/css/manager/modal.css')!!}
@stop

@section('js')
<script src="{{url('assets/js/jquery.form.min.js')}}"></script>
<script src="{{url('assets/js/manager/category.js')}}"></script>
<script src="{{url('assets/js/manager/file.js')}}"></script>
@stop

@section('content')
@if((Auth::user()->role != 'designer') && (Auth::user()->role != 'manager'))
<h1>請先登入管理者帳號</h1>
<center><a href="{{url('manager/login')}}">登入</a></center>
@else
  @include('manager.modal.card')
  @include('manager.modal.parent')
  @include('manager.modal.child')
  @include('manager.header')

    <input type="hidden" name="currentEditCardId">
  <br>
  <div class="row">
      <div class="col-sm-4">
          <br>
          <button class="btn openParentDialog" data-method="create">新增父元素</button>
          <button class="btn openParentDialog" data-method="edit">編輯父元素</button>
          <select id="parent" class="form-control"></select>
      </div>
      <div class="col-sm-4">
          <br>
          <button class="btn openChildDialog" data-method="create">新增子元素</button>
          <button class="btn openChildDialog" data-method="edit">編輯子元素</button>
          <select id="child" class="form-control">
              <option disabled>子元素</option>
          </select>
      </div>
  </div>
  <br>
  <ul class="cardContent">
  </ul>
  @endif
@stop

