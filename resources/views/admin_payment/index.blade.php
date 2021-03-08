@extends('layouts.app')
@section('title')
    {{ __('messages.admin_payment') }}
@endsection
@section('page_css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dataTable.min.css') }}"/>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ mix('assets/css/admin_panel.css') }}">
@endsection
@section('content')
    <div class="container-fluid page__container">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-12">
                     <div class="card">
                         <div class="card-header page-header">
                             <div class="pull-left page__heading">
                                 {{ __('messages.admin_payment') }}
                             </div>
                             <div class="filter-container">
                                 <div class="mr-2">
                                     {!!Form::select('drp_users', \App\Models\User::FILTER_ARRAY, \App\Models\User::FILTER_ALL, ['id' => 'filter_user','class'=>'form-control','style'=>'min-width:150px;'])  !!}
                                 </div>
                                 <!-- <button type="button" class="pull-right btn btn-primary filter-container__btn" data-toggle="modal" data-target="#create_user_modal">{{ __('messages.new_user') }}</button> -->
                             </div>
                         </div>
                         <div class="card-body">
                             @include('admin_payment.table')
                              <div class="pull-right mr-3">

                              </div>
                         </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
    @include('admin_payment.create')
    @include('admin_payment.edit')
    @include('admin_payment.templates.action_icons')
@endsection
@section('page_js')
    <script type="text/javascript" src="{{ asset('js/dataTable.min.js') }}"></script>
@endsection
@section('scripts')
    <script>
        let createUserUrl = "{{ route('admin_payment.store') }}";
        let usersUrl = "{{ url('admin_payment') }}/";
        let defaultImageAvatar = "{{ getDefaultAvatar() }}/";
    </script>
    <script src="{{ mix('assets/js/admin/admin_payment/admin_payment.js') }}"></script>
    <script src="{{ mix('assets/js/admin/admin_payment/edit_user.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/custom-datatables.js') }}"></script>
@endsection

