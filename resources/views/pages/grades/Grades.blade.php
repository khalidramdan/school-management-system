@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('Grades-translate.Grades_list') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('Grades-translate.Grades_list') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"
                        class="default-color">{{ trans('main-translate.Dashboard') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('Grades-translate.Grades_list') }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">

    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card-body">
                <button type="button" class="btn btn-primary" style="background-color: #84BA3F; border:none;"
                    id="add_Grade" title="{{ trans('Grades-translate.add_Grade') }}"><i class="fa fa-plus"></i></button>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('Grades-translate.Name') }}</th>
                                <th>{{ trans('Grades-translate.Notes') }}</th>
                                <th>{{ trans('Grades-translate.Processes') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                          
                                @foreach ($Grades as $Grade)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $Grade->Name }}</td>
                                    <td>{{ $Grade->Notes }}</td>
                                    <td>
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                            data-target="#edit{{ $Grade->id }}"
                                            title="{{ trans('Grades-translate.Edit') }}"><i
                                                class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{ $Grade->id }}"
                                            title="{{ trans('Grades-translate.Delete') }}"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                          
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="Grade_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ trans('Grades-translate.add_Grade') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fa fa-close"></i></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('Grades.store') }}">
                        @csrf
                        @method('POST')
                        <div class="mb-3">
                            <label for="recipient-name"
                                class="col-form-label">{{ trans('Grades-translate.grade_name_ar') }}</label>
                            <input type="text" class="form-control" id="recipient-name-ar" name="name_ar"
                                value="{{ old('Name') }}">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name"
                                class="col-form-label">{{ trans('Grades-translate.grade_name_en') }}</label>
                            <input type="text" class="form-control" id="recipient-name-en" name="name_en">
                        </div>
                        <div class="mb-3">
                            <label for="message-text"
                                class="col-form-label">{{ trans('Grades-translate.Notes') }}</label>
                            <textarea class="form-control" id="message-text" name="notes"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-close" id=""
                                data-bs-dismiss="modal">{{ trans('Grades-translate.Close') }}</button>
                            <button type="submit"
                                class="btn btn-success">{{ trans('Grades-translate.submit') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
<script type="text/javascript">
    $('#add_Grade').click(function(e) {
        $('#Grade_modal').modal('show');
    });
    $('.btn-close').click(function(e) {
        $('#Grade_modal').modal('hide');
    });
</script>
@endsection
