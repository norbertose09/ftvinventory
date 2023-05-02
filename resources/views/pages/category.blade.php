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
       <a href="/createcategory">Create Category</a><br><br>
        <div class="row">
          <div class="col-md-7 mx-auto grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Your Categories</h4>
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        
                        <th> Category Name </th>
                        <th> Action </th>

                      </tr>
                    </thead>
                    <tbody>
                        @unless(count($category) ==0)
                        @forelse($category as $category)
                      <tr> 
                          <td> {{ $category->name }} </td>
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