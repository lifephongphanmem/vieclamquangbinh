@extends ('main')
@section('content')
    <div class="row ">
        <div class="col-xl-12">
            <div class="card card-custom">
                <div class="card-header card-header-tabs-line">
                    <div class="card-title">
                        <h3 class="card-label text-uppercase">Gửi văn bản</h3>
                    </div>
                </div>

                <div class="card-body">

                    <form action="{{ URL::to('messages') }}/store" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <!-- Subject Form Input -->
                        <div class="form-group">
                            <label class="control-label">Tiêu đề</label>
                            <input type="text" class="form-control" name="subject" placeholder="Subject"
                                value="{{ old('subject') }}">
                        </div>

                        <!-- Message Form Input -->
                        <div class="form-group">
                            <label class="control-label">Nội dung</label>
                            <textarea name="message" class="form-control" rows=10>{{ old('message') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Chọn file đính kèm</label>
                            <input type="file" name="attach" class="form-control"> </td>
                        </div>
                        <div class="checkbox">

                            <label title="Trung tâm DVVL tỉnh Quảng Bình">
                                <input type="checkbox" name="recipients[]" value="1" checked>Trung tâm DVVL tỉnh Quảng
                                Bình</label>
                        </div>


                        <!-- Submit Form Input -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary form-control">Gửi </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
