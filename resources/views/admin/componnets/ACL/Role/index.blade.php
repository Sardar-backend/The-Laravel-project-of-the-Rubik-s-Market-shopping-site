@component('admin.master2')
<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header d-flex">
                <h3 class="card-title">فهرست  مقام  ها</h3>

                <div class="card-tools d-flex"><form action="">
                  <div class="input-group input-group-sm" style="width: 150px;">

                    <input type="text" name="search" class="form-control float-right" placeholder="جستجو">

                    <div class="input-group-append">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                    </div>
                    </form>
                    <div class="btn-group-sm mr-2"></div>
                    <a href="{{ route('Roles.create') }}" class="btn btn-info">ایجاد مقام</a>
                    </div>
                </div>

              <!-- /.card-header -->
              <div class="card-body table-responsive p-0 d-flex">
                <table class="table table-hover">
                  <tbody><tr>
                    <th>نام مقام</th>
                    <th>توضیحات مقام</th>


                    <th>اقدامات</th>

                  </tr>
                  @foreach ($Roles as $Role)
                  <tr>
                      <td>{{$Role->name}}</td>
                      <td>{{$Role->display_name}}</td>

                    <td class="d-flex"><a href="{{route('Roles.show', ['Role'=>$Role->id])}}"><button class="btn btn-primary"><span class="badge badge-primary">ویرایش</span></button></a>
                    <form action="{{route('Roles.destroy', ['Role'=>$Role->id])}}" method="post" class="mr-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><span class="badge badge-danger">حذف</span></button>
                    </form></td>


                  </tr>
                  @endforeach

                </tbody>
            </table>









              <!-- /.card-body -->
            </div>

            </div></div>
            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                    <div class="cca card-footer d-flex">
                                        <div class="cca cart d-flex">
                                            {{$Roles->render()}}
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>

            <!-- /.card -->
          </div>
        </div>


@endcomponent
