<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Thống kê chung</h1>
  </div>

  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                Tổng người dùng</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format(count(listAll('tb_nguoi_dung'))) ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Annual) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <a href="<?= BASE_URL_ADMIN ?>?act=orders" class="text-decoration-none">
        <div class="card border-left-danger shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Đơn hàng (Đã xác nhận <?= $countOkOrder ?> / <?= $countOrder ?>)</div>
                <div class="row no-gutters align-items-center">
                  <div class="col-auto">
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $percentOrder ?></div>
                  </div>
                  <div class="col">
                    <div class="progress progress-sm mr-2">
                      <div class="progress-bar bg-danger" role="progressbar" style="width: <?= $percentOrder ?>" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-cart-shopping fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </a>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                Tổng sản phẩm</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format(count(listAll('tb_san_pham'))) ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-mobile-screen-button fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <a href="<?= BASE_URL_ADMIN ?>?act=contacts" class="text-decoration-none">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Liên hệ (Đã xử lý <?= $countOkContact ?> / <?= $countContact ?>)</div>
                <div class="row no-gutters align-items-center">
                  <div class="col-auto">
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $percentContact ?></div>
                  </div>
                  <div class="col">
                    <div class="progress progress-sm mr-2">
                      <div class="progress-bar bg-info" role="progressbar" style="width: <?= $percentContact ?>" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </a>
    </div>
  </div>

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Thống kê doanh thu</h1>
  </div>

  <div class="row">
    <div class="col-xl-4 col-md-12 mb-4">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                Theo ngày</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <span id="salesDay">
                  <?= getMoney(date('Y'), date('m'), date('d')) ?>
                </span> VNĐ
              </div>
            </div>
            <div class="col-auto">
              <input type="date" class="form-control" id="" onchange="getSales(this.value)" max="<?= date("Y-m-d") ?>" value="<?= date("Y-m-d") ?>">
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                Theo tháng</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <span id="salesMonth">
                  <?= getMoney(date('Y'), date('m')) ?>
                </span> VNĐ
              </div>
            </div>
            <div class="col-auto">
              <input type="month" class="form-control" id="" onchange="getSales(this.value)" max="<?= date("Y-m") ?>" value="<?= date("Y-m") ?>">
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                Theo năm</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <span id="salesYear">
                  <?= getMoney(date('Y')) ?>
                </span> VNĐ
              </div>
            </div>
            <div class="col-auto">
              <select name="" id="" class="form-control" onchange="getSales(this.value)">
                <?php for ($i = date('Y') - 4; $i <= date('Y'); $i++) : ?>
                  <option value="<?= $i ?>" <?= date('Y') == $i ? 'selected' : null ?>>Năm
                    <?= $i ?>
                  </option>
                <?php endfor; ?>
              </select>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="card shadow mb-4">
      <div class="card-header py-3 ">
        <div class="row d-flex flex-row align-items-center justify-content-between">
          <div class="col-10">
            <h6 class="m-0 font-weight-bold text-primary">Tổng quan doanh thu theo</h6>
          </div>
          <div class="col-2">
            <select id="timePeriod" class="form-control">
              <option value="day" selected>Ngày</option>
              <option value="month">Tháng</option>
              <option value="year">Năm</option>
            </select>

          </div>
        </div>
      </div>
      <!-- Card Body -->
      <div class="card-body">
        <div class="chart-area">
          <div class="chartjs-size-monitor">
            <div class="chartjs-size-monitor-expand">
              <div class=""></div>
            </div>
            <div class="chartjs-size-monitor-shrink">
              <div class=""></div>
            </div>
          </div>
          <canvas id="myAreaChart" width="537" height="400" style="display: block; height: 320px; width: 430px;" class="chartjs-render-monitor"></canvas>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Biểu đồ cột</h6>
      </div>
      <div class="card-body">
        <div class="chart-area">
          <canvas id="myBarChart"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  function getSales(date) {
    if (date == '') return;

    var arrDate = date.split('-');
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        if (arrDate[2]) {
          document.getElementById("salesDay").innerHTML = this.responseText;
        } else if (arrDate[1]) {
          document.getElementById("salesMonth").innerHTML = this.responseText;
        } else {
          document.getElementById("salesYear").innerHTML = this.responseText;
        }
      }
    }

    var url = "<?= BASE_URL_ADMIN ?>?act=get-sales";
    if (arrDate[0]) url += "&year=" + arrDate[0];
    if (arrDate[1]) url += "&month=" + arrDate[1];
    if (arrDate[2]) url += "&day=" + arrDate[2];

    xmlhttp.open("GET", url, true);
    xmlhttp.send();
  }
</script>