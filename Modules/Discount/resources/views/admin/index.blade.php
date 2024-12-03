
@component('admin.master1')
<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header d-flex">
                <h3 class="card-title">فهرست پیغام ها</h3>

                <div class="card-tools d-flex"><form action="">
                  <div class="input-group input-group-sm" style="width: 150px;">

                    <input type="text" name="search" class="form-control float-right" placeholder="جستجو">

                    <div class="input-group-append">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                    </div>
                    </form>
                    <div class="btn-group-sm mr-2"></div>
                    @if ($module->isEnabled())
                    <a href="{{ route('discount.disable') }}" class="btn btn-danger ml-2">غیر فعال سازی ماژول کد تخفیف</a>

                    @endif

                    <a href="{{ route('discount.create') }}" class="btn btn-info ">ایجاد تخفیف</a>
                    </div>
                </div>

              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <tbody><tr>

                    <th>ID</th>
                    <th>کد تخفیف</th>
                    <th>درصد</th>
                    <th>مربوط به کاربر</th>
                    <th>مربوط به محصول</th>
                    <th>مربوط به دسته</th>
                    <th>تاریخ اعتبار</th>
                    <th>اقدامات</th>
                  </tr>
                  @foreach ($all as $discount)
                  <tr>

                    <td>{{$discount->id}}</td>
                    <td>{{$discount->code}}</td>
                    <td>{{$discount->percent}}</td>
                    <td>    {{ $discount->users()->count() ? $discount->users->map(fn($user) => $user->name ?? $user->phonenumber)->implode(',') : 'همه کاربران' }}</td>
                    <!-- <td>{{$discount->users()->count() ? $discount->users()->pluck('name')->join(',') : 'همه کاربران'}}</td> -->
                    <td>{{$discount->products()->count() ? $discount->products()->pluck('name')->join(',') : 'همه محصولات'}}</td>
                    <td>{{$discount->categories()->count() ? $discount->categories()->pluck('name')->join(',') : 'همه دسته بندی ها'}}</td>
                    <td>{{jdate($discount->expired_at)->format('%Y %m %d ')}}</td>
                    <td class="d-flex"><a href="{{route('discount.show', ['discount'=>$discount->id])}}"><button class="btn btn-primary"><span class="badge badge-primary">ویرایش</span></button></a>
                    <form action="{{route('discount.destroy', ['discount'=>$discount->id])}}" method="post" class="mr-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><span class="badge badge-danger">حذف</span></button>
                    </form></td>


                  </tr>
                  @endforeach

                </tbody></table>

              <!-- /.card-body -->
            </div>

            </div></div>

            <!-- /.card -->
          </div>
        </div>
        <script>
            document.querySelector('h1').style.display="none";
            document.querySelector('ol').style.display="none";


        </script>
@endcomponent
