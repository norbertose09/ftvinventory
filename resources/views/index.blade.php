<x-layout>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> Dashboard
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
            </div>
            <div class="row">
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Today's Sales <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">&#8358; {{ $todaysSales }}</h2>
                    <h6 class="card-text">Items Sold - {{ $totalItemsSold }}</h6>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">This Week's Sales <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">&#8358; {{ $thisWeeksSales }}</h2>
                    <h6 class="card-text">Items Sold - {{ $totalItemsSoldThisWeek }}</h6>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Total Items In Stock <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">UNDEFINED</h2>
                    <h6 class="card-text">Total Items - {{ $totalItemsInStock }}</h6>
                    <h6 class="card-text">Total Category - {{ $totalCatInStock }}</h6>
                  </div>
                </div>
              </div>
            </div>
           <a href="/records">Store Record</a><br><br>
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Today's Sales</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> Item ID </th>
                            <th> Item Name </th>
                            {{-- <th> Category </th> --}}
                            <th> Unit Price </th>
                            <th> Quantity </th>
                            <th> Total Price </th>
                            <th> Status </th>
                            <th> Action </th>

                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($store as $store)
                          <tr>
                              <td>{{ $store->id }}</td>
                              <td>{{ $store->name }}</td>
                              <td>&#8358; {{ $store->unit_price }}</td>
                              <td>{{ $store->quantity }}</td>
                              <td>&#8358; {{ $store->total_price }}</td>
                              <td> <label class="badge badge-gradient-success">SOLD</label></td>
                              <td><label class="badge badge-gradient-danger">DISMISS</label></td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
        </x-layout>