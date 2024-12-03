@component('admin.master1')



<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header d-flex">
                <h3 class="card-title">فهرست سفارشات</h3>

                <div class="card-tools d-flex"><form action="">
                  <div class="input-group input-group-sm" style="width: 150px;">

                    <input type="text" name="search" class="form-control float-right" placeholder="جستجو">

                    <div class="input-group-append">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                    </div>
                    </form>
                    <div class="btn-group-sm mr-2"></div>
                    <a href="{{ route('create') }}" class="btn btn-info">ایجاد کاربر</a>
                    </div>
                </div>

              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <tbody><tr>
                    <th>نام کاربر</th>
                    <th>محصولات</th>
                    <th>قیمت کل</th>
                    <th>سریال پیگیری</th>
                    <th>وضعیت</th>
                    <th>اقدامات</th>
                  </tr>
                  @foreach ($Orders as $user)
                  <tr>
                    <td>{{$user->user->name}}</td>
                    <td>
                        @foreach ($user->products->pluck('name') as $y )
                            {{$y}},
                        @endforeach
                    </td>
                    <td>{{$user->price}}</td>
                    <td>{{$user->tracking_serial}}</td>
                    <td>
                        @if ($user->status =='recieved')
                        <span class="badge bg-success p-2"> تکمیل شده</span>

                        @elseif ($user->status =='paid')
                        <span class="badge bg-primary p-2">  پرداخت شده</span>

                        @elseif ($user->status =='posted')
                        <span class="badge bg-info p-2">  ارسال شده</span>

                        @elseif ($user->status =='unpaid')
                        <span class="badge bg-warning p-2">  پرداخت نشده</span>

                        @elseif ($user->status =='cancelled')
                        <span class="badge bg-danger p-2">  کنسل شده</span>
                        @endif
                    </td>
                    <td class="d-flex">
                        @if ($user->status =='paid')
                    <form action="{{route('admin_Orders.update', ['admin_Order'=>$user->id])}}" method="post" class="mr-1">
                        @method('PATCH')

                        @csrf

                        <input type="hidden" name="status"   value="paid">

                        <button type="submit" class="btn btn-primary"><span class="badge badge-primary">ارسال شدن</span></button>
                    </form>

                    @endif

                    @if ($user->status =='posted')
                    <form action="{{route('admin_Orders.update', ['admin_Order'=>$user->id])}}" method="post" class="mr-1 ">
                        @method('PATCH')

                        @csrf
                        <input type="hidden" name="status"   value="posted">

                        <button type="submit" class="btn btn-success"><span class="badge badge-success">تکمیل شدن</span></button>
                    </form>

                        @endif

                    <!-- <form action="{{route('admin_comment.destroy', ['admin_comment'=>$user->id])}}" method="post" class="mr-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><span class="badge badge-danger">حذف</span></button>
                    </form></td> -->
                  </tr>
                  @endforeach

                </tbody></table>

              <!-- /.card-body -->
            </div>
            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                    <div class="cca card-footer d-flex">
                                        <div class="cca cart d-flex">
                                            {{$Orders->render()}}
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
            </div></div>

            <!-- /.card -->
          </div>
        </div>





@endcomponent
