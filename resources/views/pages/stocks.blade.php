<x-layout>
    <!-- partial -->
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="page-header">
          <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
              <i class="mdi mdi-home"></i>
            </span> Categories
          </h3>
          <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page">
                <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
              </li>
            </ul>
          </nav>
        </div>
       <a href="/createitem">Create Items</a><br><br>
       <div class="row">
        <div class="col-md-7 mx-auto grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Project Status</h4>
              <div class="table-responsive">
                <table class="table">
        {{-- <div class="row">
          <div class="col-6 mx-auto grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Your Items</h4>
                <div class="table-responsive">
                  <table class="table"> --}}
                    <thead>
                      <tr>
                        
                        <th> Item Name </th>
                        <th> Category </th>
                        <th> Price</th>
                        <th> Avail. Quantity </th>
                        <th> Action </th>

                      </tr>
                    </thead>
                    <tbody>
                        @unless(count($item) ==0)
                        @forelse($item as $item)
                      <tr> 
                          <td> {{ $item->name }} </td>
                          <td> {{ $item->category }} </td>
                          <td>&#8358; {{ $item->price }} </td>
                          <td> {{ $item->quantity }} </td>
                          <td><label class="badge badge-gradient-danger">delete</label></td>
                          
                          @empty
                          <h2>There are no Categories</h2>
                      </tr>
                      @endforelse
                      @endunless
                     
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