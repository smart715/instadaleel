@extends("backend.template.layout")

@section('per_page_css')
<style>
    .small-box .inner h3{
        font-size: 20px;
        font-weight: 100;
    }
</style>
@endsection

@section('body-content')
<div class="content-wrapper" style="min-height: 147px;">

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item active">
                            @if( auth('web')->check() )
                            {{ auth('web')->user()->role->name }} Dashboard
                            @elseif( auth('super_admin')->check() )
                            Super Admin Dashboard
                            @endif
                        </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- Small boxes (Stat box) -->
            <div class="row">

                <!-- ITEM START -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box" style="background: #ff8d73d1;">
                        <div class="inner">
                            <h3>All Category</h3>
                            <p>{{ $category }}</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>

                    </div>
                </div>
                <!-- ITEM END -->

                <!-- ITEM START -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box" style="background: #feffa5d1;">
                        <div class="inner">
                            <h3>All Post</h3>
                            <p>{{ $posts }}</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>

                    </div>
                </div>
                <!-- ITEM END -->

                <!-- ITEM START -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box" style="background: #ffa0a0d1;">
                        <div class="inner">
                            <h3>Post Like</h3>
                            <p>{{ $post_like_comment->where("type", "Like")->count() }}</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>

                    </div>
                </div>
                <!-- ITEM END -->

                <!-- ITEM START -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box" style="background: #c2a3ffd1;">
                        <div class="inner">
                            <h3>Post Comment</h3>
                            <p>{{ $post_like_comment->where("type", "Comment")->count() }}</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>

                    </div>
                </div>
                <!-- ITEM END -->

            </div>
            <!-- /.row -->

            <div class="row charts" style="padding-right: 15px;">

                <div class="col-md-6 mb-5">
                    <div class="card">
                        <div class="card-header">
                            <p>Post Last 6 Month</p>
                        </div>
                        <div class="card-body" id="post-history-chart">
                            
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-5">
                    <div class="card">
                        <div class="card-header">
                            <p>Business Last 6 Month</p>
                        </div>
                        <div class="card-body" id="business-history-chart">
                            
                        </div>
                    </div>
                </div>
                

            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection

@section("per_page_js")
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>

    $.ajax({
        url: "{{ route('post.history.chart') }}",
        method: 'GET',
        data: {},
        success: function (data) {
            var post = Array(); 
            var time = Array(); 
            $.each(data.data, (key, value) => {
                post.push(value.post) 
                time.push(value.time) 
            })
            
            var options = {
                fill: {
                    colors: ['#ffe874','#85e1ab']
                },
                series: [{
                    name: 'Total Post',
                    data:  post,
                },
                ],
                chart: {
                    height: 350,
                    type: 'bar',
                },
                plotOptions: {
                    bar: {
                        dataLabels: {
                            position: 'top', // top, center, bottom
                        },
                    }
                },
                dataLabels: {
                    enabled: true,
                    formatter: function (val) {
                        return val + "";
                    },
                    offsetY: -20,
                    style: {
                        fontSize: '11px',
                        colors: ["#0951a0"]
                    }
                },
                xaxis: {
                    categories: time,
                    position: 'top',
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    },
                    crosshairs: {
                        fill: {
                            type: 'gradient',
                            gradient: {
                                colorFrom: '#0951a0',
                                colorTo: '#0951a0',
                                stops: [0, 100],
                                opacityFrom: 0.4,
                                opacityTo: 0.5,
                            }
                        }
                    },
                    tooltip: {
                        enabled: true,
                    }
                },
                yaxis: {
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false,
                    },
                    labels: {
                        show: false,
                        formatter: function (val) {
                            return val + "";
                        }
                    }
                },
                title: {
                    text: '',
                    floating: true,
                    offsetY: 330,
                    align: 'center',
                    style: {
                        color: '#444'
                    }
                }
            };
            var chart = new ApexCharts(document.querySelector("#post-history-chart"), options);
            chart.render();
        }
    })

    $.ajax({
        url: "{{ route('business.history.chart') }}",
        method: 'GET',
        data: {},
        success: function (data) {
            var business = Array(); 
            var time = Array(); 
            $.each(data.data, (key, value) => {
                business.push(value.business) 
                time.push(value.time) 
            })
            
            var options = {
                fill: {
                    colors: ['#ff8d73d1']
                },
                series: [{
                    name: 'Total business',
                    data:  business,
                },
                ],
                chart: {
                    height: 350,
                    type: 'bar',
                },
                plotOptions: {
                    bar: {
                        dataLabels: {
                            position: 'top', // top, center, bottom
                        },
                    }
                },
                dataLabels: {
                    enabled: true,
                    formatter: function (val) {
                        return val + "";
                    },
                    offsetY: -20,
                    style: {
                        fontSize: '11px',
                        colors: ["#0951a0"]
                    }
                },
                xaxis: {
                    categories: time,
                    position: 'top',
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    },
                    crosshairs: {
                        fill: {
                            type: 'gradient',
                            gradient: {
                                colorFrom: '#0951a0',
                                colorTo: '#0951a0',
                                stops: [0, 100],
                                opacityFrom: 0.4,
                                opacityTo: 0.5,
                            }
                        }
                    },
                    tooltip: {
                        enabled: true,
                    }
                },
                yaxis: {
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false,
                    },
                    labels: {
                        show: false,
                        formatter: function (val) {
                            return val + "";
                        }
                    }
                },
                title: {
                    text: '',
                    floating: true,
                    offsetY: 330,
                    align: 'center',
                    style: {
                        color: '#444'
                    }
                }
            };
            var chart = new ApexCharts(document.querySelector("#business-history-chart"), options);
            chart.render();
        }
    })
</script>
@endsection