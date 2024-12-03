

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
                    <a href="{{ route('create') }}" class="btn btn-info">ایجاد کاربر</a>
                    </div>
                </div>

              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <tbody><tr>

                    <th>نام</th>
                    <th>عنوان</th>
                    <th>پیغام</th>
                    <th>تلفن</th>
                    <th>ایمیل</th>
                    <th>تاریخ ارسال</th>
                  </tr>
                  @foreach ($all as $user)
                  <tr>

                    <td>{{$user->name}}</td>
                    <td>{{$user->subject}}</td>
                    <td>{{$user->content}}</td>
                    <td>0{{$user->number_phone}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{jdate($user->failed_at)->format('%Y %m %d ')}}</td>

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
