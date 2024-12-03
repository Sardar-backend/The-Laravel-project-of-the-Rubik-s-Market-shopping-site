

@component('admin.master1')
<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header d-flex">
                <h3 class="card-title">فهرست مقالات</h3>

                <div class="card-tools d-flex"><form action="">
                  <div class="input-group input-group-sm" style="width: 150px;">

                    <input type="text" name="search" class="form-control float-right" placeholder="جستجو">

                    <div class="input-group-append">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                    </div>
                    </form>
                    <div class="btn-group-sm mr-2"></div>
                    <a href="{{ route('admin_blog.create') }}" class="btn btn-info">ایجاد مقاله</a>
                    </div>
                </div>

              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <tbody><tr>
                    <th>آیدی</th>
                    <th>عنوان</th>
                    <th>متن</th>
                    <th>اقدامات</th>

                  </tr>
                  @foreach ($blogs as $user)
                  <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->title}}</td>
                    <td>{{substr(strip_tags($user->content),0,150)}}...</td>

                    <td class="d-flex"><a href="{{route('admin_blog.show', ['admin_blog'=>$user->id])}}"><button class="btn btn-primary"><span class="badge badge-primary">ویرایش</span></button></a>
                    <form action="{{route('admin_blog.destroy', ['admin_blog'=>$user->id])}}" method="post" class="mr-1">
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
                                            {{$blogs->render()}}
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
            <!-- <div class="card-footer d-flex">
                <div class="cart ">
                    {{$blogs->render()}}
                </div>

              </div> -->
            </div></div>

            <!-- /.card -->
          </div>
        </div>
@endcomponent
