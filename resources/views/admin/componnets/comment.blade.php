@component('admin.master1')



<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header d-flex">
                <h3 class="card-title">فهرست کاربران</h3>

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
                    <th>آیدی</th>
                    <th>نام کاربر</th>
                    <th>متن</th>
                    <th>وضعیت</th>
                    <th>آیدی کامنت والد</th>
                    <th>اقدامات</th>
                  </tr>
                  @foreach ($comments as $user)
                  <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->user->name}}</td>
                    <td>{{$user->content}}</td>
                    <td>
                        @if (! $user->status)
                        <span class="badge bg-danger p-2">تائید نشده</span>

                        @else
                        <span class="badge badge-success p-2">تایید شده</span>

                        @endif

                    </td>
                    <td>{{$user->parent_id}}</td>
                    <td class="d-flex">
                        <!-- <a href="{{route('edit_post', ['id'=>$user->id])}}">< class="btn btn-primary"><span class="badge badge-primary">ویرایش</span></a> -->
                        @if (! $user->status)
                    <form action="{{route('admin_comment.edit', ['admin_comment'=>$user->id])}}" method="get" class="mr-1">
                        @csrf

                        <button type="submit" class="btn btn-primary"><span class="badge badge-primary">تائید</span></button>
                    </form>

                        @endif


                    <form action="{{route('admin_comment.destroy', ['admin_comment'=>$user->id])}}" method="post" class="mr-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><span class="badge badge-danger">حذف</span></button>
                    </form></td>
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
                                            {{$comments->render()}}
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
