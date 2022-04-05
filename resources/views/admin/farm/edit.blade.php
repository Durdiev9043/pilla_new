@extends('admin.master')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    @if(\Illuminate\Support\Facades\Auth::user()->ruxsat>0)
                    <div class="col-10"><h1 class="card-title">Касанчилар</h1></div>
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


                    <form action="{{route('admin.farm.update',$farm->id)}}" method="POST" accept-charset="UTF-8"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @if(\Illuminate\Support\Facades\Auth::user()->role==0)

                        <div class="form-group">
                            <label for="number">туман</label>
                            <select class="custom-select" id="price_id" name="region_id">
                                    <option value="{{$farm->region->id}}">{{$farm->region->name}}</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="number">махалла</label>
                            <select class="custom-select" id="price_id" name="village_id">

                                    <option value="{{$farm->village->id}}">{{$farm->village->name}}</option>

                            </select>
                        </div>
                            <div class="form-group">
                                <label for="number">Худуд</label>
                                <select class="custom-select" id="price_id" name="village_id">

                                    <option value="{{$farm->hudud->id}}">{{$farm->hudud->name}}</option>

                                </select>
                            </div>
                        @else
                            <input type="hidden" name="village_id" value="{{$farm->village->id}}">
                            <input type="hidden" name="hudud_id" value="{{$farm->hudud->id}}">
                            <input type="hidden" name="region_id" value="{{$farm->region->id}}">
                        @endif
                        @if(\Illuminate\Support\Facades\Auth::user()->ruxsat>0)
                        <div class="form-group">
                            <label for="header_ru">имя</label>
                            <input type="text" name="name" value="{{$farm->name}}" class="form-control" id="header_ru" placeholder="имя">
                        </div>
                        <div class="form-group">
                            <label for="header_ru">phone</label>
                            <input type="text" name="phone" value="{{$farm->phone}}" class="form-control" id="header_ru" placeholder="имя">
                        </div>
                        <div class="form-group">
                            <label for="header_ru">inn</label>
                            <input type="text" name="inn" value="{{$farm->inn}}" class="form-control" id="header_ru" placeholder="номи">
                        </div>
                        <div class="form-group">
                            <label for="header_ru">2020...</label>
                            <input type="text" name="h2020" class="form-control" value="{{$farm->h2020}}" id="header_ru" placeholder="номи">
                        </div>
                        <div class="form-group">
                            <label for="header_ru">23202...</label>
                            <input type="text" name="h23202" class="form-control" value="{{$farm->h23202}}" id="header_ru" placeholder="номи">
                        </div>
                        <div class="form-group">
                            <label for="header_ru">boshiga</label>
                            <input type="text" name="yil_boshiga" class="form-control" value="{{$farm->yil_boshiga}}" id="header_ru" placeholder="номи">
                        </div>
                        <div class="form-group">
                            <label for="header_ru">avans</label>
                            <input type="text" name="avans" value="{{$farm->avans}}" class="form-control" id="header_ru" placeholder="номи">
                        </div>
                        <div class="form-group">
                            <label for="header_ru">resurs</label>
                            <input type="text" name="resurs" value="{{$farm->resurs}}" class="form-control" id="header_ru" placeholder="номи">
                        </div>
                        <div class="form-group">
                            <label for="header_ru">hisob kitob</label>
                            <input type="text" name="toladi" value="{{$farm->toladi}}" class="form-control" id="header_ru" placeholder="номи">
                        </div>
                        <div class="form-group">
                            <label for="header_ru">subsedya</label>
                            <input type="text" name="subsedya" value="{{$farm->subsedya}}" class="form-control" id="header_ru" placeholder="номи">
                        </div>
                        <div class="form-group">
                            <label for="header_ru">ekin maydoni</label>
                            <input type="text" name="maydon" value="{{$farm->maydon}}" class="form-control" id="header_ru" placeholder="номи">
                        </div>



                        <button type="submit" id="alert" class="btn btn-primary">сақлаш</button>
                        <input type="reset" class="btn btn-danger" value="Очистить">
                        @else
                            <h1>Cизда ўзгартириш учин рухсат йўқ</h1>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection
