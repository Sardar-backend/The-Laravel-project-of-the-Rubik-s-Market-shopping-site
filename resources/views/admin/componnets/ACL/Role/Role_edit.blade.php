@component('admin.master2')

<div class="row">
    <div class="col-lg-12">
        @include('admin.layaut.errors')
    <div class="card ">
              <div class="card-header">
                <h3 class="card-title">ویرایش مقام</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="{{route('Roles.update', ['Role'=>$Role->id])}}" method="post">
                @method('PATCH')
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">نام مقام</label>
                  <div class="col-sm-10">
                      <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="نام مقام را وارد کنید" value="{{$Role->name}}">
                  </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">توضیحات مقام</label>
                  <div class="col-sm-10">
                      <input type="text" name="display_name" class="form-control" id="inputEmail3" placeholder="توضیحات را وارد کنید" value="{{$Role->display_name}}">
                  </div>
                  </div>
                  <h6>مجوز های مقام </h6>
                  <div class="form-group"><div class="col-sm-10">
                  @foreach ($Role->permissions()->get() as $permission)
                    <span class="btn btn-info" >{{$permission->name}}</span>
                  @endforeach
                  </div></div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label"> مجوز ها</label>
                    <div class="col-sm-10">
                    <select  class="form-control" name="permissions[]" id="permissions" multiple>
                        @php
                        use App\Models\permission;
                        $permissions = permission::all();
                        @endphp
                        @foreach ($permissions as $permission)
                            <option value="{{$permission->id}}" >{{$permission->name}}</option>
                        @endforeach

                    </select>
                    </div>
                  </div>

                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">ویرایش</button>
                  <a href="{{route('Roles.index')}}" class="btn btn-default float-left">لغو<a/>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
    </div>
</div>

@endcomponent
