@extends('templates.main')

@section('title') Dashboard @endsection

@section('styles')
<style>
    #performanceChart {
      width: 100%;
      height: 300px;
    }
    #kehadiranChart {
        width: 100%;
        height: 300px;
    }
    </style>
@endsection
@section('content')
<!-- /.content-header -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
          <div class="col-md-12 card">
              <div class="card-body" style="padding: .25rem;">
                  <marquee behavior="scroll" direction="left">
                      Flexible time untuk kehadiran Pegawai adalah 60 menit | 
                      Tetap menerapkan protokol kesehatan dan menjaga jarak
                  </marquee>
              </div>
          </div>
        {{-- <div class="col-md-12" style="background: #8080805e;"> --}}
        {{-- </div> --}}
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
  <!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-4">
                <!-- small box -->
                <div class="card">
                    <div class="card-body">
                        <div id="performanceChart"></div>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-md-4">
                <!-- small box -->
                <div class="card">
                    <div class="card-body">
                        <div id="kehadiranChart"></div>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-md-4">
                <!-- small box -->
               <div class="card">
                   <div class="card-body">
                       <div style="height:300px">
                           <table class="table" style="border: none;">
                                <tr>
                                    <td></td>
                                    <td>April 2022</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Cuti</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td>Tanpa Keterangan</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td>Datang Terlambat</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td>Klarifikasi</td>
                                    <td>0</td>
                                </tr>
                           </table>
                       </div>
                   </div>
               </div>
            </div>
            <!-- ./col -->
        </div>
            <!-- /.row -->
            <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead style="background:#80808073">
                                <td>HARI TANGGAL</td>
                                <td>PRESENSI</td>
                                <td>STATUS</td>
                                <td>KETERANGAN</td>
                                <td>-</td>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Jumat, 01 Apr 2022</td>
                                    <td>07:30 - 17:15</td>
                                    <td>HADIR</td>
                                    <td>WFO</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td>Sabtu, 02 Apr 2022</td>
                                    <td></td>
                                    <td>LIBUR</td>
                                    <td>-</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td>Minggu, 03 Apr 2022</td>
                                    <td></td>
                                    <td>LIBUR</td>
                                    <td>-</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td>Senin, 04 Apr 2022</td>
                                    <td>07:30 - 17:15</td>
                                    <td>HADIR</td>
                                    <td>WFO</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td>Selasa, 05 Apr 2022</td>
                                    <td>07:30 - 17:15</td>
                                    <td>HADIR</td>
                                    <td>WFO</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td>Rabu, 05 Apr 2022</td>
                                    <td>07:30 - 17:15</td>
                                    <td>HADIR</td>
                                    <td>WFO</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td>Kamis, 06 Apr 2022</td>
                                    <td>07:30 - 17:15</td>
                                    <td>HADIR</td>
                                    <td>WFO</td>
                                    <td>-</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
@endsection
@section('scripts')
<!-- Chart code -->

<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<script>
    am5.ready(function() {
    
    // Create root element
    // https://www.amcharts.com/docs/v5/getting-started/#Root_element
    var root = am5.Root.new("performanceChart");
    
    // Set themes
    // https://www.amcharts.com/docs/v5/concepts/themes/
    root.setThemes([
      am5themes_Animated.new(root)
    ]);
    
    // Create chart
    // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/
    var chart = root.container.children.push(
      am5percent.PieChart.new(root, {
        startAngle: 160, endAngle: 380
      })
    );
    
    // Create series
    // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series
    
    var series0 = chart.series.push(
      am5percent.PieSeries.new(root, {
        valueField: "litres",
        categoryField: "country",
        startAngle: 160,
        endAngle: 380,
        radius: am5.percent(70),
        innerRadius: am5.percent(65)
      })
    );
    
    var colorSet = am5.ColorSet.new(root, {
      colors: [series0.get("colors").getIndex(0)],
      passOptions: {
        lightness: -0.05,
        hue: 0
      }
    });
    
    series0.set("colors", colorSet);
    
    series0.ticks.template.set("forceHidden", true);
    series0.labels.template.set("forceHidden", true);
    
    var series1 = chart.series.push(
      am5percent.PieSeries.new(root, {
        startAngle: 160,
        endAngle: 380,
        valueField: "bottles",
        innerRadius: am5.percent(80),
        categoryField: "country"
      })
    );
    
    series1.ticks.template.set("forceHidden", true);
    series1.labels.template.set("forceHidden", true);
    
    var label = chart.seriesContainer.children.push(
      am5.Label.new(root, {
        textAlign: "center",
        centerY: am5.p100,
        centerX: am5.p50,
        text: "[fontSize:18px]Tepat Waktu[/]:\n[bold fontSize:30px]70%[/]"
      })
    );
    
    var data = [
      {
        country: "Lithuania",
        litres: 501.9,
        bottles: 1500
      },
      {
        country: "Czech Republic",
        litres: 301.9,
        bottles: 990
      },
      {
        country: "Ireland",
        litres: 201.1,
        bottles: 785
      },
      {
        country: "Germany",
        litres: 165.8,
        bottles: 255
      }
    ];
    
    // Set data
    // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data
    series0.data.setAll(data);
    series1.data.setAll(data);
    
    }); // end am5.ready()
    </script>
    <script>
        am5.ready(function() {
        
        // Create root and chart
        var root = am5.Root.new("kehadiranChart");
        
        root.setThemes([
          am5themes_Animated.new(root)
        ]);
        
        var chart = root.container.children.push( 
          am5percent.PieChart.new(root, {
            layout: root.verticalLayout
          }) 
        );
        
        // Create series
        var series = chart.series.push(
          am5percent.PieSeries.new(root, {
            valueField: "percent",
            categoryField: "type",
            fillField: "color",
            alignLabels: false
          })
        );
        
        series.slices.template.set("templateField", "sliceSettings");
        series.labels.template.set("radius", 30);
        
        // Set up click events
        series.slices.template.events.on("click", function(event) {
          console.log(event.target.dataItem.dataContext)
          if (event.target.dataItem.dataContext.id != undefined) {
            selected = event.target.dataItem.dataContext.id;
          } else {
            selected = undefined;
          }
          series.data.setAll(generateChartData());
        });
        
        // Define data
        var selected;
        var types = [{
          type: "Hari Kerja",
          percent: 70,
          color: series.get("colors").getIndex(0),
          subs: [{
            type: "Oil",
            percent: 15
          }, {
            type: "Coal",
            percent: 35
          }, {
            type: "Nuclear",
            percent: 20
          }]
        }, {
          type: "Kehadiran",
          percent: 30,
          color: series.get("colors").getIndex(1),
          subs: [{
            type: "Hydro",
            percent: 15
          }, {
            type: "Wind",
            percent: 10
          }, {
            type: "Other",
            percent: 5
          }]
        }];
        series.data.setAll(generateChartData());
        
        
        function generateChartData() {
          var chartData = [];
          for (var i = 0; i < types.length; i++) {
            if (i == selected) {
              for (var x = 0; x < types[i].subs.length; x++) {
                chartData.push({
                  type: types[i].subs[x].type,
                  percent: types[i].subs[x].percent,
                  color: types[i].color,
                  pulled: true,
                  sliceSettings: {
                    active: true
                  }
                });
              }
            } else {
              chartData.push({
                type: types[i].type,
                percent: types[i].percent,
                color: types[i].color,
                id: i
              });
            }
          }
          return chartData;
        }
        
        }); // end am5.ready()
        </script>
    @endsection