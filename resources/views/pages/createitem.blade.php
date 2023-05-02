<x-layout>
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="page-header">
          <h3 class="page-title"> Create Item</h3>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              {{-- <li class="breadcrumb-item"><a href="#">Forms</a></li>
              <li class="breadcrumb-item active" aria-current="page">Form elements</li> --}}
            </ol>
          </nav>
        </div>
        <div class="row">
          <div class="col-md-6 mx-auto grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">#Item</h4>
                <br>
                {{-- <p class="card-description"> Basic form layout </p> --}}
                <form class="forms-sample" method="POST" action="/createitemconfig">
                    @csrf
                  <div class="form-group">
                    <label for="exampleInputUsername1">Item name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputUsername1" placeholder="Item Name">
                    @error('name')
                      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="exampleFormControlSelect2">Category</label>
                    <select class="form-control" id="exampleFormControlSelect2" name="category">
                      @foreach($category as $category)
                      <option value="{{ $category->name }}">{{ $category->name }}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputUsername1">Price</label>
                    <input type="text" name="price" class="form-control" id="exampleInputUsername1" placeholder="Price">
                    @error('name')
                      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="exampleInputUsername1">Quantity</label>
                    <input type="text" name="quantity" class="form-control" id="exampleInputUsername1" placeholder="Quantity">
                    @error('name')
                      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                  </div>
                  <br>
                {{-- <p class="card-description"> Note: Category could be "perishable, non-perishable, drinks, etc and not a particular item. If you want to create an item, visit the <a href="/createitem">create item</a> page". </p> --}}
                
                  <button type="submit" class="btn btn-gradient-primary me-2">Create</button>
                  

                  <a href="/dashboard" class="btn btn-light">Cancel</a>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
      <!-- partial:../../partials/_footer.html -->
    </x-layout>