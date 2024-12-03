@component('admin.master1')

<div class="row">
    <div class="col-lg-12">
        @include('admin.layaut.errors')
    <div class="card ">
              <div class="card-header">
                <h3 class="card-title">ویرایش دسته بندی</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="{{route('admin_category.update', ['admin_category'=>$cat->id])}}" method="post">
                @method('PATCH')
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">نام دسته بندی</label>
                  <div class="col-sm-10">
                      <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="نام دسته بندی را وارد کنید" value="{{$cat->name}}">
                  </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">دسته بندی والد</label>
                  <div class="col-sm-10">
                      <input type="text" name="parent" class="form-control" id="inputEmail3" placeholder="شماره را وارد کنید" value="0{{$cat->phonenumber}}">
                  </div>
                  </div>

                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">ویرایش</button>
                  <a href="{{route('admin_category.index')}}" class="btn btn-default float-left">لغو<a/>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
    </div>
</div>

@endcomponent
