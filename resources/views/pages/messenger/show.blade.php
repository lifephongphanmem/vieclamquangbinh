@extends ('main')
@section('custom-style')
    <link rel="stylesheet" type="text/css"
        href="{{ url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css') }}" />
    <style>
        .col-md-3 {
            float: left;
        }

        .wrapper {
            margin-top: 0px;
            padding: 0px 15px;
        }
    </style>
@stop

@section('custom-script')
    <script type="text/javascript" src="{{ url('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js') }}">
    </script>
    <script type="text/javascript"
        src="{{ url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js') }}"></script>

    <script src="{{ url('assets/admin/pages/scripts/table-lifesc.js') }}"></script>
    <script>
        jQuery(document).ready(function() {
            TableManaged3.init();
        });
    </script>
@stop
@section('content')

    <div class="row">
        <div class="col-xl-12">
            <div class="card card-custom">
                <div class="card-header card-header-tabs-line">
                    <div class="card-title">
                        <h3 class="card-label text-uppercase">{{ $thread->subject }}</h3>
                    </div>
                    <div class="card-toolbar">
                    </div>

                </div>
                <div class="card-body">
                    <div class="row ">
                        <div class="col-sm-4 col-sm-offset-2">

                            @each('pages.messenger.partials.messages', $thread->messages, 'message')

                        </div>
                        <div class="col-sm-4 ">
                            <br>
                            <br>
                            <br>
                            <?php if($thread->attach){ ?>
                            <a href="../storage/app/{{ $thread->attach }}" download class="text-lg"> <i
                                    class="fa fa-file"></i> Tải File đính kèm </a>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-sm-8 col-sm-offset-2">
                            @include('pages.messenger.partials.form-message')
                        </div>
                    </div>
				</div>

                @endsection
