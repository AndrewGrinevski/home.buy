@extends('layouts.admin')

@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Категории</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Категории</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <a href="{{ route('admin.company.create') }}">Добавление компании</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered dataTable" id="dataTable" width="100%"
                                       cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                       style="width: 100%;">
                                    <thead>

                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">Name</th>
                                        <th rowspan="1" colspan="1">Actions</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($companies as $company)
                                    <tr role="row" class="odd">
                                        <td>{{ $company->name }}</td>
                                        <td>
                                            <a class="btn btn-info" href="{{ route('admin.company.edit', ['company' =>$company->id])}}">Редактировать</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-5">
                                <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">
                                    Showing 1 to 10 of 57 entries
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-7">
                                {{$companies->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
