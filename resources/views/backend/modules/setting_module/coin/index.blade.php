@extends('backend.template.layout')

@section('per_page_css')
    <link rel="stylesheet" href="{{ asset('backend/css/fancybox/fencybox.min.css') }}">
@endsection

@section('body-content')
    <div class="content-wrapper" style="min-height: 147px;">

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}">
                                    Dashboard
                                </a>
                            </li>
                            <li class="breadcrumb-item active">
                                <a href="#">
                                    Coin Settings
                                </a>
                            </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary card-outline table-responsive">
                            <div class="card-body">

                                <div class="row mt-3">
                                    <div class="col-md-12 table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <td>#</td>
                                                    <td>Type</td>
                                                    <td>Coin Amount</td>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @forelse($coins as $key => $coin)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ $coin->name }}</td>
                                                        <td><input type="number" class="form-control"
                                                                name="coin_{{ $coin->id }}" value="{{ $coin->amount }}"
                                                                onchange="setCoin({{ $coin->id }})">
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="9" class="text-center">
                                                            No Data Found
                                                        </td>
                                                    </tr>
                                                @endforelse
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </section>

    </div>
@endsection

@section('per_page_js')
    {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('backend/js/custom-script.min.js') }}"></script>
    <script src="{{ asset('backend/js/ajax_form_submit.js') }}"></script>

    <script src="{{ asset('backend/js/fancybox/active.js') }}"></script>
    <script src="{{ asset('backend/js/fancybox/fency.js') }}"></script>
    <script src="{{ asset('backend/js/fancybox/fencybox.min.js') }}"></script> --}}

    <script type="text/javascript">
        $(document).ready(function() {});

        function setCoin(val) {
            var amount = $("input[name='coin_"+val+"']").val();
            // console.log($(this).val());
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute(
                'content');
            $.ajax({
                type: "POST",
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                url: "{{ route('coin.set') }}",
                data: {
                    'id': val,
                    'amount': amount
                },
                success: function(data) {}
            });
        }
    </script>
@endsection
