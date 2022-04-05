@extends('admin.master')
@section('content')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-7"><h1 class="card-title">"{{$name->village->name}}"даги "{{$name->name}}"нинг kасаначилари рўйхати</h1></div>
                    <div class="col-md-1 mr-5">
                        <a class="btn btn-primary" href="">
                            <span class="btn-label">

                            </span>
                            Фермерлар рўйхати
                        </a>
                    </div>
                    <div class="col-md-1 ml-4">
                        <a class="btn btn-primary" href="{{route('admin.farm_s.create')}}">
                            <span class="btn-label">
                                <i class="fa fa-plus"></i>
                            </span>
                            Касаначи кошиш
                        </a>
                    </div>
                </div>
                <hr>
                <div class="card-body table-responsive">
                    <table class="table-bordered w-100 table-striped" id="mytable">
                        <thead>
                        <tr>
                            <th class="text-center" rowspan="2" scope="col">Ф.И.Ш</th>

                            <th class="text-center" rowspan="2" scope="col">пасспорт</th>

                            <th class="text-center" rowspan="2" scope="col">инн</th>

                            <th class="text-center" rowspan="2" scope="col">ШЖБПТ</th>

                            <th class="text-center"  rowspan="2" scope="col">тутзор</th>

                            <th class="text-center" rowspan="2" scope="col">Шартнома<br>қути</th>

                            <th class="text-center"  colspan="4" scope="col">Пилла топшириши,кг</th>

                            <th class="text-center"  rowspan="2" scope="col">Етиштирган<br>маҳсулот<br> қиймати,<br> (минг сўм)</th>

                            <th class="text-center" rowspan="2" scope="col">Действие</th>
                        </tr>
                        <tr>
                            <th class="text-center" scope="col">режа</th>

                            <th class="text-center" scope="col">ҳақиқатда<br> топширди</th>

                            <th class="text-center" scope="col">фарқи <br>(+/-)</th>

                            <th class="text-center" scope="col">фоиз<br>%</th>


                        </tr>
                        </thead>
                        <tbody>
                            @foreach($staffes as $staff)
                                <tr>

                                    <td >{{$staff->fullname}}</td>

                                    <td>{{$staff->passport}}</td>

                                    <td>{{$staff->inn}}</td>

                                    <td>{{$staff->jshir}}</td>

                                    <td>{{$staff->yakka_tut}}</td>

                                    <td>{{$staff->algan_qutisi}}</td>

                                    <td>{{$staff->topshirish_rejasi}}</td>

                                    <td>{{$staff->topshirgani}}</td>

                                    <td>
                                        <?php
                                        $farqi=($staff->topshirgani-$staff->topshirish_rejasi);
                                        if ($staff->topshirish_rejasi>0){
                                        $foiz=($staff->topshirgani)*100/$staff->topshirish_rejasi;}
                                        else{$foiz=0;}
                                        ?>
                                        {{$farqi}}
                                    </td>

                                    <td>
                                        {{round($foiz,1)}}
                                    </td>

                                    <td>
                                        {{$staff->topshirish_rejasi*24}}
                                    </td>


                                    <td>

                                        <form action="{{ route('admin.farm_s.destroy',$staff->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a class="btn btn-warning btn-sm m-1" href="{{ route('admin.farm_s.edit',$staff->id) }}">
                                    <span class="btn-label">
                                        <i class="fa fa-pen"></i>
                                    </span>

                                            </a>

                                            <button type="submit" class="btn btn-danger m-1 btn-sm"><span class="btn-label">
                                        <i class="fa fa-trash"></i>
                                    </span></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        <th>жами:</th>
                        <th>-</th>
                        <th>-</th>
                        <th>-</th>
                        <th>-</th>
                        <th>-</th>
                        <th>-</th>
                        <th>-</th>
                        <th>-</th>
                        <th>-</th>
                        <th>-</th>
                        <th>-</th>

                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('/assets/js/core/jquery.3.2.1.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#mytable').DataTable( {
                "aLengthMenu": [200],
                dom: 'Bfrtip',
                "buttons": [
                    {
                        "extend": 'excel', "text":'<i class="fas fa-download px-2"> </i>  Малумотларни excel форматда юклаб олиш',"className": 'btn btn-primary btn-xm'
                    }
                ],

                "language": {

                    "lengthMenu": "_MENU_",
                    "zeroRecords": "махалла қошинг",
                    "info": "_PAGE_ / _PAGES_",
                    "infoEmpty": " ",
                    "search":"қидириш:",
                    "paginate": {
                        "first": "биринчи",
                        "previous": "олдинги",
                        "next": "кейинки",
                        "last": "охирги"
                    },
                },
                "footerCallback": function ( row, data, start, end, display ) {
                    var api = this.api();

                    // Remove the formatting to get integer data for summation
                    var intVal = function ( i ) {
                        return typeof i === 'string' ?
                            i.replace(/[\$,]/g, '')*1 :
                            typeof i === 'number' ?
                                i : 0;
                    };

                    // Total over all pages
                    total = api
                        .column( 4 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    // Total over this page
                    pageTotal = api
                        .column( 4, { page: 'current'} )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    // Update footer
                    $( api.column( 4 ).footer() ).html(
                        pageTotal
                    );




                    total = api
                        .column( 5 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    // Total over this page
                    pageTotal = api
                        .column( 5, { page: 'current'} )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    // Update footer
                    $( api.column( 5, ).footer() ).html(
                        pageTotal

                    );
                    total = api
                        .column( 6 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    // Total over this page
                    pageTotal = api
                        .column( 6, { page: 'current'} )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    // Update footer
                    $( api.column( 6, ).footer() ).html(
                        pageTotal

                    );

                    total = api
                        .column( 7 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    // Total over this page
                    pageTotal = api
                        .column( 7, { page: 'current'} )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    // Update footer
                    $( api.column( 7, ).footer() ).html(
                        pageTotal

                    );
                }
            } );
        } );
    </script>
@endsection

