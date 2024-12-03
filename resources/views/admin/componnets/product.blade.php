

@component('admin.master1')
<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header d-flex">
                <h3 class="card-title">فهرست محصولات</h3>

                <div class="card-tools d-flex"><form action="">
                  <div class="input-group input-group-sm" style="width: 150px;">

                    <input type="text" name="search" class="form-control float-right" placeholder="جستجو">

                    <div class="input-group-append">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                    </div>
                    </form>
                    <div class="btn-group-sm mr-2"></div>
                    <a href="{{ route('admin_PRODUCT.create') }}" class="btn btn-info">ایجاد محصول</a>
                    </div>
                </div>

              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <tbody><tr>
                    <th>آیدی</th>
                    <th>نام</th>
                    <th>قیمت</th>
                    <th>ستاره</th>
                    <th>عرض</th>
                    <th>طول</th>
                    <th>تخفیف</th>
                    <th>گارانتی</th>
                    <th>تعداد</th>
                    <th>منتخب</th>

                  </tr>
                  @foreach ($users as $user)
                  <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->price}}</td>
                    <td>{{$user->stars}}</td>
                    <td>{{$user->length}}</td>
                    <td>{{$user->with}}</td>
                    <td>{{$user->discust}}</td>
                    <td>{{$user->garant}}</td>
                    <td>{{$user->count}}</td>
                    <!-- <td>{{$user->Chosen}}</td> -->

                    @if ($user->Chosen)
                        <td><span class="badge bg-warning p-2">منتخب</span></td>
                    @else
                        <td></td>
                    @endif
                    <td class="d-flex"><a href="{{route('admin_PRODUCT.show', ['admin_PRODUCT'=>$user->id])}}"><button class="btn btn-primary"><span class="badge badge-primary">ویرایش</span></button></a>
                    <form action="{{route('admin_PRODUCT.destroy', ['admin_PRODUCT'=>$user->id])}}" method="post" class="mr-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><span class="badge badge-danger">حذف</span></button>

                    </form>
                    <a class="mr-1" href="{{route('product.gallery.index', ['product'=>$user->id])}}"><button class="btn btn-warning"><span class="badge badge-warning">گالری تصاویر</span></button></a>

                    <!-- <button type="submit" class="btn btn-warning mr-1"><span class="badge badge-warning ">گالری تصاویر</span></button> -->
                </td>
                  @endforeach

                </tbody></table>

              <!-- /.card-body -->
            </div></div></div>
            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                    <div class="cca card-footer d-flex">
                                        <div class="cca cart d-flex">
                                            {{$users->render()}}
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>

          </div>
        </div>
@endcomponent
