@extends('admin.master')
@section('content')

    <div class="col-md-12">
        <div class="card overflow-auto" >

                <div class="row">
                    <div class="col-9"><h1 class="card-title p-2">Туманлар рўйхати</h1></div>

                </div>

                <div class="card-body overflow-auto">
                    <table width="100%" id="mytable" class="table-striped table-bordered overflow-auto">
                        <thead>
                        <tr rowspan="2">
                            <th rowspan="2" >Туманлар номи</th>
                            <th rowspan="2" class="text-center" >Тумандаги<br> касаначилар<br> сони</th>

                            <th  colspan="4" class="text-center">Пилла топшириши</th>
                            <th class="border-bottom text-center" colspan="3"  scope="col">Фермерлар</th>
                            <th class="border-bottom text-center" colspan="3"  scope="col">жами</th>


                            <th  rowspan="2" class="text-center" >Кластер номи</th>
                            <th rowspan="2" class="text-center" >Амаллар</th>

                        </tr>
                        <tr>
                            <th  >режа</th>
                            <th  >амалда</th>
                            <th >фоиз<br>%</th>
                            <th  >фарқи<br> (+/-)</th>

                            <th  scope="col">режа</th>
                            <th scope="col">амалда</th>
                            <th scope="col">фоиз<br>%</th>

                            <th  scope="col">режа</th>
                            <th scope="col">амалда</th>
                            <th scope="col">фоиз<br>%</th>


                        </tr>
                        </thead>
                        <tbody>
                        @foreach($regions as $region)
                            <tr>
                                <td scope="row">
                                    <a href="{{route('admin.region.show',$region->id)}}">{{$region->name}}</a>
                                </td>
                                <td>

                                    <?php
                                    $soni=0;
                                    $olgan=0;
                                    $topshirish_rejasi=0;
                                    $topshirgani=0;
                                    $x=0;
                                    $farqi=0;
                                    $jarima=0;
                                    $toladi=0;
                                    $qoldi=0;

                                    $F_olgan=0;
                                    $F_topshirish_rejasi=0;
                                    $F_topshirgani=0;
                                    $y=0;
                                        foreach ($staffes as $staff) {
                                            if ($staff->region_id==$region->id){
                                                $soni=$soni+1;
                                                $olgan=$olgan+($staff->olgan_gr);
                                                $topshirish_rejasi=$topshirish_rejasi+($staff->topshirish_rejasi);
                                                $topshirgani=$topshirgani+($staff->topshirgani);
                                                $x=($topshirgani *100)/$topshirish_rejasi;
                                                $farqi=$topshirgani-$topshirish_rejasi;
                                                $jarima=$farqi*22;
                                                $toladi=$toladi+($staff->toladi);
                                                $qoldi=$toladi-$jarima;
                                            };

                                        };
                                    foreach ($farmes as $farm){
                                        if ($farm->region_id==$region->id){
                                            $F_olgan=$F_olgan+($farm->olgan_gr);
                                            $F_topshirish_rejasi=$F_topshirish_rejasi+($farm->topshirish_rejasi);
                                            $F_topshirgani=$F_topshirgani+($farm->topshirgani);
                                            $y=($F_topshirgani *100)/$F_topshirish_rejasi;
                                            $farqi=$topshirgani-$topshirish_rejasi;
                                            $jarima=$farqi*22;
                                            $toladi=$toladi+($farm->toladi);
                                            $qoldi=$toladi-$jarima;
                                        };
                                        };
                                    $reja=$topshirish_rejasi+$F_topshirish_rejasi;
                                    $amalda=$topshirgani+$F_topshirgani;
                                    if ($reja>0){
                                        $z=$amalda*100/$reja;
                                    }else{
                                        $z=0;
                                    }
                                    ?>
                                    {{ $soni }}
                               </td>

                               <td>
                                   {{ $topshirish_rejasi }}
                               </td>
                               <td>
                                    {{ $topshirgani }}
                               </td>
                                <td>
                                    {{ round($x,1) }}
                               </td>
                                <td>
                                    {{$farqi}}
                                </td>


                                <td id="f_reja">{{$F_topshirish_rejasi}}</td>
                                <td id="f_top">{{$F_topshirgani}}</td>
                                <td id="f_y">{{round($y,1)}}</td>

                                <td id="reja">{{$reja}}</td>
                                <td id="top">{{$amalda}}</td>
                                <td id="foiz">{{round($z,1)}}</td>


                                <td>
                                    {{$region->klaster->name}}
                                </td>
                               <td>
                                <form action="{{ route('admin.region.destroy',$region ->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="btn-group" role="group">
                                        <a class="btn btn-warning btn-sm" href="{{ route('admin.region.edit',$region->id) }}">
                                            <span class="btn-label">
                                                <i class="fa fa-pen"></i>
                                            </span>
                                        </a>
                                        <button type="submit" class="btn btn-danger btn-sm"><span class="btn-label">
                                            <i class="fa fa-trash"></i></span>
                                        </button>
                                    </div>
                                </form>
                            </td>

                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
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
                            <th>-</th>
                            <th>-</th>


                        </tr>
                        </tfoot>
                    </table>
                </div>

        </div>
    </div>
    <script>

        $(document).ready(function() {
            $('#mytable').DataTable( {
                dom: 'Bfrtip',
                "buttons": [
                    {
                        "extend": 'excel', "text":'<i class="fas fa-download px-2"></i>  Малумотларни excel форматда юклаб олиш',"className": 'btn btn-primary btn-xm'
                    }
                ],

                "aLengthMenu": [15],

                "language": {
                    "searchPlaceholder": "",

                    "lengthMenu": "_MENU_",
                    "zeroRecords": "Туман қошинг",
                    "info": "_PAGE_ / _PAGES_",
                    "infoEmpty": " ",
                    "search":"қидириш:",
                    "paginate": {
                        "first": "биринчи",
                        "previous": "Олдинги",
                        "next": "Кейинки",
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
                        .column( 3 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    // Total over this page
                    pageTotal = api
                        .column( 3, { page: 'current'} )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    // Update footer
                    $( api.column( 3, ).footer() ).html(
                        pageTotal
                    );

                    total = api
                        .column( 1 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    // Total over this page
                    pageTotal = api
                        .column( 1, { page: 'current'} )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    // Update footer
                    $( api.column( 1, ).footer() ).html(
                         pageTotal

                    );
                    total = api
                        .column( 2 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    // Total over this page
                    pageTotal = api
                        .column( 2, { page: 'current'} )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    // Update footer
                    $( api.column( 2, ).footer() ).html(
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


                    total = api
                        .column( 9 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    // Total over this page
                    pageTotal = api
                        .column( 9, { page: 'current'} )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    // Update footer
                    $( api.column( 9, ).footer() ).html(
                        pageTotal
                    );

                    total = api
                        .column( 10 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    // Total over this page
                    pageTotal = api
                        .column( 10, { page: 'current'} )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    // Update footer
                    $( api.column( 10, ).footer() ).html(
                        pageTotal
                    );


                }
            } );
        } );

    </script>

@endsection

