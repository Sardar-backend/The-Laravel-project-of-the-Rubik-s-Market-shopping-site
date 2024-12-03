@component('admin.master1')

<div class="row">
    <div class="col-lg-12">
        @include('admin.layaut.errors')
    <div class="card ">
              <div class="card-header">
                <h3 class="card-title">ویرایش کاربر</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="{{route('edituser', ['id'=>$user->id])}}" enctype="multipart/form-data" method="post">
                @method('PATCH')
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">نام کاربر</label>
                  <div class="col-sm-10">
                      <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="نام کاربر را وارد کنید" value="{{$user->name}}">
                  </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">شماره تلفن</label>
                  <div class="col-sm-10">
                      <input type="text" name="phonenumber" class="form-control" id="inputEmail3" placeholder="شماره را وارد کنید" value="0{{$user->phonenumber}}">
                  </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">ایمیل</label>

                    <div class="col-sm-10">
                      <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="ایمیل را وارد کنید" value="{{$user->email}}">
                    </div>
                  </div>
                  <div class="form-group">
                  <div class="col-sm-10">
                  <label for="email">عکس پروفایل  :</label>
                  <input name="image" accept="image/*" type="file" class="form-control"   ></div></div>
                    <!-- <label for="inputPassword3" class="col-sm-2 control-label">عکس پروفایل</label>
                    <textarea id="my-editor" name="image" class="form-control">{!! old('content', '') !!}</textarea>
                    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
                    <script>
                    var options = {
                        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
                    };
                    CKEDITOR.replace('my-editor', options);
                    </script></div> -->

                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">کد ملی</label>

                    <div class="col-sm-10">
                      <input type="number" min="0" name="meli_code" class="form-control" id="inputPassword3" placeholder=" کد ملی را وارد کنید">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">شماره کارت </label>

                    <div class="col-sm-10">
                      <input type="number" min="0" name="cart_number" class="form-control" id="inputPassword3" placeholder="شماره کارت را وارد کنید">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label"> تاریخ تولد </label>

                    <div class="col-sm-10">
                      <input type="date" min="0" name="birthday" class="form-control" id="inputPassword3" placeholder="تاریخ تولد کارت را وارد کنید">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="form-check">
                        <input id="exampleCheck2" onclick="let sds= document.querySelector('exampleCheck2').value == 1 " name="is_superuser" type="checkbox" value="0" class="form-check-input" >
                        <label class="form-check-label" for="exampleCheck2">کاربر کارمند</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">شماره منزل</label>
                  <div class="col-sm-10">
                      <input type="text" name="home_number" class="form-control" id="inputEmail3" placeholder="شماره را وارد کنید">
                  </div>
                  </div>
                  <div class="form-group"><div class="col-sm-10">
                    <h6>نقش های کاربر</h6>
                  @foreach ($user->role()->get() as $attribute)
                    <span class="btn btn-info" >{{$attribute->name}}</span>
                  @endforeach
                  </div></div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">role </label>
                    <div class="col-sm-10">
                    <select  class="form-control" name="roles[]" id="categories" multiple>
                    @php
                    use App\Models\role;
                    $roles = role::all();
                    @endphp
                    @foreach ($roles as $role)
                        <option value="{{$role->id}}" >{{$role->name}}</option>
                    @endforeach

                    </select>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">ویرایش</button>
                  <a href="{{route('admin')}}" class="btn btn-default float-left">لغو<a/>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
    </div>
</div>

@endcomponent
