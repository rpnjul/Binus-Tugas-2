@extends('templates.main')

@section('title') Dashboard @endsection

@section('styles')
<style>
#performanceOffice {
  width: 100%;
  height: 300px;
}
#totalPegawai {
  width: 100%;
  height: 300px;
}
#absensi {
  width: 100%;
  height: 300px;
}
</style>
@endsection
@section('content')
<!-- /.content-header -->
  <!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-6">
                <!-- small box -->
                <div class="card">
                    <div class="card-body">
                      <div id="totalPegawai"></div>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-md-6">
                <!-- small box -->
                <div class="card">
                    <div class="card-body">
                      <div id="absensi"></div>
                    </div>
                </div>
            </div>
            <!-- ./col -->
        </div>

        <!-- /.row -->
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <div class="text-center">
                <label for="">Pendaftaran</label>
              </div>
              <div id="performanceOffice"></div>
            </div>
          </div>
        </div>
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
<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<script>
  am5.ready(function() {
  
  // Create root element
  // https://www.amcharts.com/docs/v5/getting-started/#Root_element
  var root = am5.Root.new("performanceOffice");
  
  // Set themes
  // https://www.amcharts.com/docs/v5/concepts/themes/
  root.setThemes([
    am5themes_Animated.new(root)
  ]);
  
  // Create chart
  // https://www.amcharts.com/docs/v5/charts/xy-chart/
  var chart = root.container.children.push(
    am5xy.XYChart.new(root, {
      panX: true,
      panY: true,
      wheelX: "panX",
      wheelY: "zoomX",
      layout: root.verticalLayout,
    pinchZoomX:true
    })
  );
  
  // Add cursor
  // https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
  var cursor = chart.set(
    "cursor",
    am5xy.XYCursor.new(root, {
      behavior: "none"
    })
  );
  cursor.lineY.set("visible", false);
  
  var colorSet = am5.ColorSet.new(root, {});
  
  // The data
  var data = [
    {
      date: "2022-01-31",
      value: 1
    },
    {
      date: "2022-02-31",
      value: 3
    },
    {
      date: "2022-03-31",
      value: 5
    },
    {
      date: "2022-04-31",
      value: 3.5
    },
    {
      date: "2022-05-31",
      value: 4
    },
    {
      date: "2022-06-31",
      value: 2
    },
    {
      date: "2022-07-01",
      value: 4
    },
    {
      date: "2022-08-01",
      value: 6
    },
    {
      date: "2022-09-01",
      value: 9
    }
  ];
  
  // Create axes
  // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
  var xRenderer = am5xy.AxisRendererX.new(root, {});
  xRenderer.grid.template.set("location", 0.5);
  xRenderer.labels.template.setAll({ location: 0.5, multiLocation: 0.5 });
  
  var xAxis = chart.xAxes.push(
    am5xy.DateAxis.new(root, {
      baseInterval: { timeUnit: "hour", count: 1 },
      renderer: xRenderer,
      tooltip: am5.Tooltip.new(root, {})
    })
  );
  
  var yRenderer = am5xy.AxisRendererY.new(root, {});
  yRenderer.grid.template.set("forceHidden", true);
  yRenderer.labels.template.set("minPosition", 0.05);
  
  var yAxis = chart.yAxes.push(
    am5xy.ValueAxis.new(root, {
      maxPrecision: 0,
      extraMin: 0.1,
      renderer: yRenderer
    })
  );
  
  var series = chart.series.push(
    am5xy.LineSeries.new(root, {
      xAxis: xAxis,
      yAxis: yAxis,
      valueYField: "value",
      valueXField: "date",
      maskBullets: false,
      tooltip: am5.Tooltip.new(root, {
        pointerOrientation: "vertical",
        dy: -20,
        labelText: "{valueY}"
      })
    })
  );
  
  // Set up data processor to parse string dates
  // https://www.amcharts.com/docs/v5/concepts/data/#Pre_processing_data
  series.data.processor = am5.DataProcessor.new(root, {
    dateFormat: "yyyy-MM-dd HH:mm",
    dateFields: ["date"]
  });
  
  series.strokes.template.setAll({ strokeDasharray: [3, 3], strokeWidth: 2 });
  
  
  var i = -1;
  series.bullets.push(function() {
    i++;
  
    if (i > 7) {
      i = 0;
    }
  
    var container = am5.Container.new(root, {
      centerX: am5.p50,
      centerY: am5.p50
    });
  
    container.children.push(
      am5.Circle.new(root, { radius: 20, fill: series.get("fill") })
    );
  
    container.children.push(
      am5.Picture.new(root, {
        centerX: am5.p50,
        centerY: am5.p50,
        width: 23,
        height: 23,
        src: ""
      })
    );
  
    return am5.Bullet.new(root, {
      sprite: container
    });
  });
  
  series.data.setAll(data);
  series.appear(1000);
  
  // Make stuff animate on load
  // https://www.amcharts.com/docs/v5/concepts/animations/
  chart.appear(1000, 100);
  
  }); // end am5.ready()
  </script>
  <script>
    am5.ready(function() {
    
    // Create root element
    // https://www.amcharts.com/docs/v5/getting-started/#Root_element
    var root = am5.Root.new("totalPegawai");
    
    
    // Set themes
    // https://www.amcharts.com/docs/v5/concepts/themes/
    root.setThemes([
      am5themes_Animated.new(root)
    ]);
    
    
    // Create chart
    // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/
    var chart = root.container.children.push(am5percent.PieChart.new(root, {
      layout: root.verticalLayout
    }));
    
    
    // Create series
    // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series
    var series = chart.series.push(am5percent.PieSeries.new(root, {
      valueField: "value",
      categoryField: "category"
    }));
    
    
    // Set data
    // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data
    series.data.setAll([
      { value: 70, category: "Laki-Laki" },
      { value: 80, category: "Perempuan" },
    ]);
    
    
    // Play initial series animation
    // https://www.amcharts.com/docs/v5/concepts/animations/#Animation_of_series
    series.appear(1000, 100);
    
    }); // end am5.ready()
    </script>
    <script>
      am5.ready(function() {
      
      // Create root element
      // https://www.amcharts.com/docs/v5/getting-started/#Root_element
      var root = am5.Root.new("absensi");
      
      
      // Set themes
      // https://www.amcharts.com/docs/v5/concepts/themes/
      root.setThemes([
        am5themes_Animated.new(root)
      ]);
      
      
      // Create chart
      // https://www.amcharts.com/docs/v5/charts/xy-chart/
      var chart = root.container.children.push(am5xy.XYChart.new(root, {
        panX: false,
        panY: false,
        wheelX: "panX",
        wheelY: "zoomX",
        layout: root.verticalLayout
      }));
      
      
      // Data
      var data = [{
        category: "Senin, 25 April 2022",
        open1: 0,
        close1: 83,
        open2: 83,
        close2: 128
      }, {
        category: "Selasa, 26 April 2022",
        open1: 0,
        close1: 90,
        open2: 90,
        close2: 145
      }];
      
      
      // Create axes
      // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
      var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
        categoryField: "category",
        renderer: am5xy.AxisRendererX.new(root, {
          cellStartLocation: 0.1,
          cellEndLocation: 0.9
        }),
        tooltip: am5.Tooltip.new(root, {})
      }));
      
      xAxis.data.setAll(data);
      
      var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
        calculateTotals: true,
        extraMax: 0.05,
        renderer: am5xy.AxisRendererY.new(root, {})
      }));
      
      
      // Add series
      // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
      function makeSeries(name, field, openField, total) {
        var series = chart.series.push(am5xy.ColumnSeries.new(root, {
          name: name,
          xAxis: xAxis,
          yAxis: yAxis,
          valueYField: field,
          openValueYField: openField,
          categoryXField: "category",
          clustered: false
        }));
      
        series.columns.template.setAll({
          tooltipText: "{name}, {categoryX}: {valueY}",
          width: am5.percent(95),
          tooltipY: 0
        });
      
        series.data.setAll(data);
      
        // Make stuff animate on load
        // https://www.amcharts.com/docs/v5/concepts/animations/
        series.appear();
      
        series.bullets.push(function () {
          var label = am5.Label.new(root, {
            text: "{valueY}",
            fill: root.interfaceColors.get("alternativeText"),
            centerY: am5.p50,
            centerX: am5.p50,
            populateText: true,
            textAlign: "center",
            oversizedBehavior: "hide"
          });
              
          label.adapters.add("text", function(text, target) {
            var val = Math.abs(target.dataItem.get("valueY") - target.dataItem.get("openValueY"));
            return val;
          });
          
          return am5.Bullet.new(root, {
            locationX: 0.5,
            locationY: 0.5,
            sprite: label
          });
        });
        
        if (total) {
          series.bullets.push(function () {
            var totalLabel = am5.Label.new(root, {
              text: "{valueY}",
              fill: root.interfaceColors.get("text"),
              centerY: am5.p100,
              centerX: am5.p50,
              populateText: true,
              textAlign: "center"
            });
            
            totalLabel.adapters.add("text", function(text, target) {
              var dataContext = target.dataItem.dataContext;
              var val = Math.abs(dataContext.close2 - dataContext.open1);
              return val;
            });
            
            return am5.Bullet.new(root, {
              locationX: 0.5,
              locationY: 1,
              sprite: totalLabel
            });
          });
        }
      }
      
      makeSeries("Budget #1", "close1", "open1", false);
      makeSeries("Budget #2", "close2", "open2", true);
      
      
      // Make stuff animate on load
      // https://www.amcharts.com/docs/v5/concepts/animations/
      chart.appear(1000, 100);
      
      }); // end am5.ready()
      </script>
@endsection