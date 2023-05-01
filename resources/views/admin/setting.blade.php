@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header gradient text-white ">Setting</div>

                <div class="card-body">

                    <form method="post" action="{{ route('admin.duedate') }}" class="row g-3">
                        @csrf
                        @method('patch')
                         <div class="col-auto">
                            <label for="staticEmail2" class="visually-hidden">Due Date</label>
                            <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="Due Date">
                          </div>
                          <div class="col-auto">
                            <label for="duedate" class="visually-hidden">Password</label>
                            <input type="datetime-local" class="form-control" id="duedate" name="duedate" value="{{ $setting->due_date }}">
                          </div>
                          <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3">Update Due Date</button>
                          </div>
                    </form>
                    <hr/>
                    <form method="post" action="{{ route('admin.payment') }}" id="payment">
                        @csrf
                        @method('patch')
                        @if($setting->payment == true)
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" onchange="fuckit();" checked>
                                <label class="form-check-label" for="flexSwitchCheckDefault">Menu Payment sedang aktif</label>
                            </div>
                        @else
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" onchange="fuckit();">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Menu Payment tidak aktif</label>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function fuckit() {
        document.getElementById("payment").submit();
    }
</script>
@endsection
