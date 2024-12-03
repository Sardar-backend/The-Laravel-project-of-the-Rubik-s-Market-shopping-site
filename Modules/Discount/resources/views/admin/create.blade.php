@component('admin.master1')

<div class="row">
    <div class="col-lg-12">
        @include('admin.layaut.errors')
    <div class="card ">
              <div class="card-header">
                <h3 class="card-title">ایجاد تخفیف</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="{{route('discount.store')}}"   method="post">
                @csrf
                <div class="card-body">

                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">کد تخفیف </label>
                  <div class="col-sm-10">
                      <input type="text" name="code" class="form-control" id="inputEmail3" placeholder="کد را وارد کنید">
                  </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">درصد </label>
                  <div class="col-sm-10">
                      <input type="number" name="percent" min="0" max="100" class="form-control" id="inputEmail3" placeholder="درصد تخفیف را وارد کنید">
                  </div>
                  </div>




                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label"> تاریخ اعتبار </label>

                    <div class="col-sm-10">
                      <input type="date" min="0" name="expired_at" class="form-control" id="inputPassword3" >
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label"> کاربران</label>
                    <div class="col-sm-10">
                    <select  class="form-control" name="Users[]" id="categories" multiple>
                        @php
                        use App\Models\productcategory;
                        $productcategory = productcategory::all();
                        use App\Models\User;
                        $Users = User::all();
                        use App\Models\Product;
                        $Products = Product::all();
                        @endphp
                        @foreach ($Users as $category)
                            <option value="{{$category->id}}" >{{$category->name ?? $category->phonenumber}}</option>
                        @endforeach

                    </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">دسته بندی</label>
                    <div class="col-sm-10">
                    <select  class="form-control" name="productcategory[]" id="categories" multiple>

                        @foreach ($productcategory as $category)
                            <option value="{{$category->id}}" >{{$category->name}}</option>
                        @endforeach

                    </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">محصولات</label>
                    <div class="col-sm-10">
                    <select  class="form-control" name="Products[]" id="categories" multiple>

                        @foreach ($Products as $category)
                            <option value="{{$category->id}}" >{{$category->name}}</option>
                        @endforeach

                    </select>
                    </div>
                  </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">ایجاد کاربر</button>
                  <a href="{{route('discount.index')}}" class="btn btn-default float-left">لغو<a/>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
    </div>
</div>

@endcomponent
