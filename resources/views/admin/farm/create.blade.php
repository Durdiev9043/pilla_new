@extends('admin.master')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    @if(\Illuminate\Support\Facades\Auth::user()->ruxsat>0)
                    <div class="col-10"><h1 class="card-title">фермер қошиш</h1></div>
                    @endif
                </div>
                <hr>
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        @if(\Illuminate\Support\Facades\Auth::user()->ruxsat>0)

                    <form action="{{route('admin.farm.store')}}" method="POST" accept-charset="UTF-8"
                          enctype="multipart/form-data">
                        @csrf

                            <form action="{{route('admin.staff.store')}}" method="POST" accept-charset="UTF-8"
                                  enctype="multipart/form-data">
                                @csrf
                                @if(\Illuminate\Support\Facades\Auth::user()->role==0)
                                    <div class="form-group">
                                        <label for="region_id">туман</label>
                                        <select class="custom-select" id="region_id" onchange="hudud(region_id)" name="region_id">

                                            @foreach($regions as $region)
                                                <option value="{{$region->id}}">{{$region->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="number">махалла</label>
                                        <select class="custom-select" id="hudud_id"  onchange="village(hudud_id)" name="hudud_id">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="number">махалла</label>
                                        <select class="custom-select" id="village_id"   name="village_id">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                @else
                                    <div class="form-group">
                                        <input type="hidden" name="region_id" value="{{\Illuminate\Support\Facades\Auth::user()->role}}">
                                        <select name="village_id" class="custom-select" id="village_id">
                                            @foreach($villages as $village)
                                                @if($village->region_id==\Illuminate\Support\Facades\Auth::user()->role)
                                                    <option value="{{$village->id}}" >{{$village->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                        @endif
                        <div class="form-group">
                            <label for="header_ru">номи</label>
                            <input type="text" name="name" class="form-control" id="header_ru" placeholder="номи">
                        </div>
                                <div class="form-group">
                            <label for="header_ru">phone</label>
                            <input type="text" name="phone" class="form-control" id="header_ru" placeholder="номи">
                        </div>
                        <div class="form-group">
                            <label for="header_ru">inn</label>
                            <input type="text" name="inn" class="form-control" id="header_ru" placeholder="номи">
                        </div>

                        <div class="form-group">
                            <label for="header_ru">2020...</label>
                            <input type="text" name="h2020" class="form-control" id="header_ru" placeholder="номи">
                        </div>
                                <div class="form-group">
                                    <label for="header_ru">23202...</label>
                                    <input type="text" name="h232020" class="form-control" id="header_ru" placeholder="номи">
                                </div>
                                <div class="form-group">
                                    <label for="header_ru">boshiga</label>
                                    <input type="text" name="yil_boshiga" class="form-control" id="header_ru" placeholder="номи">
                                </div>
                                <div class="form-group">
                                    <label for="header_ru">avans</label>
                                    <input type="text" name="avans" class="form-control" id="header_ru" placeholder="номи">
                                </div>
                                <div class="form-group">
                                    <label for="header_ru">resurs</label>
                                    <input type="text" name="resurs" class="form-control" id="header_ru" placeholder="номи">
                                </div>
                                <div class="form-group">
                                    <label for="header_ru">hisob kitob</label>
                                    <input type="text" name="toladi" class="form-control" id="header_ru" placeholder="номи">
                                </div>
                                <div class="form-group">
                                    <label for="header_ru">subsedya</label>
                                    <input type="text" name="subsedya" class="form-control" id="header_ru" placeholder="номи">
                                </div>

                                <div class="form-group">
                                    <label for="header_ru">ekin maydoni</label>
                                    <input type="text" name="maydon"  class="form-control" id="header_ru" placeholder="номи">
                                </div>

                        <button type="submit" id="alert" class="btn btn-primary">сақлаш</button>
                        <input type="reset" class="btn btn-danger" value="Очистить">
                    </form>
                        @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        function hudud(region){
            region_id=region.value;
            $.ajax(
                "{{route('admin.rr')}}",
                {
                    method: 'post',
                    headers: {
                        'X-CSRF-TOKEN': '{{csrf_token()}}'
                    },
                    data: {
                        region_id:region_id
                    },
                    success: function (data){
                        $('#hudud_id').empty()
                        for (let d in data){
                            let option = '<option value=' + data[d].id + '>' + data[d].name + '</option>';
                            $('#hudud_id').append(option)
                        }

                    }

                }


            )
        }
        function village(hudud){
            hudud_id=hudud.value;
            $.ajax(
                "{{route('admin.bus')}}",
                {
                    method: 'post',
                    headers: {
                        'X-CSRF-TOKEN': '{{csrf_token()}}'
                    },
                    data: {
                        hudud_id:hudud_id
                    },
                    success: function (data){
                        $('#village_id').empty()
                        for (let d in data){
                            let option = '<option value=' + data[d].id + '>' + data[d].name + '</option>';
                            $('#village_id').append(option)
                        }  console.log(data)
                    }
                }


            )
        }

    </script>

@endsection
